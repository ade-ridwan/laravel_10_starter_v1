<!-- Modals add menu -->
<div id="modal-form-edit-jurusan-{{ $jurusan->id }}" class="modal fade" tabindex="-1"
    aria-labelledby="modal-form-edit-jurusan-{{ $jurusan->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('jurusan.update', $jurusan->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-edit-jurusan-{{ $jurusan->id }}-label">Edit jurusan
                        ({{ $jurusan->kode_jurusan }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" placeholder="Nama Jurusan"
                            name="jurusan" value="{{ $jurusan->jurusan }}">
                        <x-form.validation.error name="jurusan" />
                    </div>

                    <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                    <input type="kode_jurusan" class="form-control" id="kode_jurusan" placeholder="Kode Jurusan"
                        name="kode_jurusan" value="{{ $jurusan->kode_jurusan }}">
                    <x-form.validation.error name="kode_jurusan" />

                    {{-- <div class="mb-3">
                        <label for="role" class="form-label">Role Name</label>
                        <select class="form-control" id="role" name="role" data-choices data-choices-removeItem>
                            @foreach ($roles as $role)
                                <option @selected($jurusan->hasRole($role->name)) value="{{ $role->name }}">{{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-form.validation.error name="role" />
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
