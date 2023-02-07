
<section id="review" class="faq section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Review Produk PMT</h2>
        </div>
        <div class="accordion mb-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne" ar>
                    <button class="accordion-button pb-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <p class="fs-5 mt-0">Tambah Review Baru</p>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="row" action="c_add_review" method="post" enctype="multipart/form-data">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Review</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Review..." required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda..." required>
                                </div>
                                <div class="mb-2">
                                    <label for="formFileMultiple" class="form-label">Tambahkan Gambar <span class="text-danger">*</span> </label>
                                    <input name='files[]' class="form-control" type="file" id="formFileMultiple" multiple accept=".jpeg,.jpg,.png">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3">
                                    <label for="review" class="form-label">Isi Review</label>
                                    <textarea style="min-height:125px;white-space: pre-wrap; " class="form-control" name="review" rows="3"></textarea>
                                </div>
                                <div class="alert"><button class="btn mainbgc text-light float-end" type="submit">Kirim</button></div>
                            </div>
                            <div>
                                <span class="text-danger">*</span><span class="text-secondary"> Hanya menerima gambar dengan format jpeg/jpg/png dengan ukuran maksimal 5MB dan jumlah maksimal 4 gambar. </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="mt-3" id="tabel_review">
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
                                $isi_review</p>
                            ";
                    if (isset($gambar) || !empty($gambar)) {
                        echo "<h5 class='mt-0'>Foto:</h5><div class='row justify-content-evenly section-bg rounded p-2 pb-0 pt-3'>";
                        foreach ($gambar_review as $key => $value) {
                            echo "<div class='col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-3' >
                                    <a href='" . $basepath . "media/upload/review/$gambar/$value' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link' title='Review $nama'>
                                        <img class='curpo rounded' style='object-fit:cover;width: 100%;height:100%;' src='" . $basepath . "media/upload/review/$gambar/$value' alt='' srcset=''>
                                    </a>
                                </div>";
                        }
                        echo "</div>";
                    } 
                    echo "
                        </div>
                    </div>
                </div>
            ";
                    echo '<div class="col-sm-12 col-md-5 col-lg-6 col-xl-6 ">
            <div class="card h-100">
                <div class="card-body text-start">
                    <h5 class="card-title">Balasan Review Produk: </h5>';
                    if(isset($id_balasan)&&$id_balasan!=""){
                        echo '                          
                            <div class="mb-2 mt-2">
                            <p style="min-height:100px;white-space: pre-wrap; " class="text-secondary ">' . $balasan . '</p>';
                            if (isset($gambar_balasan) && !empty($gambar_balasan)) {
                                echo "<h5>Foto:</h5><div class='row justify-content-evenly section-bg rounded p-2 pb-0 pt-3'>";
                                foreach ($gambar_balasan_review as $key => $value) {
                                    
                                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-3' >
                                                    <a href='" . $basepath . "media/upload/answer/$gambar_balasan/$value' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link' title='Review $nama'>
                                                    <img class='curpo rounded' style='object-fit:cover;width: 100%;height:100%;' src='" . $basepath . "media/upload/answer/$gambar_balasan/$value' alt='' srcset=''>
                                                    </a>
                                                </div>";
                                }
                                 echo "</div>";
                            
                            }
                            
                    }else{
                        echo "<p> <em> Belum ada balasan...</em></p>";
                    }        
            echo '
                </div>
                </div>
                <small class="ms-3 mb-3 me-3"><em class="text-secondary">Dibalas pada: ' . $tanggal_balasan . '</em></small> 
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
</main>