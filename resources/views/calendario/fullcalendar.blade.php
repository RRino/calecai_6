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

        // Converti l'array PHP $eventis in JSON
        var events = @json($eventis);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'it',
            events: events,
            //eventClick: function(info) {
                // Reindirizza alla pagina specifica dell'evento
                  //  window.location.href = 'https://calecai.caibo.it/calecai/public/attivita/singolo/' + info.event.id;
                
            //}

            eventClick: function(info) {
                // Crea un elemento div per il popup
                var popup = document.createElement('div');
                popup.style.position = 'fixed';
                popup.style.top = '50%';
                popup.style.left = '50%';
                popup.style.transform = 'translate(-50%, -50%)';
                popup.style.backgroundColor = 'white';
                popup.style.padding = '20px';
                popup.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
                popup.style.zIndex = '1000';

                // Aggiungi i dettagli dell'evento al popup
                popup.innerHTML = `
                    <p><strong>Dettagli evento:</strong></p>
                    <p>id: ${info.event.id}</p>
                    <p>Titolo: ${info.event.title}</p>
                    <p>Tipo attività: ${info.event.extendedProps.tipo_attivita || 'N/A'}</p>
                    <p>Data inizio: ${info.event.start.toISOString()}</p>
                    ${info.event.end ? `<p>Data fine: ${info.event.end.toISOString()}</p>` : ''}
                    <p>Descrizione: ${info.event.extendedProps.description || 'Nessuna descrizione'}</p>
                    <button id="closePopup" style="margin-right: 10px;">Annulla</button>
                    <button id="redirectEvent">Vai all'evento</button>
                `;

                // Aggiungi il popup al body
                document.body.appendChild(popup);

                // Gestisci il click sul bottone "Annulla"
                document.getElementById('closePopup').addEventListener('click', function() {
                    document.body.removeChild(popup);
                });

                // Gestisci il click sul bottone "Vai all'evento"
                document.getElementById('redirectEvent').addEventListener('click', function() {
                    window.location.href = 'https://calecai.caibo.it/calecai/public/attivita/singolo/' + info.event.id;
                });
            }
        });

        calendar.render();
    });
</script>
</body>
</html>
