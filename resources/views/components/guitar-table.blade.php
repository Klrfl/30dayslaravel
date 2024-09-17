<div
  class="col-span-6 flex flex-col overflow-auto rounded-lg bg-gray-700/20 p-4 md:col-span-4 md:row-span-2"
  id="table-container"
>
  <table
    class="table table-zebra"
    hx-target="closest tr"
    hx-swap="outerHTML swap:500ms"
  >
    <thead>
      <tr class="text-left">
        <th class="p-2">Nama</th>
        <th class="p-2">Model</th>
        <th class="p-2">Kategori</th>
        <th class="p-2">Harga</th>
        <th class="p-2 text-right">Aksi</th>
      </tr>
    </thead>

    <tbody id="list">
      @if (sizeof($guitars) == 0)
        <tr>
          <td>Tidak ada gitar di sini.</td>
        </tr>
      @endif

      @foreach ($guitars as $guitar)
        <x-guitar :guitar="$guitar" />
      @endforeach
    </tbody>
  </table>

  <nav
    class="mt-auto py-4"
    hx-boost="true"
    hx-target="#table-container"
    hx-swap="outerHTML"
  >
    {{ $guitars->links('vendor.pagination.tailwind') }}
  </nav>
</div>
