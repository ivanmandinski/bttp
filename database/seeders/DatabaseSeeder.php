<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MembershipCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Администратор',
            'email' => 'admin@bttp-pleven.bg',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Create default membership categories
        $categories = [
            ['name' => 'Микро предприятие', 'annual_fee' => 150, 'sort_order' => 1],
            ['name' => 'Малко предприятие', 'annual_fee' => 300, 'sort_order' => 2],
            ['name' => 'Средно предприятие', 'annual_fee' => 500, 'sort_order' => 3],
            ['name' => 'Голямо предприятие', 'annual_fee' => 800, 'sort_order' => 4],
            ['name' => 'Почетен член', 'annual_fee' => 0, 'sort_order' => 5],
        ];

        foreach ($categories as $category) {
            MembershipCategory::create($category);
        }

        // Seed news and events
        $this->call(NewsAndEventsSeeder::class);
    }
}
