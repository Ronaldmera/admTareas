@extends('layouts.app')
@section('styles')
    @vite(['resources/css/profile/style.css'])
    {{-- @vite(['resources/css/task/style.css']) --}}
@endsection
@section('content')
    {{-- <div class="container-profile">

        <div class="profile">
            <h1>Perfil De Usuario</h1>
            <!-- Imagen de perfil -->
            <img src="{{ auth()->user()->image_url }}" alt="Profile Image">

            <p class="name">{{ $user->name }}</p>
            <img class="edit-ico" src="{{ asset('images/profile/edit.svg') }}" alt="icono editar perfil">
            <p class="email">{{ $user->email }}</p>
            <p>Fecha de Creación: {{ $user->created_at->format('d-m-Y') }}</p>
            <!-- Formulario eliminar usuario -->
            <form action="{{ route('user.destroy', [$user->id]) }}" class="formularioEliminar" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn-user-delete">Eliminar Cuenta</button>
            </form>
            <div class="container-form">
                <!-- Formulario para actualizar nombre e imagen -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    <img class="close-edit-ico" src="{{ asset('images/profile/cancel.svg') }}"
                        alt="icono cerrar modal editar">
                    @csrf
                    @method('PUT')
                    <!-- Cambiar Nombre -->
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>

                    <!-- Cambiar Imagen -->
                    <label for="image">Nueva foto de perfil:</label>
                    <input type="file" id="image" name="image" accept="image/*">

                    <button type="submit">Actualizar Perfil</button>
                </form>
            </div>
        </div>
    </div> --}}
    <nav aria-label="breadcrumb" class=" bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
        </ol>
    </nav>
    <h2 class="text-start mb-5"> <i class="bi bi-person-circle me-3"></i>Perfil</h2>
    <div class="row gap-3 align-items-start">
        <div class="col-4 bg-white card justify-content-center p-5">
            <!-- Imagen de perfil -->
            <img src="{{ auth()->user()->image_url }}" alt="Profile Image" class="profile-img">
            <h2 class="text-center mt-3">{{ $user->name }}</h2>
        </div>
        <div class="col bg-white card p-5">
            <h2 class="">Información de Usuario</h2>
            <p class=" mb-0 tex fw-bolder">Nombre:</p>
            <p class="text-muted">{{ $user->name }}</p>
            <p class=" mb-0 fw-bolder">Correo Electrónico:</p>
            <p class="text-muted">{{ $user->email }}</p>
            <p class=" mb-0 fw-bolder">Fecha de Creación:</p>
            <p class="text-muted">{{ $user->created_at->format('d-m-Y') }}</p>
            <p class=" mb-0 fw-bolder">Contraseña:</p>
            <p class="text-muted">************</p>

            <button class="btn btn-primary w-25 btn-show-form-update-password ">Cambiar Contraseña</button>
            <div class="modal-change-password">
                <form action="{{ route('profile.updatePassword') }}" method="post" class="form-update-password">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bolder">Contraseña actual</label>
                        <input type="password" required class="form-control current-password" name="current_password"
                            placeholder="Ingresa tu contraseña actual">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bolder">Nueva contraseña</label>
                        <input type="password" required class="form-control new-password" name="new_password"
                            placeholder="Ingresa la nueva contraseña">
                        <p class="text-danger text-password-error"></p>

                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bolder">Confirmar contraseña</label>
                        <input type="password" required class="form-control confirm-new-password"
                            name="new_password_confirmation" placeholder="Confirma la nueva contraseña">
                        <p class="text-danger text-password-error"></p>
                    </div>

                    <div>
                        <button type="button" class="btn btn-secondary btn-cancel">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-change-password">Actualizar contraseña</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        @if (session('update') == 'ok')
            @vite(['resources/js/profile/msjProfileUpdate.js'])
        @endif
        <script>
            window.updatePasswordStatus = @json(session('updatePassword'));
        </script>
        @vite(['resources/js/profile/app.js'])
        @vite(['resources/js/user/userDelete.js'])
        @vite(['resources/js/profile/showFormUpdatePassword.js'])
        <!-- scripts SweetAlert libreria-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
@endsection
