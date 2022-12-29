<body>
    <section id="info-harga" class="team section-bg pt-5">
        <div class="container mt-5" data-aos="fade-up">
            <div>
                <div class="section-title">
                    <h2>Informasi Harga Tiap Mesin Instalasi</h2>
                    <p class="btm-border fromRight">Berikut ini adalah daftar harga tiap-tiap mesin instalasi.</p>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col sm-12 col-md-10 col-lg-8 col-xl-8 nb-shadow h-75">
                        <?php echo form_open_multipart('user/upload_info_harga'); ?>
                        <div class="member no-hover align-items-center bg-light p-0 overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                            <div class="p-0 d-flex align-items-center text-center  rounded">
                                <?php
                                $foldername_array = directory_map(FCPATH . 'media/upload/banner_harga');
                                foreach ($foldername_array as $key => $value) {
                                    echo '<img class="rounded" width="100%" height="auto" src="' . base_url() . 'media/upload/banner_harga/' . $value . '" alt="" srcset="">';
                                }
                                ?>
                            </div>
                            <div class=" mt-3 ms-2 me-2">
                                <label for="catatan" class="text-dark">Catatan</label>
                                <textarea style="white-space:pre-line" class="form-control" name="catatan" id="catatan" cols="10" rows="5"><?php if (isset($catatan)) {
                                                                                                                                                echo $catatan;
                                                                                                                                            } ?></textarea>

                                <div class="float-start mt-0 p-3 pt-0 d-block">
                                    <h4 class="fs-5 fw-bold text-left text-light">Ubah Gambar</h4>
                                    <div class=" ps-0 d-flex flex-row w-100">
                                        <div class="ms-0 ps-0 pb-2">
                                            <input class="form-control" type="file" name="berkas" />
                                        </div>
                                        <div class="ms-4">
                                            <button class="btn btn-primary  float-end" type="submit" value="upload">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>