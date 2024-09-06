<x-layout title="Tag">
  <header class="col-span-6 md:col-span-2">
    <h1>Tags</h1>
    <p>Kelola semua tag gitar di sini.</p>

    <form
      hx-post="{{ route('tags.store') }}"
      hx-swap="afterbegin"
      hx-target="#list"
      class="form-control gap-4 p-4 shadow-lg"
    >
      @csrf

      <label for="name">Nama</label>
      <input type="text" class="input input-bordered" placeholder="nama" name="name" required />

      <button type="submit" class="btn ring ring-blue-500">Tambah tag baru</button>
    </form>
  </header>

  <div class="col-span-6 md:col-span-4">
    <table class="w-full">
      <thead>
        <th class="px-3 text-left">Nama</th>
        <th class="px-3 text-left">Aksi</th>
      </thead>

      <tbody id="list">
        @foreach ($tags as $tag)
          <x-tag :tag="$tag" :iteration="$loop->iteration" />
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>
