@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Informasi Pegawai</h1>
    </div><!-- End Page Title -->

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert" id="AlertMessage">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pegawai</h5>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $akun)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $akun->nama }}</td>
                                            <td>{{ $akun->email }}</td>
                                            <td>{{ $akun->role }}</td>
                                            <td>
                                                @if ($akun->status == 1)
                                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#softdeleteModal{{ $akun->id }}">Aktif</button>

                                                    <!-- modal soft delete button -->
                                                    <div class="modal fade" id="softdeleteModal{{ $akun->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="softdeleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="softdeleteModalLabel">
                                                                        Konfirmasi
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin non-aktifkan akun ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <form
                                                                        action="/admin/user/softdelete/{{ $akun->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Ya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($akun->status == 0)
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#restoreModal{{ $akun->id }}">Tidak Aktif</button>

                                                    <!-- modal restore button -->
                                                    <div class="modal fade" id="restoreModal{{ $akun->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="restoreModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="restoreModalLabel">
                                                                        Konfirmasi
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin meng-aktifkan akun ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <form action="/admin/user/restore/{{ $akun->id }}"
                                                                        method="GET">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Ya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><a href="/admin/user/detail/{{ $akun->id }}" class="btn btn-sm"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                @if ($akun->status == 1)
                                                    <a href="/admin/user/{{ $akun->id }}/edit" class="btn btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>

                                                    <button class="btn btn-sm" data-toggle="modal"
                                                        data-target="#deleteModal{{ $akun->id }}"><i
                                                            class="fa-solid fa-trash-can"></i></button>

                                                    <!-- modal delete button -->
                                                    <div class="modal fade" id="deleteModal{{ $akun->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus akun ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <form action="/admin/user/{{ $akun->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($akun->status == 0)
                                                    <a href="" class="btn btn-sm disabled"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>

                                                    <button class="btn btn-sm disabled"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
