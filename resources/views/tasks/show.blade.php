@extends('layouts.layout')

@section('content')
<div class="container pt-5 pb-3">
    <h1 class="text-center text-primary">Todo Can Do It!</h1>
    <p class="lead fs-6 text-center">Everyone can do it lesgo. Yeah!</p>
</div>
<div class="container py-3">
    <div class="row d-flex justify-content-between">
        <div class="col-md-3">
            <button type="button" class="btn btn-outline-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdropAddTask"><i class="fa-solid fa-list-check fs-5"></i>&nbsp; Add New Task</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 mb-5">
            <div class="card">
                <div class="card-header d-flex align-items-center bg-{{ $getProject->project_color }}">
                    <div class="col-9">
                        <h4 class="card-title my-2 text-white">{{ $getTask->task_name }}</h4>
                    </div>    

                    <div class="col-3 d-flex align-items-center justify-content-end ms-auto">
                        <button class="btn text-primary px-2" id="editBtn"><i class="fa-solid fa-pen-to-square"></i></button>
                        <form action="{{ route('projectTasks.destroy', [$getTask->project_id, $getTask->task_id]) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn text-primary px-2"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                <form action="{{ route('tasks.update', $getTask->task_id) }}" method="POST">
                    @csrf @method('PUT')
                        <div class="form-group">
                            <fieldset id="infoFld" disabled>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label mt-2" for="projectId">Project Belongs</label>
                                        <select class="form-select form-select-md" aria-label=".form-select-md example" id="projectId" name="project_id">
                                            @foreach($projects as $project)    
                                            <option {{ $project->project_id == $getProject->project_id ? 'selected': '' }} value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label mt-2" for="taskName">Task Name</label>
                                        <input type="text" class="form-control" placeholder="Task Name" id="taskName" name="task_name" value="{{ $getTask->task_name }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="col-form-label mt-2" for="taskSched">Task Schedule</label>
                                        <input type="date" class="form-control" placeholder="Project Description" id="taskSched" name="task_sched" value="{{ $getTask->task_sched }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-form-label mt-2" for="taskTime">Task Time</label>
                                        <input type="time" class="form-control" placeholder="Project Color" id="taskTime" name="task_time" value="{{ $getTask->task_time }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-form-label mt-2" for="taskPriority">Task Priority</label>
                                        <select class="form-select form-select-md" aria-label=".form-select-md example" id="taskPriority" name="task_priority">
                                                <option value="not_priority" {{ $getTask->task_priority == "not_priority" ? 'selected' : '' }}>Not Priority</option>
                                                <option value="priority" {{ $getTask->task_priority == "priority" ? 'selected' : '' }}>Priority</option>
                                        </select>
                                    </div>
                                </div>

                                <label class="col-form-label mt-2" for="taskDesc">Task Description</label>
                                <textarea class="form-control" placeholder="Task Description" id="taskDesc" rows="3" name="task_desc">{{ $getTask->task_desc }}</textarea>

                            </fieldset>
                        </div>
                        
                        <div class="hide" id="saveContainer">
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary w-30" id="saveBtn">Save</button>
                                <button type="button" class="btn btn-outline-primary w-30 ms-1" id="cancelBtn">Cancel</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="ms-1 pb-1 d-flex align-items-center">
                {{ mb_strimwidth($getProject->project_name, 0, 25, "...") }} Tasks List
                <span class="badge bg-primary rounded-pill ms-2">{{ $getAllTasks->count() }}</span>
            </h5>
            <div class="list-group">
                @foreach($getAllTasks as $task)
                <div class="list-group-item list-group-item-action {{ $getTask->task_id == $task->task_id ? 'active': 'user-select-none' }}">
                    <div class="container text-center">
                        <div class="row align-items-center">
                            <div class="col-xl-7">
                                <div class="d-flex flex-column align-items-start py-2">
                                    <h6 class="mb-1">{{ $task->task_name }}</h6>
                                    <small>
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ date_format(new DateTime($task->task_sched), "F d, Y") }}
                                        &nbsp;
                                        <i class="fa-regular fa-clock"></i>
                                        {{ date_format(new DateTime($task->task_time), "h:i A") }}
                                    </small>
                                </div>    
                            </div>
                            
                            @if($task->task_priority == 'priority')
                            <div class="col-3 d-flex justify-content-start"><span class="badge bg-{{ $getProject->project_color }}">Priority</span></div>
                            @else
                            <div class="col-3 d-flex justify-content-start"><span class="badge bg-secondary">Not Priority</span></div>
                            @endif
                            
                            <div class="col-2 d-flex align-items-center justify-content-end ms-auto">
                                <a href="/projects/{{ $task->project_id }}/tasks/{{ $task->task_id }}" class="text-secondary"><i class="fa-regular fa-eye"></i></a>
                                <form action="{{ route('projectTasks.destroy', [$task->project_id, $task->task_id]) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn text-secondary"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Alert Message -->
@include('includes.alertMessage')

<!-- Add New Task -->
@include('includes.addTaskModal')

<script src="/js/editTask.js"></script>
@endsection