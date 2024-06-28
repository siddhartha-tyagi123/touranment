@extends('layouts.app')

@section('title', 'Home Club')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Club</h1>
    <a href="{{ route('clubs.create') }}" class="btn btn-primary">Add Club</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<div class="d-flex justify-content-between mb-3">
    <!-- Per page selection -->
    <form action="{{ route('clubs.index') }}" method="GET" class="form-inline">
        <div class="form-group mb-0">
            <label for="per_page" class="mr-2">Per Page:</label>
            <select name="per_page" id="per_page" class="form-control" onchange="this.form.submit()">
                <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
            </select>
        </div>
    </form>
    <!-- Search form -->
    <form action="{{ route('clubs.index') }}" method="GET" class="flex-grow-1 mr-2">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search..."
                value="{{ isset($search) ? $search : '' }}">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>

</div>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Country</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($clubs->count() > 0)
        @foreach($clubs as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->title }}</td>
            <td class="align-middle">{{ $rs->country->country_name }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('clubs.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                    <form action="{{ route('clubs.destroy', $rs->id) }}" method="POST" type="button"
                        class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
            <td class="text-center" colspan="5">Clubs not found</td>
        </tr>
        @endif
    </tbody>
</table>
 <!-- Pagination links -->
 <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <small>Showing {{ $clubs->firstItem() }} to {{ $clubs->lastItem() }} of {{ $clubs->total() }} results</small>
        </div>
        <div>
            {{ $clubs->appends(['search' => $search, 'per_page' => $perPage])->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection