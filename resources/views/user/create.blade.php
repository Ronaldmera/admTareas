<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADM - Registro</title>
    @vite(['resources/css/user/create.css'])
</head>

<body>

    <div class="form-container">
        <p class="title">Regístrate en ADM Task</p>
        <form class="form" action="{{ route('user.store') }}" method="POST">
            @csrf
            <input type="text" class="input" placeholder="Nombre" name="name" required>
            <input type="email" class="input" placeholder="Email" name="email" required>
            <input type="password" class="input" placeholder="Password" name="password"required>
            <button class="form-btn" type="submit">Registrarme</button>
            <a class="form-cancel" href="{{ route('user.login') }}">Cancelar</a>
        </form>
    </div>

</body>

</html>
