<header>
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
                <li><a href="{{ route('task.create') }}">Agregar Tarea</a></li>
                <!-- Botón de Cerrar Sesión con Ícono -->
                <li class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <img src="{{ asset('images/logout/exit.svg') }}" alt="Cerrar sesión" class="logout-img">
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
</header>
