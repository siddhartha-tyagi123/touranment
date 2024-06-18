@extends('layouts.app')

@section('title', 'Edit Tournament')

@section('contents')
<h1 class="mb-0">Edit Tournament</h1>
<hr />
<form action="{{ route('touranments.update', $tournament->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $tournament->title }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Organiser</label>
            <input type="text" name="organiser" class="form-control" placeholder="Organiser"
                value="{{ $tournament->organiser }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" placeholder="" value="{{ $tournament->date }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Age</label>
            <input type="text" name="age" class="form-control" placeholder="Age" value="{{ $tournament->age }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
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
        <div class="col-sm-4">
        <label class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="present" {{ $tournament->status == 'present' ? 'selected' : '' }}>Present</option>
            <option value="upcoming" {{ $tournament->status == 'upcoming' ? 'selected' : '' }}>Up Coming</option>
            <option value="past" {{ $tournament->status == 'past' ? 'selected' : '' }}>Past</option>
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