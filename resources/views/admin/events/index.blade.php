@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Events</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date & Time</th>
                <th>Venue</th>
                <th>Tickets</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->event_datetime->format('d M Y, h:i A') }}</td>
                <td>{{ $event->venue }}</td>
                <td>{{ $event->ticket_count }}</td>
                <td>{{ number_format($event->ticket_cost, 2) }}</td>
                <td>
                    @if($event->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7">No events found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $events->links() }}
</div>
@endsection
