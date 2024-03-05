<div class="modal fade" id="titipan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Produk titipan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="titipan">
                @csrf
                <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Nama produk</label>
                        <input type="text" class="form-control col-sm-8" id="nama_produk" name="nama_produk"
                            placeholder="Nama produk">
                    </div>
                    <div class="form-group row">
                        <label for="nama_supplier" class="col-sm-4 col-form-label">Nama supplier</label>
                        <input type="text" class="form-control col-sm-8" id="nama_supplier" name="nama_supplier"
                            placeholder="Nama supplier">
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-sm-4 col-form-label">Harga beli</label>
                        <input type="number" class="form-control col-sm-8" id="harga_beli" name="harga_beli"
                            placeholder="Harga beli">
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-4 col-form-label">Harga jual</label>
                        <input type="number" class="form-control col-sm-8" id="harga_jual" name="harga_jual" value="harga_jual"
                            placeholder="Harga jual" readonly>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <input type="number" class="form-control col-sm-8" id="stok" name="stok"
                            placeholder="Stok">
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                            <textarea class="form-control col-sm-8" name="keterangan" id="keterangan" cols="30" rows="3" placeholder="Keterangan"></textarea>
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

<div class="modal fade" id="titipanExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export data titipan produk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="#" class="btn btn-danger btn-icon-split mr-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                    <span class="text">Pdf</span>
                </a>
                <a href="{{ route('export-titipan') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-excel"></i>
                    </span>
                    <span class="text">Excel</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="titipanImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import titipan produk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-titipan') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                            <label for="import" class="col-sm-4 col-form-label">File excel</label>
                            <input type="file" name="import" id="import" class="form-control col-sm-8">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
     $(document).ready(function(){
        $('#harga_beli').on('input', function(){
            var hargaBeli = $(this).val();
            if(hargaBeli !== ''){
                var hargaJual = Math.ceil(parseInt(hargaBeli) * 1.7 / 500) * 500;
                $('#harga_jual').val(hargaJual);
            } else {
                $('#harga_jual').val('');
            }
        });
    });
</script>
@endpush