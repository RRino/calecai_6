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
      margin-top:100px;
      margin-left:30%;
  }

  .sito a{
      color: white;
      /* Cambia il colore del testo in bianco */
      text-decoration: none;
      /* Rimuove la sottolineatura */
      font-weight: 700;
      font-size:16px;
  }
  .sito a:hover{
      text-decoration: underline;
      /* Sottolinea durante l'hover */
  }
  .sito .navbar-nav .nav-link {
      color: white !important;
      /* Cambia il colore del testo in bianco */
      font-weight: 700;
      font-size:16px;
  }

  nav.navbar.navbar-expand-lg.navbar-light.bg-light {
  background: #00366B !important;
}

.navbar-expand-lg .navbar-nav .dropdown-menu {
      position: absolute;
      background: #00366B;
  }
</style>


{{-- <img id="myImage" src="{{ asset("img/Aquila2.png") }}" style="position: absolute; top: -110px; left: 25px;width:140px;"> --}}


<div class="x_container-fluid logocaianim">
  <header class="hde">

      <div class="container_logo barb">
          <img src="{{ asset('img/logo-cai-150.png') }}" alt="Immagine">
          {{-- <p class="testo">CLUB ALPINO ITALIANO "Sezione Mario Fantin: Bologna</p> --}}
      </div>

      <div class="sito">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="attivitaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Attività
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="attivitaDropdown">
                        <li><a class="dropdown-item" href="/attivita/attiv1">Attiv1</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                        <li><a class="dropdown-item" href="/data/oggi">Oggi</a></li>
                        <li><a class="dropdown-item" href="/data/domani">Domani</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            
      </div>
       
</div>