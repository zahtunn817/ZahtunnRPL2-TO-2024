<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No</th>
        <th>Nama karyawan</th>
        <th>Tanggal masuk</th>
        <th>Waktu masuk</th>
        <th>Status</th>
        <th>Waktu keluar</th>
    </thead>
    <tbody>
        @if(isset($laporan))
        @foreach($laporan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->namaKaryawan }}</td>
            <td>{{ $item->tanggalMasuk }}</td>
            <td>{{ $item->waktuMasuk }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->waktuKeluar }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>