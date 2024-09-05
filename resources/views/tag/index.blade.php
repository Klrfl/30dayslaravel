<x-layout title="Tag">
    <header class="col-span-6 md:col-span-2">
        <h1>Tags</h1>
        <p>Kelola semua tag gitar di sini.</p>

        <form hx-post="{{ route('tags.store') }}" hx-swap="afterbegin" hx-target="#list" class="bg-slate-200 p-4 flex flex-col gap-4">
            @csrf

            <label for="name">Nama</label>
            <input type="text" class="form-control" placeholder="nama" name="name" required>

            <button type="submit" class="py-2 px-4 outline outline-blue-500">Tambah tag baru</button>
        </form>
    </header>

    <div class="col-span-6 md:col-span-4">
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
</x-layout>
