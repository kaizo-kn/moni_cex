<section id='manajemen_review' class='section-bg'>
    <div class="container">
        <div class="section-title mt-2 mb-3">
            <h2>Manajemen Review</h2>
        </div>
        <table id="tabel_review">
            <thead>
                <th style="border-bottom:none">Review</th>
            </thead>
            <tbody>

                <?php
                $basepath = base_url();
                $bg = "";
                foreach ($data_review as $key => $value) {

                    extract($value);
                    $isi_reviews = ltrim($isi_review, "
                ");
                    if ($id_balasan == null && $is_hidden == "0") {
                        $bg = 'alert-warning';
                    } else if ($id_balasan == null && $is_hidden == "1") {
                        $bg = 'alert-secondary';
                    } else {
                        $bg = 'alert-info';
                    }

                    $gambar_review = array();
                    if (isset($gambar) && !empty($gambar) && $gambar != "") {
                        $path = FCPATH . "media/upload/review/$gambar/";
                        $foldername_array = directory_map($path);
                        if (!empty($foldername_array)) {
                            for ($xi = 0; $xi < count($foldername_array); $xi++) {
                                $gambar_review[$xi] = $foldername_array[$xi];
                            }
                        }
                    }
                    $gambar_balasan_review = array();
                    if (isset($gambar_balasan) && !empty($gambar_balasan) && $gambar_balasan != "") {
                        $path = FCPATH . "media/upload/answer/$gambar_balasan/";
                        $foldername_array = directory_map($path);
                        if (!empty($foldername_array)) {
                            for ($xi = 0; $xi < count($foldername_array); $xi++) {
                                $gambar_balasan_review[$xi] = $foldername_array[$xi];
                            }
                        }
                    }

                    if ($is_hidden == "0") {
                        $hide_show = "
                <form style='width:inherit' class='form-inline float-end' action='" . $basepath . "index.php/user/c_sembunyikan_review' method='post'>
                                    <input type='hidden' name='id_review' value=' $id_review '>
                                    <input type='submit' class='btn mainbgc text-light' value='Sembunyikan'>
                                </form>
                ";
                    } else {
                        $hide_show = "
                <form style='width:inherit' class='form-inline float-end' action='" . $basepath . "index.php/user/c_tampilkan_review' method='post'>
                                    <input type='hidden' name='id_review' value=' $id_review '>
                                    <input type='submit' class='btn btn-warning text-light' value='Tampilkan'>
                                </form>
                ";
                    }


                    echo "<tr><td style=''class='row mb-3  $bg pt-2 pb-2 justify-content-center rounded' >
                <div class='col-sm-12 col-md-5 col-lg-6 col-xl-6'>
                    <div class='card h-100'>
                        <div class='card-body text-start'>
                            <h5 class='card-title'>Judul Review: <p>$judul_review</p>
                            </h5>
                            <em class='text-secondary'>Dibuat Oleh: $nama</em><br>
                            <em class='text-secondary'><small>$tanggal_review</small></em>
                            <h5 class='card-title mt-2'>Review Produk: </h5>
                            <p style='white-space:pre-line;transform:translateY(-30px);margin-bottom:-20px;' class='card-text rounded'>
                                $isi_review</p>";
                    if (isset($gambar) && !empty($gambar)) {
                        echo "<h5 class='mt-0'>Foto:</h5><div class='row portfolio section-bg rounded p-2 pb-0 pt-3'>";
                        foreach ($gambar_review as $key => $value) {
                            echo "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3 d-flex justify-content-center aos-init' data-aos='fade-up'>
                                    <a href='" . $basepath . "media/upload/review/$gambar/$value' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link' title='Review $nama'>
                                    <img class='curpo rounded' style='object-fit:cover;width: 100px;height:60px;' src='" . $basepath . "media/upload/review/$gambar/$value' alt='' srcset=''>
                                    </a>
                                </div>";
                        }
                        echo "</div>";
                    }
                    echo "<div class='row justify-content-end align-items-end mt-2'>
                                <form style='width:inherit' class='form-inline' action='" . $basepath . "index.php/user/c_hapus_review' method='post'>
                                    <input type='hidden' name='id_review' value=' $id_review '>
                                    <input type='submit' class='btn btn-danger me-1' value='Hapus'>
                                </form>
                                $hide_show
                            </div>
                        </div>
                    </div>
                </div>
            ";
                    echo '<div class="col-sm-12 col-md-5 col-lg-6 col-xl-6 ">
            <div class="card h-100">
                <div class="card-body text-start">
                    <h5 class="card-title">Balasan Review Produk: </h5>
                    <small><em>'.$tanggal_balasan.'</em></small>
                    <form class="h-100" action="' . $basepath . 'index.php/user/c_balas_review" method="post" id="form-balasan" enctype="multipart/form-data">
                        <input type="hidden" name="id-review" value="' . $id_review . '">
                        <input type="hidden" name="nama_reviewer" value="' . $nama . '">
                        <input type="hidden" name="gambar_balasan" value="' . $gambar_balasan . '">
                        <div class="mb-2">
                        <textarea style="min-height:100px;white-space: pre-line; " class="text-secondary form-control " name="balasan-review" id="" placeholder="Tulis Balasan...">' . $balasan . '</textarea>
                        <label for="formFileMultiple" class="form-label mt-3">Tambahkan Gambar</label>';

                    if (isset($gambar_balasan) || !empty($gambar_balasan)) {
                        echo "<div class='row portfolio section-bg rounded p-2 pb-0 pt-3'>";
                        foreach ($gambar_balasan_review as $key => $value) {
                        
                            echo "<div class='col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3 d-flex justify-content-center aos-init' data-aos='fade-up'>
                                            <a href='" . $basepath . "media/upload/answer/$gambar_balasan/$value' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link' title='Review $nama'>
                                            <img class='curpo rounded' style='object-fit:cover;width: 100px;height:60px;' src='" . $basepath . "media/upload/answer/$gambar_balasan/$value' alt='' srcset=''>
                                            </a>
                                        </div>";
                           
                            
                            
                        }
                        echo "</div>";
                    } 
                    echo '<input name="files[]" class="form-control mt-2" type="file" id="formFileMultiple" multiple="" accept=".jpeg,.jpg,.png">
                    </div>
                    <button class="btn mainbgc text-light float-end mt-3 mb-2">Kirim Balasan</button>
                        </form>
                </div>
            </div>
        </div>';
                    echo "</td></tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#tabel_review').DataTable({
            "aaSorting": []
        });
    });
</script>