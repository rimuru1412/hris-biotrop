@extends('layouts.main')

@section('container')
    <div class="pagetitle mb-5">
        <h1>Informasi Pegawai</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pegawai</h5>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $biodata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $biodata->nama }}</td>
                                            <td>{{ $biodata->email }}</td>
                                            <td>
                                                <a href="/admin/user/detail/{{ $biodata->id }}" class="btn btn-sm"><i
                                                        class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
