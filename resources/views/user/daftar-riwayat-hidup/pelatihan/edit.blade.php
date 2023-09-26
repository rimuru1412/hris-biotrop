@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Edit Data</h1>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">E. Pelatihan/Seminar</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/user/daftar-riwayat-hidup/pelatihan/{{ $pelatihan->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="jenispelatihan_id" class="form-label fw-bold">Jenis</label>
                                    <select class="form-select" name="jenispelatihan_id" id="jenispelatihan_id">
                                        @foreach ($jenispelatihan as $jenispelatihan)
                                            <option value="{{ $jenispelatihan->id }}"
                                                {{ old('jenispelatihan_id', $pelatihan->jenispelatihan_id) == $jenispelatihan->id ? ' selected' : ' ' }}>
                                                {{ $jenispelatihan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kegiatan" class="form-label fw-bold">Nama Kegiatan & Tempat</label>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                                        required value="{{ old('nama_kegiatan', $pelatihan->nama_kegiatan) }}">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                            required value="{{ old('tanggal_mulai', $pelatihan->tanggal_mulai) }}">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_selesai" class="form-label fw-bold">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tanggal_selesai"
                                            name="tanggal_selesai" required
                                            value="{{ old('tanggal_selesai', $pelatihan->tanggal_selesai) }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="penyelenggara" class="form-label fw-bold">Penyelenggara</label>
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara"
                                        required value="{{ old('penyelenggara', $pelatihan->penyelenggara) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="peranpelatihan_id" class="form-label fw-bold">Jenis</label>
                                    <select class="form-select" name="peranpelatihan_id" id="peranpelatihan_id">
                                        @foreach ($peranpelatihan as $peranpelatihan)
                                            <option value="{{ $peranpelatihan->id }}"
                                                {{ old('peranpelatihan_id', $pelatihan->peranpelatihan_id) == $peranpelatihan->id ? ' selected' : ' ' }}>
                                                {{ $peranpelatihan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label fw-bold">Sertifikat</label>
                                    <input type="hidden" name="oldpdf" value="{{ $pelatihan->pdf }}">
                                    <input type="file" class="form-control" id="pdf" name="pdf"
                                        value="{{ old('pdf', $pelatihan->pdf) }}">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
