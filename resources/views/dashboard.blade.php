@extends('layouts.app')
@section('styles')
    @vite(['resources/css/dashboard/style.css'])
@endsection
@section('content')
    <h2 class="subtitle-general-summary" data-aos="fade">Resumen General</h2>
    <div class="dashboard-container" data-aos="fade">
        <div class="left">
            <div class="pending-tasks">
                <h2> Tareas Pendientes</h2>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="title">Título</th>
                                <th class="content">Descripción</th>
                                <th class="status">Estado</th>
                                <th class="date">Fecha de Creación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pendingTasks->isEmpty())
                                <tr>
                                    <td class="msj-task-empty" colspan="5">¡No hay tareas pendientes!</td>
                                </tr>
                            @else
                                @foreach ($pendingTasks as $pendingTask)
                                    <tr>
                                        <td class="task-title">
                                            <a
                                                href="{{ route('task.index', ['id' => $pendingTask->id]) }}">{{ $pendingTask->title }}</a>
                                        </td>

                                        <td id="content">{{ $pendingTask->content }}</td>
                                        <td id="pending">{{ $pendingTask->status }}</td>
                                        <td id="date">{{ $pendingTask->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!-- Paginación -->
                    <div class="pagination">
                        {{ $pendingTasks->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="note">
                <p><strong>Nota: </strong><em> Solo se visualizan un máximo de 10 tareas pendientes. Para ver más, navega
                        entre las páginas.</em>
                </p>
            </div>
        </div>
        <div class="right">
            <div class="grafic">
                <h2>Diagrama</h2>
                <canvas id="myChart"></canvas>
                <p id="tasks-empty">Aún no hay tareas para realizar la gráfica</p>
            </div>
        </div>
    </div>
    <div class="resume" data-aos="fade">
        <h2>Resumen de Tareas</h2>
        <div class="cards">
            <div class="item-card">
                <img src="{{ asset('images/dashboard/complete_ico.svg') }}" alt="">
                <h3>T. Completadas</h3>
                <p>Total: {{ $complete }}</p>
            </div>
            <div class="item-card">
                <img src="{{ asset('images/dashboard/pending_ico.svg') }}" alt="">
                <h3>T. Pendientes</h3>
                <p>Total: {{ $pending }}</p>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- scripts ChartArt libreria-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @if ($pendingTasks->isNotEmpty())
            @vite(['resources/js/task/grafic.js'])
        @endif
        @vite(['resources/js/dashboard/welcomeTextAnimation.js'])
        <!-- Estas variables pasan datos de php a JS por medio de formato Json-->
        <script>
            let pending = @json($pending);
            let complete = @json($complete);
            let userName = @json(auth()->user()->name);
        </script>
    @endpush
@endsection
