@extends('layouts.app')

@section('title', 'Create Picture')

@section('contents')
<h1 class="mb-0">Add Picture</h1>
<hr />
<form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection