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
    <main class="max-w-6xl mx-auto px-4 md:grid md:grid-cols-6 gap-4">
        <header class="py-4 h-max col-span-6 md:sticky md:top-0 md:col-span-2">
            <h1>GitarDB</h1>
            <p class="leading-relaxed my-2">Kumpulan gitar</p>
            <form hx-post="{{ route('guitars.store') }}" hx-target="#list" hx-swap="afterbegin" class="p-4 bg-slate-200">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="nama" required />
                <input type="text" class="form-control" name="model" placeholder="model" required />
                <input type="text" class="form-control" name="category" placeholder="kategori" required />
                <input type="text" class="form-control" name="description" placeholder="deskripsi" required />
                <input type="number" class="form-control" name="price" min="0" placeholder="harga" required />

                <button class="btn bg-blue-500 text-white">Tambah gitar</button>
            </form>
        </header>

        <div class="pt-4 pb-12 overflow-auto col-span-6 md:col-span-4">
            <table class="list-decimal w-full min-w-max" hx-target="closest tr" hx-swap="outerHTML swap:500ms">
                <thead>
                    <tr class="text-left">
                        <th>Nama</th>
                        <th>Model</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th class="text-right">Aksi</th>
                    </tr>


                </thead>
                <tbody id="list">
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
        </div>

        <!-- this element is for the initial swap -->
        <div id="dialog"></div>
    </main>
</body>

</html>
