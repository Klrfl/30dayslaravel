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
        <a href="{{ route('tags.index') }}">Kembali</a>

        <form action="{{ route('tags.update', $tag->id) }}" class="flex flex-col gap-4 p-4 bg-slate-200" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama</label>

            <input type="text" name="name" placeholder="nama" class="form-control"
                value="{{ old('name', $tag->name) }}" required>

            <button type="submit" class="py-2 px-3 bg-blue-500 text-gray-100">
                Edit
            </button>

            <button type="button" hx-confirm="are you sure?" hx-delete="{{ route('tags.destroy', $tag->id) }}"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                class="p-2 outline outline-red-400 hover:bg-red-400 hover:text-white">
                Hapus
            </button>
        </form>

        <table>
            @if (sizeof($tag->guitars) == 0)
                <li>belum ada gitar dengan tag ini.</li>
            @endif

            @foreach ($tag->guitars as $guitar)
                <x-guitar :guitar="$guitar" />
            @endforeach
        </table>

        <div id="dialog"></div>

    </main>
</body>

</html>
