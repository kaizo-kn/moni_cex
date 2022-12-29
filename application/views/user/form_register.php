<div class="container pt-4 section-bgn pb-5 " data-aos="fade-up">
  <div class="section-title">
    <h2>Daftarkan Pengguna Baru</h2>
    <div style="top:4vh" class="mt-4 position-absolute aler alert info alert-dismissible"><?php echo $this->session->flashdata('pesan'); ?></div>
  </div>
  <div class="row h-100 justify-content-center">
  <div class="col-md-4 mb-3">
    <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
    <?php echo form_open('user/register-proses', ''); ?>

    <div class="form-group mb-3">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
      <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>'); ?>
    </div>

    <div class="form-group mb-3">
      <label for="exampleInputEmail1">E-mail</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1">
      <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
    </div>

    <div class="form-group mb-3">
      <label for="exampleInputPassword1">Kata sandi</label>
      <input type="password" name="password" class="form-control">
      <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
    </div>
    <div class="form-group mb-3">
      <label for="exampleInputPassword1">Foto Profil</label>
      <input type="file" name="profil" class="form-control">
      <?php echo form_error('profil', '<div class="text-danger"><small>', '</small></div>'); ?>
    </div>

    <button type="submit" class="btn btn-primary">Daftarkan Sekarang</button>
    <?php echo form_close(); ?>
  </div>
  </div>
</div>