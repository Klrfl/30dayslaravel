<tr class="even:bg-slate-200 dark:even:bg-slate-800">
    <td class="py-2 px-3">{{ $tag->name }}</td>
    <td class="py-2 px-3">
        <a href="{{ route('tags.edit', $tag->id) }}"
            class="btn btn-sm ring ring-blue-500 hover:bg-blue-500 hover:text-gray-200">
            Edit
        </a>
    </td>
</tr>
