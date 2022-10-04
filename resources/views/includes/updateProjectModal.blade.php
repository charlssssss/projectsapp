<div class="modal fade" id="staticBackdropUpdateProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('projects.update', $project->project_id) }}" method="POST">
        @csrf @method('PUT')
          <div class="modal-body">
            <div class="form-group px-4 pb-4">
                <label class="col-form-label mt-2" for="projectName">Project Name</label>
                <input type="text" class="form-control" placeholder="Project Name" id="projectName" name="project_name" value="{{ $project->project_name }}" required>
    
                <label class="col-form-label mt-2" for="projectDesc">Project Description</label>
                <input type="text" class="form-control" placeholder="Project Description" id="projectDesc" name="project_desc" value="{{ $project->project_desc }}" required>


                <label class="col-form-label mt-2" for="projectColor">Project Color</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" id="projectColor" name="project_color" value="{{ $project->project_color }}">
                        <option value="info" {{ $project->project_color == "info" ? 'selected' : '' }}>Teal</option>
                        <option value="danger" {{ $project->project_color == "danger" ? 'selected' : '' }}>Red</option>
                        <option value="success" {{ $project->project_color == "success" ? 'selected' : '' }}>Green</option>
                        <option value="warning" {{ $project->project_color == "warning" ? 'selected' : '' }}>Yellow</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Project</button>
          </div>
      </form>
    </div>
  </div>
</div>