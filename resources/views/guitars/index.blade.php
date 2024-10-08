<x-layout title="Gitar">
  <header class="col-span-full">
    <h1>GitarDB</h1>
    <p class="my-2 leading-relaxed">Kumpulan gitar</p>
  </header>

  <form
    hx-post="{{ route('guitars.store') }}"
    hx-target="#list"
    hx-swap="afterbegin"
    class="form-control col-span-6 h-max gap-2 rounded-lg p-4 shadow-md md:sticky md:top-0 md:col-span-2 md:row-span-2"
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

  <form
    class="col-span-4 flex gap-2 rounded-lg bg-gray-700/20 p-4"
    hx-get="{{
      route('guitars.index', [
        'query' => request('query'),
        'category_id' => request('category_id'),
        'tag_id' => request('tag_id'),
      ])
    }}"
    hx-target="#table-container"
    hx-swap="outerHTML"
    hx-push-url="true"
  >
    <input
      type="search"
      placeholder="cari gitar..."
      value="{{ old('query') }}"
      name="query"
      id="query"
      class="input input-bordered"
    />

    <select name="category_id" class="select select-bordered">
      <option value="" selected>Pilih kategori</option>

      @foreach ($categories as $category)
        <option
          value="{{ $category->id }}"
          @selected(old('category_id') == $category->id)
        >
          {{ $category->name }}
        </option>
      @endforeach
    </select>

    <select name="tag_id" id="tag" class="select select-bordered">
      <option value="" selected>pilih tag</option>

      @foreach ($tags as $tag)
        <option value="{{ $tag->id }}" @selected(old('tag_id' == $tag->id))>
          {{ $tag->name }}
        </option>
      @endforeach
    </select>

    <button class="btn btn-outline btn-primary ml-auto">Cari gitar</button>
  </form>

  <x-guitar-table :guitars="$guitars" />

  <!-- this element is for the initial swap -->
  <div id="dialog"></div>
</x-layout>
