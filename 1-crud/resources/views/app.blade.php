<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <main class="max-w-4xl mx-auto px-4">
            <header class="py-4">
                <h1>GitarDB</h1>
                <p class="leading-relaxed my-2">Kumpulan gitar</p>
            </header>

            <ul class="bg-slate-100 p-4 list-decimal flex flex-col gap-2">
                @empty($guitars)
                    <p>Tidak ada gitar di sini.</p>
                @endempty

                @foreach ($guitars as $guitar)
                <li class="flex justify-between items-center gap-4">
                    <span class="">{{$guitar->name}}</span>
                    <span>{{$guitar->model}}</span>
                    <span>{{$guitar->type}}</span>
                    <span>{{$guitar->price}}</span>
                    <span class="ml-auto px-4 py-2 bg-blue-300 inline-block">Edit</span>
                </li>
                @endforeach
            </ul>
        </main>
    </body>
</html>
