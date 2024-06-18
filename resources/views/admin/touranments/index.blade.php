@extends('layouts.app')
  
@section('title', 'Home Tournament')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Tournament</h1>
        <a href="{{ route('touranments.create') }}" class="btn btn-primary">Add Tournament</a>
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
                <th>Title</th>
                <th>Organiser</th>
                <th>Date</th>
                <th>Age</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($touranments->count() > 0)
                @foreach($touranments as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->organiser }}</td> 
                        <td class="align-middle">{{ $rs->date }}</td> 
                        <td class="align-middle">{{ $rs->age }}</td> 
                        <td class="align-middle">{{ $rs->country->country_name }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('touranments.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('touranments.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">Tournament not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection