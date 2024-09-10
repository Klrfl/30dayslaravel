<x-layout title="Edit tag">
  <header class="col-span-full">
    <h1>Edit tag</h1>
    <a href="{{ route('tags.index') }}">Kembali</a>
  </header>

  <form
    action="{{ route('tags.update', $tag->id) }}"
    class="form-control col-span-full gap-4 rounded-lg p-8 shadow-md outline outline-1 outline-slate-700 md:col-span-2"
    method="POST"
  >
    @csrf
    @method('PUT')

    <label for="name">Nama</label>

    <input
      type="text"
      name="name"
      placeholder="nama"
      class="input input-bordered"
      value="{{ old('name', $tag->name) }}"
      required
    />

    <button type="submit" class="btn btn-outline btn-primary">Edit</button>

    <button
      type="button"
      hx-confirm="are you sure?"
      hx-delete="{{ route('tags.destroy', $tag->id) }}"
      hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
      class="btn btn-outline btn-error"
    >
      Hapus
    </button>
  </form>

  <section class="col-span-full md:col-span-4">
    <h2>
      Gitar dengan tag
      <span class="block text-xl font-bold">{{ $tag->name }}</span>
    </h2>

    @if (sizeof($tag->guitars) == 0)
      <span class="text-sm dark:text-gray-500">
        belum ada gitar dengan tag ini.
      </span>
    @endif

    <table class="table table-zebra">
      @foreach ($tag->guitars as $guitar)
        <x-guitar :guitar="$guitar" />
      @endforeach
    </table>
  </section>

  <div id="dialog"></div>
</x-layout>
