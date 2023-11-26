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
                        <h5 class="card-title">D. Pengalaman Kerja</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/admin/user/detail/pengalaman/{{ $user->id }}/store">
                                @csrf
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label fw-bold">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label fw-bold">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                        required>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_masuk" class="form-label fw-bold">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                            required>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_keluar" class="form-label fw-bold">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="uraian_pekerjaan" class="form-label fw-bold">Uraian Pekerjaan
                                            (optional)</label>
                                        <textarea class="form-control" name="uraian_pekerjaan" id="uraian_pekerjaan" cols="30" rows="5"></textarea>
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
