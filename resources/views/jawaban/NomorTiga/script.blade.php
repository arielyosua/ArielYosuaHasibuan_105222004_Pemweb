<script type="text/javascript">
	$(document).ready(function () {
        $('.table-schedule').DataTable({
            language: {
                paginate: {
                    next: '<i class="bi bi-arrow-right"></i>',
                    previous: '<i class="bi bi-arrow-left"></i>'
                },
                emptyTable: "Data tidak ditemukan",
                lengthMenu: "Show _MENU_ entries",
                search: "Search:",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)"
            },
            pageLength: 10,
            ordering: true,
            responsive: true,
            autoWidth: false
	    });

        $('.table-schedule').on('click', '.btn-edit', function () {
            let eventId = $(this).data('id');

            $.ajax({
                url: "{{ route('event.get-selected-data') }}",
                method: "GET",
                data: { id: eventId },
                success: function (response) {
                    $('#edit-event-id').val(response.id);
                    $('#edit-event-name').val(response.name);
                    $('#edit-start-date').val(response.start);
                    $('#edit-end-date').val(response.end);

                    $('#editModal').css('display', 'block');
                    $('#editModal').addClass('show'); 
                    $('body').addClass('modal-open');
                },
                error: function () {
                    alert("Failed to fetch event details. Please try again.");
                }
            });
        });

        $('#editModal .close').on('click', function () {
            $('#editModal').css('display', 'none');
            $('#editModal').removeClass('show');
            $('body').removeClass('modal-open');
            $('#editModal form')[0].reset();
        });
    });
</script>
	<!-- Tuliskan trigger saat menekan tombol edit
	Di dalam trigger tersebut, tambahkan API untuk meload data 1 jadwal -->