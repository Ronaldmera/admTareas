<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADM Tasks')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <!-- estilos globales -->
    {{-- @vite(['resources/css/nav/style.css'])
    @vite(['resources/css/footer/style.css'])
    @vite(['resources/js/nav/hamburguer.js']) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/global.css'])
    @yield('styles')

</head>

<body>
    @include('includes.navbar')
    @include('includes.sidebar')
    <main class="main-content">
        @yield('content')
    </main>
    @stack('scripts')
    @include('includes.footer')
</body>

</html>
