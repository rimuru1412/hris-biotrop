<h3>A. Identitas</h3>
@foreach ($identity as $identitas)
    <table width="100%" cellspacing="0">
        <tbody>
            <tr>
                <th style="float: left">Nama</th>
                <td>: {{ $identitas->user->nama }}</td>
            </tr>
            <tr>
                <th>Departemen</th>
                <td>: {{ $identitas->departemen->nama }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>: {{ $identitas->jabatan->nama }}</td>
            </tr>
            <tr>
                <th>NIP/NIK</th>
                <td>: {{ $identitas->nik }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>: {{ $identitas->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($identitas->tanggal_lahir)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: {{ $identitas->alamat }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>: {{ $identitas->statususer->nama }}</td>
            </tr>
            <tr>
                <th>Golongan</th>
                <td>: {{ $identitas->golongan->nama }}</td>
            </tr>
            <tr>
                <th>NPWP</th>
                <td>: {{ $identitas->npwp }}</td>
            </tr>
            <tr>
                <th>Nomor Rekening Bank</th>
                <td>: {{ $identitas->rekening }}</td>
            </tr>
            <tr>
                <th>Nomor Handphone</th>
                <td>: {{ $identitas->hp }}</td>
            </tr>
            <tr>
                <th>Email Perusahaan</th>
                <td>: {{ $identitas->user->email }}</td>
            </tr>
            <tr>
                <th>Email Pribadi</th>
                <td>: {{ $identitas->email_pribadi }}</td>
            </tr>
            <tr>
                <th>Tanggal dan Tahun Bekerja</th>
                <td>:
                    {{ \Carbon\Carbon::parse($identitas->tahun_bekerja)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <th>Masa Kerja</th>
                <td>: {{ $masa_kerja }}</td>
            </tr>
        </tbody>
    </table>
@endforeach

<br>
<br>

<h3>B. Susunan Keluarga</h3>

<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Keterangan</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>L/P</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($keluarga as $keluarga)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $keluarga->keterangankeluarga->nama }}</td>
                <td>{{ $keluarga->nama }}</td>
                <td>{{ $keluarga->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($keluarga->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $keluarga->jenis_kelamin }}</td>
                <td>{{ $keluarga->jenjangpendidikan->nama }}</td>
                <td>{{ $keluarga->pekerjaan }}</td>

            </tr>
        @endforeach

    </tbody>
</table>

<br>
<br>

<h3>C. Pendidikan</h3>

<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Sekolah/Perguruan</th>
            <th>Jenjang Pendidikan</th>
            <th>Jurusan</th>
            <th>Tahun Lulus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendidikan as $pendidikan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pendidikan->nama_instansi }}</td>
                <td>{{ $pendidikan->jenjangpendidikan->nama }}</td>
                <td>{{ $pendidikan->jurusan }}</td>
                <td>{{ $pendidikan->tahun_lulus }}</td>

            </tr>
        @endforeach
    </tbody>
</table>

<br>
<br>

<h3>D. Pengalaman Kerja</h3>

<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th class="col-lg-1">No.</th>
            <th class="col-lg-1">Jabatan</th>
            <th class="col-lg-3">Nama Perusahaan</th>
            <th class="col-lg-3">Periode Bekerja</th>
            <th class="col-lg-3">Uraian Pekerjaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengalaman as $pengalaman)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengalaman->jabatan }}</td>
                <td>{{ $pengalaman->nama_perusahaan }}</td>
                <td>{{ \Carbon\Carbon::parse($pengalaman->tanggal_masuk)->format('d-m-Y') }} -
                    {{ \Carbon\Carbon::parse($pengalaman->tanggal_keluar)->format('d-m-Y') }}
                </td>
                <td>
                    @if ($pengalaman->uraian_pekerjaan)
                        {{ $pengalaman->uraian_pekerjaan }}
                    @else
                        <i class="fa-solid fa-minus"></i>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<br>

<h3>E. Pelatihan/Seminar</h3>

<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th class="col-lg-1">No.</th>
            <th class="col-lg-1">Jenis</th>
            <th class="col-lg-2">Kegiatan & Tempat</th>
            <th class="col-lg-3">Tanggal Kegiatan</th>
            <th class="col-lg-2">Penyelenggara</th>
            <th class="col-lg-1">Peran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelatihan as $pelatihan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pelatihan->jenispelatihan->nama }}</td>
                <td>{{ $pelatihan->nama_kegiatan }}</td>
                <td>{{ \Carbon\Carbon::parse($pelatihan->tanggal_mulai)->format('d-m-Y') }} -
                    {{ \Carbon\Carbon::parse($pelatihan->tanggal_selesai)->format('d-m-Y') }}
                </td>
                <td>{{ $pelatihan->penyelenggara }}</td>
                <td>{{ $pelatihan->peranpelatihan->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<br>

<h3>F. Publikasi</h3>

<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th class="col-lg-1">No.</th>
            <th class="col-lg-1">Jenis</th>
            <th class="col-lg-2">Judul</th>
            <th class="col-lg-1">Kegiatan</th>
            <th class="col-lg-1">Tahun</th>
            <th class="col-lg-2">Link</th>
            <th class="col-lg-1">Identifier</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($publikasi as $publikasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $publikasi->jenispublikasi->nama }}</td>
                <td>{{ $publikasi->judul }}</td>
                <td>{{ $publikasi->kegiatan }}</td>
                <td>{{ $publikasi->tahun }}</td>
                <td>
                    @if ($publikasi->link)
                        <a href="{{ $publikasi->link }}">{{ $publikasi->link }}</a>
                    @else
                        <i class="fa-solid fa-minus"></i>
                    @endif
                </td>
                <td>{{ $publikasi->identifier->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<br>

<h3>G. Penghargaan</h3>

<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th class="col-lg-1">No.</th>
            <th class="col-lg-4">Nama Penghargaan</th>
            <th class="col-lg-4">Pemberi Penghargaan</th>
            <th class="col-lg-1">Tahun</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penghargaan as $penghargaan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $penghargaan->nama }}</td>
                <td>{{ $penghargaan->pemberi }}</td>
                <td>{{ $penghargaan->tahun }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
