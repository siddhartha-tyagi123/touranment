@extends('layouts.app')

@section('title', 'Edit Tournament Category')

@section('contents')
<h1 class="mb-0">Edit Tournament Category</h1>
<hr />
<form action="{{ route('tournament.category.update', $tournamentCategory->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-sm-4 mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="{{ $tournamentCategory->category_name }}">
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>
@endsection