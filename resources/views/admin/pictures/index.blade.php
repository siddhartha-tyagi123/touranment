@extends('layouts.app')

@section('title', 'Home Picture')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Picture</h1>
    <a href="{{ route('pictures.create') }}" class="btn btn-primary">Add Picture</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Tournament Title</th>
            <th>Images</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pictures as $picture)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $picture->title }}</td>
            <td>
                @if($picture->images)
                    @foreach(explode(',', $picture->images) as $image)
                        <img src="{{ asset('storage/' . trim($image)) }}" width="150px" height="150px" />
                    @endforeach
                @else
                    No images available
                @endif
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('pictures.edit', $picture->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pictures.destroy', $picture->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No pictures found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
