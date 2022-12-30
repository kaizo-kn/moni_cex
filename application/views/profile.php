<?php $this->session->set_userdata('sitenow',$this->uri->segment(1));?>
<div id="profile" class="pe-4 d-block mt-2">
    <span class="dropdown">
        <div class="dropdown"> <div style="text-decoration: none;" class=" fs-4 text-white fw-bold me-4 d-flex align-items-center curpo zoom-hover nb-shadow bg-transparent">
        <img class="profile-pic" src="<?php echo base_url()?>assets/img/profile_picture/<?php echo $this->session->userdata['profile']; ?>" alt="">  <span class="d-none d-sm-none d-md-inline d-lg-none d-xl-inline " style="font-style:initial; font-size:1.2rem;font-weight:normal; margin-left:0.5rem;"><?php echo $this->session->userdata['nama']; ?></div>
    </span>
    <ul style="position:absolute;right:0px;margin-top:5px" class="ms-2">
        <li><a href="<?php echo site_url('user/admin_dashboard') ?>">Dashboard</a></li>
        <li><a href="<?php echo site_url('user/ubah_info_stok') ?>">Ubah Info Stok Sparepart</a></li>
        <li><a href="<?php echo site_url('user/ubah_info_harga') ?>">Ubah Info Harga</a></li>
        <li><a href="<?php echo site_url('home/komplain') ?>">Manajemen Review</a></li>
        <li><a href="<?php echo site_url('user/user_profile') ?>">Ubah Profil</a></li>
        <li><a href="<?php echo site_url('home/') ?>">Halaman Utama</a></li>
        <li><a href="<?php echo site_url('user/logout') ?>">Keluar</a></li>
    </ul>
</div>