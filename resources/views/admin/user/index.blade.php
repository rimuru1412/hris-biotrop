@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Akun Pegawai</h1>
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
                        <h5 class="card-title">Akun Pegawai</h5>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
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
                                                <a href="/admin/user/{{ $akun->id }}/edit" class="btn btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $akun->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $akun->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
