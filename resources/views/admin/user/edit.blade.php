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
                            <form method="POST" action="/admin/user/{{ $user->id }}">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required
                                        value="{{ old('nama', $user->nama) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        value="{{ old('email', $user->email) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label fw-bold">Role</label>
                                    <select class="form-select" name="role" id="role">
                                        @foreach ($enumrole as $enumrole)
                                            <option value="{{ $enumrole }}"
                                                {{ old('role', $user->role) == $enumrole ? ' selected' : ' ' }}>
                                                {{ $enumrole }}</option>
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
