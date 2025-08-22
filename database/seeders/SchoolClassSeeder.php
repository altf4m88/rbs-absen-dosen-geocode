<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SchoolClass::create([
            'name' => 'Class A',
        ]);

        \App\Models\SchoolClass::create([
            'name' => 'Class B',
        ]);

        \App\Models\SchoolClass::create([
            'name' => 'Class C',
        ]);
    }
}
