<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::put('/update-task/{id}',[TaskController::class, 'updateTask'])->name('task.update');

Route::get('/', [TaskController::class, 'allTasks'])->name('allTasks');

// Route::get('/filter', [TaskController::class, 'filterTasks'])->name('task.filter');


Route::get('/completed/tasks', [TaskController::class, 'completedTasks'])->name('completedTasks');



Route::get('/create', [TaskController::class, 'createTask'])->name('task.create');

Route::post('/store-task', [TaskController::class, 'storetask'])->name('task.store');

Route::get('/edit-task/{id}',[TaskController::class, 'editTask'])->name('task.edit');

Route::delete('/delete-task/{id}',[TaskController::class, 'deleteTask'])->name('task.delete');

Route::get('/task/complete/{id}', [TaskController::class, 'complete'])->name('task.completed');

Route::get('/pending/tasks',[TaskController::class, 'pendingTasks'])->name('pendingTasks');

Route::get('/pending/tasks',[TaskController::class, 'pendingTasks'])->name('pendingTasks');



