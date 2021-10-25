<div class="modal fade" id="edit-produk{{ $item->id }}" tabindex="-1" aria-labelledby="editproduklabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form action="{{ route('editproduk') }}" method="post">
            @csrf
            <div class="modal-header">
               <h5 class="modal-title" id="tambahproduklabel">Edit Produk</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Kategori Barang..." value="{{ $item->nama_produk }}">
                  <label for="nama_produk">Kategori Barang</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success">Simpan</button>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div> {{-- Modal Edit Produk --}}