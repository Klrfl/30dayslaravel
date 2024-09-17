<dialog
  @if ($open)
      x-data="{ dialogIsVisible: true }"
      open
  @else
      x-data="{ dialogIsVisible: false }"
  @endif
  class="modal modal-bottom backdrop-blur-sm backdrop-brightness-50 sm:modal-middle"
  x-show="dialogIsVisible"
  x-dialog="dialogIsVisible = false"
  @click.self="dialogIsVisible = false"
  id="dialog"
>
  <form
    hx-post="{{ route("guitars.update", $guitar->id) }}"
    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
    class="dark:bg-base form-control modal-box gap-2 md:grid md:min-w-[80ch] md:grid-cols-2"
    hx-target="#guitar-{{ $guitar->id }}"
    hx-swap="outerHTML"
    enctype="multipart/form-data"
  >
    @method("PUT")
    <header
      class="mb-6 flex items-center justify-between gap-4 md:col-span-full"
    >
      <h2>Edit gitar</h2>

      <button
        @click="dialogIsVisible = false"
        type="button"
        class="btn btn-outline btn-primary self-end"
      >
        Close
      </button>
    </header>

    @if (sizeof($errors) != 0)
      <ul class="md:col-span-full">
        @foreach ($errors as $error)
          <li class="block text-sm text-red-500">
            {{ $error[0] }}
          </li>
        @endforeach
      </ul>
    @endif

    <figure
      class="flex flex-col gap-2 md:row-span-8"
      x-data="{ previewUrl: '{{ asset("storage/" . $guitar->image) }}' }"
    >
      <img
        :src="previewUrl"
        alt=""
        class="aspect-video h-64 w-full rounded-lg object-cover"
      />
      <input
        type="file"
        name="image"
        id="image"
        class="file-input file-input-bordered"
        @change="previewUrl = URL.createObjectURL($event.target.files[0])"
      />
    </figure>

    <input
      class="input input-bordered"
      type="text"
      name="name"
      value="{{ $guitar->name }}"
      placeholder="name"
    />
    <input
      class="input input-bordered"
      type="text"
      name="model"
      value="{{ $guitar->model }}"
      placeholder="model"
    />
    <select name="category_id" id="category" class="select select-bordered">
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
    <input
      class="input input-bordered"
      type="text"
      name="description"
      value="{{ $guitar->description }}"
      placeholder="description"
    />
    <input
      class="input input-bordered"
      type="text"
      name="price"
      value="{{ $guitar->price }}"
      placeholder="price"
    />

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
</dialog>
