@extends('layouts.layout')

@section('content')
<div class="container pt-5 pb-3">
    <h1 class="text-center text-primary">Todo Can Do It!</h1>
    <p class="lead fs-6 text-center">Everyone can do it lesgo. Yeah!</p>
</div>
<div class="container py-3">
    <div class="row d-flex justify-content-between">
        <div class="col-md-3">   
            <button type="button" class="btn btn-outline-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdropAddProject"><i class="fa-solid fa-folder fs-5"></i>&nbsp; Add New Project</button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-outline-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdropAddTask"><i class="fa-solid fa-list-check fs-5"></i>&nbsp; Add New Task</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-5 mb-5 mb-lg-0">         
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading">
                    <button class="accordion-button collapsed text-bg-{{ $project->project_color }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
                        <span class="badge bg-primary rounded-pill me-3">{{$task_projs[0]->tasks->count()}}</span>
                        <h4 class="m-0">{{ mb_strimwidth($project->project_name, 0, 25, "...") }}</h4>
                    </button>
                    </h2>
                    <div id="flush-collapse" class="accordion-collapse collapse show" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-8 mb-2">
                                    {{ $project->project_desc }}
                                </div>
                                <div class="col-xl-4 d-flex justify-content-end">
                                    <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdateProject"><i class="fa-regular fa-pen-to-square"></i></button>      
                                    <form action="{{ route('projects.destroy', $project->project_id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @foreach($projects as $proj)
                @if ($proj->project_id !== $project->project_id)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $loop->index }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapse{{ $loop->index }}">
                        <span class="badge bg-primary rounded-pill me-3">{{$proj->tasks->count()}}</span>
                        {{ $proj->project_name }}
                    </button>
                    </h2>
                    <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $loop->index }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-8 mb-2">
                                    {{ $proj->project_desc }}
                                </div>
                                <div class="col-xl-4 d-flex justify-content-end">                            
                                    <a href="/projects/{{ $proj->project_id }}" class="btn btn-outline-primary me-2"><i class="fa-regular fa-eye"></i></a>
                                    
                                    <form action="{{ route('projects.destroy', $project->project_id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </div>
        </div>
        <div class="col-lg-7">
            @if(count($task_projs[0]->tasks) > 0)
                <h5 class="ms-1 pb-1">{{ mb_strimwidth($project->project_name, 0, 25, "...") }} Tasks List</h5>
            @endif
            <div class="list-group">
                @foreach($task_projs[0]->tasks as $task_proj)
                    <div class="list-group-item list-group-item-action user-select-none">
                        <div class="container text-center">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <div class="d-flex flex-column align-items-start py-2">
                                        <h6 class="mb-1">{{ $task_proj->task_name }}</h6>
                                        <small>
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ date_format(new DateTime($task_proj->task_sched), "F d, Y") }}
                                            &nbsp;
                                            <i class="fa-regular fa-clock"></i>
                                            {{ date_format(new DateTime($task_proj->task_time), "h:i A") }}
                                        </small>
                                    </div>    
                                </div>
                                
                                @if($task_proj->task_priority == 'priority')
                                <div class="col-3 d-flex justify-content-start"><span class="badge bg-{{ $project->project_color }}">Priority</span></div>
                                @else
                                <div class="col-3 d-flex justify-content-start"><span class="badge bg-secondary">Not Priority</span></div>
                                @endif
                                
                                <div class="col-2 d-flex align-items-center justify-content-end ms-auto">
                                    <a href="/projects/{{ $task_proj->project_id }}/tasks/{{ $task_proj->task_id }}" class="text-body"><i class="fa-regular fa-eye"></i></a>
                                    <form action="{{ route('tasks.destroy', $task_proj->task_id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn text-body"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if(count($task_projs[0]->tasks) < 1)
                    <div class="container text-center mt-4">
                        <h4 class="text-secondary"><i class="fa-solid fa-clipboard fs-5"></i>&nbsp;Need Something to Work on?</h4>
                        <p class="lead">Just click "Add Button" to create new task.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>

<!-- Alert Message -->
@include('includes.alertMessage')

<!-- Add New Project Modal -->
@include('includes.addProjectModal')

<!-- Update Project Modal -->
@include('includes.updateProjectModal')

<!-- Add New Task -->
@include('includes.addTaskModal')

@endsection