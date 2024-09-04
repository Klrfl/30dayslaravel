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
                <tr class="even:bg-slate-200">
                    <td class="py-2 px-3">{{ $loop->iteration }}</td>
                    <td class="py-2 px-3">{{ $tag->name }}</td>
                    <td class="py-2 px-3">
                        <a href="{{ route('tags.edit', $tag->id) }}"
                            class="p-1 px-2 outline outline-blue-500 hover:bg-blue-500 hover:text-gray-200">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>

</body>

</html>
