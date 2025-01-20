<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Usuario</title>
</head>

<body>
    <h1>Bienvenido a Crear Usuario</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name">nombre </label>
        <input type="text" name="name" required>

        <br>
        <br>
        <label for="email">email </label>
        <input type="email" name="email" required>

        <br>
        <br>
        <label for="password">contraseña</label>
        <input type="password" name="password" required>

        <br>
        <br>
        <button type="submit">Crear</button>

    </form>

</body>

</html>
