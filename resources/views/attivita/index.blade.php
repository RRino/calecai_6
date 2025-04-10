<head>
    @php
        use App\Models\TipoQualifica;
        use App\Models\TipoScelteInterne;
        use App\Models\TipoAttivita;
        use App\Models\TipoIscrizione;
        use App\Models\TipoVolantino;
        use App\Models\Attivita;
        use Carbon\Carbon;

        $user = auth()->user();

        $tipoattivita = TipoAttivita::where('published', 1)->get();
        //dd($tipoattivita);
        //$tipoattivita = TipoAttivita::where('published', 1) ->whereNotIn('id', [0,1]) ->pluck('nome') ->toArray();
        $scelteinterne = TipoScelteInterne::where('published', 1)->get();

        $tipoiscrizione = TipoIscrizione::where('published', 1)->get();
        $tipovolantino = TipoVolantino::where('published', 1)->get();
        //$attivita = Attivita::all();
        $attivita = $viewData['attivita'];

    @endphp

</head>


<style>
       #toggleFilters {
            display: none;
        }
    @media (max-width: 768px) {
        #toggleFilters {
            display: block;
        }

        #filters {
            position: fixed;
            top: 220;
            left: -250px;
            /* Nascondi la colonna fuori dallo schermo */
            width: 250px;
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transition: left 0.3s ease-in-out;
            z-index: 1050;
        }


        #filters.active {
            left: 0;
            /* Mostra la colonna */
        }

    }
</style>

<x-logocai_anim />

<x-layout_cai>

    <div id="main">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="container-xl">
            <div class="grid-container_attivita">
                <!-- visualizza tipo di attivita nel box in alto -->

                <div class="container">
                    <div class="row">

                        <button class="btn btn-primary" id="toggleFilters">Filtri</button>
                        <div class="col-sm-2 colfiltri" id="filters">
                            <form action="{{ url('attivita/index_filtri') }}" method="GET">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter1" name="filter1"
                                        value="1">
                                    <label class="form-check-label" for="filter1">Filtro 1</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter2" name="filter2"
                                        value="2">
                                    <label class="form-check-label" for="filter2">Filtro 2</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Applica Filtri</button>
                            </form>
                        </div>

                        <div class="col-sm-10">

                            @foreach ($attivita as $attiv)
                                <div>
                                    @if (in_array($attiv->tipo_attivita, [0]))
                                        @include('parziali.calendario', ['attivita' => $attiv])
                                    @elseif (in_array($attiv->tipo_attivita, [1, 2, 3, 4, 5, 6, 7, 8, 9]))
                                        @include('parziali.trekking', ['attivita' => $attiv])
                                    @endif
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </div>

    <script>
        document.getElementById('toggleFilters').addEventListener('click', function() {
            const filters = document.getElementById('filters');
            filters.classList.toggle('active');
        });
    </script>

</x-layout_cai>
