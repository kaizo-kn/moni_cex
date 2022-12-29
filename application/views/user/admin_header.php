<div style="overflow:hidden" id="preloader">
    <h2 style="margin-top:34vh" class="title text-light fw-bold text-center">PMT PTPNIV</h2>
</div>
<header id="header" class="header-scrolled fixed-top">
    <div class="container-fluid ps-sm-1 ps-md-3 ps-lg-5 ps xl-5 pe-sm-1 pe-md-3 pe-lg-4 pe-xl-5">
        <div class="row">
            <div id="header-content" class="d-inline-flex justify-content-between">
                <span>
                    <h1 class="logo logo-title align-items-center"><img src="<?= base_url() ?>assets/img/icons/Logo_PTPN4.png" alt="" sizes="160x160" srcset="" class="me-2"><a class="text-center logo-title mt-2 align-items-center pe-5" href="<?= base_url() ?>">PMT Dolok Ilir</a></h1>
                </span>
                <?php if ($this->session->userdata('is_login') == TRUE) {
                    $this->load->view('profile.php');
                } ?>
            </div>
        </div>
    </div>
</header>