<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
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

        return redirect('/projects/'.$task->project_id.'/tasks/'.$task->task_id)
                ->with('msg', 'Task created successfully!');
    }

    public function show(Project $project, Task $task)
    {
        $getProject = Project::findOrFail($project->project_id);
        $projects = Project::all();
        $getTask = Task::findOrFail($task->task_id);
        $getAllTasks = Task::all()->where('project_id', $project->project_id);

        return view('tasks.show', compact('getProject', 'projects', 'getTask', 'getAllTasks'));
    }

    public function destroy(Project $project, Task $task)
    {
        $task = Task::where('task_id', $task->task_id)->firstOrFail()->delete();
        $firstTask = Task::where('project_id', $project->project_id)->first();

        if(isset($firstTask)) {
            return redirect('/projects/'.$project->project_id.'/tasks/'.$firstTask->task_id)
                ->with('msg', 'Task deleted successfully!');
        }
        
        return redirect('/projects/'.$project->project_id)
                ->with('msg', 'Task deleted successfully!');
    }
}
