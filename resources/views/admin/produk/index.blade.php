<x-app title="Daftar Produk">
   <x-slot name="header">
		<h2 class="t-bold">Daftar Produk</h2>
	</x-slot>

   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
      </ol>
   </nav> {{-- BreadCrumb --}}

   <div class="card border-0 shadow-sm">
      <div class="card-body">
         <button type="button" class="btn btn-sm btn-success text-white rounded-0 hover-shadow-md hover-translateY-2px transition mb-4 d-flex align-items-center t-size" data-bs-toggle="modal" data-bs-target="#tambah-produk">
            <span class="material-icons text-white t-size me-2">
               add_circle
            </span>
            Tambah Produk
         </button>
         <div class="table-responsive">
            <table id="myTable" class="table table-borderless table-striped align-middle">
               <thead class="border-bottom border-color-secondary">
                  <tr>
                        <th class="t-bold">#</th>
                        <th class="t-bold">Nama Produk</th>
                        <th class="d-flex align-items-center"><span class="material-icons t-size">settings</span></th>
                  </tr>
               </thead>
               <tbody>
                  @php
                     $num = 1;
                  @endphp
                  @foreach ($produk as $item)
                  <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>
                           <button class="btn btn-sm btn-primary material-icons" data-bs-toggle="modal" data-bs-target="#edit-produk{{ $item->id }}">mode_edit</button>
                           <button class="btn btn-sm btn-danger material-icons btnhapus" data-id="{{ $item->id }}">delete</button>
                           <button class="btn btn-sm btn-secondary disabled material-icons">clear</button>
                        </td>
                  </tr>
                  @include('admin.produk._modal-edit')
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <x-slot name="btm">
      @include('admin.produk._modal-create')
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

         $(document).on('click', '.btntambah', function(e) {
            e.preventDefault();
            const formdata = new FormData(document.getElementById("form-tambah-produk"));
            $.ajax({
               type: 'post',
               url: "{{ route('tambahproduk') }}",
               data: formdata,
               success: function(data) {
                  if(data.success) {
                     $('#tambah-produk').modal().hide();
                     swal.fire(
                        'Berhasil!',
                        'Data Produk Berhasil Dibuat.',
                        'success'
                     ).then((result) => {
                        if(result.isConfirmed) {
                           window.location = '/produk'
                        }
                     })
                  } else {
                     alert('Gagal')
                  }
               }
            })
         })

         // Hapus Data
         $(document).on('click', '.btnhapus', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            swal.fire({
               icon: 'warning',
               title: 'Yakin Hapus Produk ?',
               confirmButtonColor: '#dc3545',
               confirmButtonText: 'Yakin!',
               showCancelButton: true,
            }).then((result) => {
               if(result.isConfirmed) {
                  $.ajax({
                     type: 'post',
                     url: "{{ route('deleteproduk') }}",
                     data: {
                        _token: "{{ csrf_token() }}",
                        id:id
                     },
                     success: function(data) {
                        if(data.success) {
                           swal.fire(
                              'Berhasil!',
                              'Data Produk Berhasil Dihapus.',
                              'success'
                           ) .then((result) => {
                              if(result.isConfirmed) {
                                 window.location = '/produk'
                              }
                           })
                        }
                     }
                  })
               }
            })
         })
      </script>
   </x-slot>
</x-app>
