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

                <!-- Publikasi -->
                <div class="card">
                    @include('layouts.navbar')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">F. Publikasi</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/user/daftar-riwayat-hidup/publikasi/create" class="btn btn-primary"><i
                                        class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-1">Jenis</th>
                                        <th class="col-lg-2">Judul</th>
                                        <th class="col-lg-1">Kegiatan</th>
                                        <th class="col-lg-1">Tahun</th>
                                        <th class="col-lg-2">Link</th>
                                        <th class="col-lg-1">PDF</th>
                                        <th class="col-lg-1">Identifier</th>
                                        <th class="col-lg-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publikasi as $publikasi)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $publikasi->jenispublikasi->nama }}</td>
                                            <td>{{ $publikasi->judul }}</td>
                                            <td>{{ $publikasi->kegiatan }}</td>
                                            <td>{{ $publikasi->tahun }}</td>
                                            <td><a href="{{ $publikasi->link }}">{{ $publikasi->link }}</a></td>
                                            <td>
                                                @if ($publikasi->pdf)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
                                                @endif
                                            </td>
                                            <td>{{ $publikasi->identifier->nama }}</td>
                                            <td>
                                                <a href="/user/daftar-riwayat-hidup/publikasi/{{ $publikasi->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $publikasi->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $publikasi->id }}" tabindex="-1"
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
                                                                    action="/user/daftar-riwayat-hidup/publikasi/{{ $publikasi->id }}"
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
                <!-- End Publikasi -->


            </div>
        </div>
    </section>
@endsection
