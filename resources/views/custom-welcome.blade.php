<!DOCTYPE html>
<html lang="it">

@php
    use Carbon\Carbon;

    $user = auth()->user();
    $dataOggius = Carbon::now()->toDateString(); // Ottiene la data di oggi nel formato 'YYYY-MM-DD'
    $dataOggi = Carbon::createFromFormat('Y-m-d', $dataOggius)->format('d-m-Y');
    $id = 1;

    $message = 'message layout-to-container';
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAI Bo Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .lgin a {

        padding: 20px;
    }

    .part {

        box-align: center;

    }

    .dv {
        display: flex;
        align-items: center;
    }

    .lab {
        white-space: nowrap;
        /* Impedisce al testo di andare a capo */
        margin-right: 10px;
        /* Aggiungi uno spazio tra l'etichetta e l'input */
    }

    .ciao {
        width: 80px;
        Margin-left: 52%;
        margin-top: -60px;
        z-index: 1;
    }

    .als {
        margin-left: 200px;
    }

    button.btn.btn-link {
        color: rgb(201, 50, 4);
    }

    .lgin {
    margin-right: 100px;
    
}
</style>
<style>
    .testo {
        color: white; /* Imposta il colore del testo in bianco */
        text-decoration: none;
    }

    .testo:hover {
        color: yellow; /* Opzionale: modifica colore durante l'hover */
    }

    .testo {
    color: white; /* Imposta il colore del testo in bianco */
    text-decoration: none; /* (Opzionale) Rimuove la sottolineatura */
}

.testo:hover {
    color: yellow; /* (Opzionale) Cambia colore durante l'hover */
}

</style>

@if (session('success'))
    <div class="alert alert-success">
        <span class="als">{{ session('success') }}</span>
    </div>
@endif

<x-logocai_anim />
{{-- <img id="myImage" src="../../img/Aquila2.png" style="position: absolute; top: -110px; left: 25px;width:140px;"> --}}

<x-layout_cai>

<x-menu-bar></x-menu-bar>

    @if (isset($user->name))
        {{ 'Ciao ' . $user->name . ' (' . $user->role . ')' }}
    @endif

    <div id="main">

 

        <div class="ciao">
            <button onclick="animateImage()">
                <img id="mascotte" src="img/mascotte2b.png"
                    style="position: absolute; top: 125px; left: 45%;width:40px;" data-bs-toggle="modal"
                    data-bs-target="#myModal"></button>
            <button type="link" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#myModal">
                {{ 'Ciao_leggi' }}
            </button>
        </div>

        <div class="container-xl">


            <div class="row">
                @include('parziali.attivita')
                {{-- @include('parziali.tipologia') --}}
            </div>
            <div class="row">
                @include('parziali.ciao')
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <footer class="fot">
            <div class="log_in">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        <div class="lgin">
                            @auth
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="testo rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="testo rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log in (amministratori)
                                </a>

                            @endauth
                        </div>
                    </nav>
                @endif
            </div>
           <x-footer/>
        </footer>
    </div>

</x-layout_cai>

</html>


<script>
    $(document).ready(function() {
        // Animazione di un elemento con ID "myElement"
        $("#myImage").animate({
            top: "10px", // Sposta l'elemento di 10px
        }, 2000); // Durata dell'animazione in millisecondi
    });
    $("#mascotte").animate({
        left: "53%"
    }, 3000); // Durata dell'animazione in millisecondi
</script>

<script>
    function animateImage() {
        var img = $("#mascotte");
        img.animate({
                top: '120px',
                left: '9%',

            }, 'slow')

            .animate({
                top: '145px',
                left: '53%'
            }, 'slow');
    }
</script>
