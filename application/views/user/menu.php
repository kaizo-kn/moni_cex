<div style="overflow:hidden" id="preloader">
    <h2 style="margin-top:34vh" class="title text-light fw-bold text-center">PMT PTPN IV</h2>
</div>
<!-- ======= Header ======= -->
<header style="position: sticky;" id="header" class="header-scrolled">
    <div style="min-height:3rem;" class="container d-flex">
        <h1 class="logo d-none d-lg-block d-xl-block d-md-none align-items-center"><img src="<?= base_url() ?>assets/img/icons/Logo_PTPN4.png" alt="" sizes="160x160" srcset="" class="me-2"><a class="text-center mt-2 logo-title align-items-center me-5" href="index.html">PMT Dolok Ilir</a></h1>
        <div class="text-center text-warning d-inline d-xl-none d-md-inline d-lg-none d-sm-inline ms-xl-5 ms-lg-3">
            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop" class="fs-3 text-dark"><i style="font-weight: bold;border:solid 1px white;border-radius: 5px;padding:3px 5px 3px 5px;" class="bi bi-list text-light"></i></span>
            <span class="ms-1 ps-4 pe-2 fs-2 fw-bold">PMT Dolok Ilir </span>
        </div>
        <nav id="navbar" class="navbar justify-content-end">
            <ul>
                <li><a id="nav-info-produk" class="nav-link " onclick="displayPage(info_produk,this.id)" href="#eip">Edit Informasi Produk</a></li>
                <li><a id="nav-info-harga" class="nav-link " onclick="displayPage(info_harga,this.id)" href="#eih">Edit Informasi Harga</a></li>
                <li><a id="nav-info-stok" class="nav-link " onclick="displayPage(info_stok,this.id);getData()" href="#eiss">Edit Informasi Stok Sparepart</a></li>
            </ul>
                
        </nav>
        <!-- .navbar -->

    </div>

</header>