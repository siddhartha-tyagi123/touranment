@extends('layouts.app')

@section('title', 'Create Tournament')

@section('contents')
<h1 class="mb-0">Add Tournament</h1>
<hr />
<form action="{{ route('touranments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Title" value="{{ old('title') }}">
            @error('title')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4">
            <input type="text" name="organiser" class="form-control @error('organiser') is-invalid @enderror" placeholder="Organiser" value="{{ old('organiser') }}">
            @error('organiser')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4">
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" placeholder="" value="{{ old('date') }}">
            @error('date')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="time" name="playing_time" class="form-control @error('playing_time') is-invalid @enderror" placeholder="" value="{{ old('playing_time') }}">
            @error('playing_time')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4">
            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Age" value="{{ old('age') }}">
            @error('age')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4">
            <input type="number" name="number_of_players" class="form-control @error('number_of_players') is-invalid @enderror" placeholder="Number of Players" value="{{ old('number_of_players') }}">
            @error('number_of_players')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">

        <div class="col-sm-4">
            <input type="text" name="play_field" class="form-control @error('play_field') is-invalid @enderror" placeholder="Play Field" value="{{ old('play_field') }}">
            @error('play_field')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4">
            <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror" value="{{ old('country_id') }}">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
            @error('country_id')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-4">
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" value="{{ old('city') }}">
            @error('city')
            <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <select name="status" id="status" class="form-control">
                <option value="present">Present</option>
                <option value="upcoming">Up Coming</option>
                <option value="past">Past</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
        </div>


        <div class="row mt-3 ml-3">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
        console.error(error);
    });
</script>
@endsection