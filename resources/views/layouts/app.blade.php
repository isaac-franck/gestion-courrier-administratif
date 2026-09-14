<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Gestion du courrier' }}</title>

    <link
        rel="icon"
        type="image/svg+xml"
        href="{{ asset('courrier.svg') }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900
             dark:bg-slate-950 dark:text-slate-100
             transition-colors duration-300">

    @yield('content')

</body>
</html>