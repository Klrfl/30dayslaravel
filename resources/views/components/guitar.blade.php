<tr id="guitar-{{ $guitar->id }}">
  <td class="p-2">{{ $guitar->name }}</td>
  <td class="p-2">{{ $guitar->model }}</td>
  <td class="p-2">{{ $guitar->category->name }}</td>
  <td class="p-2 font-semibold">{{ $guitar->price }}</td>
  <td class="flex justify-end gap-2 p-2 text-right">
    <button
      class="btn btn-sm ring-1 ring-red-300"
      hx-confirm="apakah anda benar-benar ingin menghapus?"
      hx-delete="{{ route('guitars.destroy', $guitar->id) }}"
      hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
    >
      delete
    </button>
    <button
    <a
      href="{{ route('guitars.edit', $guitar->id) }}"
      hx-get="{{ route('guitars.edit', $guitar->id) }}"
      hx-push-url="true"
      class="btn btn-sm ring-1 ring-primary"
      @click="dialogIsVisible = true"
      hx-target="#dialog"
      hx-swap="outerHTML"
    >
      Edit
    </a>
  </td>
</tr>
