@extends('layouts.app')
@section('styles')
    @vite(['resources/css/profile/style.css'])
@endsection
@section('content')
    <div class="container-profile">

        <div class="profile">
            <h1>Perfil De Usuario</h1>
            <!-- Imagen de perfil -->
            <img src="{{ auth()->user()->image_url }}" alt="Profile Image">

            <p class="name">{{ $user->name }}</p>
            <img class="edit-ico" src="{{ asset('images/profile/edit.svg') }}" alt="icono editar perfil">
            <p class="email">{{ $user->email }}</p>
            <p>Fecha de Creación: {{ $user->created_at->format('d-m-Y') }}</p>
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
    </div>
    @push('scripts')
        @if (session('update') == 'ok')
            @vite(['resources/js/profile/msjProfileUpdate.js'])
        @endif
        @vite(['resources/js/profile/app.js'])
        <!-- scripts SweetAlert libreria-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
@endsection
