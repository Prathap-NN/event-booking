<div class="mb-3">
    <label for="name" class="form-label">Event Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $event->name ?? '') }}" class="form-control" required>
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Event Image</label>
    <input type="file" name="image" id="image" class="form-control">
    @if(!empty($event->image))
        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" width="150" class="mt-2">
    @endif
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="short_description" class="form-label">Short Description</label>
    <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description', $event->short_description ?? '') }}</textarea>
    @error('short_description')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $event->description ?? '') }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="venue" class="form-label">Venue</label>
    <input type="text" name="venue" id="venue" value="{{ old('venue', $event->venue ?? '') }}" class="form-control">
    @error('venue')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="event_datetime" class="form-label">Event Date & Time</label>
    <input type="datetime-local" name="event_datetime" id="event_datetime" value="{{ old('event_datetime', isset($event) ? $event->event_datetime->format('Y-m-d\TH:i') : '') }}" class="form-control" required>
    @error('event_datetime')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="ticket_count" class="form-label">Ticket Count</label>
    <input type="number" name="ticket_count" id="ticket_count" value="{{ old('ticket_count', $event->ticket_count ?? 0) }}" class="form-control" min="0">
    @error('ticket_count')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="ticket_cost" class="form-label">Ticket Cost</label>
    <input type="text" name="ticket_cost" id="ticket_cost" value="{{ old('ticket_cost', $event->ticket_cost ?? 0.00) }}" class="form-control">
    @error('ticket_cost')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<h5>Meta Information</h5>

<div class="mb-3">
    <label for="meta_title" class="form-label">Meta Title</label>
    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $event->meta_title ?? '') }}" class="form-control">
    @error('meta_title')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="meta_description" class="form-label">Meta Description</label>
    <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', $event->meta_description ?? '') }}</textarea>
    @error('meta_description')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="meta_keywords" class="form-label">Meta Keywords</label>
    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $event->meta_keywords ?? '') }}" class="form-control">
    @error('meta_keywords')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="meta_url" class="form-label">Meta URL</label>
    <input type="text" name="meta_url" id="meta_url" value="{{ old('meta_url', $event->meta_url ?? '') }}" class="form-control">
    @error('meta_url')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="form-check mb-3">
    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active', $event->is_active ?? true) ? 'checked' : '' }}>
    <label for="is_active" class="form-check-label">Active</label>
</div>
