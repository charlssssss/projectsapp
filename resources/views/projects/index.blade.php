@extends('layouts.layout')

@section('content')
<div class="container pt-5 pb-3">
    <h1 class="text-center text-primary">Todo Can Do It!</h1>
    <p class="lead fs-6 text-center">Everyone can do it lesgo. Yeah!</p>
</div>
<div class="container py-3">
    <div class="row">
        <div class="col-md-3">
            
            <button type="button" class="btn btn-outline-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdropAddProject"><i class="fa-solid fa-folder fs-5"></i>&nbsp; Add New Project</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-5">
            @if(count($projects) < 1)
            <div class="card" style="width: 100%; border: 1px dashed #343a40;">
                <div class="card-body text-center text-md-start">
                    <h5 class="card-title text-dark">Whoops! No Projects Yet.</h5>
                    <p class="card-text lead fs-6">Click "Add New Project" first to create your tasks and complete!</p>
                </div>
            </div>
            @endif
            
            <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach($projects as $project)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $loop->index }}">
                    <button class="accordion-button collapsed text-bg-{{ $project->project_color }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapse{{ $loop->index }}">
                        <span class="badge bg-primary rounded-pill me-3">{{$project->tasks->count()}}</span>
                        {{ $project->project_name }}
                    </button>
                    </h2>
                    <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $loop->index }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-8 mb-2">
                                    {{ $project->project_desc }}
                                </div>
                                <div class="col-xl-4 d-flex justify-content-end">                            
                                    <a href="/projects/{{ $project->project_id }}" class="btn btn-outline-primary me-2"><i class="fa-regular fa-eye"></i></a>
                                    
                                    <form action="{{ route('projects.destroy', $project->project_id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="col-lg-7 mt-4">
            <div class="container text-center">
                <h3 class="text-secondary"><i class="fa-regular fa-eye fs-3"></i>&nbsp;Choose a Project and View Tasks</h3>
                <p class="lead">Choose a project and then click "View Button" to view tasks.</p>
            </div>
        </div>
    </div>
</div>

<!-- Alert Message -->
@include('includes.alertMessage')

<!-- Add New Project Modal -->
@include('includes.addProjectModal')

<!-- Add New Task -->
@include('includes.addTaskModal')

@endsection