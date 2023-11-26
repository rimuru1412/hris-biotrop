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
                        <h5 class="card-title">F. Publikasi</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/admin/user/detail/publikasi/{{ $user->id }}/store"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="jenispublikasi_id" class="form-label fw-bold">Jenis</label>
                                    <select class="form-select" name="jenispublikasi_id" id="jenispublikasi_id">
                                        @foreach ($jenispublikasi as $jenispublikasi)
                                            <option value="{{ $jenispublikasi->id }}"
                                                {{ old('jenispublikasi_id') == $jenispublikasi->id ? ' selected' : ' ' }}>
                                                {{ $jenispublikasi->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label fw-bold">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kegiatan" class="form-label fw-bold">Kegiatan</label>
                                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
                                </div>
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" required>
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label fw-bold">Link</label>
                                    <input type="text" class="form-control" id="link" name="link">
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label fw-bold">PDF</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf">
                                </div>
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="identifier_id" class="form-label fw-bold">Identifier</label>
                                    <select class="form-select" name="identifier_id" id="identifier_id">
                                        @foreach ($identifier as $identifier)
                                            <option value="{{ $identifier->id }}"
                                                {{ old('identifier_id') == $identifier->id ? ' selected' : ' ' }}>
                                                {{ $identifier->nama }}</option>
                                        @endforeach
                                    </select>
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
