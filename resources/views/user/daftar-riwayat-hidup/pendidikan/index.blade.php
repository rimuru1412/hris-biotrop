@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Daftar Riwayat Hidup</h1>
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

                <!-- Pendidikan -->
                <div class="card">
                    @include('layouts.navbar')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">C. Pendidikan</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/user/daftar-riwayat-hidup/pendidikan/create" class="btn btn-primary"><i
                                        class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-4">Nama Sekolah/Perguruan</th>
                                        <th class="col-lg-2">Jenjang Pendidikan</th>
                                        <th class="col-lg-2">Jurusan</th>
                                        <th class="col-lg-2">Tahun Lulus</th>
                                        <th class="col-lg-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendidikan as $pendidikan)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendidikan->nama_instansi }}</td>
                                            <td>{{ $pendidikan->jenjangpendidikan->nama }}</td>
                                            <td>{{ $pendidikan->jurusan }}</td>
                                            <td>{{ $pendidikan->tahun_lulus }}</td>
                                            <td>
                                                <a href="/user/daftar-riwayat-hidup/pendidikan/{{ $pendidikan->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                    <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pendidikan->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $pendidikan->id }}" tabindex="-1"
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
                                                                Apakah Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <form
                                                                    action="/user/daftar-riwayat-hidup/pendidikan/{{ $pendidikan->id }}"
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
            <!-- End Pendidikan -->


        </div>
        </div>
    </section>
@endsection
