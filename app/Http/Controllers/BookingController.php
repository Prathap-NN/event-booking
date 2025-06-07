<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;


use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->paginate(10);
        return view('admin.booking.index', compact('bookings'));
    }

    public function book(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'payment_status' => 'required|in:success,failed',
        ]);

        $event = Event::findOrFail($id);

        // Simulated Failed Payment
        if ($data['payment_status'] === 'failed') {
            Mail::raw("Payment for event '{$event->name}' has failed. Please try again.", function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject("Booking Payment Failed");
            });

            return back()->withErrors('Payment failed. Confirmation email sent.');
        }

        // Check for ticket availability
        if ($event->ticket_count <= 0) {
            return back()->withErrors('No tickets available.');
        }

        // Decrease ticket count
        $event->ticket_count -= 1;
        $event->save();

        // Save booking record (optional)
        Booking::create([
            'event_id' => $event->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'status' => 'paid',
        ]);

        // Send success confirmation email
        Mail::raw("Your booking for '{$event->name}' is confirmed. Thank you!", function ($message) use ($data) {
            $message->to($data['email'])
                ->subject("Booking Confirmed");
        });

        return back()->with('success', 'Booking successful. Confirmation sent to your email.');
    }
}
