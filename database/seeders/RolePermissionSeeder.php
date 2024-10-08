<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat permission
        $permissions = [
            'tambah-user',
            'edit-user',
            'hapus-user',
            'lihat-user',
            'tambah-tulisan',
            'edit-tulisan',
            'hapus-tulisan',
            'lihat-tulisan',

        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }

        // Membuat role
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $penulisRole = \Spatie\Permission\Models\Role::create(['name' => 'penulis']);

        //role find
        $adminRole = \Spatie\Permission\Models\Role::findByName('admin');
        $penulisRole = \Spatie\Permission\Models\Role::findByName('penulis');

        // Memberikan permission ke role
        $adminRole->givePermissionTo($permissions);
        $penulisRole->givePermissionTo(['tambah-tulisan', 'edit-tulisan']);
    }
}
