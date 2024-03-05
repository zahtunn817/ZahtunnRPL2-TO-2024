 <div class="modal fade" id="formKategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" action="kategori">
                     @csrf
                     <div id="method" class="method"></div>
                     <div class="form-group row">
                         <label for="nama_kategori" class="col-sm-4 col-form-label">Nama kategori</label>
                         <input type="text" class="form-control col-sm-8" id="nama_kategori" name="nama_kategori"
                             placeholder="Nama kategori">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
         </div>
     </div>
 </div>
