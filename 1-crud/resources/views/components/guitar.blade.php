<tr class="even:bg-slate-100">
    <td>{{ $guitar->name }}</td>
    <td>{{ $guitar->model }}</td>
    <td>{{ $guitar->type }}</td>
    <td class="font-semibold">{{ $guitar->price }}</td>
    <td class="text-right flex gap-2 justify-end">
        <button class="ring-2 ring-red-300 btn" hx-confirm="apakah anda benar-benar ingin menghapus?"
            hx-delete="{{ route('guitars.destroy', $guitar->id) }}" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>
            delete
        </button>
        <button class="ring-2 ring-blue-300 btn" @click="dialogIsVisible = true"
            hx-get="{{ route('guitars.edit', $guitar->id) }}" hx-target="#dialog" hx-swap="outerHTML">
            Edit
        </button>
    </td>
</tr>
