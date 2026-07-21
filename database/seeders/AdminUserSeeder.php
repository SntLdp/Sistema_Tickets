<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Crea el primer usuario con rol Ingeniero de Sistemas para poder
     * ingresar al panel de administración apenas se instala el sistema.
     * IMPORTANTE: cambiar esta contraseña inmediatamente en producción.
     */
    public function run(): void
    {
        $engineerRole = Role::where('name', Role::INGENIERO)->firstOrFail();

        User::firstOrCreate(
            ['email' => 'admin@sistema-tickets.local'],
            [
                'role_id' => $engineerRole->id,
                'name' => 'Administrador del Sistema',
                'department' => 'Ingeniería de Sistemas',
                'password' => Hash::make('CambiarPassword123!'),
                'email_verified_at' => now(),
            ]
        );
    }
}
