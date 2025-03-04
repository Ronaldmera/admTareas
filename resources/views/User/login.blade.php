<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- scripts SweetAlert libreria-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/css/Login/style.css'])
    <!-- estilos de error al logearse-->
    @vite(['resources/css/Login/login_error.css'])

    <!-- js-->
    <!-- js muestra la contraseña y la oculta al hacer click en el icono del ojo-->
    @vite(['resources/js/login/showPassword.js'])



</head>

<body>
    <!-- si la contraseña no coincide o hay algun error en el login se ejecuta este if  -->
    @if ($errors->has('email'))
        <div class="error-message">
            {{ $errors->first('email') }}
        </div>
    @endif
    <!-- si el usuario borra el perfil se activa este if y muestra una animacion de borrado adecuado  -->
    @if (session('eliminar') == 'ok')
        @vite(['resources/js/user/msjUserDelete.js'])
    @endif


    <main>

        <!-- From Uiverse.io by kyle1dev -->
        <form class="modern-form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-title">Iniciar Sesión</div>

            <div class="input-group">
                <div class="input-wrapper">
                    <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                        <path stroke-width="1.5" stroke="currentColor"
                            d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z">
                        </path>
                    </svg>
                    <input required name="email" placeholder="Correo Electrónico" class="form-input" type="email" />
                </div>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                        <path stroke-width="1.5" stroke="currentColor"
                            d="M12 10V14M8 6H16C17.1046 6 18 6.89543 18 8V16C18 17.1046 17.1046 18 16 18H8C6.89543 18 6 17.1046 6 16V8C6 6.89543 6.89543 6 8 6Z">
                        </path>
                    </svg>
                    <input required id="password" name="password" placeholder="Contraseña" class="form-input"
                        type="password" />
                    <button class="password-toggle" type="button">
                        <svg fill="none" viewBox="0 0 24 24" class="eye-icon">
                            <path stroke-width="1.5" stroke="currentColor"
                                d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z"></path>
                            <circle stroke-width="1.5" stroke="currentColor" r="3" cy="12" cx="12">
                            </circle>
                        </svg>
                        <svg class="close-eye" xmlns="http://www.w3.org/2000/svg" height="16px"
                            viewBox="0 -960 960 960" width="16px" fill="#666666">
                            <path
                                d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <button class="submit-button" id="btn-login" type="submit">
                <span class="button-text">Iniciar Sesión</span>
                <div class="button-glow"></div>
            </button>

            <div class="form-footer">
                <a class="login-link" href="{{ route('user.create') }}">
                    No tienes Cuenta? <span>Registrate</span>
                </a>
            </div>
        </form>
    </main>
</body>

</html>
