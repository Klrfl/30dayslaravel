<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <main class="max-w-4xl mx-auto">
            <header class="py-4">
                <h1>GitarDB</h1>
                <p class="leading-relaxed my-2">Kumpulan gitar</p>
            </header>

            <ul class="bg-slate-100 p-4 list-decimal flex flex-col gap-2">
                <li class="flex justify-between items-center gap-4">
                    <span class="">Nama gitar</span>
                    <span>Model</span>
                    <span>Tipe</span>
                    <span>Deskripsi</span>
                    <span>Harga</span>
                    <span class="ml-auto px-4 py-2 bg-blue-300 inline-block">Edit</span>
                </li>
            </ul>
        </main>
    </body>
</html>
