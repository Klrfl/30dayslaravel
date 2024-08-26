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

            <form hx-post="{{ route('guitars.store') }}" hx-target="#list tr:has(th)" hx-swap="afterend"
                class="p-4 bg-slate-200">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="nama" required />
                <input type="text" class="form-control" name="model" placeholder="model" required />
                <input type="text" class="form-control" name="type" placeholder="type" required />
                <input type="text" class="form-control" name="description" placeholder="description" required />
                <input type="number" class="form-control" name="price" min="0" placeholder="price" required />

                <button class="btn bg-blue-500 text-white">Submit</button>
            </form>
        </header>

        <table class="p-4 list-decimal w-full" hx-target="closest tr" hx-swap="outerHTML">
            <tbody id="list">
                <tr class="text-left">
                    <th>Nama</th>
                    <th>Model</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th class="">Aksi</th>
                </tr>

                @empty($guitars)
                    <tr>
                        <td> Tidak ada gitar di sini. </td>
                    </tr>
                @endempty

                @foreach ($guitars as $guitar)
                    <x-guitar :guitar="$guitar" />
                @endforeach

            </tbody>
        </table>

        <div id="dialog"></div>
    </main>
</body>

</html>
