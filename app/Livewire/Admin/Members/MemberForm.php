<?php

namespace App\Livewire\Admin\Members;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Member;
use App\Models\MembershipCategory;
use Illuminate\Support\Facades\Storage;

class MemberForm extends Component
{
    use WithFileUploads;

    public ?Member $member = null;

    // Company Information
    public string $company_name = '';
    public string $eik = '';
    public string $address = '';
    public string $phone = '';
    public string $email = '';
    public string $website = '';
    public $logo = null;
    public ?string $existing_logo = null;
    public string $description = '';

    // Representative Information
    public string $representative_name = '';
    public string $representative_position = '';
    public string $representative_phone = '';
    public string $representative_email = '';

    // Membership Information
    public string $membership_category_id = '';
    public string $member_since = '';
    public string $status = 'active';
    public string $main_activity = '';
    public string $nace_code = '';
    public bool $show_in_catalog = true;

    public function mount(?Member $member = null)
    {
        if ($member && $member->exists) {
            $this->member = $member;
            $this->company_name = $member->company_name;
            $this->eik = $member->eik;
            $this->address = $member->address ?? '';
            $this->phone = $member->phone ?? '';
            $this->email = $member->email ?? '';
            $this->website = $member->website ?? '';
            $this->existing_logo = $member->logo;
            $this->description = $member->description ?? '';
            $this->representative_name = $member->representative_name ?? '';
            $this->representative_position = $member->representative_position ?? '';
            $this->representative_phone = $member->representative_phone ?? '';
            $this->representative_email = $member->representative_email ?? '';
            $this->membership_category_id = $member->membership_category_id ?? '';
            $this->member_since = $member->member_since?->format('Y-m-d') ?? '';
            $this->status = $member->status;
            $this->main_activity = $member->main_activity ?? '';
            $this->nace_code = $member->nace_code ?? '';
            $this->show_in_catalog = $member->show_in_catalog;
        } else {
            $this->member_since = now()->format('Y-m-d');
        }
    }

    public function save()
    {
        $rules = [
            'company_name' => 'required|string|max:255',
            'eik' => 'required|string|max:20|unique:members,eik' . ($this->member ? ',' . $this->member->id : ''),
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'representative_name' => 'nullable|string|max:255',
            'representative_position' => 'nullable|string|max:255',
            'representative_phone' => 'nullable|string|max:50',
            'representative_email' => 'nullable|email|max:255',
            'membership_category_id' => 'nullable|exists:membership_categories,id',
            'member_since' => 'nullable|date',
            'status' => 'required|in:active,inactive,terminated',
            'main_activity' => 'nullable|string|max:500',
            'nace_code' => 'nullable|string|max:20',
            'show_in_catalog' => 'boolean',
        ];

        $messages = [
            'company_name.required' => 'Името на фирмата е задължително.',
            'eik.required' => 'ЕИК/Булстат е задължителен.',
            'eik.unique' => 'Вече има регистриран член с този ЕИК.',
            'email.email' => 'Невалиден имейл адрес.',
            'website.url' => 'Невалиден URL адрес.',
            'logo.image' => 'Файлът трябва да е изображение.',
            'logo.max' => 'Изображението не може да е по-голямо от 2MB.',
        ];

        $this->validate($rules, $messages);

        $data = [
            'company_name' => $this->company_name,
            'eik' => $this->eik,
            'address' => $this->address ?: null,
            'phone' => $this->phone ?: null,
            'email' => $this->email ?: null,
            'website' => $this->website ?: null,
            'description' => $this->description ?: null,
            'representative_name' => $this->representative_name ?: null,
            'representative_position' => $this->representative_position ?: null,
            'representative_phone' => $this->representative_phone ?: null,
            'representative_email' => $this->representative_email ?: null,
            'membership_category_id' => $this->membership_category_id ?: null,
            'member_since' => $this->member_since ?: null,
            'status' => $this->status,
            'main_activity' => $this->main_activity ?: null,
            'nace_code' => $this->nace_code ?: null,
            'show_in_catalog' => $this->show_in_catalog,
        ];

        // Handle logo upload
        if ($this->logo) {
            if ($this->existing_logo) {
                Storage::disk('public')->delete($this->existing_logo);
            }
            $data['logo'] = $this->logo->store('logos', 'public');
        }

        if ($this->member) {
            $this->member->update($data);
            session()->flash('message', 'Членът е обновен успешно.');
        } else {
            Member::create($data);
            session()->flash('message', 'Членът е добавен успешно.');
        }

        return redirect()->route('admin.members.index');
    }

    public function removeLogo()
    {
        if ($this->existing_logo) {
            Storage::disk('public')->delete($this->existing_logo);
            $this->member->update(['logo' => null]);
            $this->existing_logo = null;
        }
        $this->logo = null;
    }

    public function render()
    {
        $categories = MembershipCategory::active()->ordered()->get();

        return view('livewire.admin.members.member-form', [
            'categories' => $categories,
        ])->layout('layouts.admin');
    }
}
