@extends('layouts.app')

@section('title', 'Edit Picture')

@section('contents')
<h1 class="mb-0">Edit Picture</h1>
<hr />
<form action="{{ route('pictures.update', $pictures->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tournament Title</label>
            <input type="text" name="title" class="form-control" value="{{ $pictures->title }}">
        </div>
        
        <div class="col mb-3">
            <label class="form-label">Picture</label>
            <input type="file" name="images[]" class="form-control" multiple>
            @if($pictures->images)
            <div class="img-wrap d-flex justify-content-center">
                @foreach(explode(',', $pictures->images) as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="" class="img-fluid ml-2" width="100px" height="100px"
                    data-image="{{ $image }}">
                @endforeach
            </div>
            @endif
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $pictures->description }}</textarea>
            </div>
    </div>


    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>
@endsection