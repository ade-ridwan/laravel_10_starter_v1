<form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="post"
    id="modal-form-delete-jurusan-{{ $jurusan->id }}">
    @csrf
    @method('DELETE')
</form>
