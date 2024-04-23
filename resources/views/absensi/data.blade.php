<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama karyawan</th>
                <th>Tanggal masuk</th>
                <th>Waktu masuk</th>
                <th>Status</th>
                <th>Waktu keluar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama karyawan</th>
                <th>Tanggal masuk</th>
                <th>Waktu masuk</th>
                <th>Status</th>
                <th>Waktu keluar</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($absensi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namaKaryawan }}</td>
                <td>{{ $item->tanggalMasuk }}</td>
                <td>{{ $item->waktuMasuk }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->waktuKeluar }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#absensi" data-mode="edit" data-id="{{ $item->id }}" data-namaKaryawan="{{ $item->namaKaryawan }}" data-waktuMasuk="{{ $item->waktuMasuk }}" data-namaKaryawan="{{ $item->namaKaryawan }}" data-tanggalMasuk="{{ $item->tanggalMasuk }}" data-waktuMasuk="{{ $item->waktuMasuk }}" data-status="{{ $item->status }}" data-waktuMasuk="{{ $item->waktuMasuk }}" data-waktuKeluar="{{ $item->waktuKeluar }}">
                        <i class='fas fa-pen'></i>
                    </button>
                    <form action="{{ route('absensi.destroy', $item->id) }}" method="POST" class="d-inline form-delete" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data" data-namaKaryawan="{{ $item->namaKaryawan }}">
                            <i class='fas fa-trash'></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>