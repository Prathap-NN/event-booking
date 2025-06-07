@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Event</h2>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.events.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
