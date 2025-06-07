
<!-- @section('content') -->
<div class="container mt-4">
    <h2>Booking Details</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Event</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Tickets Booked</th>
                <th>Amount Paid</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->event->name }}</td>
                <td>{{ $booking->user_name }}</td>
                <td>{{ $booking->user_email }}</td>
                <td>{{ $booking->user_phone }}</td>
                <td>{{ $booking->user_city }}</td>
                <td>{{ $booking->user_state }}</td>
                <td>{{ $booking->user_country }}</td>
                <td>{{ $booking->tickets_booked }}</td>
                <td>{{ number_format($booking->amount_paid, 2) }}</td>
                <td>{{ $booking->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="10">No bookings found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $bookings->links() }}
</div>
<!-- @endsection -->
