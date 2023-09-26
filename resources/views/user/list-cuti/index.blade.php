@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>List Cuti</h1>
    </div><!-- End Page Title -->

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
                                        <th class="col-lg-2">Jenis Cuti</th>
                                        <th>Tanggal</th>
                                        <th>Selama</th>
                                        <th class="col-lg-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuti as $cuti)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cuti->jeniscuti->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }} -
                                                {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}</td>
                                            <td>{{ $cuti->selisih }} hari</td>
                                            <td>{{ $cuti->status }}</td>
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
