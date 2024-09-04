<tr class="even:bg-slate-200">
    <td class="py-2 px-3">{{ $iteration }}</td>
    <td class="py-2 px-3">{{ $tag->name }}</td>
    <td class="py-2 px-3">
        <a href="{{ route('tags.edit', $tag->id) }}"
            class="p-1 px-2 outline outline-blue-500 hover:bg-blue-500 hover:text-gray-200">
            Edit
        </a>
    </td>
</tr>
