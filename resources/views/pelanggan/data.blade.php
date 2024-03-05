<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama pelanggan</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama pelanggan</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($pelanggan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pelanggan"
                            data-mode="edit" data-id="{{ $item->id }}"
                            data-nama_pelanggan="{{ $item->nama_pelanggan }}" data-harga="{{ $item->harga }}" data-email="{{ $item->email }}" data-nomor_telepon="{{ $item->nomor_telepon }}" data-alamat="{{ $item->alamat }}" data-image="{{ $item->image }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-data"
                                data-nama_pelanggan="{{ $item->nama_pelanggan }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
