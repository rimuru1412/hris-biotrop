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

                <!-- Keluarga -->
                <div class="card">
                    @include('layouts.navbar')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">B. Susunan Keluarga</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/user/daftar-riwayat-hidup/keluarga/create" class="btn btn-primary"><i
                                        class="fa-solid fa-plus"></i></a>

                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-1">Keterangan</th>
                                        <th class="col-lg-2">Nama</th>
                                        <th class="col-lg-2">TTL</th>
                                        <th class="col-lg-1">L/P</th>
                                        <th class="col-lg-2">Pendidikan</th>
                                        <th class="col-lg-2">Pekerjaan</th>
                                        <th class="col-lg-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluarga as $keluarga)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $keluarga->keterangankeluarga->nama }}</td>
                                            <td>{{ $keluarga->nama }}</td>
                                            <td>{{ $keluarga->tempat_lahir }},
                                                {{ \Carbon\Carbon::parse($keluarga->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td>{{ $keluarga->jenis_kelamin }}</td>
                                            <td>{{ $keluarga->jenjangpendidikan->nama }}</td>
                                            <td>{{ $keluarga->pekerjaan }}</td>
                                            <td>
                                                <a href="/user/daftar-riwayat-hidup/keluarga/{{ $keluarga->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $keluarga->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $keluarga->id }}" tabindex="-1"
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
                                                                    action="/user/daftar-riwayat-hidup/keluarga/{{ $keluarga->id }}"
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
                <!-- End Keluarga -->


            </div>
        </div>



    </section>
@endsection
