@extends('layouts.app')

@section('content')

    <h1 class="dashboard-title">Bienvenido, {{ auth()->user()->name }}!</h1>
    <div class="dashboard-container">
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
                                <td class="msj-task-empty" colspan="5">No hay tareas disponibles</td>
                            </tr>
                        @else
                            @foreach ($pendingTasks as $pendingTask)
                                <tr>

                                    @csrf

                                    <td class="item"><a href="https://fonts.google.com/">{{ $pendingTask->title }}</a>
                                    </td>
                                    <td class="content">{{ $pendingTask->content }}</td>
                                    <td>{{ $pendingTask->status }}</td>
                                    <td> {{ $pendingTask->created_at->format('d-m-Y') }}</td>
                                    </form>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>

        </div>
        <div class="grafic">
            <h2>Diagrama</h2>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
        var pending = @json($pending);
        var complete = @json($complete);
    </script>
@endsection
