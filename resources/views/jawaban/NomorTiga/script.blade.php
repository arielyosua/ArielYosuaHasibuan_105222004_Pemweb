<script type="text/javascript">
	
	$('.table-schedule').DataTable({
		language: {
			paginate: {
				next: '<i class="bi bi-arrow-right"></i>',
				previous: '<i class="bi bi-arrow-left"></i>'
			},
			emptyTable: "Data tidak ditemukan",
		},
	});

	$(document).ready(function() {
    // Cek jika DataTable sudah ada, jika ada, destroy terlebih dahulu
    if ($.fn.dataTable.isDataTable('.table-schedule')) {
        $('.table-schedule').DataTable().clear().destroy();
    }

    // Inisialisasi DataTable
    var table = $('.table-schedule').DataTable({
        language: {
            paginate: {
                next: '<i class="bi bi-arrow-right"></i>',
                previous: '<i class="bi bi-arrow-left"></i>'
            },
            emptyTable: "Data tidak ditemukan",
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("event.getData") }}', // URL untuk mengambil data jadwal
            dataSrc: ''
        },
        columns: [
            { data: 'name' },
            { data: 'start' },
            { data: 'end' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-primary edit-btn" data-id="${row.id}">Edit</button>
                        <button class="btn btn-danger delete-btn" data-id="${row.id}">Delete</button>
                    `;
                }
            }
        ]
    });

    // Trigger saat tombol edit diklik
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/event/' + id, // API untuk mengambil data event berdasarkan ID
            method: 'GET',
            success: function(data) {
                // Isi form modal dengan data yang ada
                $('#editModal input[name="event_name"]').val(data.name);
                $('#editModal input[name="start_date"]').val(data.start);
                $('#editModal input[name="end_date"]').val(data.end);
                $('#editModal form').attr('action', '/event/' + id + '/update');
                $('#editModal').modal('show');
            }
        });
    });

    // Trigger saat tombol delete diklik
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this event?')) {
            $.ajax({
                url: '/event/' + id + '/delete', // API untuk menghapus event berdasarkan ID
                method: 'DELETE',
                success: function(response) {
                    // Reload DataTable setelah penghapusan
                    table.ajax.reload();
                }
            });
        }
    });
});

	// Tuliskan trigger saat menekan tombol edit
	// Di dalam trigger tersebut, tambahkan API untuk meload data 1 jadwal

</script>