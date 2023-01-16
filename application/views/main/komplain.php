<!-- ======= Frequently Asked Questions Section ======= -->
<section id="complaint" class="faq section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Halaman Ulasan</h2>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne" ar>
                    <button class="accordion-button pb-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <p class="fs-5 mt-0">Buat Review Baru</p>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="row" action="c_add_complaint" method="post" enctype="multipart/form-data">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Review..." required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda..." required>
                                </div>
                                <div class="mb-2">
                                    <label for="formFileMultiple" class="form-label">Tambahkan Gambar</label>
                                    <input name='files[]' class="form-control" type="file" id="formFileMultiple" multiple accept="image">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3">
                                    <label for="review" class="form-label">Isi Review</label>
                                    <textarea style="min-height:125px;white-space: pre-wrap; " class="form-control" name="review" rows="3"></textarea>
                                </div>
                                <div class="alert"><button class="btn mainbgc text-light float-end" type="submit">Kirim</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 section-bg mb-3  container">
            <?php
            $review = $this->m_home->m_get_complaint();
            foreach ($review as $key => $value) {
                if ($this->session->userdata('is_login') == false) {
                    if ($value['is_hidden'] == "0") {
                        if (isset($value['id_balasan'])) {
                            $balasan = $this->m_home->m_get_balasan($value['id_balasan']);
                            $value = array_merge($value, $balasan);
                            $this->load->view('__partials/complaint_items.php', $value);
                            $balasan = "";
                        } else {
                            $this->load->view('__partials/complaint_items.php', $value);
                        }
                    }
                } else {
                    if (isset($value['id_balasan'])) {
                        $balasan = $this->m_home->m_get_balasan($value['id_balasan']);
                        $value = array_merge($value, $balasan);
                        $this->load->view('__partials/complaint_items.php', $value);
                        $balasan = "";
                    } else {
                        $this->load->view('__partials/complaint_items.php', $value);
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
</main>