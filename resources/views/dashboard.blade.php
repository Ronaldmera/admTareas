<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Bienvenido, {{ auth()->user()->name }}!</h1>
    <p>Esta es tu página de inicio.</p>

    <!-- Formulario para cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>
