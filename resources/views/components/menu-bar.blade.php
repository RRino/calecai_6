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
            margin-top: 5px;

        }





        .dropdown {
            position: relative;
            display: inline-block;
            margin-left: 10px;
        }
    </style>
</head>
@php
    use Carbon\Carbon;
    use App\Models\TipoAttivita;
    use App\Models\TipoDate;
    $user = auth()->user();
    $dataOggius = Carbon::now()->toDateString(); // Ottiene la data di oggi nel formato 'YYYY-MM-DD'
    $dataOggi = Carbon::createFromFormat('Y-m-d', $dataOggius)->format('d-m-Y');
    $data = null;
    $attivita = TipoAttivita::where('published', 1)->get();
    $date = TipoDate::where('published', 1)->get();

    $itemSelezionatoData = null; // Valore di default
    $itemSelezionatoAttivita = null; // Valore di default

@endphp


<body>
    <div class="menu-bar">
        @if (isset($user) &&
                ($user->role == 'editor' || $user->role == 'amministratore' || $user->role == 'editor_accompagnatore'))
            <li><a class="btn btn-success btn-sm" href="{{ url('/form/page1') }}">Aggiungi Attività</a></li>
            <li>
                <a type="button" class="btn btn-primary btn-sm" href="{{ url('/attivita/list') }}">Lista
                    Attività
                </a>
            </li>
        @endif

        <form method="post" action="{{ url('/attivita/index') }}">
            @csrf
            <div class="dropdown">
                <div class="col">
                    <label for="attivita">Seleziona Attività:</label>
                    <select name="attivita" id="attivita" class="form-control">
                        @foreach ($attivita as $itema)
                            <option value="{{ $itema->tipo_attivita }}">{{ $itema->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="date">Seleziona Data:</label>
                        <select name="date" id="date" class="form-control">
                            @foreach ($date as $itemd)
                                <option value="{{ $itemd->nome }}">{{ $itemd->descrizione }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="btrova">
                <button type="submit" class="btn btn-primary">Visualizza</button>
            </div>
        </form>

        @if (auth()->check())
            @if ($user->role == 'amministratore')
                <div class="dropdown">
                    <button class="dropdown-toggle" id="dropdownMenuButton">Menu Amministrazione</button>
                    <ul class="dropdown-menu" id="dropdownMenu">
                        
                    <li><a class="dropdown-item" href="{{ url('/get_from_dbcai') }}">Carica attività<br>caibo.it da
                            data di oggi</a>
                    </li> 
                        <li><a class="dropdown-item" href="{{ url('/form_import_sezioni') }}" target="_blank">Carica
                                Sezioni<br>CAI da
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
</body>

<x-footer />

</html>


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