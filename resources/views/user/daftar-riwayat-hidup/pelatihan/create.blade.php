@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Tambah Data</h1>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">E. Pelatihan/Seminar</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/user/daftar-riwayat-hidup/pelatihan" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="jenispelatihan_id" class="form-label fw-bold">Jenis</label>
                                    <select class="form-select" name="jenispelatihan_id" id="jenispelatihan_id">
                                        @foreach ($jenispelatihan as $jenispelatihan)
                                            <option value="{{ $jenispelatihan->id }}"
                                                {{ old('jenispelatihan_id') == $jenispelatihan->id ? ' selected' : ' ' }}>
                                                {{ $jenispelatihan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kegiatan" class="form-label fw-bold">Nama Kegiatan & Tempat</label>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                                        required>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                            required>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_selesai" class="form-label fw-bold">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tanggal_selesai"
                                            name="tanggal_selesai" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="penyelenggara" class="form-label fw-bold">Penyelenggara</label>
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara"
                                        required>
                                </div>
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="peranpelatihan_id" class="form-label fw-bold">Peran</label>
                                    <select class="form-select" name="peranpelatihan_id" id="peranpelatihan_id">
                                        @foreach ($peranpelatihan as $peranpelatihan)
                                            <option value="{{ $peranpelatihan->id }}"
                                                {{ old('peranpelatihan_id') == $peranpelatihan->id ? ' selected' : ' ' }}>
                                                {{ $peranpelatihan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label fw-bold">Sertifikat (PDF)</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf">
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
