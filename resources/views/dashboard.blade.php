@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <h1 class="dashboard-title">Bienvenido, {{ auth()->user()->name }}!</h1>
        <h2> Tareas Pendientes</h2>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($pendingTasks as $pendingTask)
                    <tr>
                        <td>{{ $pendingTask->title }}</td>
                        <td>{{ $pendingTask->content }}</td>
                        <td>{{ $pendingTask->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="a">



    </div>
@endsection
