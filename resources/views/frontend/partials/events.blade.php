@foreach ($events as $event)
<div class="col-md-4 mb-4">
    <div class="card h-100">
        <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $event->name }}</h5>
            <p>{{ $event->short_description }}</p>
            <p><strong>{{ \Carbon\Carbon::parse($event->event_datetime)->format('d M Y, h:i A') }}</strong></p>
            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Details</a>
        </div>
    </div>
</div>
@endforeach
