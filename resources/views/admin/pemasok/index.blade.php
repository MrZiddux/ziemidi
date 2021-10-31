<x-app title="Daftar Pemasok">
   <x-slot name="header">
		<h2 class="t-bold">Daftar Pemasok</h2>
	</x-slot>

   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Daftar Pemasok</li>
      </ol>
   </nav> {{-- BreadCrumb --}}

   <div class="card border-0 shadow-sm">
      <div class="card-body">
         <button type="button" class="btn btn-sm btn-success text-white rounded-0 hover-shadow-md hover-translateY-2px transition mb-4 d-flex align-items-center t-size" data-bs-toggle="modal" data-bs-target="#tambah-pemasok">
            <span class="material-icons text-white t-size me-2">
               add_circle
            </span>
            Tambah Pemasok
         </button>
         <div class="table-responsive">
            <table id="myTable" class="table table-borderless table-striped align-middle tabel-pemasok">
               <thead class="border-bottom border-color-secondary">
                  <tr>
                        <th class="t-bold">#</th>
                        <th class="t-bold">Kode Pemasok</th>
                        <th class="t-bold">Nama Pemasok</th>
                        <th class="t-bold">No Telp</th>
                        <th class="t-bold">Kota</th>
                        <th class="t-bold">Alamat</th>
                        <th class="d-flex align-items-center"><span class="material-icons t-size">settings</span></th>
                  </tr>
               </thead>
               <tbody>
                  @php
                     $num = 1;
                  @endphp
                  @foreach ($pemasok as $item)
                  <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $item->kode_pemasok }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->kota }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                           <button class="btn btn-sm btn-primary material-icons btnedit" data-bs-toggle="modal" data-bs-target="#edit-pemasok" data-id="{{ $item->id }}">mode_edit</button>
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
      @include('admin.pemasok._modal-create')
      @include('admin.pemasok._modal-edit')
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
               let formdata = new FormData(document.getElementById("form-tambah-pemasok"));

               $.ajax({
                  type: 'post',
                  url: "{{ route('tambahpemasok') }}",
                  processData: false,
                  contentType: false,
                  data: formdata,
                  success: function(data) {
                     if(data.success) {
                        $('#tambah-pemasok').modal().hide();
                        swal.fire(
                           'Berhasil!',
                           'Data Pemasok Berhasil Dibuat.',
                           'success'
                        ).then((result) => {
                           if(result.isConfirmed) {
                              window.location = '/pemasok'
                           }
                        })
                     } else {
                        alert('Gagal')
                     }
                  }
               })
            })
         })

         // Pass data to Modal Edit
         $('.tabel-pemasok').on('click', '.btnedit', function() {
            let row = $(this).closest('tr');
            let nama = row.find('td:eq(2)').text();
            let no_telp = row.find('td:eq(3)').text();
            let kota = row.find('td:eq(4)').text();
            let alamat = row.find('td:eq(5)').text();
            let id = row.find('td:eq(6) .btnedit').data('id');
            $('#edit-pemasok #id').val(id);
            $('#edit-pemasok #nama').val(nama);
            $('#edit-pemasok #no_telp').val(no_telp);
            $('#edit-pemasok #kota').val(kota);
            $('#edit-pemasok #alamat').text(alamat);
         })

         // Hapus Data
         $(document).on('click', '.btnhapus', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            swal.fire({
               icon: 'warning',
               title: 'Yakin Hapus Pemasok ?',
               confirmButtonColor: '#dc3545',
               confirmButtonText: 'Yakin!',
               showCancelButton: true,
            }).then((result) => {
               if(result.isConfirmed) {
                  $.ajax({
                     type: 'post',
                     url: "{{ route('deletepemasok') }}",
                     data: {
                        _token: "{{ csrf_token() }}",
                        id:id
                     },
                     success: function(data) {
                        if(data.success) {
                           swal.fire(
                              'Berhasil!',
                              'Data Pemasok Berhasil Dihapus.',
                              'success'
                           ) .then((result) => {
                              if(result.isConfirmed) {
                                 window.location = '/pemasok'
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