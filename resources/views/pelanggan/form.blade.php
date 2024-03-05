<div class="modal fade" id="pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pelanggan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="pelanggan">
                @csrf
                <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama pelanggan</label>
                        <input type="text" class="form-control col-sm-8" id="nama_pelanggan" name="nama_pelanggan"
                            placeholder="Nama pelanggan">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <input type="text" class="form-control col-sm-8" id="email" name="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group row">
                        <label for="nomor_telepon" class="col-sm-4 col-form-label">Nomor telepon</label>
                        <input type="text" class="form-control col-sm-8" id="nomor_telepon" name="nomor_telepon"
                            placeholder="Nomor telepon">
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        {{-- <input type="text" class="form-control col-sm-8" id="alamat" name="alamat" placeholder="alamat"> --}}
                            <textarea class="form-control col-sm-8" name="alamat" id="alamat" cols="30" rows="3" placeholder="Alamat"></textarea>
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
