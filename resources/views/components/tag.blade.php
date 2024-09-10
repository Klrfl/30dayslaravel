<tr>
  <td class="px-3 py-2">{{ $tag->name }}</td>
  <td class="px-3 py-2">
    <a
      href="{{ route('tags.edit', $tag->id) }}"
      class="btn btn-outline btn-primary btn-sm"
    >
      Edit
    </a>
  </td>
</tr>
