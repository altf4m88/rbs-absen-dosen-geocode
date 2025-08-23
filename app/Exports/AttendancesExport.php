<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendancesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::with(['user', 'schedule.subject', 'schedule.schoolClass'])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'User Name',
            'User Email',
            'Subject',
            'Class',
            'Attendance Time',
            'Latitude',
            'Longitude',
            'Notes',
            'Status',
        ];
    }

    /**
     * @param mixed $attendance
     * @return array
     */
    public function map($attendance): array
    {
        return [
            $attendance->user->name,
            $attendance->user->email,
            $attendance->schedule->subject->name,
            $attendance->schedule->schoolClass->name,
            $attendance->attendance_time,
            $attendance->latitude,
            $attendance->longitude,
            $attendance->notes,
            $attendance->status,
        ];
    }
}
