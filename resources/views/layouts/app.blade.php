<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADM Tasks')</title>

    <!-- scripts SweetAlert libreria-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- scripts ChartArt libreria-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- links de AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init();
        });
    </script>


    @vite(['resources/css/nav/style.css'])
    @vite(['resources/css/global.css'])
    @vite(['resources/css/footer/style.css'])
    @vite(['resources/js/nav/hamburguer.js'])
    @vite(['resources/css/dashboard/style.css'])
    @vite(['resources/css/task/style.css'])
    @vite(['resources/js/task/taskDelete.js'])
    @vite(['resources/js/task/grafic.js'])
    @vite(['resources/js/dashboard/welcomeTextAnimation.js'])

</head>

<body>
    @include('includes.navbar')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
</body>

</html>
