<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectTaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::put('/projects/{id}', 
    [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', 
    [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{id}', 
    [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', 
    [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::post('/projects/{project}/tasks/{task}', 
    [ProjectTaskController::class, 'store'])->scopeBindings();
Route::get('/projects/{project}/tasks/{task}', 
    [ProjectTaskController::class, 'show'])->scopeBindings();   
Route::delete('/projects/{project}/tasks/{task}', 
    [ProjectTaskController::class, 'destroy'])->name('projectTasks.destroy')->scopeBindings();