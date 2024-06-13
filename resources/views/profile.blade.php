@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
<h1 class="mb-0">Profile</h1>
<hr />


<form method="POST" enctype="multipart/form-data" id="profile_setup_frm"
    action="{{ route('profile.update', $user->id) }}">
    @csrf
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="row" id="res"></div>
                <div class="row mt-2">

                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="first name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ $user->email }}"
                            placeholder="Email">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                            value="{{ $user->phone }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $user->address }}"
                            placeholder="Address">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Country</label>
                        <select name="country_id" id="country_id" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                                {{ $country->id == $selectedCountryId ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Save
                        Profile</button></div>
            </div>
        </div>

    </div>

</form>
@endsection