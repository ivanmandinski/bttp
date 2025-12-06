<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventsList extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public string $status = '';
    public string $type = '';

    public bool $showModal = false;
    public ?int $editingId = null;
    public string $title = '';
    public string $slug = '';
    public string $description = '';
    public string $start_date = '';
    public string $end_date = '';
    public string $location = '';
    public string $event_type = '';
    public $image = null;
    public ?string $existing_image = null;
    public string $max_participants = '';
    public string $price = '';
    public string $event_status = 'draft';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'type' => ['except' => ''],
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
            $event = Event::findOrFail($id);
            $this->editingId = $id;
            $this->title = $event->title;
            $this->slug = $event->slug;
            $this->description = $event->description ?? '';
            $this->start_date = $event->start_date?->format('Y-m-d\TH:i') ?? '';
            $this->end_date = $event->end_date?->format('Y-m-d\TH:i') ?? '';
            $this->location = $event->location ?? '';
            $this->event_type = $event->type ?? '';
            $this->existing_image = $event->image;
            $this->max_participants = $event->max_participants ?? '';
            $this->price = $event->price ?? '';
            $this->event_status = $event->status;
        } else {
            $this->reset(['editingId', 'title', 'slug', 'description', 'start_date', 'end_date', 'location', 'event_type', 'existing_image', 'max_participants', 'price']);
            $this->event_status = 'draft';
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
            'slug' => 'required|string|max:255|unique:events,slug' . ($this->editingId ? ',' . $this->editingId : ''),
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:500',
            'event_type' => 'nullable|string|max:50',
            'image' => 'nullable|image|max:2048',
            'max_participants' => 'nullable|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'event_status' => 'required|in:draft,published,cancelled',
        ];

        $messages = [
            'title.required' => 'Заглавието е задължително.',
            'slug.required' => 'Slug е задължителен.',
            'slug.unique' => 'Този slug вече съществува.',
            'start_date.required' => 'Началната дата е задължителна.',
        ];

        $this->validate($rules, $messages);

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description ?: null,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date ?: null,
            'location' => $this->location ?: null,
            'type' => $this->event_type ?: null,
            'max_participants' => $this->max_participants ?: null,
            'price' => $this->price ?: null,
            'status' => $this->event_status,
        ];

        if ($this->image) {
            if ($this->existing_image) {
                Storage::disk('public')->delete($this->existing_image);
            }
            $data['image'] = $this->image->store('events', 'public');
        }

        if ($this->editingId) {
            Event::where('id', $this->editingId)->update($data);
            session()->flash('message', 'Събитието е обновено.');
        } else {
            Event::create($data);
            session()->flash('message', 'Събитието е създадено.');
        }

        $this->closeModal();
    }

    public function delete(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        session()->flash('message', 'Събитието е изтрито.');
    }

    public function publish(Event $event)
    {
        $event->update(['status' => 'published']);
        session()->flash('message', 'Събитието е публикувано.');
    }

    public function cancel(Event $event)
    {
        $event->update(['status' => 'cancelled']);
        session()->flash('message', 'Събитието е отменено.');
    }

    public function removeImage()
    {
        if ($this->existing_image && $this->editingId) {
            Storage::disk('public')->delete($this->existing_image);
            Event::where('id', $this->editingId)->update(['image' => null]);
            $this->existing_image = null;
        }
        $this->image = null;
    }

    public function render()
    {
        $events = Event::query()
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->type, fn($q) => $q->where('type', $this->type))
            ->latest('start_date')
            ->paginate(15);

        $types = [
            'seminar' => 'Семинар',
            'conference' => 'Конференция',
            'training' => 'Обучение',
            'meeting' => 'Среща',
            'other' => 'Друго',
        ];

        return view('livewire.admin.events.events-list', [
            'events' => $events,
            'types' => $types,
        ])->layout('layouts.admin');
    }
}
