<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.submit') }}">
            @csrf 
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="event_name">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="event_name" name="event_name" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
