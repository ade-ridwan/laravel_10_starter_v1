@extends('layouts.dashboard.app')

@section('title', 'Jurusan')

@section('breadcrumb')
    <x-dashboard.breadcrumb title="Jurusan" page="Jurusan" active="jurusans" route="{{ route('jurusan.index') }}" />
@endsection

@section('content')
    <div class="card card-height-100 table-responsive">
        <!-- cardheader -->
        <div class="card-header border-bottom-dashed align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">jurusan</h4>
            <div class="flex-shrink-0">
                <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal-form-add-jurusan">
                    <i class="ri-add-line"></i>
                    Add
                </button>
            </div>
        </div>
        <!-- end cardheader -->
        <!-- Hoverable Rows -->

        @if (session('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        <table class="table table-hover table-nowrap mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Jurusan</th>
                    <th scope="col">Kode Jurusan</th>
                    <th scope="col" class="col-1"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jurusans as $jurusan)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $jurusan->jurusan }}</td>
                        <td>{{ $jurusan->kode_jurusan }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-form-edit-jurusan-{{ $jurusan->id }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('modal-form-delete-jurusan-{{ $jurusan->id }}').submit()">
                                            Delete
                                        </a>
                                    </li>
                                </ul>

                                @include('components.form.modal.jurusan.edit')
                                @include('components.form.modal.jurusan.delete')
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="5" class="text-center">No data to display</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="card-footer py-4">
            <nav aria-label="..." class="pagination justify-content-end">
                {{ $jurusans->links() }}
            </nav>
        </div>
    </div>

    @include('components.form.modal.jurusan.add')
@endsection
