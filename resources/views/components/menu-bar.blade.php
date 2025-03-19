<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Responsive con Data del Giorno</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

            /* background-color: #333;*/
        }

        .menu-item {
            color: rgb(11, 26, 109);
            margin: 5px;
            padding: 5px 10px;
            text-decoration: none;
            cursor: pointer;
        }

        .menu-item:hover {
            color: #ffcc00;
            /* Colore durante l'hover */
        }

        .menu-item.active {
            color: #ffcc00;
            /* Colore quando il link è attivo */
        }

        li {
            float: left;
            margin-left: 20px;
            list-style-type: none;
        }

        .menu-bar {
            margin-top: 5px;
            margin-bottom: 6px;
            padding: 3px;
            border: solid 1px #ccc;
            border-radius: 3px;
            background: #cccccc;
        }

        .dada {
            font-weight: 700;
            color: green;

        }

        .btrova {
            margin-top: -5px;

        }

        input#dataOggi_index {
            border: none !important;
            background: #cccccc;
        }



        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown-toggle:hover {
            background-color: #0056b3;
        }

        .dropdown-menu {
            display: none;
            /* Nascosto di default */
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            z-index: 1;
        }

        .dropdown-item {
            color: #333;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
            color: #000;
        }
    </style>
</head>
@php
    use Carbon\Carbon;
    $user = auth()->user();
    $dataOggius = Carbon::now()->toDateString(); // Ottiene la data di oggi nel formato 'YYYY-MM-DD'
    $dataOggi = Carbon::createFromFormat('Y-m-d', $dataOggius)->format('d-m-Y');
@endphp

<body>
    <div class="menu-bar">
        <div class="row rbtn">
            <nav>
                <ul>


                    @if (isset($user) &&
                            ($user->role == 'editor' || $user->role == 'amministratore' || $user->role == 'editor_accompagnatore'))
                        <li><a class="btn btn-success btn-sm" href="{{ url('/form/page1') }}">Aggiungi Attività</a></li>
                        <li>
                            <a type="button" class="btn btn-primary btn-sm" href="{{ url('/attivita/list') }}">Lista
                                Attività
                            </a>
                        </li>
                    @endif


                    <li>
                        <div style="padding: 5px;">
                            <div class=" btrova">
                                <a id="attivitaLink" class="btn btn-success btn-sm"
                                    href="{{ url('/attivita/index/' . $dataOggi . '/99') }}">Trova da Data </a>
                                <input type="text" class="date form-control" id="dataOggi_index" name="dataOggi_menu"
                                    value="{{ $dataOggi }}">
                            </div>
                        </div>
                    </li>

                    <div class="menu" id="menu"><span style="font-weight:700;margin-top:10px;">Data</span> </div>

                    <script>
                        // Passa l'APP_URL dal server al JavaScript
                        var baseUrl = "{{ url('/') }}"; // Usa url() per ottenere l'URL base

                        // Funzione per aggiornare il link "Trova" e simulare la sua azione
                        function updateDataOggi(newDate) {
                            const inputField = document.getElementById('dataOggi_index');
                            inputField.value = newDate;

                            const link = document.getElementById('attivitaLink');
                            link.href = baseUrl + '/attivita/index/' + newDate + '/99';

                            console.log('Link aggiornato:', link.href);
                        }

                        // Funzione per gestire lo stato "attivo"
                        function setActiveLink(link) {
                            // Rimuovi la classe "active" da tutti i link
                            document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));

                            // Aggiungi la classe "active" al link cliccato
                            link.classList.add('active');
                        }

                        // Esempio di menu con link
                        const menu = document.getElementById('menu');

                        // Esempio: Aggiungi un link Anno
                        const yearLink = document.createElement('a');
                        yearLink.textContent = new Date().getFullYear();
                        yearLink.className = "menu-item";
                        yearLink.onclick = function() {
                            setActiveLink(this); // Imposta il link attivo
                            updateDataOggi(`01-01-${yearLink.textContent}`); // Aggiorna i dati
                        };
                        menu.appendChild(yearLink);

                        // Aggiungi altri link (esempio per i mesi)
                        const months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
                            'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
                        ];

                        months.forEach((month, index) => {
                            const monthLink = document.createElement('a');
                            monthLink.textContent = month;
                            monthLink.className = "menu-item";
                            monthLink.onclick = function() {
                                setActiveLink(this); // Imposta il link attivo
                                updateDataOggi(
                                    `01-${String(index + 1).padStart(2, '0')}-${new Date().getFullYear()}`); // Aggiorna i dati
                            };
                            menu.appendChild(monthLink);
                        });

                        // Pulsante per "Data di Oggi"
                        const todayLink = document.createElement('a');
                        todayLink.textContent = "Data di Oggi";
                        todayLink.className = "menu-item";
                        todayLink.onclick = function() {
                            setActiveLink(this); // Imposta il link attivo
                            const today = new Date();
                            const formattedToday =
                                `${String(today.getDate()).padStart(2, '0')}-${String(today.getMonth() + 1).padStart(2, '0')}-${today.getFullYear()}`;
                            updateDataOggi(formattedToday); // Aggiorna i dati
                        };
                        menu.appendChild(todayLink);
                    </script>
                    {{ $slot }}
                </ul>
            </nav>
            @if (auth()->check())
            @if($user->role == 'amministratore')
                <div class="dropdown">
                    <button class="dropdown-toggle" id="dropdownMenuButton">Menu Amministrazione</button>
                    <ul class="dropdown-menu" id="dropdownMenu">
{{--
                        <li><a class="dropdown-item" href="{{ url('/get_from_dbcai') }}">Carica attività<br>caibo.it da
                                data di oggi</a>
                        </li> --}}
                        <li><a class="dropdown-item" href="{{ url('/form_import_sezioni') }}"  target="_blank">Carica Sezioni<br>CAI da
                                excel </a>
                        </li>

                        @if (isset($user) && $user->is_admin == 1)
                            <li><a class="dropdown-item"
                                    href="{{ url('/admin/index') }}">Autorizzazioni<br>amministratori </a>
                            </li>
                        @endif

                        <li><a class="dropdown-item" href="{{ url('/listArticoli') }}">Testi privacy consenso ecc..</a>
                        </li>
                    </ul>
                </div>
                @endif
            @endif
        </div>
    </div>


</body>

<x-footer />

<script>
    // Seleziona gli elementi
    const dropdownToggle = document.getElementById("dropdownMenuButton");
    const dropdownMenu = document.getElementById("dropdownMenu");

    // Aggiungi un listener per il click
    dropdownToggle.addEventListener("click", function() {
        // Mostra/nasconde il menu
        if (dropdownMenu.style.display === "block") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "block";
        }
    });

    // Chiude il menu cliccando fuori
    document.addEventListener("click", function(event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Controlla se l'azione è già stata eseguita
        const alreadyExecuted = sessionStorage.getItem("trovaDaDataExecuted");

        if (!alreadyExecuted) {
            // Se non è stata eseguita, simula il click
            const attivitaLink = document.getElementById("attivitaLink");
            if (attivitaLink) {
                attivitaLink.click();
            }

            // Imposta il flag per evitare ulteriori esecuzioni
            sessionStorage.setItem("trovaDaDataExecuted", "true");
        }
    });
</script>