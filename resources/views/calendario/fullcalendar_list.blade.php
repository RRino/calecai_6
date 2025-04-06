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
    $event = Event::all()->map(
        fn($event) => [
            'id' => $event->id,
            'title' => $event->title,
            'start' => $event->start,
            'end' => $event->end,
            'extendedProps' => [
                'tipo_attivita' => $event->tipo_attivita,
                'description' => $event->description,
                'imageUrl' => $event->image_url, // URL dell'immagin
                'lunghezza' => $event->lunghezza,
                'durata' => $event->durata,
                'difficolta' => $event->difficolta,
            ],
        ],
    );

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

    .fc-direction-ltr .fc-button-group>.fc-button:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        background: blue;
    }

    .fc-direction-ltr .fc-button-group>.fc-button:not(:first-child) {
        margin-left: 1px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        background: blue;
    }

    td.fc-list-event-time {
        display: none;
    }
</style>
<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.history.back()" style="background: green; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
            Torna Indietro
        </button>
    </div>
    <div id="calendar"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            // Gli eventi includono l'URL dell'immagine dal database
            var events = @json($event);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'listWeek',
                locale: 'it',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay,listWeek,dayGridMonth'
                },
                views: {
                    listDay: {
                        buttonText: 'Lista Giornaliera'
                    },
                    listWeek: {
                        buttonText: 'Lista Settimanale'
                    },
                    dayGridMonth: {
                        buttonText: 'Griglia Mensile'
                    }
                },
                events: events,
                eventContent: function(arg) {
                    // Personalizza il contenuto con l'immagine
                    let img = document.createElement('img');
                    img.src = arg.event.extendedProps.imageUrl; // URL dell'immagine
                    img.style.width = '80px';
                    img.style.height = '80px';
                    img.style.marginRight = '25px';

                    let title = document.createElement('div');
                    title.textContent = arg.event.title;

                    return {
                        domNodes: [img, title]
                    };
                },
                eventClick: function(info) {
                    // Popup per i dettagli dell'evento
                    var popup = document.createElement('div');
                    popup.style.position = 'fixed';
                    popup.style.top = '50%';
                    popup.style.left = '50%';
                    popup.style.transform = 'translate(-50%, -50%)';
                    popup.style.backgroundColor = 'white';
                    popup.style.padding = '20px';
                    popup.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
                    popup.style.zIndex = '1000';
                    popup.style.maxHeight = '80%';
                    popup.style.overflowY = 'auto';

                    popup.innerHTML = `
            <p><strong>Dettagli evento:</strong></p>
            <p>id: ${info.event.id}</p>
            <p>Titolo: ${info.event.title}</p>
            <p>Tipo attività: ${info.event.extendedProps.tipo_attivita || 'N/A'}</p>
            <p>Data inizio: ${info.event.start.toLocaleDateString('it-IT')}</p>

            <p>Lunghezza: ${info.event.extendedProps.lunghezza || 'N/A'}</p>
            </p>Durata: ${info.event.extendedProps.durata || 'N/A'}</p>
            <p>Difficoltà: ${info.event.extendedProps.difficolta || 'N/A'}</p>
            ${info.event.end ? `<p>Data fine: ${info.event.end.toLocaleDateString('it-IT')}</p>` : ''}
            <p>Descrizione: ${info.event.extendedProps.description || 'Nessuna descrizione'}</p>
            
            <button style="background:green;color:white;padding:3px;border-radius:3px;" id="closePopup" style="margin-right: 10px;margin-bottom:100px">Chiudi</button>
            <button style="background:blue;color:white;padding:3px;border-radius:3px;"id="redirectEvent">Vai all'evento</button>
            <p><img src="${info.event.extendedProps.imageUrl}" alt="Immagine Evento" style="max-width:100%;"></p>`;

                    document.body.appendChild(popup);

                    document.getElementById('closePopup').addEventListener('click', function() {
                        document.body.removeChild(popup);
                    });

                    document.getElementById('redirectEvent').addEventListener('click', function() {
                        window.location.href =
                            'https://calecai.caibo.it/calecai/public/attivita/singolo/' + info
                            .event.id;
                    });
                }
            });

            calendar.render();
        });
    </script>
</body>

</html>
