@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Create Event</h2>

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.events.form')
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
