<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script defer src="https://unpkg.com/@fylgja/alpinejs-dialog/dist/index.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <main class="max-w-4xl mx-auto px-4" x-data="{ dialogIsVisible: false }">
        <header class="py-4">
            <h1>GitarDB</h1>
            <p class="leading-relaxed my-2">Kumpulan gitar</p>
        </header>

        <ul class="p-4 list-decimal flex flex-col gap-2" hx-target="closest li" hx-swap="outerHTML">
            @empty($guitars)
                <p>Tidak ada gitar di sini.</p>
            @endempty

            @foreach ($guitars as $guitar)
                <x-guitar :guitar="$guitar" />
            @endforeach
        </ul>

        <div id="dialog"></div>
    </main>
</body>

</html>
