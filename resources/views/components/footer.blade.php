<style>
    .fot {
        position: fixed;
        bottom: 0;
        background: #00366B;;
        width: 100%;
        color: aliceblue;
        text-align: center;
        z-index:100;
        margin-left:-12px;
    }
</style>
<div class="x_container-fluid">
    <footer class="fot">
        <div class="log_in">
            @if (Route::has("login"))
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
                    <a href="{{ route("login") }}"
                    class="testo rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in (amministratori)
                    </a>
    
                    @if (Route::has("register"))
                    <!-- Registrazione  -->
                    <a href="{{ route("register") }}"
                        class="testo rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Registrazione
                    </a>
    
                    @endif
                @endauth
                </div>
            </nav>
            @endif
        </div>
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</div>
