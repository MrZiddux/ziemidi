<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   @if($title != Null)
	<title>Ziemidi | {{ $title }}</title>
	@else
	<title>Ziemidi</title>
	@endif
   {{-- Material Icons --}}
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

   {{-- Fonts --}}
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@300&display=swap" rel="stylesheet">

   {{-- Bootstrap CSS--}}
   <link rel="stylesheet" href="/css/bootstrap.min.css" />

   {{-- Custom CSS --}}
   <link rel="stylesheet" href="/css/components.css" />

   {{-- DataTables CSS --}}
   <link rel="stylesheet" href="/css/datatables.css">

   {{-- Dashboard CSS --}}
	<link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
   <x-navbar></x-navbar>
   <div class="container-fluid">
      <div class="row">
         <x-sidebar></x-sidebar>
         <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
               {{ $header }}
            </div>
            {{ $slot }}
         </main>
      </div>
   </div>
   {{ $btm }}
   {{-- Jquery --}}
   <script src="/js/jquery.min.js"></script>

   {{-- Bootstrap JS --}}
   <script src="/js/bootstrap.bundle.min.js"></script>

   {{-- DataTables JS --}}
   <script src="/js/datatables.js"></script>

   {{-- Sweel Alert 2 --}}
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   {{-- Custom JS --}}
   {{ $js }}
</body>
</html>