@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Data Cuti</h1>
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
                        <h5 class="card-title"></h5>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-borderless text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuti as $cuti)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cuti->nama }}</td>
                                            <td>{{ $cuti->jeniscuti->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }} -
                                                {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}
                                                ({{ $cuti->durasi }} hari)
                                            </td>
                                            <td>{{ $cuti->alasan }}</td>
                                            <td>{{ $cuti->status }} </td>
                                            <td>
                                                <a href="/admin/data-cuti/{{ $cuti->id }}/show" class="btn btn-sm"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                <a href="/admin/data-cuti/{{ $cuti->id }}/edit" class="btn btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $cuti->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $cuti->id }}" tabindex="-1"
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
                                                                <form action="/admin/data-cuti/delete/{{ $cuti->id }}"
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

                            <!-- button untuk menghapus semua data cuti -->
                            <button class="btn btn-lg" data-toggle="modal" data-target="#DeleteAllModal"><i
                                    class="fa-solid fa-eraser"></i></button>

                            <!-- modal delete button -->
                            <div class="modal fade" id="DeleteAllModal" tabindex="-1" role="dialog"
                                aria-labelledby="DeleteAllModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="DeleteAllModalLabel">Konfirmasi
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus semua data cuti?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/admin/data-cuti/delete-all" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end of button untuk menghapus semua data cuti -->

                            <a class="btn btn-lg" href="/admin/data-cuti/export/excel"><i
                                    class="fa-solid fa-download"></i></a>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
