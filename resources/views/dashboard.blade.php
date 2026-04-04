@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <nav aria-label="breadcrumb" class=" bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <h2>Bienvenido <strong class=" text-dark">{{ $userName }}</strong></h2>
    <h2 class="text-center mb-5"> <i class="bi bi-bar-chart me-3"></i>Resumen General</h2>
    <div class="row">
        <div class="col-12">
            <div class="pending-tasks bg-white p-5 rounded-4">
                <h2> Tareas Pendientes</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="title">Titulo</th>
                            <th scope="col" class="content">Descripcion</th>
                            <th scope="col" class="status">Estado</th>
                            <th scope="col" class="date">Fecha de creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingTasks as $pendingTask)
                            <tr>
                                <td class="task-title">
                                    <a class=""
                                        href="{{ route('task.index', ['id' => $pendingTask->id]) }}">{{ $pendingTask->title }}</a>
                                </td>

                                <td id="content">{{ $pendingTask->content }}</td>
                                <td id="pending">{{ $pendingTask->status }}</td>
                                <td id="date">{{ $pendingTask->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pendingTasks->links() }}
            </div>
        </div>

    </div>
    <div class="row my-2 g-0 gap-3 justify-content-between">
        <div class="col rounded-4  bg-white p-5">
            <h2 class="d-flex justify-content-center ">Resumen de Tareas</h2>
            <div class="row justify-content-center gap-5">
                <div class="card bg-secondary">
                    <i class="bi bi-clipboard-check fs-1 color-primary"></i>
                    <div class="card-body">
                        <h5 class="card-title">Completadas</h5>
                        <p>Total: {{ $complete }}</p>
                    </div>
                </div>
                <div class="card bg-secondary">
                    <i class="bi bi-clipboard-x fs-1 color-orange"></i>
                    <div class="card-body">
                        <h5 class="card-title">Pendientes</h5>
                        <p>Total: {{ $pending }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col bg-white p-5 rounded-4">
            <div class="grafic">
                <h2 class="d-flex justify-content-center">Diagrama</h2>
                <canvas id="myChart" class=" mb-2"></canvas>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- scripts ChartArt libreria-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @vite(['resources/js/task/grafic.js'])
        <!-- Estas variables pasan datos de php a JS por medio de formato Json-->
        <script>
            let pending = @json($pending);
            let complete = @json($complete);
            let userName = @json(auth()->user()->name);
        </script>
    @endpush
@endsection
