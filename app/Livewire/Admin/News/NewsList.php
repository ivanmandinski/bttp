<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsList extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public string $status = '';
    public string $category = '';

    public bool $showModal = false;
    public ?int $editingId = null;
    public string $title = '';
    public string $slug = '';
    public string $excerpt = '';
    public string $content = '';
    public $image = null;
    public ?string $existing_image = null;
    public string $news_category = '';
    public string $news_status = 'draft';
    public string $published_at = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function updatedTitle()
    {
        if (!$this->editingId) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function openModal($id = null)
    {
        $this->resetValidation();

        if ($id) {
            $news = News::findOrFail($id);
            $this->editingId = $id;
            $this->title = $news->title;
            $this->slug = $news->slug;
            $this->excerpt = $news->excerpt ?? '';
            $this->content = $news->content ?? '';
            $this->existing_image = $news->image;
            $this->news_category = $news->category ?? '';
            $this->news_status = $news->status;
            $this->published_at = $news->published_at?->format('Y-m-d') ?? '';
        } else {
            $this->reset(['editingId', 'title', 'slug', 'excerpt', 'content', 'existing_image', 'news_category', 'published_at']);
            $this->news_status = 'draft';
            $this->image = null;
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug' . ($this->editingId ? ',' . $this->editingId : ''),
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'news_category' => 'nullable|string|max:50',
            'news_status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ];

        $messages = [
            'title.required' => 'Заглавието е задължително.',
            'slug.required' => 'Slug е задължителен.',
            'slug.unique' => 'Този slug вече съществува.',
        ];

        $this->validate($rules, $messages);

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt ?: null,
            'content' => $this->content ?: null,
            'category' => $this->news_category ?: null,
            'status' => $this->news_status,
            'published_at' => $this->news_status === 'published' ? ($this->published_at ?: now()) : null,
            'user_id' => auth()->id(),
        ];

        if ($this->image) {
            if ($this->existing_image) {
                Storage::disk('public')->delete($this->existing_image);
            }
            $data['image'] = $this->image->store('news', 'public');
        }

        if ($this->editingId) {
            News::where('id', $this->editingId)->update($data);
            session()->flash('message', 'Новината е обновена.');
        } else {
            News::create($data);
            session()->flash('message', 'Новината е създадена.');
        }

        $this->closeModal();
    }

    public function delete(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        session()->flash('message', 'Новината е изтрита.');
    }

    public function publish(News $news)
    {
        $news->update([
            'status' => 'published',
            'published_at' => now(),
        ]);
        session()->flash('message', 'Новината е публикувана.');
    }

    public function unpublish(News $news)
    {
        $news->update(['status' => 'draft']);
        session()->flash('message', 'Новината е свалена от публикуване.');
    }

    public function removeImage()
    {
        if ($this->existing_image && $this->editingId) {
            Storage::disk('public')->delete($this->existing_image);
            News::where('id', $this->editingId)->update(['image' => null]);
            $this->existing_image = null;
        }
        $this->image = null;
    }

    public function render()
    {
        $news = News::query()
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->category, fn($q) => $q->where('category', $this->category))
            ->latest()
            ->paginate(15);

        $categories = [
            'business' => 'Бизнес',
            'events' => 'Събития',
            'training' => 'Обучения',
            'international' => 'Международни',
        ];

        return view('livewire.admin.news.news-list', [
            'news' => $news,
            'categories' => $categories,
        ])->layout('layouts.admin');
    }
}
