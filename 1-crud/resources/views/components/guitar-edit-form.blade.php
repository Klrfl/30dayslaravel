<dialog
    @if ($open) x-data="{ dialogIsVisible: true }"
@else
x-data="{dialogIsVisible: false}" @endif
    class="min-w-96 p-4 fixed inset-0 open:bg-red-100/80 backdrop:blur-2xl" x-show="dialogIsVisible"
    x-dialog="dialogIsVisible = false" id="dialog" @if ($open) open @endif>
    <form hx-post="{{ route('guitars.update', $guitar->id) }}">
        <button @click="dialogIsVisible = false">Close</button>
        @csrf
        <input class="form-control" type="text" name="name" value="{{ $guitar->name }}" placeholder="name" required>
        <input class="form-control" type="text" name="model" value="{{ $guitar->model }}" placeholder="model"
            required>
        <input class="form-control" type="text" name="type" value="{{ $guitar->type }}" placeholder="type"
            required>
        <input class="form-control" type="text" name="description" value="{{ $guitar->description }}"
            placeholder="description" required>
        <input class="form-control" type="text" name="price" value="{{ $guitar->price }}" placeholder="price"
            required>

        <button type="submit" class="bg-blue-500 text-white btn">
            Edit
        </button>
    </form>
</dialog>
