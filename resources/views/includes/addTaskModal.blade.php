<div class="modal fade" id="staticBackdropAddTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @if(isset($getProject))
      <form action="/projects/{{ $getProject->project_id }}/tasks/{{ $getTask->task_id }}" method="POST">
      @else
      <form action="/tasks" method="POST">
      @endif
        @csrf
          <div class="modal-body">
            <div class="form-group px-4 pb-4">
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label mt-2" for="projectId">Project Belongs</label>
                        <select class="form-select form-select-md" aria-label=".form-select-md example" id="projectId" name="project_id">
                            @foreach($projects as $proj)
                                <option
                                  @if(isset($getProject))
                                    {{  $getProject->project_id == $proj->project_id ? 'selected': '' }}
                                  @else
                                    {{  $project->project_id == $proj->project_id ? 'selected': '' }}
                                  @endif
                                  value="{{ $proj->project_id }}">{{ $proj->project_name }}</option>
                            @endforeach
                        </select>

                        <label class="col-form-label mt-2" for="taskName">Task Name</label>
                        <input type="text" class="form-control" placeholder="Task Name" id="taskName" name="task_name" required>

                        <label class="col-form-label mt-2" for="taskDesc">Task Description</label>
                        <textarea class="form-control" placeholder="Task Description" id="taskDesc" rows="3" name="task_desc" required></textarea>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label mt-2" for="taskSched">Task Schedule</label>
                        <input type="date" class="form-control" placeholder="Project Description" id="taskSched" name="task_sched" value="{{ date('Y-m-d') }}" required>
                  
                        <label class="col-form-label mt-2" for="taskTime">Task Time</label>
                        <input type="time" class="form-control" placeholder="Project Color" id="taskTime" name="task_time" value="{{ date('h:i') }}" required>

                        <label class="col-form-label mt-2" for="taskPriority">Task Priority</label>
                        <select class="form-select form-select-md" aria-label=".form-select-md example" id="taskPriority" name="task_priority">
                                <option value="not_priority">Not Priority</option>
                                <option value="priority">Priority</option>
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="sumbit" class="btn btn-primary">Create Task</button>
          </div>
      </form>
    </div>
  </div>
</div>