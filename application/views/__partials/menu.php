<style>
    .accordion-button::after {
        margin-left: 0;
        margin-right: 0.5em;
        background-image: none;
        background-color: transparent;
    }

    .accordion-button:not(.collapsed):after {
        margin-left: 0;
        margin-right: 0.5em;
        background-image: none;
        background-color: transparent;
    }
</style>

<body style="position: relative;">
    <div style="display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    z-index: 9999;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width:100%;height:100%;
    backdrop-filter: blur(10px);" id="preloader">
        <div style="background-color:var(--main-bg-color);border-radius:10px" class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div style="display: none;
    justify-content: center;
    align-items: center;
    position: absolute;
    z-index: 9999;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width:100%;height:100%;
    backdrop-filter: blur(10px);" id="loader">
        <div style="top:50%;left:50%;transform:translate(-50%,-50%);background-color:var(--main-bg-color);border-radius:10px" class=" d-flex">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <?php
    if ($this->session->userdata('is_login') == true && $this->session->userdata('id_pks') == '0') {
        $role = 'admin';
    } else {
        $role = 'user';
    }
    ?>
    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start rounded" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
            <h1 class="logo me-auto">
                <p class="text-main">Menu: </p>
            </h1>
            <button style="border: solid 1px white;border-radius: 5px;" type="button" class=" btn text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-chevron-left text-dark"></i></button>
        </div>

        <div class="offcanvas-body text-dark">
            <div class="accordion" id="accordionFlushExample">
                <?php
                if ($role == 'admin') {
                    $menu_arr = array('Dashboard', 'Progress Lap. Investasi', 'Pengawasan Pekerjaan Lapangan', 'Input Uraian Pekerjaan', 'Update Progress', 'Upload Dokumen', 'Hapus Uraian Pekerjaan', 'Reset Password User');
                    $link_arr = array('', 'lap_invest', 'pengawasan_pekerjaan_lap', 'input_pekerjaan', 'update_progress', 'upload_dokumen', 'hapus_pekerjaan', 'reset_user');
                    $bsp = base_url('index.php/admin');
                } else {
                    $menu_arr = array('Dashboard', 'Progress Lap. Investasi', 'Pengawasan Pekerjaan Lapangan', 'Input Progress Lap. Invest', 'Upload Dokumen Pengawasan');
                    $link_arr = array('', 'lap_invest', 'pengawasan_pekerjaan_lap', 'input_progress_lap', 'input_pengawasan_lap');
                    $bsp = base_url('index.php/user');
                }
                $expanded = $this->uri->segment(2);
                $collapsed = 'collapsed';
                for ($ie = 0; $ie < count($menu_arr); $ie++) {
                    if ($expanded == $link_arr[$ie]) {
                        $collapsed = '';
                    } else {
                        $collapsed = 'collapsed';
                    }
                    echo "
    <div class='accordion-item'>
    <a href='$bsp/$link_arr[$ie]'>
    <p class='accordion-header' id='flush-heading$ie'>
        <button class='accordion-button $collapsed' type='button' data-bs-toggle='collapse'
            data-bs-target='#flush-collapse$ie' aria-expanded='false'
            aria-controls='flush-collapse$ie'>
            {$menu_arr[$ie]}
        </button>
    </p>
    </a>
    <div id='flush-collapse$ie' class='accordion-collapse collapse'
        aria-labelledby='flush-heading$ie' data-bs-parent='#accordionFlushExample'>
    </div>
</div>
    ";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- End Offcanvas -->

    <!-- ======= Header ======= -->
    <header style="position: sticky;" id="header" class="header-scrolled ">

        <div style="min-height:3rem;" class="container-fluid pe-2 d-inline-flex justify-content-between">
            <div class="d-inline">
                <span class="logo d-none d-lg-block d-xl-block d-md-none align-items-center mt-2"><img src="<?= base_url() ?>assets/img/icons/Logo_PTPN4.png" alt="" sizes="160x160" srcset="" class="me-2"><strong class="text-light fs-5 mt-5 pt-2 me-3">MONI-CEX</strong><span data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop" class="fs-3 mt-3"><i style="font-weight: bold;" class="bi bi-list text-light mt-5 pt-5 curpo pb-5"></i></span>
                </span>

            </div>



            <nav id="navbar" class="navbar">
                <?php
                $type = "";
                if ($this->session->userdata('id_pks') == 0) {
                    $type = "admin";
                } else {
                    $type = "user";
                }
                ?>
                <ul>
                    <li><a href="<?= base_url("index.php/$type") ?>" id="nav-home" class="nav-link <?php if (isset($m1)) {
                                                                                                        echo $m1;
                                                                                                    } ?>">DASHBOARD</a>
                    </li>
                    <li><a href="<?= base_url("index.php/$type/lap_invest") ?>" id="nav-info-produk" class="nav-link <?php if (isset($m2)) {
                                                                                                                            echo $m2;
                                                                                                                        } ?>">PROGRESS LAP. INVESTASI</a></li>
                    <li><a href="<?= base_url("index.php/$type/pengawasan_pekerjaan_lap") ?>" id="nav-info-harga" class="nav-link <?php if (isset($m3)) {
                                                                                                                                        echo $m3;
                                                                                                                                    } ?>">PENGAWASAN PEKERJAAN LAPANGAN</a></li>

                    <?php if ($this->session->userdata('is_login') == false) {
                        echo "<li><a href=" . site_url('user') . ">Login</a></li>";
                    } ?>
                </ul>
            </nav>
            <!-- .navbar -->
            <div class="">
                <?php if ($this->session->userdata('is_login') == TRUE) {
                    $this->load->view('__partials/profile.php');
                } ?>
            </div>
        </div>

    </header>