<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse transition bg-white pt-0 pt-lg-5">
   <div class="position-sticky pt-lg-3">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 t-color-deactive t-bold letspace-4">
         Dashboard
      </h6>
      <ul class="nav flex-column">
         <li class="nav-item py-2 hover-bg-lightgray transition {{ request()->is('/') ? 'bg-color-lightgray' : ''  }}">
            <a class="nav-link d-flex align-items-center t-size-sm {{ request()->is('/') ? 't-color-secondary' : 'text-muted'  }}" aria-current="page" href="/">
               <span class="material-icons me-3 t-size {{ request()->is('/') ? 't-color-secondary' : 'text-muted'  }}">home</span>
               Dashboard
            </a>
         </li>
      </ul>
      
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 t-color-deactive t-bold letspace-4">
         Master
      </h6>
      <ul class="nav flex-column">
         <li class="nav-item py-2 hover-bg-lightgray transition {{ request()->is('produk') ? 'bg-color-lightgray' : ''  }}">
            <a class="nav-link d-flex align-items-center t-size-sm {{ request()->is('produk') ? 't-color-secondary' : 'text-muted'  }}" aria-current="page" href="produk">
               <span class="material-icons me-3 t-size {{ request()->is('produk') ? 't-color-secondary' : 'text-muted'  }}">category</span>
               Produk
            </a>
         </li>
         <li class="nav-item py-2 hover-bg-lightgray transition {{ request()->is('barang') ? 'bg-color-lightgray' : ''  }}">
            <a class="nav-link d-flex align-items-center t-size-sm {{ request()->is('barang') ? 't-color-secondary' : 'text-muted'  }}" aria-current="page" href="barang">
               <span class="material-icons me-3 t-size {{ request()->is('barang') ? 't-color-secondary' : 'text-muted'  }}">shopping_bag</span>
               Barang
            </a>
         </li>
         <li class="nav-item py-2 hover-bg-lightgray transition {{ request()->is('pelanggan') ? 'bg-color-lightgray' : ''  }}">
            <a class="nav-link d-flex align-items-center t-size-sm {{ request()->is('pelanggan') ? 't-color-secondary' : 'text-muted'  }}" aria-current="page" href="pelanggan">
               <span class="material-icons me-3 t-size {{ request()->is('pelanggan') ? 't-color-secondary' : 'text-muted'  }}">person</span>
               Pelanggan
            </a>
         </li>
         <li class="nav-item py-2 hover-bg-lightgray transition {{ request()->is('pemasok') ? 'bg-color-lightgray' : ''  }}">
            <a class="nav-link d-flex align-items-center t-size-sm {{ request()->is('pemasok') ? 't-color-secondary' : 'text-muted'  }}" aria-current="page" href="pemasok">
               <span class="material-icons me-3 t-size {{ request()->is('pemasok') ? 't-color-secondary' : 'text-muted'  }}">local_shipping</span>
               Pemasok
            </a>
         </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 t-color-deactive t-bold letspace-4">
         Transaksi
      </h6>
      <ul class="nav flex-column">
         <li class="nav-item py-2 hover-bg-lightgray transition {{ request()->is('transaksi') ? 'bg-color-lightgray' : ''  }}">
            <a class="nav-link d-flex align-items-center t-size-sm {{ request()->is('transaksi') ? 't-color-secondary' : 'text-muted'  }}" aria-current="page" href="transaksi">
               <span class="material-icons me-3 t-size {{ request()->is('transaksi') ? 't-color-secondary' : 'text-muted'  }}">category</span>
               Transaksi Penjualan
            </a>
         </li>
      </ul>
   </div>
</nav>