<dialog
    @if ($open) x-data="{ dialogIsVisible: true }"
        open
    @else
        x-data="{dialogIsVisible: false}" @endif
    class="p-4 fixed inset-0 m-0 size-full open:bg-slate-200/90 open:backdrop-blur-xl grid place-items-center"
    x-show="dialogIsVisible" x-dialog="dialogIsVisible = false" @click.self="dialogIsVisible = false" id="dialog">
    <form hx-post="{{ route('guitars.update', $guitar->id) }}" class="min-w-max max-w-full bg-slate-200 p-4"
        hx-target="#guitar-{{ $guitar->id }}" hx-swap="outerHTML">
        @csrf
        <button @click="dialogIsVisible = false" type="button">Close</button>

        <input class="form-control" type="text" name="name" value="{{ $guitar->name }}" placeholder="name"
            required>
        <input class="form-control" type="text" name="model" value="{{ $guitar->model }}" placeholder="model"
            required>
        <input class="form-control" type="text" name="type" value="{{ $guitar->type }}" placeholder="type"
            required>
        <input class="form-control" type="text" name="description" value="{{ $guitar->description }}"
            placeholder="description" required>
        <input class="form-control" type="text" name="price" value="{{ $guitar->price }}" placeholder="price"
            required>

        <button type="submit" class="bg-blue-500 text-white btn" @click="dialogIsVisible = false">
            Edit
        </button>
    </form>
</dialog>
