<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Hardware', 'icon' => 'ti-device-desktop'],
            ['name' => 'Software', 'icon' => 'ti-apps'],
            ['name' => 'Red', 'icon' => 'ti-network'],
            ['name' => 'Impresoras', 'icon' => 'ti-printer'],
            ['name' => 'Correo electrónico', 'icon' => 'ti-mail'],
            ['name' => 'Servidor', 'icon' => 'ti-server'],
            ['name' => 'Base de datos', 'icon' => 'ti-database'],
            ['name' => 'Accesos', 'icon' => 'ti-key'],
            ['name' => 'Sistema interno', 'icon' => 'ti-settings'],
            ['name' => 'Otro', 'icon' => 'ti-dots'],
        ];

        foreach ($categories as $category) {
            TicketCategory::firstOrCreate(
                ['name' => $category['name']],
                ['icon' => $category['icon'], 'is_active' => true]
            );
        }
    }
}
