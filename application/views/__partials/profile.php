<?php $this->session->set_userdata('sitenow', $this->uri->segment(1));
if ($this->session->userdata('is_login') == true && $this->session->userdata('id_pks') == '0') {
    $role = 'admin';
} else {
    $role = 'user';
}

?>
<input type="hidden" id="basepath" value="<?= base_url() ?>">
<div id="profile" class="pe-4 d-block mt-2">
    <span class="dropdown">
        <div class="dropdown">
            <div style="text-decoration: none;"
                class=" fs-4 text-white fw-bold me-4 d-flex align-items-center curpo zoom-hover nb-shadow bg-transparent">
                <img class="profile-pic"
                    src="<?php echo base_url() ?>assets/img/profile_picture/<?php echo $this->session->userdata['profile']; ?>"
                    alt="">
                <span class="d-none d-sm-none d-md-inline d-lg-none d-xl-inline "
                    style="font-style:initial; font-size:0.8rem;font-weight:normal; margin-left:0.5rem;"><?php echo $this->session->userdata['nama']; ?><br>
            </div>
    </span>
    <ul style="position:absolute;right:0px;margin-top:5px" class="ms-2">
        <li class="text-main fw-bold d-xl-none d-lg-none d-md-block d-sm-block">
            <small style="background-color: lightgrey;"
                class="text-center ms-2 me-2 rounded p-2"><?php echo $this->session->userdata['nama']; ?></small>
        </li>
        <li><a href="<?php echo site_url('admin/') ?>">Dashboard</a></li>
        <li><a href="<?php echo site_url("$role/profile") ?>">Ubah Profil</a></li>
        <li><a href="<?php echo site_url('login/logout') ?>">Log Out</a></li>
    </ul>
</div>