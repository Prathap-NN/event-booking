<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventPublicController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::where('is_active', true)->latest()->paginate(6);

        if ($request->ajax()) {
            return view('frontend.partials.events', compact('events'))->render();
        }

        return view('frontend.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('frontend.show', compact('event'));
    }
}
