<table class="table table-schedule">
    <thead>
        <tr>
            <th>#</th>
            <th>Event Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->end }}</td>
                <td>
                    <button class="btn btn-primary btn-edit" data-id="{{ $event->id }}">Edit</button>
                    <form method="POST" action="{{ route('event.delete') }}" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.update') }}">
            @csrf
            <input type="hidden" name="id" id="edit-event-id">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit-event-name">Event Name</label>
                    <input type="text" class="form-control" id="edit-event-name" name="event_name" required>
                </div>
                <div class="form-group">
                    <label for="edit-start-date">Start Date</label>
                    <input type="date" class="form-control" id="edit-start-date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="edit-end-date">End Date</label>
                    <input type="date" class="form-control" id="edit-end-date" name="end_date" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>


<!-- Gunakan tag form dibawah ini untuk submit data jadwal yang akan diupdate. Gunakan contoh modal yang sudah dibuat pada nomor 1 dan 2 sebagai referensi -->
<!-- <form class="modal-content" method="POST" action="{{ route('event.update') }}"> </form> -->
