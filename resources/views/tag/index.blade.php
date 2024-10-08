<x-layout title="Tag">
  <header class="col-span-full">
    <h1>Tags</h1>
    <p>Kelola semua tag gitar di sini.</p>
  </header>
  <form
    hx-post="{{ route('tags.store') }}"
    hx-swap="afterbegin"
    hx-target="#list"
    class="form-control col-span-6 gap-4 p-4 shadow-lg md:col-span-2"
  >
    @csrf

    <label for="name">Nama</label>
    <input
      type="text"
      class="input input-bordered"
      placeholder="nama"
      name="name"
      required
    />

    <button type="submit" class="btn btn-primary">Tambah tag baru</button>
  </form>

  <div class="col-span-6 md:col-span-4">
    <table class="table table-zebra">
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
