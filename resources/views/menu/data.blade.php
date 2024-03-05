<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama menu</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama menu</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($menu as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_menu }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->nama_jenis }}</td>
                    <td>{{ $item->nama_kategori }}</td>

                    <td><img class="img-fluid" style="max-width: 70px; height: auto; display: block" src="{{asset('storage/pictures-menu/'.$item->image) }}" alt="Tidak ada gambar"></td>

                    <td>Rp. {{ $item->harga }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#menu"
                            data-mode="edit" data-id="{{ $item->id }}"
                            data-nama_menu="{{ $item->nama_menu }}" data-harga="{{ $item->harga }}" data-deskripsi="{{ $item->deskripsi }}" data-jenis_id="{{ $item->jenis_id }}" data-kategori_id="{{ $item->kategori_id }}" data-image="{{ $item->image }}">
                            <i class='fas fa-pen'></i>
                        </button>
                        <form action="{{ route('menu.destroy', $item->id) }}" method="POST"
                            class="d-inline form-delete" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-data"
                                data-nama_menu="{{ $item->nama_menu }}">
                                <i class='fas fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>