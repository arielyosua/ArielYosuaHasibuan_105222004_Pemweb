<script type="text/javascript">
    $(document).ready(function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            locale: 'id',
            initialView: 'dayGridMonth',
            events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '{{ route("event.get-json") }}', 
                    success: function(data) {
                        successCallback(data); 
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading events:", error);
                        failureCallback(error); 
                    }
                });
            }
        });

        // Render kalender
        calendar.render();
    });
</script>
