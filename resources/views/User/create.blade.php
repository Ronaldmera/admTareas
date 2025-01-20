@extends('layouts.app')

@section('title', 'Crear Usuario') <!-- Para personalizar el título de la página -->

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Crear Usuario</h1>
        <form action="{{ route('user.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
