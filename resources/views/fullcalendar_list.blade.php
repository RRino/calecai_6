<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.3/locales/it.js"></script>
</head>

@php
use App\Models\Event;
$eventis = Event::all();
@endphp
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
    .fc-daygrid-event {
        background-color: #3788d8;
        color: white;
        border-radius: 5px;
        padding: 5px;
        text-align: center;
    }
    .fc-daygrid-event:hover {
        background-color: #0056b3;
        cursor: pointer;
    }
    .fc-daygrid-event.fc-event-selected {
        background-color: #0056b3;
        color: white;
    }
    .fc-daygrid-event.fc-event-selected:hover {
        background-color: #004494;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-title {
        font-weight: bold;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-time {
        font-weight: bold;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-title {
        font-size: 1.2em;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-time {
        font-size: 1.2em;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-title {
        color: #fff;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-time {
        color: #fff;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-title {
        text-decoration: underline;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-time {
        text-decoration: underline;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-title {
        text-transform: uppercase;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-time {
        text-transform: uppercase;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-title {
        letter-spacing: 1px;
    }
    .fc-daygrid-event.fc-event-selected .fc-event-time {
        letter-spacing: 1px;
    }
</style>
<body>
    <div id="calendar"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var events = @json($eventis);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'listWeek',
                locale: 'it',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay,listWeek,dayGridMonth'
                },
                views: {
                    listDay: { buttonText: 'Lista Giornaliera' },
                    listWeek: { buttonText: 'Lista Settimanale' }
                },
                events: events,
                eventClick: function(info) {
                    if (info.event.url) {
                        window.location.href = info.event.url;
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
