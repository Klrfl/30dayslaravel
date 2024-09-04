<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tags | GuitarDB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="max-w-6xl mx-auto px-4 md:grid md:grid-cols-6 gap-4">
        <header class="col-span-6">
            <h1>Tags</h1>
            <p>Kelola semua tag gitar di sini.</p>

            <form hx-post="{{ route('tags.store') }}" hx-swap="afterbegin" hx-target="#list">
                @csrf

                <label for="name">Nama</label>
                <input type="text" class="form-control" placeholder="nama" name="name" required>

                <button type="submit" class="py-2 px-4 outline outline-blue-500">Tambah tag baru</button>
            </form>
        </header>

        <div class="col-span-6">
            <table class="w-full">
                <thead>
                    <th>Nama</th>
                    <th>Aksi</th>
                </thead>

                <tbody id="list">
                    @foreach ($tags as $tag)
                        <x-tag :tag="$tag" :iteration="$loop->iteration" />
                    @endforeach
                </tbody>
            </table>
        </div>


    </main>

</body>

</html>
