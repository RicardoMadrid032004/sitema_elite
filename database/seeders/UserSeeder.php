<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@elite.net',
            'password' => Hash::make('admin')
        ]);

        $admin->assignRole('admin');

        $personal = User::create([
            'name' => 'personal',
            'email' => 'personal@elite.net',
            'password' => Hash::make('personal')
        ]);

        $personal->assignRole('personal');

        $estudiante = User::create([
            'name' => 'estudiante',
            'email' => 'estudiante@elite.net',
            'password' => Hash::make('estudiante')
        ]);

        $estudiante->assignRole('estudiante');
    }
}
