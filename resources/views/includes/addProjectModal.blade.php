<div class="modal fade" id="staticBackdropAddProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/projects" method="POST">
        @csrf
          <div class="modal-body">
            <div class="form-group px-4 pb-4">
                <label class="col-form-label mt-2" for="projectName">Project Name</label>
                <input type="text" class="form-control" placeholder="Project Name" id="projectName" name="project_name" required>
    
                <label class="col-form-label mt-2" for="projectDesc">Project Description</label>
                <input type="text" class="form-control" placeholder="Project Description" id="projectDesc" name="project_desc" required>


                <label class="col-form-label mt-2" for="projectColor">Project Color</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" id="projectColor" name="project_color">
                        <option value="info">Teal</option>
                        <option value="danger">Red</option>
                        <option value="success">Green</option>
                        <option value="warning">Yellow</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create Project</button>
          </div>
      </form>
      <!-- @if($errors->any())
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      @endif -->
    </div>
  </div>
</div>