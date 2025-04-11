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
                            <h5>Filtri</h5>
                            <div class="dropdown-divider"></div>
                            <form action="{{ url('attivita/index_filtri') }}" method="GET">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter" name="filter"
                                        value="tutti">
                                    <label class="form-check-label" for="filter">Tutti</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter1" name="filter1"
                                        value="1">
                                    <label class="form-check-label" for="filter1">Trekking</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter2" name="filter2"
                                        value="2">
                                    <label class="form-check-label" for="filter2">Corsi</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter0" name="filter0"
                                        value="0">
                                    <label class="form-check-label" for="filter0">Calendari sezionali</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter3" name="filter3"
                                        value="3">
                                    <label class="form-check-label" for="filter3">Grandi trekking</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter4" name="filter4"
                                        value="4">
                                    <label class="form-check-label" for="filter4">Scialpinismo</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter5" name="filter5"
                                        value="5">
                                    <label class="form-check-label" for="filter5">Ciclo escursionismo</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter6" name="filter6"
                                        value="6">
                                    <label class="form-check-label" for="filter6">Alpinismo Giovanile</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="filter8" name="filter8"
                                        value="8">
                                    <label class="form-check-label" for="filter8">Evendi CAIBO</label>
                                </div>

<br>
                                <div class="form-group">
                                    <label for="filterDate">Seleziona da data</label>
                                    <select class="form-control" id="filterDate" name="filterDate">
                                        <option value="today">Oggi</option>
                                        <option value="-01-01">Gennaio</option>
                                        <option value="-02-01">Febbraio</option>
                                        <option value="-03-01">Marzo</option>
                                        <!-- Aggiungi altri mesi -->
                                    </select>
                                </div>
<br>
                                <button type="submit" class="btn btn-primary">Applica Filtri</button>
                            </form>
                        </div>

                        <div class="col-sm-10">
                            @if($attivita->isEmpty())
                                <div class="alert alert-info">
                                    Non ci sono attività disponibili con questi filtri.
                                </div>
                            @endif
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
