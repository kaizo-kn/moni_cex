<body>

    <section id="info-harga" class="team section-bg pt-5">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Profil</h2>
                <div class="form-control text-left">
                    <?php echo form_open_multipart('user/edit_profil'); ?>
                    <div class="row w-90">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-lg-end">
                            <div class="float-lg-end">
                                <label class="subtitle text-dark float-start" for="fp">Foto Profil *</label>
                                <div class="p-1 mb-2">
                                    <img class="rounded w-100 mb-2 no-hover zoom-hover nb-shadow" src="<?php echo base_url() ?>assets/img/profile_picture/<?=$profile?>" alt="" srcset="">
                                    <input type="file" name="berkas" class="form-control" id="fp" accept=".jpeg,.jpg,.png">
                                    <small>* Hanya menerima gambar dengan format jpeg/jpg/png dengan ukuran maks. 5MB</small>
                                </div>
                            </div>
                            <div class="d-xl-block d-lg-block d-md-block d-sm-none ms-4 d-none" style="height: 100%;width:1px;background-color:lightgray; transform:scaleY(1.015)"></div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mt-3">
                                <label class="float-start" for="name">Nama</label>
                                <input value="<?=$nama?>" type="text" name="nama" class="form-control" id="name" required>
                                <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>'); ?>
                            </div>

                            <div class="form-group mt-3">
                                <label class="float-start text-disabled" for="">Nama Pengguna</label>
                                <input style="pointer-events:none" value="<?=$username?>" type="text" name="username" class="form-control" id="mail" readonly>
                                <?php echo form_error('username', '<div class="text-danger"><small>', '</small></div>'); ?>
                            </div>

                            <div class="form-group mt-3">
                                <label class="float-start" for="pass">Password</label>
                                <input type="password" name="password" class="form-control" id="pass">
                                <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                            </div>
                            <div class="form-group mt-3">
                                <div>
                                    <button type="submit" class="btn btn-primary float-end">Update Profil</button>
                                </div>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
    </section>