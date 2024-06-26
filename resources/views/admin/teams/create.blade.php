@extends('layouts.app')

@section('title', 'Create Teams')

@section('contents')
<h1 class="mb-0">Add Teams</h1>
<hr />
<form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="text" name="team_name" class="form-control" id="teamName" placeholder="Enter team name"
                required>
        </div>
        <div class="col-sm-4">
            <input type="text" name="captain_name" class="form-control" id="captainName"
                placeholder="Enter captain name" required>
        </div>
        <div class="col-sm-4">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="tel" class="form-control" name="phone" id="phoneNumber" placeholder="Enter phone number"
                required>
        </div>
        <div class="col-sm-4">
            <select name="tournament_id" id="tournament_id" class="form-control">
                <option value="">Select Tournament</option>
                @foreach($tournaments as $tournament)
                <option value="{{ $tournament->id }}">{{ $tournament->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($tournamentCategories as $tournamentCategory)
                <option value="{{ $tournamentCategory->id }}">{{ $tournamentCategory->category_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>
        <!-- <div class="col-sm-4">
            <select name="status" id="status" class="form-control">
                <option value="applied">Applied</option>
                <option value="accepted">Accepted</option>
            </select>
        </div> -->
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="form-group">
            <label for="message">Comments</label>
            <textarea class="form-control" id="comments" name="comments" rows="5" required></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    CKEDITOR.replace('comments', {
        placeholder: 'Enter your comments here'
    });
});
</script>

@endsection