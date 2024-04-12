<div class="modal fade" id="jenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jenis</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="jenis">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_jenis" class="col-sm-4 col-form-label">Nama jenis</label>
                        <input type="text" class="form-control col-sm-8" id="nama_jenis" name="nama_jenis" placeholder="Nama jenis">
                    </div>
                    <div class="form-group row">
                        <label for="kategori_id" class="col-sm-4 col-form-label">Kategori</label>
                        <select class="form-control col-sm-8" name="kategori_id" id="kategori_id">
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>