@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Daftar Riwayat Hidup</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Personal -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">A. Personal</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless" width="100%" cellspacing="0">
                                <tbody>
                                    @foreach ($identity as $identitas)
                                        <tr>
                                            <th class="col-lg-3 col-md-4">Nama</th>
                                            <td class="col-lg-9 col-md-8">: {{ $identitas->user->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td>: {{ $identitas->departemen->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td>: {{ $identitas->jabatan->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>NIP/NIK</th>
                                            <td>: {{ $identitas->nik }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <td>: {{ $identitas->tanggal_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th>NPWP</th>
                                            <td>: {{ $identitas->npwp }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Rekening Bank</th>
                                            <td>: {{ $identitas->rekening }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Handphone</th>
                                            <td>: {{ $identitas->hp }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>: {{ $identitas->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal dan Tahun Bekerja</th>
                                            <td>: {{ $identitas->tahun_bekerja }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>
                <!-- End Personal -->

                <!-- Susunan Keluarga -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">B. Susunan Keluarga</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-1">Keterangan</th>
                                        <th class="col-lg-2">Nama</th>
                                        <th class="col-lg-3">Tempat, Tanggal Lahir</th>
                                        <th class="col-lg-1">L/P</th>
                                        <th class="col-lg-2">Pendidikan</th>
                                        <th class="col-lg-2">Pekerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluarga as $keluarga)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $keluarga->keterangan }}</td>
                                            <td>{{ $keluarga->nama }}</td>
                                            <td>{{ $keluarga->tanggal_lahir }}</td>
                                            <td>{{ $keluarga->jenis_kelamin }}</td>
                                            <td>{{ $keluarga->pendidikan }}</td>
                                            <td>{{ $keluarga->pekerjaan }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
                <!-- End Susunan Keluarga -->

                <!-- Pendidikan -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">C. Pendidikan</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-4">Nama Sekolah/Perguruan</th>
                                        <th class="col-lg-4">Jenjang Pendidikan/Jurusan</th>
                                        <th class="col-lg-2">Tahun Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendidikan as $pendidikan)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendidikan->nama_instansi }}</td>
                                            <td>{{ $pendidikan->jurusan }}</td>
                                            <td>{{ $pendidikan->tahun_lulus }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
                <!-- End Pendidikan -->

                <!-- Pengalaman Kerja -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">D. Pengalaman Kerja</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-3">Jabatan</th>
                                        <th class="col-lg-4">Nama Perusahaan</th>
                                        <th class="col-lg-3">Periode Bekerja</th>
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

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
                <!-- End Pengalaman Kerja -->

                <!-- Pelatihan -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">E. Pelatihan/Seminar</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-1">Jenis</th>
                                        <th class="col-lg-2">Kegiatan & Tempat</th>
                                        <th class="col-lg-3">Tanggal Kegiatan</th>
                                        <th class="col-lg-2">Penyelenggara</th>
                                        <th class="col-lg-1">Peran</th>
                                        <th class="col-lg-1">PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelatihan as $pelatihan)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelatihan->jenispelatihan->nama }}</td>
                                            <td>{{ $pelatihan->nama_kegiatan }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pelatihan->tanggal_mulai)->format('d-m-Y') }} -
                                                {{ \Carbon\Carbon::parse($pelatihan->tanggal_selesai)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $pelatihan->penyelenggara }}</td>
                                            <td>{{ $pelatihan->peranpelatihan->nama }}</td>
                                            <td>
                                                @if ($pelatihan->pdf)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
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
                <!-- End Pelatihan -->

                <!-- Publikasi -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">F. Publikasi</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-1">Jenis</th>
                                        <th class="col-lg-3">Judul</th>
                                        <th class="col-lg-2">Acara</th>
                                        <th class="col-lg-1">Tahun</th>
                                        <th class="col-lg-2">Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publikasi as $publikasi)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $publikasi->jenispublikasi->nama }}</td>
                                            <td>{{ $publikasi->judul }}</td>
                                            <td>{{ $publikasi->acara }}</td>
                                            <td>{{ $publikasi->tahun }}</td>
                                            <td><a href="{{ $publikasi->link }}">{{ $publikasi->link }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
                <!-- End Publikasi -->

                <!-- Penghargaan -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">G. Penghargaan</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-9">Nama Penghargaan</th>
                                        <th class="col-lg-1">PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penghargaan as $penghargaan)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penghargaan->nama }}</td>
                                            <td>
                                                @if ($penghargaan->pdf)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
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
                <!-- End Penghargaan -->

            </div>
        </div>
    </section>
@endsection
