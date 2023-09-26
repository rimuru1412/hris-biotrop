@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Persetujuan Cuti</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Personal -->
                @foreach ($cuti as $cuti)
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">I. Data Pegawai</h5>

                            <!-- Table -->
                            <div class="table-responsive">
                                <div class="col-lg-8">
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th class="col-lg-2">Nama</th>
                                                <td class="col-lg-6">{{ $cuti->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td>{{ $cuti->jabatan->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Unit Kerja</th>
                                                <td>{{ $cuti->departemen->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIP/NIK</th>
                                                <td>{{ $cuti->nik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Masa Kerja</th>
                                                <td>{{ $cuti->tahun_bekerja }}</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <h5 class="card-title">II. Jenis Cuti yang Diambil</h5>
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th class="col-lg-2">Jenis Cuti</th>
                                                <td class="col-lg-6">{{ $cuti->jeniscuti->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alasan Cuti</th>
                                                <td>{{ $cuti->alasan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h5 class="card-title">III. Lamanya Cuti</h5>
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th class="col-lg-2">Tanggal</th>
                                                <td class="col-lg-6">
                                                    {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }} -
                                                    {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Selama</th>
                                                <td>{{ $cuti->selisih }} hari</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h5 class="card-title">IV. Alamat Selama Menjalankan Cuti</h5>
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th class="col-lg-2">Alamat</th>
                                                <td class="col-lg-6">{{ $cuti->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Telepon</th>
                                                <td>{{ $cuti->telepon }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <a href="/user/persetujuan-cuti/setujui_cuti/{{ $cuti->id }}"
                                        class="btn btn-success me-2">Setujui</a>
                                    <a href="/user/persetujuan-cuti/tolak_cuti/{{ $cuti->id }}" class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin?')">Tidak Disetujui</a>

                                </div>
                            </div>
                            <!-- End Table -->

                        </div>
                    </div>
                @endforeach
                <!-- End Personal -->


            </div>
        </div>
    </section>
@endsection
