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

                <!-- Personal -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">A. Identitas</h5>
                        <div class="row">
                            @foreach ($identity as $identitas)
                                <div class="col-lg-8">
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table table-borderless" width="100%" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th class="col-lg-4 col-md-4">Nama</th>
                                                    <td class="col-lg-8 col-md-8">:
                                                        @if ($identitas->user)
                                                            {{ $identitas->user->nama }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
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
                                                    <td>: {{ $identitas->tempat_lahir }},
                                                        {{ \Carbon\Carbon::parse($identitas->tanggal_lahir)->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>: {{ $identitas->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>: {{ $identitas->statususer->nama }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Golongan</th>
                                                    <td>: {{ $identitas->golongan->nama }}</td>
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
                                                    <th>Email Perusahaan</th>
                                                    <td>:
                                                        @if ($identitas->user)
                                                            {{ $identitas->user->email }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Email Pribadi</th>
                                                    <td>: {{ $identitas->email_pribadi }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal dan Tahun Bekerja</th>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($identitas->tahun_bekerja)->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Aksi</th>
                                                    <td>: <a href="/admin/user/detail/identity/{{ $identitas->id }}/edit"
                                                            class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <!-- Table -->
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <img src="{{ asset('storage/' . $identitas->image) }}" class="img-fluid"
                                                    style="height:4cm;width:3cm">
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- End Table -->
                                </div>
                            @endforeach
                        </div>

                        <!-- Jika Data tidak ada -->
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>
                                            @if ($showCreateButton)
                                                <a href="/admin/user/detail/identity/{{ $user->id }}/create"
                                                    class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table -->
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Personal -->

                <!-- Susunan Keluarga -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">B. Susunan Keluarga</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/admin/user/detail/keluarga/{{ $user->id }}/create" class="btn btn-primary"><i
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
                                                <a href="/admin/user/detail/keluarga/{{ $keluarga->id }}/edit"
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
                                                                    action="/admin/user/detail/keluarga/{{ $keluarga->id }}"
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
                <!-- End Susunan Keluarga -->

                <!-- Pendidikan -->
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">C. Pendidikan</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/admin/user/detail/pendidikan/{{ $user->id }}/create"
                                    class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
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
                                                <a href="/admin/user/detail/pendidikan/{{ $pendidikan->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pendidikan->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $pendidikan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
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
                                                                    action="/admin/user/detail/pendidikan/{{ $pendidikan->id }}"
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
                <!-- End Pendidikan -->

                <!-- Pengalaman Kerja -->
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">D. Pengalaman Kerja</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/admin/user/detail/pengalaman/{{ $user->id }}/create"
                                    class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
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
                                                <a href="/admin/user/detail/pengalaman/{{ $pengalaman->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pengalaman->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $pengalaman->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
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
                                                                    action="/admin/user/detail/pengalaman/{{ $pengalaman->id }}"
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

                <!-- Pelatihan -->
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">E.Pelatihan/Seminar</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/admin/user/detail/pelatihan/{{ $user->id }}/create"
                                    class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>

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
                                        <th class="col-lg-1">Aksi</th>
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
                                            <td>
                                                <a href="/admin/user/detail/pelatihan/{{ $pelatihan->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pelatihan->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $pelatihan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
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
                                                                    action="/admin/user/detail/pelatihan/{{ $pelatihan->id }}"
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
                <!-- End Pelatihan -->

                <!-- Publikasi -->
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">F. Publikasi</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/admin/user/detail/publikasi/{{ $user->id }}/create"
                                    class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
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
                                            <td>
                                                @if ($publikasi->link)
                                                    <a href="{{ $publikasi->link }}">{{ $publikasi->link }}</a>
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($publikasi->pdf)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
                                                @endif
                                            </td>
                                            <td>{{ $publikasi->identifier->nama }}</td>
                                            <td>
                                                <a href="/admin/user/detail/publikasi/{{ $publikasi->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $publikasi->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $publikasi->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
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
                                                                    action="/admin/user/detail/publikasi/{{ $publikasi->id }}"
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

                <!-- Penghargaan -->
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-6">
                                <h5 class="card-title">G. Penghargaan</h5>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 p-3">
                                <a href="/admin/user/detail/penghargaan/{{ $user->id }}/create"
                                    class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-lg-1">No.</th>
                                        <th class="col-lg-4">Nama Penghargaan</th>
                                        <th class="col-lg-4">Pemberi Penghargaan</th>
                                        <th class="col-lg-1">Tahun</th>
                                        <th class="col-lg-1">PDF</th>
                                        <th class="col-lg-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penghargaan as $penghargaan)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penghargaan->nama }}</td>
                                            <td>{{ $penghargaan->pemberi }}</td>
                                            <td>{{ $penghargaan->tahun }}</td>
                                            <td>
                                                @if ($penghargaan->pdf)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-minus"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/user/detail/penghargaan/{{ $penghargaan->id }}/edit"
                                                    class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                                <button class="btn btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $penghargaan->id }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <!-- modal delete button -->
                                                <div class="modal fade" id="deleteModal{{ $penghargaan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
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
                                                                    action="/admin/user/detail/penghargaan/{{ $penghargaan->id }}"
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
                <!-- End Penghargaan -->

            </div>
        </div>
    </section>
@endsection
