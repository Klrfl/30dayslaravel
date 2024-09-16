<x-layout>
  <header class="col-span-full">
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
    class="col-span-full flex flex-col gap-4 rounded-lg p-4 lg:grid lg:grid-cols-2 dark:bg-gray-700/20"
    enctype="multipart/form-data"
  >
    @csrf
    @method('PUT')

    <label for="image" class="label flex-wrap gap-4 self-start md:row-span-8">
      <span class="label-text">Gambar</span>

      <figure
        class="flex w-full flex-col gap-2"
        x-data="{
          previewUrl: '{{ asset('storage/' . $guitar->image) }}',
        }"
      >
        <img
          class="image mx-auto aspect-video w-full object-cover"
          height="400"
          alt="{{ $guitar->name }}"
          :src="previewUrl"
        />

        <input
          type="file"
          class="file-input file-input-bordered"
          name="image"
          @change="previewUrl = URL.createObjectURL($event.target.files[0])"
          accept="image/*"
        />
      </figure>
    </label>

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
