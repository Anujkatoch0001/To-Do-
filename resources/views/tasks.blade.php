<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <link rel="stylesheet" href="{{ asset('css/allTasks.css') }}">

</head>
<body>
    <div id="navBar" class="navbar">
        <h1>Task Manager</h1>
        <div class="nav-buttons">
            <a href="{{ route('task.create') }}" class="btn-create">Create Task</a>
            <a href="{{route('completedTasks')}}">Completed</a>
            <a href="{{ route('pendingTasks') }}">Pending</a>
       
        </div>
    </div>


    @if(session('success'))
  
    <div id="successAlert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if(session('error'))
    <div id="errorAlert" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="task-container">
        <h1>Task List</h1>
        @if(!empty($tasks) && $tasks->isNotEmpty())
            <div class="task-list">
                @foreach($tasks as $task)
                    <div class="task-item">
                        <div class="task-details">
                            <p><strong>Title:</strong> {{ $task->title }}</p>
                            <p><strong>Description:</strong> {{ $task->description }}</p>
                            <p><strong>Long Description:</strong> {{ $task->long_description }}</p>
                        </div>
                        
                        <div class="task-actions">
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('task.delete', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>

                            @if($task->isCompleted)
                            <p>Completed</p>
                        @else
                            <a href="{{ route('task.completed', $task->id) }}" class="btn btn-complete">Complete</a>
                        @endif
                        
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-tasks">
                <p>There are no tasks, maybe you should create one.</p>
                <a href="{{ route('task.create') }}" class="btn btn-create">Create a Task</a>
            </div>
        @endif
    </div>
    <script>
      let successAlert=  document.getElementById('successAlert');

      if(successAlert){
         let navBar=document.getElementById('navBar');

         navBar.style.display="none";


         setTimeout(() => {

            successAlert.display="none";
            navBar.style.display="inline-block";
            
         },2000);
      }


    </script>
</body>
</html>
