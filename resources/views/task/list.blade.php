@extends('layouts.app')

@section('content')
    <!-- Si el usuario borra una tarea, se activa este if y muestra una animación de borrado adecuada -->
    @if (session('delete') == 'ok')
        @vite(['resources/js/task/msjTaskDelete.js'])
    @endif

    <div class="tasks-container">
        <div class="all-tasks">
            <h2 class="title"> Todas las Tareas</h2>
            <div class="table-resp">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tasks->isEmpty())
                            <tr>
                                <td class="msj-task-empty" colspan="5">No hay tareas disponibles</td>
                            </tr>
                        @else
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="item">{{ $task->title }}</td>
                                    <td class="content">{{ $task->content }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>{{ $task->created_at->format('d-m-Y') }}</td>
                                    <td class="action">
                                        <a href="{{ route('task.create', $task->id) }}">Mostrar</a>
                                        <a href="{{ route('task.create', $task->id) }}">Editar</a>
                                        <form class="delete" action="{{ route('task.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
