@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <h1 class="dashboard-title">Bienvenido, {{ auth()->user()->name }}!</h1>
        <div class="pending-tasks">
            <h2> Tareas Pendientes</h2>
            <div class="table-responsive">
                @if ($pendingTasks->isEmpty())
                    <p class="no-tasks-message">No hay tareas pendientes.</p>
                @else
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
                            @foreach ($pendingTasks as $pendingTask)
                                <tr>
                                    <td class="item">{{ $pendingTask->title }}</td>
                                    <td class="content">{{ $pendingTask->content }}</td>
                                    <td>{{ $pendingTask->status }}</td>
                                    <td> {{ $pendingTask->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
@endsection
