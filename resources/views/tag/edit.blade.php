<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Tag | GitarDB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="px-4 max-w-xl mx-auto">
        <h1>Edit tag</h1>

        <form action="{{ route('tags.update', $tag->id) }}" class="flex flex-col gap-4 p-4 bg-slate-200" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama</label>

            <input type="text" name="name" placeholder="nama" class="form-control"
                value="{{ old('name', $tag->name) }}" required>

            <button type="submit" class="py-2 px-3 bg-blue-500 text-gray-100">
                Edit
            </button>
        </form>

        <ul>
            @if (sizeof($tag->guitars) == 0)
                <li>belum ada gitar dengan tag ini.</li>
            @endif

            @foreach ($tag->guitars as $guitar)
                <li>{{ $guitar->name }}</li>
            @endforeach
        </ul>
    </main>
</body>

</html>
