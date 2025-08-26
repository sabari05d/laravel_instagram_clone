<!DOCTYPE html>
<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="bg-dark text-white">
    @include('template.header')

    <div class="content">
        @yield('content')
    </div>

    @include('template.footer')
</body>

</html>