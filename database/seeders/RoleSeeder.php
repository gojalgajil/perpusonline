<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $adminRole = Role::create(['name' => 'admin']);
        $siswaRole = Role::create(['name' => 'siswa']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $siswa = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'password' => bcrypt('password'),
        ]);
        $siswa->assignRole('siswa');
    }
}
