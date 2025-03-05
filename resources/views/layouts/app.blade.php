<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADM Tasks')</title>

    <!-- links de AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init();
        });
    </script>

    <!-- estilos globales -->
    @vite(['resources/css/nav/style.css'])
    @vite(['resources/css/global.css'])
    @vite(['resources/css/footer/style.css'])
    @vite(['resources/js/nav/hamburguer.js'])

    @yield('styles')

</head>

<body>
    @include('includes.navbar')
    <main>
        @yield('content')
    </main>
    @stack('scripts')
    @include('includes.footer')
</body>

</html>
