@extends('layouts.layout')
@section('content')

<!-- display all contents -->
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-8"></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdropAddBand"><i class="fa-solid fa-plus"></i>&nbsp; Add New Band</button>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Band Name</th>
                <th scope="col">Band Genre</th>
                <th scope="col">Band Members</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bands as $band)
                <tr>
                    <th scope="row">{{ $band->id }}</th>
                    <td>{{ $band->band_name }}</td>
                    <td>{{ $band->band_genre }}</td>
                    <td>{{ $band->band_members }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('bands.edit', $band) }}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{ route('bands.destroy', $band) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onClick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="modal fade" id="staticBackdropAddBand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Band</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('bands.store') }}" method="POST">
        @csrf
          <div class="modal-body">
            <div class="form-group px-4 pb-4">
                <label class="col-form-label mt-2" for="bandName">Band Name</label>
                <input type="text" class="form-control" placeholder="Band Name" id="bandName" name="band_name" required>
    
                <label class="col-form-label mt-2" for="bandGenre">Band Genre</label>
                <input type="text" class="form-control" placeholder="Band Genre" id="bandGenre" name="band_genre" required>

                <label class="col-form-label mt-2" for="bandMembers">Band Members</label>
                <input type="number" class="form-control" placeholder="Band Members" id="bandMembers" name="band_members" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Band</button>
          </div>
      </form>

    </div>
  </div>
</div>

@endsection