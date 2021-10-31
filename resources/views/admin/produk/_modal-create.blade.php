<div class="modal fade" id="tambah-produk" tabindex="-1" aria-labelledby="tambahproduklabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form action="{{ route('tambahproduk') }}"  method="post" id="form-tambah-produk">
            @csrf
            <div class="modal-header">
               <h5 class="modal-title" id="tambahproduklabel">Tambah Produk</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Kategori Barang...">
                  <label for="nama_produk">Kategori Barang</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success btntambah">Simpan</button>
               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div> {{-- Modal Tambah Produk --}}