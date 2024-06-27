@extends('layouts.app')

@section('title', 'Edit User')

@section('contents')
<h1 class="mb-0">Edit User</h1>
<hr />
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email"
                value="{{ $user->email }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Phone</label>
            <input type="tel" name="phone" class="form-control" placeholder="" value="{{ $user->phone }}">
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
        <div class="col mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" placeholder="" value="{{ $user->address }}">
        </div>
        <div class="col-sm-4">
            <label class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                <option value="1" {{ $user->status ==  1 ? 'selected' : '' }}>Active</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
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