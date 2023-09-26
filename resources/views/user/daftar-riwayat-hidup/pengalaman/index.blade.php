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

                <!-- Pengalaman Kerja -->
                <div class="card">
                    @include('layouts.navbar')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">D. Pengalaman Kerja</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/user/daftar-riwayat-hidup/pengalaman/create" class="btn btn-primary"><i
                                        class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-1">Jabatan</th>
                                        <th class="col-lg-3">Nama Perusahaan</th>
                                        <th class="col-lg-3">Periode Bekerja</th>
                                        <th class="col-lg-3">Uraian Pekerjaan</th>
                                        <th class="col-lg-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengalaman as $pengalaman)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengalaman->jabatan }}</td>
                                            <td>{{ $pengalaman->nama_perusahaan }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengalaman->tanggal_masuk)->format('d-m-Y') }} -
                                                {{ \Carbon\Carbon::parse($pengalaman->tanggal_keluar)->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                @if ($pengalaman->uraian_pekerjaan)
                                                    {{ $pengalaman->uraian_pekerjaan }}
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/user/daftar-riwayat-hidup/pengalaman/{{ $pengalaman->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                    <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pengalaman->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $pengalaman->id }}" tabindex="-1"
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
                                                                    action="/user/daftar-riwayat-hidup/pengalaman/{{ $pengalaman->id }}"
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
                <!-- End Pengalaman Kerja -->
            </div>
        </div>
    </section>
@endsection
