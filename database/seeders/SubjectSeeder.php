<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Subject::create([
            'name' => 'Mathematics',
            'code' => 'MATH101',
        ]);

        \App\Models\Subject::create([
            'name' => 'Physics',
            'code' => 'PHY101',
        ]);

        \App\Models\Subject::create([
            'name' => 'Chemistry',
            'code' => 'CHEM101',
        ]);

        \App\Models\Subject::create([
            'name' => 'Computer Science',
            'code' => 'CS101',
        ]);

        \App\Models\Subject::create([
            'name' => 'Biology',
            'code' => 'BIO101',
        ]);
    }
}
