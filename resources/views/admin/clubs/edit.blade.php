@extends('layouts.app')

@section('title', 'Edit Club')

@section('contents')
<h1 class="mb-0">Edit Club</h1>
<hr />
<form action="{{ route('clubs.update', $club->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-sm-4 mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $club->title }}">
        </div>
        <div class="col-sm-4 mb-3">
        <label class="form-label">Country</label>
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == $selectedCountryId ? 'selected' : '' }}>
                    {{ $country->country_name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>
@endsection