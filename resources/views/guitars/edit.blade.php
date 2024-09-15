<x-layout>
  <header class="col-span-full md:col-span-4 md:col-start-2">
    <h1>Edit gitar</h1>
  </header>

  <form
    action="{{ route('guitars.update', $guitar->id) }}"
    method="post"
    class="dark:bg-base col-span-full flex flex-col gap-2 md:col-span-4 md:col-start-2"
  >
    @csrf
    @method('PUT')

    <input
      class="input input-bordered"
      type="text"
      name="name"
      value="{{ $guitar->name }}"
      placeholder="name"
      required
    />
    <input
      class="input input-bordered"
      type="text"
      name="model"
      value="{{ $guitar->model }}"
      placeholder="model"
      required
    />
    <select
      name="category_id"
      id="category"
      class="select select-bordered"
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
    <input
      class="input input-bordered"
      type="text"
      name="description"
      value="{{ $guitar->description }}"
      placeholder="description"
      required
    />
    <input
      class="input input-bordered"
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

    <div class="modal-action">
      <button type="submit" class="btn btn-primary">Edit</button>
    </div>
  </form>
</x-layout>
