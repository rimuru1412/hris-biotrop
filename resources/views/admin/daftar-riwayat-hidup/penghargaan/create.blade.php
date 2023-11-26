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
                        <h5 class="card-title">G. Penghargaan</h5>
                        <div class="col-lg-8">
                            <form method="POST" action="/admin/user/detail/penghargaan/{{ $user->id }}/store"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Nama Penghargaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pemberi" class="form-label fw-bold">Pemberi Penghargaan</label>
                                    <input type="text" class="form-control" id="pemberi" name="pemberi" required>
                                </div>
                                <div class="mb-3 col-lg-2 col-md-4 col-sm-4">
                                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pdf" class="form-label fw-bold">Sertifikat</label>
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
