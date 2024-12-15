<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completed Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            margin-left: 10px;
        }

        .task-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #444;
        }

        .task-list {
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
        }

        .task-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .task-item:last-child {
            border-bottom: none;
        }

        .no-tasks {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Task Manager</h1>
        {{-- <a href="{{ route('allTasks') }}">All Tasks</a> --}}
        {{-- <a href="{{ route('tasks.filter', ['filter' => 'completed']) }}">Completed Tasks</a> --}}

    </div>

    <div class="task-container">
        <h1>Completed Tasks</h1>
        @if($completedTasks->isNotEmpty())
            <div class="task-list">
                @foreach($completedTasks as $task)
                    <div class="task-item">
                        <h3>{{ $task->title }}</h3>
                        <p><strong></strong> {{ $task->description }}</p>
                        <p><strong></strong> {{ $task->long_description }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-tasks">
                <p>No completed tasks found.</p>
                <a href="{{ route('allTasks') }}" class="btn-create">View All Tasks</a>
            </div>
        @endif
    </div>
</body>
</html>
