@extends('layouts.app')

@section('title', 'Create Tournament')

@section('contents')
<h1 class="mb-0">Add Tournament</h1>
<hr />
<form action="{{ route('touranments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="col-sm-4">
            <input type="text" name="organiser" class="form-control" placeholder="Organiser">
        </div>
        <div class="col-sm-4">
            <input type="date" name="date" class="form-control" placeholder="">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="time" name="playing_time" class="form-control" placeholder="">
        </div>
        <div class="col-sm-4">
            <input type="text" name="age" class="form-control" placeholder="Age">
        </div>
        <div class="col-sm-4">
            <input type="number" name="number_of_players" class="form-control" placeholder="Number of Players">
        </div>
    </div>
    <div class="row mb-3">
        
        <div class="col-sm-4">
            <input type="text" name="play_field" class="form-control" placeholder="Play Field">
        </div>
        <div class="col-sm-4">
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <input type="text" name="city" class="form-control" placeholder="City">
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


    <div class="row">
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