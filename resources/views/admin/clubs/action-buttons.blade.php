<a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('clubs.destroy', $club->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
