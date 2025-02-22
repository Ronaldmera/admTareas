<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADM Tasks')</title>
    @vite(['resources/css/nav/style.css'])
    @vite(['resources/css/global.css'])
    @vite(['resources/css/footer/style.css'])
    @vite(['resources/js/nav/hamburguer.js'])
    @vite(['resources/css/dashboard/style.css'])
</head>

<body>
    @include('includes.navbar')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
</body>

</html>
