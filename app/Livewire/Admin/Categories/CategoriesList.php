<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\MembershipCategory;

class CategoriesList extends Component
{
    public bool $showModal = false;
    public ?int $editingId = null;
    public string $name = '';
    public string $annual_fee = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'annual_fee' => 'required|numeric|min:0',
    ];

    protected $messages = [
        'name.required' => 'Името е задължително.',
        'annual_fee.required' => 'Годишната такса е задължителна.',
        'annual_fee.numeric' => 'Годишната такса трябва да е число.',
        'annual_fee.min' => 'Годишната такса не може да е отрицателна.',
    ];

    public function openModal($id = null)
    {
        $this->resetValidation();

        if ($id) {
            $category = MembershipCategory::findOrFail($id);
            $this->editingId = $id;
            $this->name = $category->name;
            $this->annual_fee = $category->annual_fee;
        } else {
            $this->editingId = null;
            $this->name = '';
            $this->annual_fee = '';
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['editingId', 'name', 'annual_fee']);
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            $category = MembershipCategory::findOrFail($this->editingId);
            $category->update([
                'name' => $this->name,
                'annual_fee' => $this->annual_fee,
            ]);
            session()->flash('message', 'Категорията е обновена успешно.');
        } else {
            $maxOrder = MembershipCategory::max('sort_order') ?? 0;
            MembershipCategory::create([
                'name' => $this->name,
                'annual_fee' => $this->annual_fee,
                'sort_order' => $maxOrder + 1,
            ]);
            session()->flash('message', 'Категорията е добавена успешно.');
        }

        $this->closeModal();
    }

    public function delete(MembershipCategory $category)
    {
        if ($category->members()->count() > 0) {
            session()->flash('error', 'Не можете да изтриете категория с активни членове.');
            return;
        }

        $category->delete();
        session()->flash('message', 'Категорията е изтрита успешно.');
    }

    public function updateOrder($items)
    {
        foreach ($items as $item) {
            MembershipCategory::where('id', $item['value'])->update(['sort_order' => $item['order']]);
        }
    }

    public function render()
    {
        $categories = MembershipCategory::withCount('members')
            ->ordered()
            ->get();

        return view('livewire.admin.categories.categories-list', [
            'categories' => $categories,
        ])->layout('layouts.admin');
    }
}
