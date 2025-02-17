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
    @vite(['resources/js/login/showPassword.js'])


</head>

<body>
    <!-- si el usuario borra el perfil se activa este if y muestra una animacion de borrado adecuado  -->
    @if (session('eliminar') == 'ok')
        @vite(['resources/js/user/msjUserDelete.js'])
    @endif

    <main>

        <!-- From Uiverse.io by kyle1dev -->
        <form class="modern-form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-title">Login</div>

            <div class="input-group">
                <div class="input-wrapper">
                    <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                        <path stroke-width="1.5" stroke="currentColor"
                            d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z">
                        </path>
                    </svg>
                    <input required name="email" placeholder="Email" class="form-input" type="email" />
                </div>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <svg fill="none" viewBox="0 0 24 24" class="input-icon">
                        <path stroke-width="1.5" stroke="currentColor"
                            d="M12 10V14M8 6H16C17.1046 6 18 6.89543 18 8V16C18 17.1046 17.1046 18 16 18H8C6.89543 18 6 17.1046 6 16V8C6 6.89543 6.89543 6 8 6Z">
                        </path>
                    </svg>
                    <input required id="password" name="password" placeholder="Password" class="form-input"
                        type="password" />
                    <button class="password-toggle" type="button">
                        <svg fill="none" viewBox="0 0 24 24" class="eye-icon">
                            <path stroke-width="1.5" stroke="currentColor"
                                d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z"></path>
                            <circle stroke-width="1.5" stroke="currentColor" r="3" cy="12" cx="12">
                            </circle>
                        </svg>
                    </button>
                </div>
            </div>

            <button class="submit-button" id="btn-login" type="submit">
                <span class="button-text">Login</span>
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
