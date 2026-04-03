{{-- <header>
    <div class="container">
        <!-- Logo o Nombre de la Aplicación -->
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <h1>ADM Taks</h1>
            </a>
        </div>
        <nav>
            <ul class="nav-links" id="nav-links">
                <li><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li><a href="{{ route('task.index') }}">Tareas</a></li>
                <li><a href="{{ route('user.showProfile') }}">Perfil</a></li>
                <!-- Botón de Cerrar Sesión con Ícono -->
                <li class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <img src="{{ asset('images/logout/logout.svg') }}" alt="Cerrar sesión" class="logout-img">
                        </button>
                    </form>
                </li>
            </ul>
            <div class="hamburguer" id="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>
</header> --}}
<div class="container-fluid  fixed-top  p-0">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('dashboard') }}">ADM TASKS</a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class=" justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-flex align-items-center">
                        <span class="text-white">Salir</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">
                                <i class="bi bi-box-arrow-right text-light fs-5"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
