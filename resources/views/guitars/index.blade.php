<x-layout title="Gitar">
  <header class="col-span-full">
    <h1>GitarDB</h1>
    <p class="my-2 leading-relaxed">Kumpulan gitar</p>
  </header>
  <form
    hx-post="{{ route('guitars.store') }}"
    hx-target="#list"
    hx-swap="afterbegin"
    class="form-control col-span-6 h-max gap-2 rounded-lg p-4 shadow-md md:sticky md:top-0 md:col-span-2"
  >
    @csrf
    <label for="nama">Nama</label>
    <input
      type="text"
      id="nama"
      name="name"
      class="input input-bordered"
      placeholder="nama"
      required
    />

    <label for="model">Model</label>
    <input
      type="text"
      id="model"
      class="input input-bordered"
      name="model"
      placeholder="model"
      required
    />

    <label for="category_id">Kategori</label>
    <select
      name="category_id"
      id="category_id"
      id="category"
      class="select select-bordered"
    >
      <option value="" disabled selected>Pilih satu</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>

    <label for="description">deskripsi</label>
    <input
      type="text"
      id="description"
      class="input input-bordered"
      name="description"
      placeholder="deskripsi"
      required
    />

    <label for="price">harga</label>
    <input
      type="number"
      id="price"
      class="input input-bordered"
      name="price"
      min="0"
      placeholder="harga"
      required
    />

    <button class="btn outline outline-primary">Tambah gitar</button>
  </form>

  <x-guitar-table :guitars="$guitars" />

  <!-- this element is for the initial swap -->
  <div id="dialog"></div>
</x-layout>
