@extends('layouts.app')

@section('title', 'Club Contact Information')

@section('contents')
<div class="container mt-5">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <form action="{{ route('club.contact.info.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="message">Club Contact Info</label>
            <textarea class="form-control" id="contect_info" name="contect_info" value="" rows="5"
                required>{{ $clubContactInfo->contect_info }}</textarea>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('contect_info');
</script>
@endsection