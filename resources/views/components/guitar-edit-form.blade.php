<dialog
  @if ($open)
      x-data="{ dialogIsVisible: true }"
      open
  @else
      x-data="{ dialogIsVisible: false }"
  @endif
  class="fixed inset-0 m-0 grid size-full place-items-center p-4 open:bg-slate-200/90 open:backdrop-blur-xl"
  x-show="dialogIsVisible"
  x-dialog="dialogIsVisible = false"
  @click.self="dialogIsVisible = false"
  id="dialog"
>
  <form
    hx-put="{{ route("guitars.update", $guitar->id) }}"
    class="container flex flex-col gap-2 bg-slate-200 p-4 md:max-w-screen-sm"
    hx-target="#guitar-{{ $guitar->id }}"
    hx-swap="outerHTML"
  >
    @csrf
    <button
      @click="dialogIsVisible = false"
      type="button"
      class="btn self-end ring-2 ring-blue-500"
    >
      Close
    </button>

    <input
      class="form-control"
      type="text"
      name="name"
      value="{{ $guitar->name }}"
      placeholder="name"
      required
    />
    <input
      class="form-control"
      type="text"
      name="model"
      value="{{ $guitar->model }}"
      placeholder="model"
      required
    />
    <select name="category_id" id="category" class="form-control" required>
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
      class="form-control"
      type="text"
      name="description"
      value="{{ $guitar->description }}"
      placeholder="description"
      required
    />
    <input
      class="form-control"
      type="text"
      name="price"
      value="{{ $guitar->price }}"
      placeholder="price"
      required
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

    <button
      type="submit"
      class="btn bg-blue-500 text-white"
      @click="dialogIsVisible = false"
    >
      Edit
    </button>
  </form>
</dialog>
