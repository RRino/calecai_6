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

    .homeattivita a {
        color: white;
        /* Cambia il colore del testo in bianco */
        text-decoration: none;
        /* Rimuove la sottolineatura */
        font-weight: 700;
        font-size:16px;
    }

    .homeattivita a:hover {
        text-decoration: underline;
        /* Sottolinea durante l'hover */
    }

    .sito{
        margin-top:140px;
        margin-left:30%;
    }
</style>


{{-- <img id="myImage" src="{{ asset("img/Aquila2.png") }}" style="position: absolute; top: -110px; left: 25px;width:140px;"> --}}


<div class="x_container-fluid">
    <header class="hde">

        <div class="container_logo barb">
            <img src="{{ asset('img/logo-cai-150.png') }}" alt="Immagine">
            {{-- <p class="testo">CLUB ALPINO ITALIANO "Sezione Mario Fantin: Bologna</p> --}}
        </div>

        <div class="sito">
            @if (app()->environment('local'))
                <li class="homeattivita"><a class="btn btn-link btn-sm"
                        href="{{ url('http://localhost/testwp/') }}">Home</a></li>
            @else
                <li class="homeattivita"><a class="btn btn-link btn-sm"
                        href="{{ url('https://calecai.caibo.it/calecai/public') }}">Home</a></li>
            @endif
        </div>
</div>
