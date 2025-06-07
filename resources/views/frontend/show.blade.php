@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>{{ $event->name }}</h2>
    <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid my-3" style="max-height: 400px; object-fit: cover;">
    
    <div class="mb-3"><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($event->event_datetime)->format('d M Y, h:i A') }}</div>
    <div class="mb-3"><strong>Venue:</strong> {{ $event->venue }}</div>

    <p class="mb-3"><strong>Description:</strong> {!! nl2br(e($event->description)) !!}</p>

    <p><strong>Tickets Available:</strong> {{ $event->ticket_count }}</p>
    <p><strong>Ticket Cost:</strong> ₹{{ $event->ticket_cost }}</p>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
</div>

@include('frontend.partials.booking_modal', ['event' => $event])
@endsection
