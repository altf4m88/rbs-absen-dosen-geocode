<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => 'latitude'],
            ['value' => '34.052235'] // Example latitude (e.g., Los Angeles)
        );

        \App\Models\Setting::updateOrCreate(
            ['key' => 'longitude'],
            ['value' => '-118.243683'] // Example longitude (e.g., Los Angeles)
        );

        \App\Models\Setting::updateOrCreate(
            ['key' => 'radius'],
            ['value' => '100'] // Example radius in meters
        );
    }
}
