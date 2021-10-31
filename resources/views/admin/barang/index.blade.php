<x-app title="Daftar Barang">
   <x-slot name="header">
		<h2 class="t-bold">Daftar Barang</h2>
	</x-slot>

   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li>
      </ol>
   </nav> {{-- BreadCrumb --}}

   <div class="card border-0 shadow-sm">
      <div class="card-body">
         <button type="button" class="btn btn-sm btn-success text-white rounded-0 hover-shadow-md hover-translateY-2px transition mb-4 d-flex align-items-center t-size" data-bs-toggle="modal" data-bs-target="#tambah-barang">
            <span class="material-icons text-white t-size me-2">
               add_circle
            </span>
            Tambah Barang
         </button>
         <div class="table-responsive">
            <table id="myTable" class="table table-borderless table-striped align-middle tabel-barang">
               <thead class="border-bottom border-color-secondary">
                  <tr>
                        <th class="t-bold">#</th>
                        <th class="t-bold">Kode Barang</th>
                        <th class="t-bold">Nama Barang</th>
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
                        <td>{{ $item->satuan }}</td>
                        <td data-hargajual="{{ $item->harga_jual }}">Rp. {{ number_format($item->harga_jual, '0', ',', '.' ) }}</td>
                        <td data-stok="{{ $item->stok }}">{{ $item->stok }} {{ $item->satuan }}</td>
                        <td data-diskon="{{ $item->diskon }}">{{ $item->diskon }}%</td>
                        <td>
                           <button class="btn btn-sm btn-primary material-icons btnedit" data-bs-toggle="modal" data-bs-target="#edit-barang" data-id="{{ $item->id }}">mode_edit</button>
                           <button class="btn btn-sm btn-danger material-icons btnhapus" data-id="{{ $item->id }}">delete</button>
                           <button class="btn btn-sm btn-secondary disabled material-icons">clear</button>
                        </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
   
   <x-slot name="btm">
      @include('admin.barang._modal-create')
      @include('admin.barang._modal-edit')
   </x-slot>

   <x-slot name="js">
      <script>
         $('#myTable').DataTable({
            paging: true,
               lengthChange: true,
               searching: true,
               ordering: false,
               responsive: true,
         });

         // Function Tambah Data
         $(function () {
            $(document).on('click', '.btntambah', function(e) {
               e.preventDefault();
               let formdata = new FormData(document.getElementById("form-tambah-barang"));

               $.ajax({
                  type: 'post',
                  url: "{{ route('tambahbarang') }}",
                  processData: false,
                  contentType: false,
                  data: formdata,
                  success: function(data) {
                     if(data.success) {
                        $('#tambah-barang').modal().hide();
                        swal.fire(
                           'Berhasil!',
                           'Data Barang Berhasil Dibuat.',
                           'success'
                        ).then((result) => {
                           if(result.isConfirmed) {
                              window.location = '/barang'
                           }
                        })
                     } else {
                        alert('Gagal')
                     }
                  }
               })
            })
         })

         // Hapus Data
         $(document).on('click', '.btnhapus', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            swal.fire({
               icon: 'warning',
               title: 'Yakin Hapus Barang ?',
               confirmButtonColor: '#dc3545',
               confirmButtonText: 'Yakin!',
               showCancelButton: true,
            }).then((result) => {
               if(result.isConfirmed) {
                  $.ajax({
                     type: 'post',
                     url: "{{ route('deletebarang') }}",
                     data: {
                        _token: "{{ csrf_token() }}",
                        id:id
                     },
                     success: function(data) {
                        if(data.success) {
                           swal.fire(
                              'Berhasil!',
                              'Data Barang Berhasil Dihapus.',
                              'success'
                           ) .then((result) => {
                              if(result.isConfirmed) {
                                 window.location = '/barang'
                              }
                           })
                        }
                     }
                  })
               }
            })
         })

         // Pass data to Modal Edit
         $('.tabel-barang').on('click', '.btnedit', function() {
            let row = $(this).closest('tr');
            // let kode_barang = row.find('td:eq(1)').text();
            let nama_barang = row.find('td:eq(2)').text();
            let satuan = row.find('td:eq(3)').text();
            let harga = row.find('td:eq(4)').data('hargajual');
            let stok = row.find('td:eq(5)').data('stok');
            let diskon = row.find('td:eq(6)').data('diskon');
            let id = row.find('td:eq(7) .btnedit').data('id');
            $('#edit-barang #id').val(id);
            // $('#edit-barang #kode_barang').val(kode_barang);
            $('#edit-barang #nama_barang').val(nama_barang);
            $('#edit-barang #satuan').val(satuan);
            $('#edit-barang #diskon').val(diskon);
            $('#edit-barang #harga_jual').val(harga);
            $('#edit-barang #stok').val(stok);
         })
      </script>
   </x-slot>
</x-app>
