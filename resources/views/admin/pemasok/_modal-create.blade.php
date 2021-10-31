<div class="modal fade" id="tambah-pemasok" tabindex="-1" aria-labelledby="tambahpemasoklabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form action="{{ route('tambahpemasok') }}"  method="post" id="form-tambah-pemasok">
            @csrf
            <div class="modal-header">
               <h5 class="modal-title" id="tambahpemasoklabel">Tambah Pemasok</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Your name">
                  <label for="nama">Nama</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
                  <label for="no_telp">Nomor Telepon</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
                  <label for="kota">Kota</label>
               </div>
               <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Alamat Anda" id="alamat" name="alamat" style="height: 100px"></textarea>
                  <label for="alamat">Alamat</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success btntambah">Simpan</button>
               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div> {{-- Modal Tambah Pemasok --}}