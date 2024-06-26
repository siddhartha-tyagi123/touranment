@extends('layouts.app')

@section('title', 'Edit Team')

@section('contents')
<h1 class="mb-0">Edit Team</h1>
<hr />
<form action="{{ route('teams.update', $team->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-sm-4 mb-3">
            <label class="form-label">Team Name</label>
            <input type="text" name="team_name" class="form-control" placeholder="Enter Team Name"
                value="{{ $team->team_name }}">
        </div>
        <div class="col-sm-4 mb-3">
            <label class="form-label">Captain Name</label>
            <input type="text" name="captain_name" class="form-control" placeholder="Enter captain Name"
                value="{{ $team->captain_name }}">
        </div>
        <div class="col-sm-4 mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $team->email }}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-3">
            <label class="form-label">Phone</label>
            <input type="tel" name="phone" class="form-control" placeholder="Enter phone" value="{{ $team->phone }}">
        </div>
        <div class="col-sm-4 mb-3">
            <label class="form-label">Tournament</label>
            <select name="tournament_id" id="tournament_id" class="form-control">
                <option value="">Select Tournament</option>
                @foreach($tournaments as $tournament)
                <option value="{{ $tournament->id }}" {{ $tournament->id == $selectedTournamentId ? 'selected' : '' }}>
                    {{ $tournament->title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4 mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($tournamentCategories as $tournamentCategory)
                <option value="{{ $tournamentCategory->id }}"
                    {{ $tournamentCategory->id == $selectedTournamentCategoryId ? 'selected' : '' }}>
                    {{ $tournamentCategory->category_name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
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
        <div class="col-sm-4 mb-3">
            <label class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
            <option value="applied" {{ $team->status == 'applied' ? 'selected' : '' }}>Applied</option>
            <option value="accepted" {{ $team->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
            </select>
        </div>
    </div>
    <div class="row">
        
        <div class="col-sm-12 mb-3">
        <div class="form-group">
            <label for="message">Comments</label>
            <textarea class="form-control" id="comments" name="comments" value="" rows="5"
                required>{{ $team->comments }}</textarea>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('comments');
</script>
@endsection