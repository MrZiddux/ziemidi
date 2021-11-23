<div class="modal fade" id="daftar-barang" tabindex="-1" aria-labelledby="daftarbaranglabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
         <div class="p-5">
            <div class="table-responsive">
               <table id="tableBarang" class="table table-borderless table-striped align-middle">
                  <thead class="border-bottom border-color-secondary">
                     <tr>
                           <th class="t-bold">#</th>
                           <th class="t-bold">Kode Barang</th>
                           <th class="t-bold">Nama Barang</th>
                           <th class="t-bold">Kategori</th>
                           <th class="t-bold">Satuan</th>
                           <th class="t-bold">Harga</th>
                           <th class="t-bold">Stok</th>
                           <th class="t-bold">Diskon</th>
                           <th class="d-flex align-items-center"><span class="material-icons t-size">settings</span></th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                        $num = 1;
                     @endphp
                     @foreach ($barang as $item)
                     <tr>
                           <td>{{ $num++ }}</td>
                           <td>{{ $item->kode_barang }}</td>
                           <td>{{ $item->nama_barang }}</td>
                           <td>{{ $item->produk->nama_produk }}</td>
                           <td>{{ $item->satuan }}</td>
                           <td>Rp. {{ number_format($item->harga_jual, '0', ',', '.' ) }}</td>
                           <td>{{ $item->stok }} {{ $item->satuan }}</td>
                           <td>{{ $item->diskon }}%</td>
                           <td>
                              <button class="btn btn-sm btn-primary material-icons btnpilih" data-id="{{ $item->id }}">check</button>
                           </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div> {{-- Modal Daftar Barang --}}