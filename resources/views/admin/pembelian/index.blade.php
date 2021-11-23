<x-app title="Transaksi Pembelian">
   <x-slot name="header">
		<h2 class="t-bold">Transaksi Pembelian</h2>
	</x-slot>

   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Transaksi Pembelian</li>
      </ol>
   </nav> {{-- BreadCrumb --}}

   <div class="row mb-4">
      <div class="col-9">
         <div class="card border-0 shadow-sm">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="pemasok_id" class="form-label">Pemasok</label>
                        <select id="pemasok_id" class="form-select" aria-label="Default select example" name="pemasok_id">
                           <option selected disabled value>Pilih Pemasok</option>
                           @foreach ($pemasok as $item)
                              <option value="{{ $item->id }}">{{ $item->nama }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-3">
         <div class="card border-0 shadow-sm">
            <div class="card-body">
               <div class="form-group mb-3">
                  <label for="total" class="form-label">Total Barang</label>
                  <input type="text" class="form-control" id="total" name="total" readonly>
               </div>
               <button type="submit" class="btn btn-primary d-block w-100">Save</button>
            </div>
         </div>
      </div>

   </div>
   <div class="row">
      <div class="col-12">
         <div class="card border-0 shadow-sm">
            <div class="card-body">
               <div class="input-group input-group-sm mb-3">
                  <input type="text" class="form-control" placeholder="Kode Produk">
                  <button type="button" class="btn btn-success text-white hover-shadow-md transition d-flex align-items-center material-icons" data-bs-toggle="modal" data-bs-target="#daftar-barang">
                     arrow_forward
                  </button>
               </div>
               
               <div class="table-responsive">
                  <table id="myTable" class="table table-borderless table-striped align-middle">
                     <thead class="border-bottom border-color-secondary">
                        <tr>
                              <th class="t-bold">#</th>
                              <th class="t-bold">Nama Produk</th>
                              <th class="t-bold">Qty</th>
                              <th class="d-flex align-items-center"><span class="material-icons t-size">settings</span></th>
                        </tr>
                     </thead>
                     <tbody id="keranjang-barang">
                        <!-- <tr>
                              <td>1</td>
                              <td>Indomie</td>
                              <td>
                                 <button class="btn btn-sm btn-primary material-icons" data-bs-toggle="modal" data-bs-target="#edit-produk">mode_edit</button>
                                 <button class="btn btn-sm btn-danger material-icons btnhapus" data-id="">delete</button>
                                 <button class="btn btn-sm btn-secondary disabled material-icons">clear</button>
                              </td>
                        </tr> -->
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   

   <x-slot name="btm">
      @include('admin.pembelian._modal-create')
   </x-slot>

   <x-slot name="js">
      <script>
         let arrayBarang = [];
         let myTable =  $('#myTable').DataTable({
            paging: true,
               lengthChange: true,
               searching: true,
               ordering: false,
               responsive: true,
         });

         $('#tableBarang').DataTable({
            paging: true,
               lengthChange: true,
               searching: true,
               ordering: false,
               responsive: true,
         });

         $('.btnpilih').on('click', function() {
            let row = $(this).closest('tr');
            let id = $(this).data('id');
            let kategori = row.find('td:eq(3)').text();
            let satuan = row.find('td:eq(4)').text();
            let harga = row.find('td:eq(5)').data('hargajual');
            let stok = row.find('td:eq(6)').data('stok');
            let diskon = row.find('td:eq(7)').data('diskon');
            let obj = {
               id, kategori, satuan, harga, stok, diskon, qty: 1
            }
            let isAvailable = arrayBarang.find(x => x.id === id);
            if(typeof isAvailable === 'undefined') {
               arrayBarang.push(obj);
            } else {
               let index = arrayBarang.findIndex(x => x.id === id);
               arrayBarang[index].qty = arrayBarang[index].qty + 1;
            }
            let html = '';
            arrayBarang.map(item => {
               html += `
                  <tr>
                     <td>${item.id}</td>
                     <td>${item.kategori}</td>
                     <td><input type="text" class"form-control" value="${item.qty}"></td>
                     <td>
                        <button class="btn btn-sm btn-primary material-icons" data-bs-toggle="modal" data-bs-target="#edit-produk">mode_edit</button>
                        <button class="btn btn-sm btn-danger material-icons btnhapus" data-id="">delete</button>
                        <button class="btn btn-sm btn-secondary disabled material-icons">clear</button>
                     </td>
                  </tr>
               `
            })
            $('#keranjang-barang').html(html);
            $('#daftar-barang').modal('toggle');
         });

      </script>
   </x-slot>
</x-app>