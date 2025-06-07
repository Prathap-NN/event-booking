<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('events.book', $event->id) }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Book: {{ $event->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-2">
                    <label>Name</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" required class="form-control">
                </div>
                <div class="mb-2">
                    <label>Phone</label>
                    <input type="text" name="phone" required class="form-control">
                </div>
                <div class="mb-2">
                    <label>City</label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="mb-2">
                    <label>State</label>
                    <input type="text" name="state" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Country</label>
                    <input type="text" name="country" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Simulate Payment</label>
                    <select name="payment_status" class="form-control" required>
                        <option value="success">Success</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Proceed to Pay</button>
            </div>
        </form>

    </div>
</div>
