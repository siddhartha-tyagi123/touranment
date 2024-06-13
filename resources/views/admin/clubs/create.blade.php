@extends('layouts.app')

@section('title', 'Create Club')

@section('contents')
<h1 class="mb-0">Add Club</h1>
<hr />
<form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-4">
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        <div class="col-sm-4">
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection