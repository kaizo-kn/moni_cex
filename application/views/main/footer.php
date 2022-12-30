<footer id="footer" class="rounded-bottom">
    <hr style="font-style: normal;color:grey;margin:0px;padding: 3px;">
    <div class="footer-top rounded">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-6 footer-contact">
                    <h3>PMT Dolok Ilir</h3>
                    <p>
                    <p class="bi bi-phone"> 0813-9660-3334<br></p>
                    <p class="bi bi-geo-alt"> Bandar Selamat, Kec. Dolok Batu Nanggar,<br> Kabupaten Simalungun, Sumatera Utara <br> 21155<br>

                    </p>
                    </p>
                </div>

                <div class="col-sm-12 col-lg-6 col-md-6 col-xl-6 footer-links">
                    <h4>Navigasi</h4>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/home/') ?>">Beranda</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/home/info_produk') ?>">Informasi Produk</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/home/info_harga') ?>">Informasi Harga</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/home/info_stok') ?>">Informasi Stok Sparepart</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/home/faq') ?>">Pertanyaan Umum</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/home/komplain') ?>">Review Produk</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('index.php/user/') ?>">Halaman Admin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix ">
        <div class="copyright">
            &copy; Copyright <strong><span>PTPN IV PMT Dolok Ilir</span></strong>
        </div>
    </div>
</footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>
<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script>
    $(function() {
        <?= $this->session->flashdata('message') ?>
    })
</script>

</html>