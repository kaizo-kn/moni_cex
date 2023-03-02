<body>
    <div style="display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    z-index: 9999;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    backdrop-filter: blur(10px);" id="preloader">
        <div style="background-color:darkgray;border-radius:10px" class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div style="overflow:hidden;display:none;position:absolute;z-index:99;top:0;left:0;right:0;bottom:0;backdrop-filter:blur(10px)"
        id="loader">
        <div style="top:50%;left:50%;transform:translate(-50%,-50%);background-color:darkgray;border-radius:10px"
            class="">
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
    <div class="offcanvas offcanvas-start rounded offcanvas-bg" tabindex="-1" id="offcanvasWithBackdrop"
        aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
            <h1 class="logo me-auto"><a class="text-main" href="<?= base_url('index.php/'); ?>">Menu: </a></h1>
            <button style="border: solid 1px white;border-radius: 5px;" type="button" class=" btn text-dark"
                data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-chevron-left text-dark"></i></button>
        </div>

        <div class="offcanvas-body text-dark">
            <a href="<?= base_url("index.php/{$role}/"); ?>" class="<?php if (isset($m1)) {
                                                                        echo $m1;
                                                                    }  ?>">
                <div id="menu-home" class="d-flex align-items-center p-1">
                    <div style="vertical-align: middle;" class="d-table-cell">
                        <span class="bi bi-speedometer fw-bold fs-2"></span><span
                            class="ps-3 fw-bold mb-3">Dashboard</span>
                    </div>
                </div>
            </a>
            <a href="<?= base_url("index.php/$role/lap_invest") ?>" class="<?php if (isset($m2)) {
                                                                                echo $m2;
                                                                            }  ?>">
                <div id="menu-info-produk" class="d-flex align-items-center p-1">
                    <div style="vertical-align: middle;" class="d-table-cell">
                        <span class="bi bi-cone-striped fw-bold fs-2"></span><span class="ps-3 fw-bold mb-3">Progress
                            Lap. Investasi</span>
                    </div>
                </div>
            </a>
            <a href="<?= base_url("index.php/$role/pengawasan_pekerjaan_lap") ?>" class="<?php if (isset($m3)) {
                                                                                                echo $m3;
                                                                                            }  ?>">
                <div id="menu-info-harga" class="d-flex align-items-center p-1">
                    <div style="vertical-align: middle;" class="d-table-cell">
                        <span class="bi bi-binoculars-fill fw-bold fs-2"></span><span
                            class="ps-3 fw-bold mb-3">Pengawasan Pekerjaan Lap.</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- End Offcanvas -->

    <!-- ======= Header ======= -->
    <header style="position: sticky;" id="header" class="header-scrolled ">
        <div style="min-height:3rem;" class="container-fluid pe-2 d-inline-flex justify-content-between">
            <h1 class="logo d-none d-lg-block d-xl-block d-md-none align-items-center "><img
                    src="<?= base_url() ?>assets/img/icons/Logo_PTPN4.png" alt="" sizes="160x160" srcset=""
                    class="me-2"><a class="text-center mt-2 logo-title align-items-center me-5 btm-border fromCenter"
                    href="<?= base_url('index.php/') ?>">MONI-CEX </a></h1>


            <div class="text-center text-light d-inline d-xl-none d-md-inline d-lg-none d-sm-inline ms-xl-5 ms-lg-3">
                <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop"
                    aria-controls="offcanvasWithBackdrop" class="fs-3 text-dark"><i style="font-weight: bold;"
                        class="bi bi-list text-light pt-3 pb-5"></i></span>
                <span class="ms-1 ps-4 pe-2 fs-2 fw-bold text-center">MONI-CEX </span>
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
                    <li><a href="<?= base_url("index.php/$type/lap_invest") ?>" id="nav-info-produk"
                            class="nav-link <?php if (isset($m2)) {
                                                                                                                            echo $m2;
                                                                                                                        } ?>">PROGRESS LAP. INVESTASI</a></li>
                    <li><a href="<?= base_url("index.php/$type/pengawasan_pekerjaan_lap") ?>" id="nav-info-harga"
                            class="nav-link <?php if (isset($m3)) {
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
                    $this->load->view('profile.php');
                } ?>
            </div>
        </div>

    </header>