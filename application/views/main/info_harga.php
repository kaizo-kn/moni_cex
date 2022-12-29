<section id="info-harga" class="team section-bg pt-5">
    <div id="modalContent"></div>
    <div class="container mt-5" data-aos="fade-up">
        <div class="section-title">
            <h2>Informasi Harga Tiap Mesin Instalasi</h2>
            <p>Berikut ini adalah daftar harga tiap-tiap mesin instalasi.</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <?php 
                $foldername_array = directory_map(FCPATH.'media/upload/banner_harga');
                foreach ($foldername_array as $key => $value) {
                    echo '<img id="banner" width="100%" height="auto" src="'.base_url().'media/upload/banner_harga/'.$value.'" alt="" srcset="">';
                }
                ?>
            </div>
            <div>
                <h4 class="subtitle mt-4 mt-sm-5">
                    CATATAN:
                </h4>
                <p style="white-space:pre-line;margin-top:-20px" class="pt-sm-0 fw-bold">
                <?php if(isset($catatan)){
                    echo $catatan;
                }?>
                </p>
            </div>
        </div>
        <div class="row mt-lg-4 pt-lg-4">
            <div class="col">
                <h4 class="subtitle text-center">
                    Rincian Detail Bahan dan Harga Setiap 6 Standarisasi Mesin - Mesin Proses Kelapa Sawit
                </h4>
            </div>
        </div>

        <div class="row mt-lg-4">
            <div onclick="buildModal('Fruit Cages / Lori Buah','<?= base_url('media/upload/info_harga/') ?>LORI.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="<?= base_url('media/upload/icons/') ?>lori.png" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Fruit Cages / Lori Buah</h4>
                        <span>Klik untuk melihat rincian harga</span>
                    </div>
                </div>
            </div>
            <div onclick="buildModal('Thresher','<?= base_url('media/upload/info_harga/') ?>thresher-1.png','<?= base_url('media/upload/info_harga/') ?>thresher-2.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="<?= base_url('media/upload/icons/') ?>thresher.png" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Thresher</h4>
                        <span>Klik untuk melihat rincian harga</span>
                    </div>
                </div>
            </div>
            <div onclick="buildModal('Cake Breaker Conveyor','<?= base_url('media/upload/info_harga/') ?>CBC-A.png','<?= base_url('media/upload/info_harga/') ?>CBC-B.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="<?= base_url('media/upload/icons/') ?>cbc.png" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Cake Breaker Conveyor</h4>
                        <span>Klik untuk melihat rincian harga</span>
                    </div>
                </div>
            </div>
            <div onclick="buildModal('Fruit Elevator','<?= base_url('media/upload/info_harga/') ?>timba-buah.png','<?= base_url('media/upload/info_harga/') ?>timba-buah-2.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img style="height: 150px;" src="<?= base_url('media/upload/icons/') ?>fruitelev.png" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Timba Buah</h4>
                        <span>Klik untuk melihat rincian harga</span>
                    </div>
                </div>
            </div>
            <div onclick="buildModal('Hidrocyclone','<?= base_url('media/upload/info_harga/') ?>hidroc1.png','<?= base_url('media/upload/info_harga/') ?>hidroc2.png','<?= base_url('media/upload/info_harga/') ?>hidroc3.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="<?= base_url('media/upload/icons/') ?>hidrocyclone.png" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Hydrocyclone</h4>
                        <span>Klik untuk melihat rincian harga</span>
                    </div>
                </div>
            </div>
            <div onclick="buildModal('Polishing Drum','<?= base_url('media/upload/info_harga/') ?>polishing-drum-A.png','<?= base_url('media/upload/info_harga/') ?>polishing-drum-B.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="<?= base_url('media/upload/icons/') ?>polishdrum.png" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Polishing Drum</h4>
                        <span>Klik untuk melihat rincian harga</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>