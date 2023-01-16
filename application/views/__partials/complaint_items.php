<div class="row mb-3 justify-content-center align-items-middle <?php if ($id_balasan == null && $this->session->userdata('is_login') == true) {
                                                                    echo 'alert-warning';
                                                                } else if (( $this->session->userdata('is_login') == true) && $is_hidden == "1") {
                                                                    echo 'alert-secondary';
                                                                }else{
                                                                    echo 'alert-info';   
                                                                } ?> pt-2 pb-2 rounded">
    <div class="col-sm-12 col-md-5 col-lg-6 col-xl-6">
        <div class="card h-100">
            <div class="card-body">
                <h5 style="margin-bottom:-15px;" class="card-title">Judul: <p>
                <?= $judul_komplain ?>
                </p></h5>
                <em class="text-secondary">Dibuat Oleh: <?= $nama ?></em><br>
                <em class="text-secondary"><small><?= $tanggal_komplain ?></small></em>
                <h5 class="card-title mt-2">Review Produk: </h5>
                <p style="white-space:pre-line;transform:translateY(-30px);margin-bottom:-20px;" class="card-text rounded">
                    <?= ltrim($isi_komplain, "
                    ") ?>
                </p>
                <h5 class="mt-0">Foto:</h5>
                <?php
                if (isset($gambar)) {
                    $imagepath = 'media/upload/complaint/' . $gambar;
                    $foldername_array = directory_map($imagepath);
                    echo '<div class="row portfolio section-bg rounded p-2 pb-0 pt-3">';
                    foreach ($foldername_array as $key => $image) {
                        echo '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3 d-flex justify-content-center" data-aos="fade-up">
                    <a href="' . base_url($imagepath) . "/" . $image . '" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<h4 class=`text-info`>Komplain ' . $nama . '<br>' . $image . '</h4>">
                        <img class="curpo rounded" style="max-width: 100px;max-height:150px;;" src="' . base_url($imagepath) . "/" . $image . '" alt="" srcset="">
                    </a>
                </div>';
                    }
                    echo '  </div>';
                } else {
                    echo '<div>
<em class="text-secondary">
    Tidak Ada Foto...
</em>
</div>';
                }

                ?>
                <?php
                if ($this->session->userdata('is_login') == TRUE) {
                    echo '<div class="row justify-content-end align-items-end mt-2">
                        <form style="width:inherit" class="form-inline" action="c_hapus_komplain" method="post">
                        <input type="hidden" name="id_komplain" value="' . $id . '">
                        <input type="submit" class="btn btn-danger me-1" value="Hapus">
                        </form>';
                    if (!$is_hidden == 0) {
                        echo '
                        <form style="width:inherit" class="form-inline" action="c_tampilkan_komplain" method="post">
                        <input type="hidden" name="id_komplain" value="' . $id . '">
                        <input type="submit" class="btn btn-warning" value="Tampilkan">
                        </form>';
                    } else {
                        echo '
                        <form style="width:inherit" class="form-inline float-end" action="c_sembunyikan_komplain" method="post">
                        <input type="hidden" name="id_komplain" value="' . $id . '">
                        <input type="submit" class="btn mainbgc text-light" value="Sembunyikan">
                        </form>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-6 col-xl-6 ">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Balasan Review Produk: </h5><?php if ($id_balasan != null && $this->session->userdata('is_login') == true) {
                                                                echo '<em class="text-secondary float-end"><small>' . $tanggal_balasan . '</small></em>';
                                                            } ?>
                <?php if ($id_balasan != null && $this->session->userdata('is_login') == false) {
                    echo '<p style="white-space:pre-line;" class="card-text mb-1">' . $balasan . '</p>
                    <em class="text-secondary">Dijawab pada:<small> ' . $tanggal_balasan . '</small> </em>
                <h5 class="mt-3">Foto:</h5>';
                    if (isset($gambar_balasan)) {
                        if ($gambar_balasan != "") {
                            echo ' <div class="row portfolio section-bg rounded p-2 pb-0 pt-3 ">';
                            $imagepath = 'media/upload/answer/' . $gambar_balasan;
                            $foldername_array = directory_map($imagepath);
                            foreach ($foldername_array as $key => $image) {
                                echo '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3 d-flex justify-content-center" data-aos="fade-up">
                    <a href="' . base_url($imagepath) . "/" . $image . '" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<h4 class=`text-info`>Komplain ' . $nama . '<br>' . $image . '</h4>">
                        <img class="curpo rounded" style="max-width: 100px;max-height:150px;;" src="' . base_url($imagepath) . "/" . $image . '" alt="" srcset="">
                    </a> </div>';
                            }
                            echo '</div>';
                        }
                    } else {
                        echo '<div>
    <em class="text-secondary">
        Tidak Ada Foto...
    </em>
    </div>';
                    }
                } else if ($this->session->userdata('is_login') == TRUE) {
                    if ($id_balasan == null) {
                        $balasan = '';
                        $gambar_balasan = null;
                    }
                    echo '<form class="h-100" action="c_balas_komplain" method="post" id="form-balasan" enctype="multipart/form-data">
                    <input type="hidden" name="id-review" value="' . $id . '">
                    <div class="mb-2">
                    <textarea style="min-height:100px;white-space: pre-line; "; class="text-secondary form-control " name="balasan-review" id="" placeholder="Tulis Balasan...">' . $balasan . '</textarea>
                    <label for="formFileMultiple" class="form-label mt-3">Tambahkan Gambar</label>';

                    if (isset($gambar_balasan)) {
                        if ($gambar_balasan != "") {
                            echo ' <div class="row portfolio section-bg rounded p-2 pb-0 pt-3 mb-2">';
                            $imagepath = 'media/upload/answer/' . $gambar_balasan;
                            $foldername_array = directory_map($imagepath);
                            foreach ($foldername_array as $key => $image) {
                                echo '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3 d-flex justify-content-center" data-aos="fade-up">
                    <a href="' . base_url($imagepath) . "/" . $image . '" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<h4 class=`text-info`>Komplain ' . $nama . '<br>' . $image . '</h4>">
                        <img class="curpo rounded" style="max-width: 100px;max-height:150px;;" src="' . base_url($imagepath) . "/" . $image . '" alt="" srcset="">
                    </a></div>';
                            }
                            echo '</div>';
                        }
                    }

                    echo '<input name="files[]" class="form-control" type="file" id="formFileMultiple" multiple accept="image">
                </div>
                <button class="btn mainbgc text-light float-end mt-3 mb-2">Kirim Balasan</button>
                    </form>';
                } else {
                    echo '<em  class="text-secondary">Belum Ada Balasan...</em>';
                }
                $balasan = '';
                $gambar_balasan = null;
                ?>

            </div>
        </div>
    </div>
</div>