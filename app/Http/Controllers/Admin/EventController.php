<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    //  public function index()
    // {
    //     $events = Event::latest()->paginate(10);
    //     return view('admin.events.index', compact('events'));
    // }

    // Show create event form
    public function create()
    {
        return view('admin.events.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'venue' => 'nullable|string|max:255',
            'event_datetime' => 'required|date',
            'ticket_count' => 'required|integer|min:0',
            'ticket_cost' => 'required|numeric|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_url' => 'nullable|string|max:255',
            'is_active' => 'nullable',
        ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'venue' => 'nullable|string|max:255',
            'event_datetime' => 'required|date',
            'ticket_count' => 'required|integer|min:0',
            'ticket_cost' => 'required|numeric|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_url' => 'nullable|string|max:255',
            'is_active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

    public function index(Request $request)
{
    $status = $request->get('status');

    $events = Event::query();

    if ($status === 'active') {
        $events->where('is_active', true);
    } elseif ($status === 'inactive') {
        $events->where('is_active', false);
    }

    return view('admin.events.index', [
        'events' => $events->latest()->paginate(10)
    ]);
}

}
