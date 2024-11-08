<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Module::insert([[
            'name' => 'Website',
            'handle' => 'website',
        ],[
            'name' => 'Inventory',
            'handle' => 'inventory',
        ],[
            'name' => 'HR',
            'handle' => 'hr',
        ]]);
    }
}
