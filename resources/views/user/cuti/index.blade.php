@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Pengajuan Cuti</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Personal -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">I. Data Pegawai</h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <div class="col-lg-8">
                                <form method="POST" action="/user/cuti">
                                    @csrf
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                        <tbody>
                                            @foreach ($identity as $identitas)
                                                <tr>
                                                    <th class="col-lg-2"><label for="nama">Nama</label></th>
                                                    <td class="col-lg-6"><input type="text" class="form-control"
                                                            id="nama" name="nama" disabled
                                                            value="{{ $identitas->user->nama }}" required></td>
                                                    <td class="col-lg-6"><input type="hidden" class="form-control"
                                                            id="nama" name="nama" readonly
                                                            value="{{ $identitas->user->nama }}" required></td>
                                                </tr>
                                                <tr>
                                                    <th><label for="jabatan_id">Jabatan</label></th>
                                                    <td><input type="text" class="form-control" id="jabatan_id"
                                                            name="jabatan_id" disabled
                                                            value="{{ $identitas->jabatan->nama }}" required></td>
                                                    <td><input type="hidden" class="form-control" id="jabatan_id"
                                                            name="jabatan_id" readonly value="{{ $identitas->jabatan->id }}"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <th><label for="departemen_id">Unit Kerja</label></th>
                                                    <td><input type="text" class="form-control" id="departemen_id"
                                                            name="departemen_id" disabled
                                                            value="{{ $identitas->departemen->nama }}" required></td>
                                                    <td><input type="hidden" class="form-control" id="departemen_id"
                                                            name="departemen_id" readonly
                                                            value="{{ $identitas->departemen->id }}" required></td>
                                                </tr>
                                                <tr>
                                                    <th><label for="nik">NIP/NIK</label></th>
                                                    <td><input type="text" class="form-control" id="nik"
                                                            name="nik" disabled value="{{ $identitas->nik }}" required>
                                                    </td>
                                                    <td><input type="hidden" class="form-control" id="nik"
                                                            name="nik" readonly value="{{ $identitas->nik }}" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label for="tahun_bekerja">Masa Kerja</label></th>
                                                    <td><input type="text" class="form-control" id="tahun_bekerja"
                                                            name="tahun_bekerja" disabled value="{{ $masa_kerja }} hari"
                                                            required></td>
                                                    <td><input type="hidden" class="form-control" id="tahun_bekerja"
                                                            name="tahun_bekerja" readonly value="{{ $masa_kerja }} hari"
                                                            required></td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>

                                    <h5 class="card-title">II. Jenis Cuti yang Diambil</h5>
                                    <div class="mb-3 ms-2">
                                        <label for="jeniscuti_id" class="form-label fw-bold">Jenis Cuti</label>
                                        <select class="form-select" name="jeniscuti_id" id="jeniscuti_id">
                                            @foreach ($jeniscuti as $jeniscuti)
                                                <option value="{{ $jeniscuti->id }}"
                                                    {{ old('jeniscuti_id') == $jeniscuti->id ? ' selected' : ' ' }}>
                                                    {{ $jeniscuti->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 ms-2">
                                        <label for="alasan" class="form-label fw-bold">Alasan Cuti</label>
                                        <textarea class="form-control" name="alasan" id="alasan" cols="30" rows="5" required></textarea>
                                    </div>

                                    <h5 class="card-title">III. Lamanya Cuti</h5>
                                    <div class="row ms-1">
                                        <div class="mb-3 col-lg-6">
                                            <label for="tanggal_mulai" class="form-label fw-bold">Mulai tanggal</label>
                                            <input type="date" class="form-control" id="tanggal_mulai"
                                                name="tanggal_mulai" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="tanggal_selesai" class="form-label fw-bold">Selesai tanggal</label>
                                            <input type="date" class="form-control" id="tanggal_selesai"
                                                name="tanggal_selesai" required>
                                        </div>
                                    </div>
                                    <h5 class="card-title">IV. Alamat Selama Menjalankan Cuti</h5>
                                    <div class="mb-3 ms-2">
                                        <label for="alamat" class="form-label fw-bold">Alamat Lengkap</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            required>
                                    </div>
                                    <div class="mb-3 ms-2">
                                        <label for="telepon" class="form-label fw-bold">Telepon</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon"
                                            required>
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>
                <!-- End Personal -->


            </div>
        </div>
    </section>
@endsection
