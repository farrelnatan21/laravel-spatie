<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        )->assignRole('admin');

        // Membuat user penulis jika belum ada
        User::updateOrCreate(
            ['email' => 'penulis@example.com'],
            [
                'name' => 'Penulis',
                'password' => bcrypt('password'),
            ]
        )->assignRole('penulis');
    }
}
