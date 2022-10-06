@extends('layouts.layout')
@section('content')

<!-- edit contents -->
<div class="container mt-5">
  <form action="{{ route('bands.update', $band) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="mb-3">
        <label class="col-form-label mt-2" for="bandName">Band Name</label>
        <input type="text" class="form-control" value="{{ $band->band_name }}" placeholder="Band Name" id="bandName" name="band_name" required>
      </div>
      <div class="mb-3">
        <label class="col-form-label mt-2" for="bandGenre">Band Genre</label>
        <input type="text" class="form-control" value="{{ $band->band_genre }}" placeholder="Band Genre" id="bandGenre" name="band_genre" required>
      </div>
      <div class="mb-3">
        <label class="col-form-label mt-2" for="bandMembers">Band Members</label>
        <input type="number" class="form-control" value="{{ $band->band_members }}" placeholder="Band Members" id="bandMembers" name="band_members" required>
      </div>
      <button type="submit" class="btn btn-primary float-end">Update</button>
  </form>
</div>

@endsection