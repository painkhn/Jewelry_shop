<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title')</title>
</head>

<body class="flex flex-col min-h-screen font-Jost bg-[#885041]/20 text-[#111111] text-xl">
    @include('components.header')
    @yield('content')

    @include('components.footer')
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>

</html>
