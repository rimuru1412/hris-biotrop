<table class="table table-borderless text-center" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jenis Cuti</th>
            <th>Tanggal</th>
            <th>Alasan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuti as $cuti)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cuti->nama }}</td>
                <td>{{ $cuti->jeniscuti->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }} -
                    {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}
                    ({{ $cuti->durasi }} hari)
                </td>
                <td>{{ $cuti->alasan }}</td>
                <td>{{ $cuti->status }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
