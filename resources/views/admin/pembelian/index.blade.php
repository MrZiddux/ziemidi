<x-app title="Daftar Produk">
   <x-slot name="header">
		<h2 class="t-bold">Daftar Produk</h2>
	</x-slot>

   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Daftar Pembelian</li>
      </ol>
   </nav> {{-- BreadCrumb --}}

   <div class="card border-0 shadow-sm">
      <div class="card-body">
         <button type="button" class="btn btn-sm btn-success text-white rounded-0 hover-shadow-md hover-translateY-2px transition mb-4 d-flex align-items-center t-size" data-bs-toggle="modal" data-bs-target="#tambah-produk">
            <span class="material-icons text-white t-size me-2">
               add_circle
            </span>
            Tambah Pembelian
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
                  <tr>
                        <td>1</td>
                        <td>Indomie</td>
                        <td>
                           <button class="btn btn-sm btn-primary material-icons" data-bs-toggle="modal" data-bs-target="#edit-produk">mode_edit</button>
                           <button class="btn btn-sm btn-danger material-icons btnhapus" data-id="">delete</button>
                           <button class="btn btn-sm btn-secondary disabled material-icons">clear</button>
                        </td>
                  </tr>
                  {{-- @include('admin.pembelian._modal-edit') --}}
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <x-slot name="btm">
      {{-- @include('admin.pembelian._modal-create') --}}
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
      </script>
   </x-slot>
</x-app>