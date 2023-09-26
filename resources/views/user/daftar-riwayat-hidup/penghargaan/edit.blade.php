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
                        <h5 class="card-title">G. Penghargaan</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/user/daftar-riwayat-hidup/penghargaan/{{ $penghargaan->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Nama Penghargaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required
                                        value="{{ old('nama', $penghargaan->nama) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pemberi" class="form-label fw-bold">Pemberi Penghargaan</label>
                                    <input type="text" class="form-control" id="pemberi" name="pemberi" required
                                        value="{{ old('pemberi', $penghargaan->pemberi) }}">
                                </div>
                                <div class="mb-3 col-lg-2 col-md-4 col-sm-4">
                                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" required
                                        value="{{ old('tahun', $penghargaan->tahun) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label fw-bold">Sertifikat</label>
                                    <input type="hidden" name="oldpdf" value="{{ $penghargaan->pdf }}">
                                    <input type="file" class="form-control" id="pdf" name="pdf"
                                        value="{{ old('pdf', $penghargaan->pdf) }}">
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
