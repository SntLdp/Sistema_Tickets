<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => Role::USUARIO], ['label' => 'Usuario']);
        Role::firstOrCreate(['name' => Role::INGENIERO], ['label' => 'Ingeniero de Sistemas']);
    }
}
