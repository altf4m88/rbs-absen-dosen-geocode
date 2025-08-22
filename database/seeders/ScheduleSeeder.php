<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = \App\Models\User::where('role', 'teacher')->get();
        $subjects = \App\Models\Subject::all();
        $schoolClasses = \App\Models\SchoolClass::all();

        foreach ($teachers as $teacher) {
            foreach ($subjects as $subject) {
                foreach ($schoolClasses as $class) {
                    \App\Models\Schedule::create([
                        'user_id' => $teacher->id,
                        'subject_id' => $subject->id,
                        'school_class_id' => $class->id,
                        'day_of_week' => rand(1, 5), // Monday to Friday
                        'start_time' => '08:00:00',
                        'end_time' => '09:00:00',
                    ]);
                }
            }
        }
    }
}
