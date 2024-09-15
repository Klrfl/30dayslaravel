<dialog
  @if ($open)
      x-data="{ dialogIsVisible: true }"
      open
  @else
      x-data="{ dialogIsVisible: false }"
  @endif
  class="modal backdrop-blur-sm backdrop-brightness-50"
  x-show="dialogIsVisible"
  x-dialog="dialogIsVisible = false"
  @click.self="dialogIsVisible = false"
  id="dialog"
>
  <form
    hx-put="{{ route("guitars.update", $guitar->id) }}"
    class="dark:bg-base modal-box flex flex-col gap-2"
    hx-target="#guitar-{{ $guitar->id }}"
    hx-swap="outerHTML"
  >
    @csrf
    <header class="mb-6 flex items-center justify-between gap-4">
      <h2>Edit gitar</h2>

      <button
        @click="dialogIsVisible = false"
        type="button"
        class="btn btn-outline btn-primary self-end"
      >
        Close
      </button>
    </header>

    {{ $errors }}
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
