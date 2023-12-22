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
                    @include('layouts.navbar')

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
                                                    <td class="col-lg-8 col-md-8">: {{ $identitas->user->nama }}</td>
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
                                                    <td>: {{ $identitas->user->email }}</td>
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
                                                    <th>Sisa Cuti</th>
                                                    <td>: @if (count($cutinya) > 0)
                                                            @foreach ($cutinya as $cutinya)
                                                                {{ 12 - $cutinya->durasi }} hari
                                                            @endforeach
                                                            </ul>
                                                        @else
                                                            12 hari
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Aksi</th>
                                                    <td>: <a href="/user/daftar-riwayat-hidup/identity/{{ $identitas->id }}/edit"
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
                                                <a href="/user/daftar-riwayat-hidup/identity/create"
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

            </div>
        </div>
    </section>
@endsection
