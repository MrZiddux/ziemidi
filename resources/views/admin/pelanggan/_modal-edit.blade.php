<div class="modal fade" id="edit-pelanggan" tabindex="-1" aria-labelledby="editpelangganlabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form action="{{ route('editpelanggan') }}"  method="post" id="form-edit-pelanggan">
            @csrf
            <div class="modal-header">
               <h5 class="modal-title" id="editpelangganlabel">Edit Pelanggan</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" id="id" name="id">
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Your name">
                  <label for="nama">Nama</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
                  <label for="email">Email</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
                  <label for="no_telp">Nomor Telepon</label>
               </div>
               <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Alamat Anda" id="alamat" name="alamat" style="height: 100px"></textarea>
                  <label for="alamat">Alamat</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success btnedit">Simpan</button>
               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div> {{-- Modal Edit Barang --}}