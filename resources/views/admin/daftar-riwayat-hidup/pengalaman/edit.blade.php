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
                        <h5 class="card-title">B. Keluarga</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/admin/user/detail/pengalaman/{{ $pengalaman->id }}">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label fw-bold">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" required
                                        value="{{ old('jabatan', $pengalaman->jabatan) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label fw-bold">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                        required value="{{ old('nama_perusahaan', $pengalaman->nama_perusahaan) }}">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_masuk" class="form-label fw-bold">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                            required value="{{ old('tanggal_masuk', $pengalaman->tanggal_masuk) }}">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_keluar" class="form-label fw-bold">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                                            required value="{{ old('tanggal_keluar', $pengalaman->tanggal_keluar) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="uraian_pekerjaan" class="form-label fw-bold">Uraian Pekerjaan
                                            (optional)</label>
                                        <textarea class="form-control" name="uraian_pekerjaan" id="uraian_pekerjaan" cols="30" rows="5">{{ $pengalaman->uraian_pekerjaan }}</textarea>
                                    </div>
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
