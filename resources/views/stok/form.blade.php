<div class="modal fade" id="stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stok</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="stok">
                @csrf
                
                <div class="form-group row">
                    <label for="menu_id" class="col-sm-4 col-form-label">Nama menu</label>
                    <select class="form-control col-sm-8" name="menu_id" id="menu_id">
                        @foreach ($menu as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_menu  }}</option>
                        @endforeach uu 
                    </select>
                </div>
                <div id="method"></div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Stok</label>
                        <input type="number" class="form-control col-sm-8" id="jumlah" name="jumlah"
                            placeholder="Stok">
                            
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
