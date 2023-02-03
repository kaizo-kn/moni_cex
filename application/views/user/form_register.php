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
        <label for="pks">PKS</label>
        <select name="id_pks" id="pks" class="form-select" required>
          <option disabled selected value="">Pilih PKS</option>
          <?php for ($i = 0; $i < count($nama_pks); $i++) {
            echo ' <option class="curpo" value=' . $nama_pks[$i]['id_pks'] . '>' . $nama_pks[$i]['nama_pks'] . '</option>';
          }
          ?>

        </select>
      </div>
      <div class="form-group mb-3">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
        <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>'); ?>
      </div>
      
      <div class="form-group mb-3">
        <label for="username1">Nama Pengguna<span class="text-danger">*</span></label>
        <input type="text" name="username" class="form-control" id="username1">

        <?php echo form_error('username', '<div class="text-danger"><small>', '</small></div>'); ?>
      </div>

      <div class="form-group mb-3">
        <label for="exampleInputPassword1">Kata sandi<span class="text-danger">**</span></label>
        <input type="password" name="password" class="form-control">
        <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
      </div>
<div class="mb-3">
<span class="text-danger">*</span><span class="text-secondary"><small>Hanya boleh huruf kecil (a-z),angka (0-9), dan garis bawah ( _ )</small></span>
<span class="text-danger">**</span><span class="text-secondary"><small>Minimal 5 karakter, maksimal 12 karakter</small></span>
</div>
      <button type="submit" class="btn mainbgc text-light float-end">Daftarkan Pengguna</button>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>