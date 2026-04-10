<div class="container-fluid  fixed-top  p-0">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('dashboard') }}">ADM TASKS</a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="justify-content-end" id="navbarNav">
                <ul class="navbar-nav d-flex flex-row align-items-center gap-0">
                    <li class="nav-item d-flex align-items-center">
                        <span class="text-white me-0">Salir</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn border-0">
                                <i class="bi bi-box-arrow-right text-light fs-5"></i>
                            </button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <button id="menu-toggle" class="btn btn-outline-light">☰</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
