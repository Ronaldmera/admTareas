@extends('layouts.app')
@section('styles')
    @vite(['resources/css/task/style.css'])
@endsection
@section('content')
    <nav aria-label="breadcrumb" class=" bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tareas</li>
        </ol>
    </nav>

    <h2 class="text-center mb-5"><span><i class="bi bi-clipboard-data me-2"></i></span> Todas las Tareas</h2>
    <div class="row">
        <div class="col-12">
            <div class="pending-tasks bg-white p-5 rounded-4">
                <h2> Tareas </h2>
                <table class="table table-striped table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="title">Titulo</th>
                            <th scope="col" class="content">Descripcion</th>
                            <th scope="col" class="status">Estado</th>
                            <th scope="col" class="date">F. Creacion</th>
                            <th scope="col" class="date">F. Límite</th>
                            <th class="action">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tasks->isEmpty())
                            <tr>
                                <td class="msj-task-empty text-muted" colspan="6">No hay tareas disponibles</td>
                            </tr>
                        @else
                            @foreach ($tasks as $task)
                                <tr class="{{ isset($taskShow) && $taskShow->id == $task->id ? 'task-select' : '' }}">
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->content }}</td>
                                    <td id="status">{{ $task->status }}</td>
                                    <td id="date">{{ $task->created_at->format('d-m-Y') }}</td>
                                    <td id="end_date">{{ $task->end_date->format('d-m-Y') }}</td>
                                    <td id="action" class="d-flex gap-2 justify-content-center">
                                        <button class="btn-show-task btn btn-primary"
                                            data-id="{{ $task->id }}">Mostrar</button>

                                        <button class="btn-edit-task btn btn-secondary"
                                            data-id="{{ $task->id }}">Editar</button>

                                        <form class="delete d-inline" action="{{ route('task.destroy', $task->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-orange">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $tasks->links() }}
                <p class=" text-muted">Mostrando {{ $tasksShown }} de {{ $tasksTotal }}</p>
            </div>
        </div>

    </div>
    <div class="container-add-task">
        <div class="item-add">
            <img src="{{ asset('images/task/add_task_ico.svg') }}" alt="icono agregar tarea">
        </div>
    </div>

    <div class="modal-create-task">
        <form class="form" action="{{ route('task.store') }}" method="POST">
            @csrf
            <div class="title-form">Agregar Tarea</div>
            <input type="text" class="title" placeholder="Título" name="title" required>
            <textarea class="content" placeholder="Describe tu tarea aquí" name="content" required></textarea>
            <label for="end_date" class="content">Fecha Límite:</label>
            <input type='date' name="end_date" required>
            <select name="status" id="status-option" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="pendiente">Pendiente</option>
                <option value="completada">Completada</option>
            </select>

            <div class="options-modal">
                <button type="button" class="btn-close-modal">Cancelar</button>
                <button type="submit">Crear Tarea</button>
            </div>

        </form>

    </div>
    <div id="modal-task" class="modal-show">
        <div class="modal-content">
            <h2 id="modal-title">Título de la Tarea</h2>
            <p><strong>Descripción:</strong> <span id="modal-description"></span></p>
            <p><strong>Estado:</strong> <span id="modal-status"></span></p>
            <p><strong>Fecha de Creación:</strong> <span id="modal-date"></span></p>
            <p><strong>Fecha Límite:</strong> <span id="modal-end-date"></span></p>
            <div class="d-flex justify-content-center">
                <button class="close btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
    {{-- @if (isset($task))
        <div class="modal-edit" id="modal-edit">
            <form class="form" action="{{ route('task.update', [$task->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="title-form">Editar Tarea</div>
                <input type="text" id="update-title" name="title">
                <textarea id="update-content" name="content" required></textarea>
                <label for="update-end-date" class="content">Fecha Límite</label>
                <input type="date" id="update-end-date" name="end_date">
                <select name="status" id="update-status" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="completada">Completada</option>
                </select>

                <div class="options-modal">
                    <button type="button" class="btn-close-modal">Cancelar</button>
                    <button type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    @endif --}}

    @push('scripts')
        <!-- Si el usuario borra una tarea, se activa este if y muestra una animación de borrado adecuada -->
        @if (session('delete') == 'ok')
            @vite(['resources/js/task/msjTaskDelete.js'])
        @endif
        @if (session('save') == 'ok')
            <!-- muestra mensaje al crear nueva tarea -->
            @vite(['resources/js/task/msjSaveTask.js'])
        @endif
        @if (session('update') == 'ok')
            <!-- muestra mensaje al actualizar una tarea -->
            @vite(['resources/js/task/msjUpdateTask.js'])
        @endif

        @vite(['resources/js/task/taskDelete.js'])
        @vite(['resources/js/task/colorTaskStatus.js'])
        @vite(['resources/js/task/modalAddTask.js'])
        @vite(['resources/js/task/modalShowTask.js'])
        @vite(['resources/js/task/modalEdit.js'])
        @vite(['resources/js/task/moveTaskStart.js'])
        @vite(['resources/js/task/notification.js'])
        <!-- scripts SweetAlert libreria-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let taskStatus = @json($tasks->pluck('status'));
            const tareas = @json($allTasks);
        </script>
    @endpush

@endsection
