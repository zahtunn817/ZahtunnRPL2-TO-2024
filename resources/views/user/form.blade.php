<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="user">
                @csrf
                <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama user</label>
                        <input type="text" class="form-control col-sm-8" id="nama" name="nama"
                            placeholder="Nama user">
                    </div>
                    <div class="form-group row">
                        <label for="jk" class="col-sm-4 col-form-label">Jenis kelamin</label>
                        <select class="form-control col-sm-8" name="jk" id="jk">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal lahir</label>
                        <input type="date" class="form-control col-sm-8" id="tgl_lahir" name="tgl_lahir">
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <textarea class="form-control col-sm-8" name="alamat" id="alamat" cols="30" rows="3" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-4 col-form-label">Foto <sub>(opsional)</sub></label>
                        <input type="file" class="form-control col-sm-8" id="image" name="image"
                            placeholder="Foto">
                    </div>
                    <div class="form-group row">
                        <label for="nomor_telepon" class="col-sm-4 col-form-label">Nomor telepon</label>
                        <input type="text" class="form-control col-sm-8" id="nomor_telepon" name="nomor_telepon"
                            placeholder="Nomor telepon">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <input type="email" class="form-control col-sm-8" id="email" name="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <input type="password" class="form-control col-sm-8" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group row">
                        <label for="roles" class="col-sm-4 col-form-label">Hak akses</label>
                        <select class="form-control col-sm-8" name="roles" id="roles">
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="owner">Owner</option>
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
