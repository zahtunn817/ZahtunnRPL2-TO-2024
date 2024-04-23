<div class="modal fade" id="meja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">meja</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="meja">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nomor_meja" class="col-sm-4 col-form-label">Nomor meja</label>
                        <input type="text" class="form-control col-sm-8" id="nomor_meja" name="nomor_meja" placeholder="Nomor meja">
                    </div>
                    <div class="form-group row">
                        <label for="kapasitas" class="col-sm-4 col-form-label">Kapasitas</label>
                        <input type="number" class="form-control col-sm-8" id="kapasitas" name="kapasitas" placeholder="Kapasitas">
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

<div class="modal fade" id="mejaExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export data meja</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="{{ route('cetakpdf-meja') }}" class="btn btn-danger btn-icon-split mr-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                    <span class="text">Pdf</span>
                </a>
                <a href="{{ route('export-meja') }}" class="btn btn-success btn-icon-split">
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

<div class="modal fade" id="mejaImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import meja</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-meja') }}" enctype="multipart/form-data">
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