<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create( [
            'name_ar' => 'ادمن',
            'name_en' => 'Admin',
            'email'   => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'phone_number' => '0112321874',
        ]);
    }
}
