<x-layout>
  <header class="col-span-full md:col-span-4 md:col-start-2">
    <h1 class="mb-4">Edit gitar</h1>

    @if ($errors->any())
      <ul class="rounded-lg p-4 text-red-500 dark:bg-slate-800">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
  </header>

  <form
    action="{{ route('guitars.update', $guitar->id) }}"
    method="post"
    class="dark:bg-base col-span-full flex flex-col gap-2 md:col-span-4 md:col-start-2"
  >
    @csrf
    @method('PUT')

    <label for="name" class="label flex-wrap gap-4">
      <span class="label-text basis-16">Nama</span>
      <input
        class="input flex-1 border-2 border-b-gray-700"
        type="text"
        name="name"
        id="name"
        value="{{ $guitar->name }}"
        placeholder="name"
      />
    </label>

    <label for="model" class="label flex-wrap gap-4">
      <span class="label-text basis-16">Model</span>

      <input
        class="input flex-1 border-2 border-b-gray-700 transition-colors"
        type="text"
        name="model"
        id="model"
        value="{{ $guitar->model }}"
        placeholder="model"
        required
      />
    </label>

    <label for="category" class="label flex-wrap justify-start gap-4">
      <span class="label-text basis-16">Kategori</span>
      <select
        name="category_id"
        id="category"
        class="select border-2 border-b-gray-700"
        required
      >
        <option value="" disabled selected>Pilih satu</option>
        @foreach ($categories as $category)
          @if ($category->id == $guitar->category->id)
            <option value="{{ $category->id }}" selected>
              {{ $category->name }}
            </option>
          @else
            <option value="{{ $category->id }}">
              {{ $category->name }}
            </option>
          @endif
        @endforeach
      </select>
    </label>

    <label for="description " class="label flex-wrap gap-4">
      <span class="label-text basis-16">Deskripsi</span>

      <input
        class="input flex-1 border-2 border-b-gray-700"
        type="text"
        name="description"
        value="{{ $guitar->description }}"
        placeholder="description"
        required
      />
    </label>

    <label for="price" class="label flex-wrap gap-4">
      <span class="label-text basis-16">Harga</span>

      <input
        class="input flex-1 border-2 border-b-gray-700"
        type="text"
        name="price"
        value="{{ $guitar->price }}"
        placeholder="price"
        required
      />
    </label>

    @foreach ($tags as $tag)
      <span class="flex gap-2">
        <input
          type="checkbox"
          name="tag[]"
          id="tag-{{ $tag->id }}"
          value="{{ $tag->id }}"
          @checked(in_array($tag->id, $currentTags))
        />
        <label for="tag-{{ $tag->id }}">
          {{ $tag->name }}
        </label>
      </span>
    @endforeach

    <div class="modal-action">
      <button type="submit" class="btn btn-primary">Edit</button>
    </div>
  </form>
</x-layout>
