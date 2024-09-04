<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tags | GuitarDB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="max-w-4xl mx-auto px-4">
        <h1>Tags</h1>
        <p>Kelola semua tag gitar di sini.</p>

        <table class="w-full">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </thead>

            @foreach ($tags as $tag)
                <x-tag :tag="$tag" :iteration="$loop->iteration" />
            @endforeach
        </table>
    </main>

</body>

</html>
