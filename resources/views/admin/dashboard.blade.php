@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Admin Dashboard</h2>
            <hr>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('admin.events.create') }}" class="btn btn-success w-100">
                Create Event
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.events.index') }}" class="btn btn-primary w-100">
                View / Edit Events
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('admin/events?status=active') }}" class="btn btn-info w-100">
                Active Events
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('admin/events?status=inactive') }}" class="btn btn-warning w-100">
                Inactive Events
            </a>
        </div>
    </div>
</div>
@endsection
