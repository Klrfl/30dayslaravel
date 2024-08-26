<li class="px-4 flex justify-between items-center gap-4 even:bg-slate-100">
    <span class="">{{ $guitar->name }}</span>
    <span>{{ $guitar->model }}</span>
    <span>{{ $guitar->type }}</span>
    <span class="font-semibold">{{ $guitar->price }}</span>
    <button class="ml-auto ring-2 ring-red-300 btn" hx-confirm="apakah anda benar-benar ingin menghapus?"
        hx-delete="{{ route('guitars.destroy', $guitar->id) }}" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>
        delete
    </button>
    <button class="ring-2 ring-blue-300 btn" @click="dialogIsVisible = true"
        hx-get="{{ route('guitars.edit', $guitar->id) }}" hx-target="#dialog" hx-swap="outerHTML">
        Edit
    </button>
</li>
