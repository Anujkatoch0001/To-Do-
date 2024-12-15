<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function allTasks(Request $request){

       $tasks= Task::all();


       return view('tasks', compact('tasks'));
    }


    public function createTask(Request $request){
        return view('createtask');
    }

    public function storetask(Request $request) {
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'long_description'=>'required|string'
        ]);


        $task=Task::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'long_description'=>$request->input('long_description')

        ]);

       

        return redirect()->route('allTasks')->with('success', 'Task created successfully');
    }



    public function editTask($id)
    
{
    $task=Task::where('id',$id)->first(); 
    
    

    // Return the edit view with the task data
    return view('edittask', compact('task'));
}

public function updateTask(Request $request,$id){
    $task=Task::where('id',$id)->first();
    $task->update([
        'title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'long_description'=>$request->input('long_description')

    ]);
    return redirect()->route('allTasks')->with('success', 'Task updated successfully');
}

public function deleteTask($id){
    $task =Task::where('id',$id)->first();
    $task->delete();
    return redirect()->route('allTasks')->with('success', 'Task deleted successfully');
}

public function complete(Request $request,$id)
{

    $task = Task::findOrFail($id);
    $task->isCompleted = true;
    $task->save();
    return redirect()->back()->with('success', 'Task marked as completed!');
}


public function completedTasks(Request $request){

    $completedTasks = Task::where('isCompleted', true)->get();


    if($completedTasks){
        return view('completetask', compact('completedTasks'));
    }
   
}
public function pendingTasks(){
    $pendingTasks = Task::where('isCompleted', false)->get();
    return view('pendingtask', compact('pendingTasks'));
}



// public function filtertasks(Request $request)
// {
//     $filter = $request->query('filter', 'all');

//     if ($filter === 'completed') {
//         $tasks = Task::where('isCompleted', true)->get();
//         return view('completetask',compact('tasks'));
//     } elseif ($filter === 'pending') {
//         $tasks = Task::where('isCompleted', false)->get();
//         return view('tasks',compact('tasks'));
//     } else {
//         $tasks = Task::all();
//         return view('tasks', compact('tasks'));
//     }

    
// }

}
