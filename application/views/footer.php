
<footer style="bottom: 0px!important;" id="footer" class="rounded-bottom w-100 justify-content-center">
  <div class="container footer-bottom clearfix d-flex justify-content-center">
    <div class="copyright">
      &copy; Copyright <strong><span>PMT Dolok Ilir</span></strong>. All Rights Reserved
    </div>
  </div>
</footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>
<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script>
    $(function() {
        <?= $this->session->flashdata('message') ?>
    })
</script>
</html>