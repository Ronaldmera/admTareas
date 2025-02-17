<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/user/delete.js'])


</head>

<body>
    <h1>Bienvenido, {{ auth()->user()->name }}!</h1>
    <p>Esta es tu página de inicio.</p>

    <!-- Formulario para cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
    <!-- Formulario para eliminar el perfil -->
    <form action="{{ route('user.destroy', auth()->user()->id) }}" method="POST" class="formularioEliminar">
        @csrf
        @method('delete')
        <button type="submit">eliminar perfil</button>
    </form>


    <a href="{{ route('user.edit', auth()->user()->id) }}">Editar</a>

</body>

</html>
