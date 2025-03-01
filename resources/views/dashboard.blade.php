@extends('layouts.app')

@section('content')
    <h1 class="dashboard-title">Bienvenido, {{ auth()->user()->name }}!</h1>
    <div class="welcome">
        <p class="msg">Aquí puedes gestionar tus tareas de manera eficiente y visualizar tu progreso.</p>
        <img class="img" src="{{ asset('images/dashboard/listaTareas.gif') }}" alt="imagen de tareas">
        <p class="link-flaticon">
            <a href="https://www.flaticon.es/iconos-animados-gratis/bloc" title="bloc iconos animados">Bloc iconos animados
                creados por Freepik - Flaticon</a>
        </p>
    </div>

    <div class="dashboard-container">
        <div class="left">
            <div class="pending-tasks">
                <h2> Tareas Pendientes</h2>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
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
                                        <td class="item">
                                            <a href="https://fonts.google.com/">{{ $pendingTask->title }}</a>
                                        </td>
                                        <td class="content">{{ $pendingTask->content }}</td>
                                        <td>{{ $pendingTask->status }}</td>
                                        <td>{{ $pendingTask->created_at->format('d-m-Y') }}</td>
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
                <p><strong>Nota: </strong>Solo se visualizan un máximo de 10 tareas pendientes. Para ver más, navega entre
                    las páginas.
                </p>
            </div>
        </div>
        <div class="right">
            <div class="grafic">
                <h2>Diagrama</h2>
                <canvas id="myChart"></canvas>
                <p class="tasks-empty">Aún no hay tareas para realizar la gráfica</p>
            </div>
        </div>
    </div> <!-- Cierre de dashboard-container -->

    <script>
        var pending = @json($pending);
        var complete = @json($complete);
    </script>

@endsection
