<div class="modal fade" id="transaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="transaksi">
                    @csrf
                    <div id="method"></div>
                    <div class="row col-sm-12">
                        <div class="form-group col-sm-6">
                            <h6 class="text-primary font-weight-bold">No faktur</h6>
                            <h6 class="id"></h6>
                        </div>
                        <div class="form-group col-sm-6">
                            <h6 class="text-primary font-weight-bold">Tanggal</h6>
                            <h6 class="tanggal_transaksi"></h6>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                        <div class="form-group col-sm-6">
                            <h6 for="pelanggan" class="text-primary font-weight-bold">Pelanggan</h6>
                            <h6 class="pelanggan_id">pelanggan</h6>
                        </div>
                        <div class="form-group col-sm-6">
                            <h6 class="text-primary font-weight-bold">Total</h6>
                            <h6 class="total_harga"></h6>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                        <div class="form-group col-sm-6">
                            <h6 class="text-primary font-weight-bold">Payment</h6>
                            <h6 class="metode_pembayaran"></h6>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="keterangan" class="col-form-label text-primary font-weight-bold">Keterangan</label>
                        <textarea class="form-control col-sm-12" name="keterangan" id="keterangan" cols="30" rows="3" placeholder="keterangan"></textarea>
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

<div class="modal fade" id="transaksiExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export data transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="{{ route('cetakpdf-transaksi') }}" class="btn btn-danger btn-icon-split mr-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                    <span class="text">Pdf</span>
                </a>
                <a href="{{ route('export-transaksi') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-excel"></i>
                    </span>
                    <span class="text">Excel</span>
                </a>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="transaksiImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-transaksi') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="import" class="col-sm-4 col-form-label">File excel</label>
                        <input type="file" name="import" id="import" class="form-control col-sm-8">
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