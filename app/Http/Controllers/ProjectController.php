<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('tasks')->get();

        return view('projects.index', compact('projects'));
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
        // $request->validate([
        //     'project_name' => 'required',
        //     'project_desc' => 'required',
        //     'project_color' => 'required',
        // ]);

        $project = new Project;

        $project->project_name = $request->project_name;
        $project->project_desc = $request->project_desc;
        $project->project_color = $request->project_color;

        $project->save();

        return redirect('/projects')->with('msg', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::with('tasks')->get();
        $project = Project::findOrFail($id);
        $task_projs = Project::with('tasks')->where('project_id', $id)->get();

        return view('projects.show', compact('project', 'projects', 'task_projs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->project_name = $request->project_name;
        $project->project_desc = $request->project_desc;
        $project->project_color = $request->project_color;

        $project->update();

        return redirect()->back()->with('msg', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::where('project_id', $id)->firstOrFail()->delete();

        return redirect('/projects')->with('msg', 'Project deleted successfully!');
    }
}
