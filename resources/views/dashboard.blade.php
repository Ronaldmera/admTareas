@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <h1 class="dashboard-title">Bienvenido, {{ auth()->user()->name }}!</h1>
        <h2> Tareas Totales</h2>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>

                </tr>

            </thead>
            <tbody>
                @foreach ($tasksComplete as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
