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
                        <h5 class="card-title">A. Identitas</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/admin/user/detail/identity/{{ $identity->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" disabled
                                        value="{{ old('nama', $identity->user->nama) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="departemen_id" class="form-label fw-bold">Departemen</label>
                                    <select class="form-select" name="departemen_id" id="departemen_id" required>
                                        @foreach ($departemen as $departemen)
                                            <option value="{{ $departemen->id }}"
                                                {{ old('departemen_id', $identity->departemen_id) == $departemen->id ? ' selected' : ' ' }}>
                                                {{ $departemen->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan_id" class="form-label fw-bold">Jabatan</label>
                                    <select class="form-select" name="jabatan_id" id="jabatan_id" required>
                                        @foreach ($jabatan as $jabatan)
                                            <option value="{{ $jabatan->id }}"
                                                {{ old('jabatan_id', $identity->jabatan_id) == $jabatan->id ? ' selected' : ' ' }}>
                                                {{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label fw-bold">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" required
                                        value="{{ old('nik', $identity->nik) }}">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            required value="{{ old('tempat_lahir', $identity->tempat_lahir) }}">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            required value="{{ old('tanggal_lahir', $identity->tanggal_lahir) }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ old('alamat', $identity->alamat) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="statususer_id" class="form-label fw-bold">Status</label>
                                    <select class="form-select" name="statususer_id" id="statususer_id" required>
                                        @foreach ($statususer as $statususer)
                                            <option value="{{ $statususer->id }}"
                                                {{ old('statususer_id', $identity->statususer_id) == $statususer->id ? ' selected' : ' ' }}>
                                                {{ $statususer->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="golongan_id" class="form-label fw-bold">Golongan</label>
                                    <select class="form-select" name="golongan_id" id="golongan_id" required>
                                        @foreach ($golongan as $golongan)
                                            <option value="{{ $golongan->id }}"
                                                {{ old('golongan_id', $identity->golongan_id) == $golongan->id ? ' selected' : ' ' }}>
                                                {{ $golongan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="npwp" class="form-label fw-bold">NPWP</label>
                                    <input type="number" class="form-control" id="npwp" name="npwp" required
                                        value="{{ old('npwp', $identity->npwp) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="rekening" class="form-label fw-bold">Nomor Rekening Bank</label>
                                    <input type="number" class="form-control" id="rekening" name="rekening" required
                                        value="{{ old('rekening', $identity->rekening) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="hp" class="form-label fw-bold">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="hp" name="hp" required
                                        value="{{ old('hp', $identity->hp) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email Perusahaan</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email', $identity->user->email) }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="email_pribadi" class="form-label fw-bold">Email Pribadi</label>
                                    <input type="text" class="form-control" id="email_pribadi" name="email_pribadi"
                                        value="{{ old('email_pribadi', $identity->email_pribadi) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun_bekerja" class="form-label fw-bold">Tanggal dan Tahun
                                        Bekerja</label>
                                    <input type="date" class="form-control" id="tahun_bekerja" name="tahun_bekerja"
                                        required value="{{ old('tahun_bekerja', $identity->tahun_bekerja) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label fw-bold">Pas Foto</label>
                                    <div class="form-text">Ukuran Foto 3x4</div>
                                    @if ($identity->image)
                                        <img src="{{ asset('storage/' . $identity->image) }}"
                                            class="img-fluid img-preview mb-3 col-sm-5 d-block"
                                            style="height:4cm;width:3cm">
                                    @else
                                        <img class="img-fluid img-preview mb-3 col-sm-5" style="height:4cm;width:3cm">
                                    @endif

                                    <input class="form-control  @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
