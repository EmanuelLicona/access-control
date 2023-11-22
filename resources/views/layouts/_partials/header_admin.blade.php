<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
            <a href="{{ route('home') }}">
                <img  width="100px" src="{{ asset('images/logo-cruz-roja.png') }}" class="navbar-brand" alt="imagen logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
            
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('users.index') }}">Empleados</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('access.index') }}">Registros de accesos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('exports.index') }}">Exportar </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('profile.index') }}">Mi perfil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('auth.destroy') }}">Cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
