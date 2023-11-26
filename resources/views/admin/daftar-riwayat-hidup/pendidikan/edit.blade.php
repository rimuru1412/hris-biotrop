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
                        <h5 class="card-title">C. Pendidikan</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/admin/user/detail/pendidikan/{{ $pendidikan->id }}">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_instansi" class="form-label fw-bold">Nama Sekolah/Perguruan</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                        required value="{{ old('nama_instansi', $pendidikan->nama_instansi) }}">
                                </div>
                                <div class="mb-3 col-lg-3 col-md-4 col-sm-4">
                                    <label for="jenjangpendidikan_id" class="form-label fw-bold">Jenjang Pendidikan</label>
                                    <select class="form-select" name="jenjangpendidikan_id" id="jenjangpendidikan_id">
                                        @foreach ($jenjangpendidikan as $jenjangpendidikan)
                                            <option value="{{ $jenjangpendidikan->id }}"
                                                {{ old('jenjangpendidikan_id', $pendidikan->jenjangpendidikan_id) == $jenjangpendidikan->id ? ' selected' : ' ' }}>
                                                {{ $jenjangpendidikan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label fw-bold">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan"
                                        value="{{ old('jurusan', $pendidikan->jurusan) }}">
                                </div>
                                <div class="mb-3 col-lg-2 col-md-4 col-sm-4">
                                    <label for="tahun_lulus" class="form-label fw-bold">Tahun Lulus</label>
                                    <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" required
                                        value="{{ old('tahun_lulus', $pendidikan->tahun_lulus) }}">
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
