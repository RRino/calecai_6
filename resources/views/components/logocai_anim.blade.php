@php
    $user = auth()->user();
@endphp

<style>
    .container_logo {
        display: flex;
        justify-content: center;
        align-items: center;
        justify-content: flex-start;
    }

    .container_logo img {
        height: 140px;
        left: 150px;
        top: 15px;
        position: absolute;
    }

    .hde {
        background: #00366B;
        height: 175px;
    }



    .sito {
        margin-top: 120px;
    }

    .sito a {
        color: white;
        /* Cambia il colore del testo in bianco */
        text-decoration: none;
        /* Rimuove la sottolineatura */
        font-weight: 700;
        font-size: 16px;
    }

    .sito a:hover {
        text-decoration: underline;
        /* Sottolinea durante l'hover */
    }

    .sito .navbar-nav .nav-link {
        color: white !important;
        /* Cambia il colore del testo in bianco */
        font-weight: 700;
        font-size: 16px;
    }

    .cerca-form {
        margin-top: 100px;
    }

    nav.navbar.navbar-expand-lg.navbar-light.bg-light {
        background: #00366B !important;
        z-index: 2000;
    }

    .navbar-expand-lg .navbar-nav .dropdown-menu {
        position: absolute;
        background: #00366B;
    }

    @media (max-width: 900px) {
        .container_logo.barb {
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: flex-start;
        }

        .container_logo img {
            height: 100px;
            left: 0px;
            top: 0px;
            position: absolute;
        }

        .sito {
            margin-top: 120px;
        }

        .sito a {
            color: white;
            /* Cambia il colore del testo in bianco */
            text-decoration: none;
            /* Rimuove la sottolineatura */
            font-weight: 700;
            font-size: 16px;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-toggler {
            border: none;
            background: transparent;
        }

        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-nav .nav-link {
            color: white !important;
            /* Cambia il colore del testo in bianco */
            font-weight: 700;
            font-size: 16px;
        }

        .cerca-form {
            margin-top: 100px;
        }
    }
</style>


{{-- <img id="myImage" src="{{ asset("img/Aquila2.png") }}" style="position: absolute; top: -110px; left: 25px;width:140px;"> --}}

<div class="hde">
    <div class="container_logo barb">
        <img src="{{ asset('img/logo-cai-150.png') }}" alt="Immagine">
        {{-- <p class="testo">CLUB ALPINO ITALIANO "Sezione Mario Fantin: Bologna</p> --}}
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <!-- colonna vuota sinistra -->
            </div>
            <div class="col-6">
                <div class="sito">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="localhost/testwp">Home</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    @if ($user && $user->is_admin)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/attivita/list"><span
                                                    style="color:yellow;">Lista</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active addattiv" aria-current="page"
                                                href="/form/page1"><span
                                                    style="color:yellow;">Aggiungi_attività</span></a>
                                        </li>
                                    @endif

                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="/fullcalender/showCalendar_list">Calendario</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="attivitaDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Seleziona_attività
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="attivitaDropdown">
                                            <li><a class="dropdown-item" href="/attivita/index_attivita/10"
                                                    onclick="event.preventDefault(); window.location.href=this.href;">Tutte</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/attivita/index_attivita/1">Trekking</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/attivita/index_attivita/2">Corsi</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="/attivita/index_attivita/3">Grandi_Trekking</a></li>
                                            <li><a class="dropdown-item"
                                                    href="/attivita/index_attivita/4">Scialpinismo</a></li>

                                            <li><a class="dropdown-item"
                                                    href="/attivita/index_attivita/5">Ciclo_escursionismo</a></li>
                                            <li><a class="dropdown-item"
                                                    href="/attivita/index_attivita/6">Alpinismo_giovanile</a></li>
                                            <li><a class="dropdown-item"
                                                    href="/attivita/index_attivita/8">Evendi_CAIBO</a></li>

                                        </ul>
                                    </li>
                                    <!--
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dataDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Data
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                                            <li><a class="dropdown-item" href="/data/oggi">Oggi</a></li>
                                            <li><a class="dropdown-item" href="/data/domani">Domani</a></li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col">
                <form class="cerca-form" action="{{ url('attivita/cerca' . '/index') }}" method="GET">
                    <label class="lb_cerca"> </label>
                    <input type="text" class="cerca" name="cerca" placeholder="Inserisci una parola del titolo">
                    <button type="submit" class="btn btn-primary btn-sm">Cerca</button>
                </form>
            </div>
        </div>
    </div>
</div>

<x-footer />
