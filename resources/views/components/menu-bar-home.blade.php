<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
</div>
<style>
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

    }
</style>

@php
    use Carbon\Carbon;
    $user = auth()->user();
    $dataOggius = Carbon::now()->toDateString(); // Ottiene la data di oggi nel formato 'YYYY-MM-DD'
    $dataOggi = Carbon::createFromFormat("Y-m-d", $dataOggius)->format("d-m-Y");
@endphp


<div class="menu-bar">
    <div class="row rbtn">
        <nav>
            <ul>

                @if (app()->environment("local"))
                    <li class="l"><a class="btn btn-primary btn-sm"
                            {{-- href=" url("http://127.0.0.1:8000/") ">Home attività</a></li> }}">Home attività</a></li> --}}
                            href="{{ url('http://localhost/testwp/') }}">Home.</a></li>
                @else
                    <li class="l"><a class="btn btn-primary btn-sm"
                            href="{{ url("https://calecai.caibo.it/calecai/public") }}">Home.</a></li>
                @endif

                {{ $slot }}
            </ul>
        </nav>
    </div>
</div>

{{-- Aggiungi questo per il debug --}}
<script>
    console.log('Environment:', '{{ app()->environment() }}');
</script>