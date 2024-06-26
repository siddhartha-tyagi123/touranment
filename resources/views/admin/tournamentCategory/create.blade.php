@extends('layouts.app')

@section('title', 'Create Tournament Category')

@section('contents')
<h1 class="mb-0">Add Tournament Category</h1>
<hr />
<form action="{{ route('tournament.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-4">
                <input type="text" name="category_name" class="form-control" placeholder="Category Name">
            </div>
    </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection