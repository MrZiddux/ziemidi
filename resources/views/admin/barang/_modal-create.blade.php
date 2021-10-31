<div class="modal fade" id="tambah-barang" tabindex="-1" aria-labelledby="tambahbaranglabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form action="{{ route('tambahbarang') }}"  method="post" id="form-tambah-barang">
            @csrf
            <div class="modal-header">
               <h5 class="modal-title" id="tambahbaranglabel">Tambah Barang</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
                  {{-- <input type="text" class="form-control" id="produk_id" name="produk_id" placeholder="Produk Id"> --}}
                  {{-- <label for="produk_id">Produk Id</label> --}}
                  <select id="produk_id" class="form-select" aria-label="Default select example" name="produk_id">
                     <option selected disabled value>Pilih Produk</option>
                     @foreach ($produk as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang...">
                  <label for="nama_barang">Nama Barang</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Pcs/Lusin/Dsb...">
                  <label for="satuan">Satuan</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Diskon(%)...">
                  <label for="diskon">Diskon</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga(Rp)...">
                  <label for="harga_jual">Harga Jual</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok...">
                  <label for="stok">Stok</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success btntambah">Simpan</button>
               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div> {{-- Modal Tambah Barang --}}