<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Edit Tag | GitarDB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    <main class="mx-auto flex max-w-xl flex-col gap-4 px-4">
      <header>
        <h1>Edit tag</h1>
        <a href="{{ route('tags.index') }}">Kembali</a>
      </header>

      <form
        action="{{ route('tags.update', $tag->id) }}"
        class="flex flex-col gap-4 p-2 shadow-md"
        method="POST"
      >
        @csrf
        @method('PUT')

        <label for="name">Nama</label>

        <input
          type="text"
          name="name"
          placeholder="nama"
          class="input"
          value="{{ old('name', $tag->name) }}"
          required
        />

        <button type="submit" class="btn text-gray-100 ring ring-primary">
          Edit
        </button>

        <button
          type="button"
          hx-confirm="are you sure?"
          hx-delete="{{ route('tags.destroy', $tag->id) }}"
          hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
          class="btn ring ring-red-400 hover:bg-red-400 hover:text-white"
        >
          Hapus
        </button>
      </form>

      <section>
        <h2 class="text-lg">
          Gitar dengan tag
          <span class="font-bold">{{ $tag->name }}</span>
        </h2>

        <table class="w-full">
          @if (sizeof($tag->guitars) == 0)
            <li>belum ada gitar dengan tag ini.</li>
          @endif

          @foreach ($tag->guitars as $guitar)
            <x-guitar :guitar="$guitar" />
          @endforeach
        </table>
      </section>

      <div id="dialog"></div>
    </main>
  </body>
</html>
