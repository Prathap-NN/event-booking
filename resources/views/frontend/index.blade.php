@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Upcoming Events</h2>
    <div id="event-list" class="row">
        @include('frontend.partials.events', ['events' => $events])
    </div>

    <div class="text-center mt-4">
        <button id="load-more" class="btn btn-primary">Load More</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let page = 1;

    $('#load-more').on('click', function () {
        page++;
        $.get(`?page=${page}`, function(data) {
            if (data.trim() === '') {
                $('#load-more').hide();
            } else {
                $('#event-list').append(data);
            }
        });
    });
</script>
@endpush
