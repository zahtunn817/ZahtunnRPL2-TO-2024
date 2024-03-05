 <div class="modal fade" id="formMejaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah meja</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" action="meja">
                     @csrf
                     <div id="method" class="method"></div>
                     <div class="form-group row">
                         <label for="nomor_meja" class="col-sm-4 col-form-label">Nomor meja</label>
                         <input type="text" class="form-control col-sm-8" id="nomor_meja" name="nomor_meja"
                             placeholder="Nomor meja">
                     </div>
                     <div class="form-group row">
                         <label for="kapasitas" class="col-sm-4 col-form-label">Kapasitas</label>
                         <input type="number" class="form-control col-sm-8" id="kapasitas" name="kapasitas"
                             placeholder="Kapasitas">
                     </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
             </form>
         </div>
     </div>
 </div>
