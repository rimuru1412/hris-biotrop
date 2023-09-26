@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Data Pegawai</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pegawai</h5>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Jabatan</th>
                                        <th>NIP/NIK</th>
                                        <th>TTL</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($identity as $biodata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $biodata->user->nama }}</td>
                                            <td>{{ $biodata->departemen->nama }}</td>
                                            <td>{{ $biodata->jabatan->nama }}</td>
                                            <td>{{ $biodata->nik }}</td>
                                            <td>{{ $biodata->tanggal_lahir }}</td>
                                            <td>{{ $biodata->user->email }}</td>
                                            <td class="text-center">
                                                <a href="/admin/data-pegawai/detail/{{ $biodata->user->id }}"
                                                    class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
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
