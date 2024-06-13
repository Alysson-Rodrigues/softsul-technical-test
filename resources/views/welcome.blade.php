<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="/js/toggle-mode.js"></script>
        @vite('resources/css/app.css')
    </head>
    <body className="font-normal">
        <main class="flex flex-col justify-center h-screen w-full items-center bg-background">
            <h1 class="text-4xl font-bold text-primary">Welcome to Laravel</h1>
            <p class="text-lg text-foreground">This is a Laravel application with Vite and Tailwind CSS</p>
        </main>
    </body>
</html>
