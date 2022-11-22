<?php

echo '<section id="menu">
<nav id="navbar" class="navbar navbar-expand-custom navbar-mainbg p-0 ">
    <div class="navbar-brand navbar-logo">
        <div>
            <div class="d-flex justify-content-between">
            <a href="https://ptpn4.co.id">
                <img src="'.base_url().'assets/icon/Logo_PTPN4.png" alt="" srcset="" width="60px" height="60px" class="">
               </a>
                <a href="'.base_url().'index.php" style="text-decoration:none">
                <h1 style="color:white;" id="brand" class="ml-4 text-decoration-none text-light">PMT-Dolok Ilir</h1>
                </a>
            </div>
        </div>
    </div>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pl-4">
            <div class="hori-selector"></div>
            <li id="index.php" class="nav-item">
                <a class="nav-link" href="'.base_url().'index.php"><i class="fa fa-home"></i>Beranda</a>
            </li>
            <li id="info_produk.php" class="nav-item">
                <a class="nav-link" href="'.base_url().'info_produk.php"><i class="fa fa-info-circle"></i>Informasi Produk</a>
            </li>
            <li id="info_harga.php" class="nav-item ">
                <a class="nav-link" href="'.base_url().'info_harga.php"><i class="fa fa-tag"></i>Informasi Harga</a>
            </li>
            <li id="info_stok_sparepart.php" class="nav-item">
                <a class="nav-link" href="'.base_url().'info_stok_sparepart.php"><i class="fa fa-archive"></i>Informasi Stok Sparepart</a>
            </li>
            <li id="faq.php" class="nav-item">
                <a class="nav-link" href="'.base_url().'faq.php"><i class="fa fa-question-circle"></i>FAQ</a>
            </li>
        </ul>
    </div>
    <div id="db"></div>
</nav>
</section>';
?>
