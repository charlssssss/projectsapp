<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        
        $task->project_id = $request->project_id;
        $task->task_name = $request->task_name;
        $task->task_desc = $request->task_desc;
        $task->task_sched = $request->task_sched;
        $task->task_time = $request->task_time;
        $task->task_priority = $request->task_priority;

        $task->save();

        return redirect('/projects/'.$task->project_id)->with('msg', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->project_id = $request->project_id;
        $task->task_name = $request->task_name;
        $task->task_desc = $request->task_desc;
        $task->task_sched = $request->task_sched;
        $task->task_time = $request->task_time;
        $task->task_priority = $request->task_priority;

        $task->update();

        return redirect('projects/'.$task->project_id.'/tasks/'.$task->task_id)->with('msg', 'Task updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('task_id', $id)->firstOrFail()->delete();

        return redirect()->back()->with('msg', 'Task deleted successfully!');
    }
}
