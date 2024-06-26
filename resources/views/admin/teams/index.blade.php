@extends('layouts.app')
  
@section('title', 'Home Team')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Team</h1>
        <a href="{{ route('teams.create') }}" class="btn btn-primary">Add Team</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Team Name</th>
                <th>Captain Name</th>
                <th>Email</th>
                <th>Tournament</th>
                <th>Category</th>
                <th>Country</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($teams->count() > 0)
                @foreach($teams as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->team_name }}</td>
                        <td class="align-middle">{{ $rs->captain_name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->tournament->title }}</td>
                        <td class="align-middle">{{ $rs->category->category_name }}</td>
                        <td class="align-middle">{{ $rs->country->country_name }}</td>
                        <td class="align-middle">{{ $rs->status }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('teams.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('teams.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Teams not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection