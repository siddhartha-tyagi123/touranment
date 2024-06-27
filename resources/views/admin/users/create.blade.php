@extends('layouts.app')

@section('title', 'Create User')

@section('contents')
<h1 class="mb-0">Add User</h1>
<hr />
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="text" name="name" class="form-control" placeholder="Enter the name">
        </div>
        <div class="col-sm-4">
            <input type="text" name="email" class="form-control" placeholder="Enter the email">
        </div>
        <div class="col-sm-4">
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <input type="tel" name="phone" class="form-control" placeholder="Enter phone number">
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
            <input type="text" name="address" class="form-control" placeholder="Address">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-4">
            <select name="status" id="status" class="form-control">
                <option value="#">Select Staus</option>
                <option value="0">Inactive</option>
                <option value="1">Active</option>
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