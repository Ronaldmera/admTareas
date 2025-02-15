<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/css/user/create.css'])
    <title>Registro usuarios</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 ">
    <div class="container mt-4">
        <h1 class="text-center">Regístrate en ADM Task</h1>
        <form action="{{ route('user.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Crear</button>
        </form>
    </div>

</body>

</html>
