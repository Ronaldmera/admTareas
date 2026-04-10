<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/css/user/create.css'])

    <title>Actualización Perfil</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 ">
    <div class="container mt-4">
        <h1 class="text-center">Edita Tu Perfil</h1>
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" class="mt-4">
            @csrf
            @method('put')

            <div class="form-group mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required
                    value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group mb-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required
                    value="{{ old('password', $user->password) }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        </form>

    </div>

</body>

</html>
