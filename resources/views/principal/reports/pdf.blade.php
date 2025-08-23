<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Attendance Report for {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <hr>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Attendance Time</th>
                <th>Status</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->schedule->subject->name }}</td>
                <td>{{ $attendance->schedule->schoolClass->name }}</td>
                <td>{{ $attendance->attendance_time }}</td>
                <td>{{ $attendance->status }}</td>
                <td>{{ $attendance->notes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
