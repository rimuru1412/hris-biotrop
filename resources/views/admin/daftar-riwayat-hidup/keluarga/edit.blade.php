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
                            <form method="POST" action="/admin/user/detail/keluarga/{{ $keluarga->id }}">
                                @csrf
                                @method('put')
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="keterangankeluarga_id" class="form-label fw-bold">Keterangan</label>
                                    <select class="form-select" name="keterangankeluarga_id" id="keterangankeluarga_id">
                                        @foreach ($keterangankeluarga as $keterangankeluarga)
                                            <option value="{{ $keterangankeluarga->id }}"
                                                {{ old('keterangankeluarga_id', $keluarga->keterangankeluarga_id) == $keterangankeluarga->id ? ' selected' : ' ' }}>
                                                {{ $keterangankeluarga->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required
                                        value="{{ old('nama', $keluarga->nama) }}">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            required value="{{ old('tempat_lahir', $keluarga->tempat_lahir) }}">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            required value="{{ old('tanggal_lahir', $keluarga->tanggal_lahir) }}">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                        @foreach ($enumjeniskelamin as $enumjeniskelamin)
                                            <option value="{{ $enumjeniskelamin }}"
                                                {{ old('jenis_kelamin', $keluarga->jenis_kelamin) == $enumjeniskelamin ? ' selected' : ' ' }}>
                                                {{ $enumjeniskelamin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="jenjangpendidikan_id" class="form-label fw-bold">Pendidikan</label>
                                    <select class="form-select" name="jenjangpendidikan_id" id="jenjangpendidikan_id">
                                        @foreach ($jenjangpendidikan as $jenjangpendidikan)
                                            <option value="{{ $jenjangpendidikan->id }}"
                                                {{ old('jenjangpendidikan_id', $keluarga->jenjangpendidikan_id) == $jenjangpendidikan->id ? ' selected' : ' ' }}>
                                                {{ $jenjangpendidikan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label fw-bold">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required
                                        value="{{ old('pekerjaan', $keluarga->pekerjaan) }}">
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
