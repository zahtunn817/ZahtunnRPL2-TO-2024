<div class="modal fade" id="absensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">absensi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="absensi">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="namaKaryawan" class="col-sm-4 col-form-label">Nama karyawan</label>
                        <input type="text" class="form-control col-sm-8" id="namaKaryawan" name="namaKaryawan" placeholder="Nama karyawan">
                    </div>
                    <!-- <div class="form-group row">
                        <label for="tanggalMasuk" class="col-sm-4 col-form-label">Tanggal masuk</label>
                        <input type="date" class="form-control col-sm-8" id="tanggalMasuk" name="tanggalMasuk" placeholder="Tanggal masuk" readonly>
                    </div>
                    <div class="form-group row">
                        <label for="waktuMasuk" class="col-sm-4 col-form-label">Waktu masuk</label>
                        <input type="text" class="form-control col-sm-8" id="waktuMasuk" name="waktuMasuk" placeholder="Waktu masuk" readonly>
                    </div> -->
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <select class="form-control col-sm-8" name="status" id="status">
                            <option value="masuk">Masuk</option>
                            <option value="sakit">Sakit</option>
                            <option value="cuti">Cuti</option>
                        </select>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="waktuKeluar" class="col-sm-4 col-form-label">Waktu keluar</label>
                        <input type="text" class="form-control col-sm-8" id="waktuKeluar" name="waktuKeluar" placeholder="Waktu keluar" readonly>
                    </div> -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="absensiExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export data absensi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="{{ route('cetakpdf-absensi') }}" class="btn btn-danger btn-icon-split mr-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                    <span class="text">Pdf</span>
                </a>
                <a href="{{ route('export-absensi') }}" class="btn btn-success btn-icon-split">
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

<div class="modal fade" id="absensiImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import absensi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-absensi') }}" enctype="multipart/form-data">
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