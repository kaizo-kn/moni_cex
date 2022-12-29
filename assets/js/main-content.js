function sliderValue(type, jump) {
    let rangeval = parseInt($(".rs-range").val());
    if (type == "plus") {
        rangeval += jump;
        setRangeSliderValue(rangeval);
    } else {
        rangeval -= jump;
        setRangeSliderValue(rangeval);
    }
}

function setRangeSliderValue(rangeval) {
    $(".rs-range").val(rangeval);
    $(".modal-content-img").css("width", "" + rangeval + "%");
}

function buildModal() {
    let title = arguments[0];
    let content = "";
    if (arguments.length > 1) {
        for (p = 1; p < arguments.length; p++) {
            content +=
                `<img class="modal-content-img" src="` +
                arguments[p] +
                `" alt="` +
                arguments[p] +
                `" srcset="" style="height:100%;width: 100%;">
            `;
        }
    }

    let modal =
        `<!-- Modal -->
        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <!--desktop zoom bar-->  
          <div style="position: fixed;z-index:90;right:0px;transform:translateX(120px)scale(.9)rotate(270deg);width:max-content;height:max-content;bottom:40vh" class="range-slider d-none d-sm-none d-md-none d-lg-block d-xl-block">
            
            <i style="margin-left:30px;transform: rotate(90deg);" onclick="setRangeSliderValue(100)" class="btn text-dark rounded-circle bi bi-bootstrap-reboot  fs-2 fw-bold "></i>
                <i onclick="sliderValue('minus',20)" style="margin-left:10px;transform: rotate(90deg);" class="btn  bi bi-zoom-out fw-bold fs-2 pe-1"></i><input onchange="setRangeSliderValue($('#rs-range-line').val())" oninput="setRangeSliderValue($('#rs-range-line').val())" style="width: 200px;" id="rs-range-line" class="rs-range"
            type="range" value="100" min="50" max="400">
        <i onclick="sliderValue('plus',20)" style="margin-left:10px;transform: rotate(90deg);" class="btn  bi bi-zoom-in fw-bold fs-2 pe-1 pt-4"></i>
        <i style="transform: rotate(90deg);" class="btn text-dark rounded-circle bi bi-x-circle fs-2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></i>
        </div>
              <!--mobile zoom bar-->
              <div style="position: fixed;z-index:90;margin-right:auto;margin-left:auto;transform: scale(.85);width:max-content;height:max-content;bottom:3vh" class="range-slider  d-sm-inline-block d-md-inline-block d-lg-none d-xl-none">
                <i class=" btn text-dark rounded-circle bi bi-x-circle fs-2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></i>
                <i onclick="sliderValue('minus',20)" style="margin-left:10px;" class="btn  bi bi-zoom-out fw-bold fs-2 pe-1"></i><input onchange="setRangeSliderValue($('#rs-range-line1').val())" oninput="setRangeSliderValue($('#rs-range-line1').val())" style="width: 35vw;" id="rs-range-line1" class="rs-range"
            type="range" value="100" min="50" max="400">
        <i onclick="sliderValue('plus',20)" style="margin-left:10px;" class="btn  bi bi-zoom-in fw-bold fs-2 pe-1"></i><i onclick="setRangeSliderValue(100)" class="btn text-dark rounded-circle bi bi-bootstrap-reboot  fs-2 fw-bold ms-4 "></i>
        </div>
            <div style="max-width: 95vw;" class="modal-dialog modal-dialog-centered border-dark border-1">
                <div style="border: solid 2px;" class="modal-content">
                    <div class="modal-header mainbgc">
                        <h3 class="modal-title subtitle text-light text-center" id="staticBackdropLabel">` +
        title +
        `</h3><i class=" float-end btn text-dark rounded-circle bi bi-x-circle fs-2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                    <div class="modal-body overflow-scroll ">
                      <div class="modal-img-1"  style="height:100%;width: 100%;">
                      ` +
        content +
        `
                      </div>
                    </div>
                    <div class="modal-footer mainbgc justify-content-center">
                        <h3 class="modal-title subtitle text-light text-center" id="staticBackdropLabel">PMT Dolok Ilir</h3>
                    </div>
                </div>
            </div>
        </div>`;
    setTimeout(() => {
        $("#modalContent").html(modal);
    }, 100);
    setTimeout(() => {
        $("#staticBackdrop").modal("show");
        modal = "";
        content += " ";
    }, 150);
}

const admin_page = `<!-- Info Stok Sparepart -->
        <section id="stok_sparepart" class="bg-light rounded-bottom">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Edit Informasi Jumlah Stok Sparepart</h2>
                </div>
              <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
                <div class="bd-example mt-5 table-responsive p-2">
                    <form target="dummyframe" action="pmt-update-data.php" method="post">
                    <table style="vertical-align: middle;" class="table table-bordered text-center align-items-center border-dark rounded">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;text-align:left ;border-radius: 5px 5px 0px 0px;" colspan="6" scope="col" class="subtitle">
                                  <span>Update Terakhir : &nbsp</span><input class="subtitle ms-1" style="border:none;background-color:transparent;text-align:center;" id="tanggal_update" name="tanggal_update" type="text" placeholder="Tanggal otomatis diperbaharui... " disabled >
                                </th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;" colspan="6" scope="col" class="lead fw-bold fs-3 text-center title">
                                    STOK SPAREPART PMT-DOI
                                </th>
                            </tr>
                            <tr>
                                <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">No</th>
                                <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">Uraian Mesin / Instalasi</th>
                                <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">Satuan</th>
                                <th class="bg-warning" style="vertical-align: middle;" scope="col">Stok Minimal Persediaan Barang Jadi</th>
                                <th class="bg-orange" style="vertical-align: middle;" scope="col">Stok Saat Ini Persediaan Barang Jadi</th>
                            </tr>
                            <tr class="bg-secondary">
                                <th class="text-center bg-warning ">Jumlah</th>
                                <th class="text-center bg-orange">Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td style="text-align: left;">Lori Rebusan (Kapasitas @ 2.500 kg TBS)</td>
                                <td>Unit</td>
                                <td>50</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="lori_rebusan" name="lori_rebusan" type="text" ></td>
                            </tr>

                            <tr>
                                <td rowspan="2"></td>
                                <td style="text-align: left;">Roda Lori c/w As</td>
                                <td>Set</td>
                                <td>100</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roda_lori" name="roda_lori" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bushing</td>
                                <td>Pcs</td>
                                <td>200</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bushing_lori" name="bushing_lori" type="text" ></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td style="text-align: left;">Timba - Timba Buah Masak (Fruit Elevator)</td>
                                <td>Unit</td>
                                <td>1</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="fruit_elevator" name="fruit_elevator" type="text" ></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td style="text-align: left;">Bantingan (Thresher)</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td style="text-align: left;">As Bantingan</td>
                                <td>Set</td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="as_thresher" name="as_thresher" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Tromol Bantingan</td>
                                <td>Set</td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="tromol_thresher" name="tromol_thresher" type="text" ></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td style="text-align: left;"> CBC (Cake Breaker Conveyor)</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="3"></td>
                                <td style="text-align: left;">Bodi CBC
                                </td>
                                <td>Segmen</td>
                                <td>12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_cbc" name="body_cbc" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Gantungan CBC</td>
                                <td>Set</td>
                                <td>20</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="gantungan_cbc" name="gantungan_cbc" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Pedal - Pedal CBC c/w As</td>
                                <td>Segmen</td>
                                <td> 12 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="pedal_cbc" name="pedal_cbc" type="text" ></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td style="text-align: left;"> Polishing Drum</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="4"></td>
                                <td style="text-align: left;">Bodi Polishing Drum
                                </td>
                                <td>Set </td>
                                <td>1</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_polishdrum" name="body_polishdrum" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roll Bodi Polishing Drum</td>
                                <td> Set </td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roll_body_polishdrum" name="roll_body_polishdrum" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roll Bawah Polishing Drum </td>
                                <td>Set </td>
                                <td> 8 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roll_bawah_polishdrum" name="roll_bawah_polishdrum" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roda Gigi Polishing Drum </td>
                                <td>Buah </td>
                                <td> 2 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="gear_polishdrum" name="gear_polishdrum" type="text" ></td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td style="text-align: left;"> Hydrocyclone</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="8"></td>
                                <td style="text-align: left;">Dewatering Drum
                                </td>
                                <td> Buah</td>
                                <td> 10</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="dewatering_drum" name="dewatering_drum" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bottom Cone Inti</td>
                                <td> Buah </td>
                                <td>12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bottom_cone_inti" name="bottom_cone_inti" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bottom Cone Cangkang</td>
                                <td> Buah </td>
                                <td> 12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bottom_cone_cangkang" name="bottom_cone_cangkang" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Vortex Finder </td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="vortex_finder" name="vortex_finder" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Feed Housing</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="feed_housing" name="feed_housing" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Body Cyclone</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_cyclone" name="body_cyclone" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Separating Cyclone</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="separating_cyclone" name="separating_cyclone" type="text" ></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Box Control</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="box_control" name="box_control" type="text" ></td>
                            </tr>
<tr>
                                    <td colspan="6">
                                        <button onclick="alert('Sukses')" class="float-end btn bg-info btn-dark rounded-pill" type="submit">Kirim</button>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </section>`;

function displayPage(html, menuID) {
    if ($('.site_url').val() == 'komplain') {
        console.log(html, menuID)
        window.location.href = $('.base_url').val() + 'index.php/home/#'
    }
    console.log($('.site_url').val())
    if (html != null) {
        if (menuID.includes("nav")) {
            menuID = menuID.replaceAll("nav", "menu");
            console.log(menuID, 1);
            $("#" + menuID + "").addClass("offcanvas-menu-active");
            $("#" + menuID + "")
                .siblings()
                .removeClass("offcanvas-menu-active");
        } else {
            $("#" + menuID + "").addClass("offcanvas-menu-active");
            $("#" + menuID + "")
                .siblings()
                .removeClass("offcanvas-menu-active");
        }
        if (menuID.includes("menu")) {
            menuID = menuID.replaceAll("menu", "nav");
            console.log(menuID, 2);
            $("#" + menuID + "").addClass("nav-menu-active");
            $("#" + menuID + "")
                .parent()
                .siblings()
                .find("a")
                .removeClass("nav-menu-active");
        }
        $("main").html(html);
        $(this).scrollTop(0);
    }
}

const home =
    `<!-- Home Section -->
        <section id="home" class="pt-0 pb-2 rounded-bottom" style=" background-color: rgba(219, 219, 219, 0.836)!important;"  >
          
        <div id="cta" class="cta">
        <div style="backdrop-filter:blur(10px); width:100%;height:100%;background-color:rgba(31, 216, 170, 0.527);" class="pt-4 pb-4" >  
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div class=" text-center text-lg-start section-title">
                            <h2 class="title text-light text-center">Tentang Kami</h2>
                            <div class="mt-3">
                                <h4 class="subtitle text-light text-center mt-3">PMT Dolok Ilir</h4>
                                <h5 class="subtitle text-light text-center">Unit Perbengkelan PT Perkebunan Nusantara IV</h5>
                                <p>Saat ini, kami mampu memenuhi seluruh permintaan perbaikan, pembuatan maupun pemasangan instalasi pabrik baik di dalam maupun di luar PTPN IV.</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container mt-xl-4 mt-lg-4 mt-md-4" data-aos="zoom-fade-up" data-aos-delay="200">
                <div class="row mb-0 pb-0 mt-lg-4 mt-xl-4 mt-sm-0">
                    <div class="col-lg-4 col-md-4 col-sm-1 m-0 p-0">
                        <div style="height:300px" class=" mainbgc d-flex justify-content-center align-items-center">
                            <div class="d-block">
                                <h1 class="text-light text-center font-weight-bold" id="judul">PROFIL <br> BISNIS</h1>
                                <h4 class="text-dark text-center">Pabrik Mesin Tenera</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-1 m-0 p-0">
                        <div style="min-height:300px;background-image: url(` + $(".base_url").val() + `assets/img/tenera_1.jpg);" class="d-flex justify-content-center align-items-center"></div>
                    </div>
                </div>
                <div class="row mt-0 pt-0">
                    <div class="col-lg-8 col-md-8 col-sm-1 m-0 p-3 pl-4 bg-dark">
                        <div style="min-height:300px" class=" d-flex justify-content-center align-items-center">
                            <div class="d-block">
                                <p style="color:#cccccc;font-size:smaller;">
                                    Pabrik Mesin Tenera (PMT) adalah satu unit usaha milik PT Perkebunan Nusantara IV yang bergerak pada bidang manufaktur peralatan dan komponen mesin-mesin Pabrik Kelapa Sawit (PKS). PMT berlokasi di Dolok Ilir Kecamatan Serbalawan Kabupaten Simalungun
                                    Provinsi Sumatera Utara. PMT memiliki beberapa bagian yang saling mendukung dalam melakukan perancangan/desain, proses produksi, sampai dengan pemasangan di lapangan. Bagian-bagian tersebut antara lain: Bagian Perancangan/Desain,
                                    Bagian PPC (Product Planning &amp; Control), Bagian Foundry (Pengecoran Logam), Bagian Permesinan, Bagian Konstruks, Bagian Assembling, Bagian Proyek.<br> SERTIFIKASI UNTUK PENGECORAN
                                    LOGAM (SNI) OLEH BALAI RISET DAN STANDARDISASI INDUSTRI MEDAN :<br> 1. Sertifikasi Besi Tuang Kelabu dan Baja Tuang Paduan<br> 2. Sertifikasi Baja Cor Tahan Panas<br> 3. Sertifikasi Baja Tuang Carbon Kekuatan Rendah
                                    dan Menengah<br> 4. Sertifikasi Mutu Baja Carbon Cor<br> 5. Sertifikasi Baja Cor Berbentuk Bulat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-1 m-0 p-3 pl-4 bg-light">
                        <div style="min-height:300px;" class="d-flex justify-content-center align-items-center">
                            <div class="text-center font-weight-bolder">
                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                    <div class="image_wrapper"><img class="scale-with-grid" src="https://www.ptpn4.co.id/wp-content/uploads/2017/01/value-icon-mini.png" alt="value-icon-mini" width="35" height="35"></div>
                                </div>
                                <br>
                                <br>

                                <p style="font-size:smaller">
                                    PMT sangat berpengalaman dalam bidang rancang bangun, pembuatan, serta perbaikan peralatan mesin-mesin PKS, khususnya PKS milik PT Perkebunan Nusantara IV. Saat ini PMT telah mengimplementasikan ISO 9001 : 2008 dan SMK3, serta beberapa produk-produk hasil
                                    produksi PMT telah mendapatkan sertifikasi Standard Nasional Indonesia (SNI).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-xl-4 mt-lg-4 mt-md-0 mt-sm-0" data-aos="zoom-fade-up" data-aos-delay="200">
                <div class="row row-no-gap mb-0 pb-0">
                    <div class="col-lg-8 col-md-8 col-sm-1 m-0 p-0">
                        <div style="min-height:300px;background-image: url(` + $(".base_url").val() + `assets/img/tenera_2.jpg);" class=" d-flex justify-content-center align-items-center">

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-1 m-0 p-0 bg-dark">
                        <div style="min-height:300px;" class="d-flex justify-content-center align-items-center">
                            <div class="text-light text-center d-block ">
                                <h1 id="judul">VISI DAN <br>MISI</h1>
                                <h3 class="text-info">PMT Dolok Ilir</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="font-size:smaller" class="row mt-0 pt-0">
                    <div class="col-md-8 col-lg-8 col-sm-1 m-0 p-3 pl-4 mainbgc">
                        <div style="min-height:300px" class=" d-flex justify-content-center align-items-center">
                            <div class="column_attr clearfix">
                                <h5 style="color:#fff">VISI</h5>
                                Melayani segala kebutuhan sektor industri Pabrik Kelapa Sawit dalam hal pembuatan mesin-mesin produksi, serta menyediakan jasa perbaikan sparepart dengan kualitas terbaik dan terpercaya<br><br>
                                <h5 style="color:#fff">MISI</h5>
                                1.Secara berkesinambungan menyediakan produk dan jasa yang berkualitas hingga mampu memberikan rasa puas dan kepercayaan pelanggan agar terjalin kerjasama yang baik<br> 2.Mengembangkan kualitas karyawan yang berkompeten
                                dengan menciptakan lingkungan kerja yang baik untuk mendukung tercapainya visi perusahaan terutama kepuasan bagi pelanggan<br><br>
                                <h5 style="color:#fff">BUDAYA PERUSAHAAN</h5>
                                Kepuasan pelanggan adalah tujuan kami</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-1 m-0 p-3 pl-4   bg-light">
                        <div style="min-height:300px;" class="d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                    <div class="image_wrapper"><img class="scale-with-grid" src="https://www.ptpn4.co.id/wp-content/uploads/2017/01/doc-sign-mini.png" alt="value-icon-mini" width="35" height="35"></div>
                                </div><br>

                                <p style="font-size:small ;">PMT memiliki program strategi yg memberikan peluang untuk dapat terus melayani para pelanggan antara lain : <br> 1. Dibawah Bagian Teknik dan Pengolahan melayani penuh kehandalan Mesin Instalasi di 16 PKS dan 2 Pabrik Teh
                                    PTPN 4 sehingga menciptakan Operasional Excellence yang tangguh dengan pelayanan : Desain Engineering, Permesinan, Konstruksi dan Pemasangan serta pelayanan Produksi Foundry <br> 2. Memiliki produk unggulan 6 mesin
                                    instalasi standar di PKS yang sudah dipergunakan di seluruh PKS PTPN4 sehingga memudahkan dalam penyediaan suku cadang yang standar dan seragam.<br> 3. Mencapai Cost Leadership sehingga memiliki daya saing dan berkesinambungan<br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-0 pb-0 pt-lg-4 pt-md-4">
                    <div class="col-md-4 col-lg-4 col-sm-1 m-0 p-0">
                        <div style="height:300px" class=" mainbgc d-flex justify-content-center align-items-center">
                            <div class="d-block">
                                <h1 class="text-light text-center font-weight-bold" id="judul">SEJARAH</h1>
                                <h5 class="text-dark text-center">Pengalaman kami terus berkembang sejak tahun 1928</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-1 m-0 p-0">
                        <div style="min-height:300px;background-image: url(` +
    $(".base_url").val() +
    `assets/img/tenera_1.jpg);" class="d-flex justify-content-center align-items-center"></div>
                    </div>
                </div>
                <div class="row mt-0 pt-0">
                    <div class="col-md-8 col-lg-8 col-sm-1 m-0 p-3 pl-4 bg-dark">
                        <div style="min-height:300px;" class=" d-flex justify-content-center align-items-center">
                            <div class="d-block">
                                <p style="color:white;font-size:smaller;">Didirikan tahun 1928 sebagai unit bengkel yang melayani Pabrik Sisal milik HVA. Pada tahun 1957 pengambil alihan perkebunan milik HVA oleh Pemerintah Indonesia menyebabkan pengubahan nama unit bengkel menjadi Bengkel Induk
                                    Dolok Ilir atau disingkat BIDI yang kegiatannya adalah melayani pabrik-pabrik eks HVA. Sejalan dengan kebijakan pemerintah dibidang pengembangan sektor pertanian maka kegiatan Bengkel Induk Dolok Ilir diarahkan untuk
                                    menunjang dan mendukung pembangunan sektor pertanian khususnya perkebunan kelapa sawit. Dalam upaya untuk meningkatkan kemampuan di bidang manufaktur, rekayasa dan rancang bangun pembuatan dan pemasangan pabrik kelapa
                                    sawit maka pada tahun 1982 – 1987 telah dijalin kerja sama teknik dan manajemen dengan Balai Pengembangan Industri Logam dan Mesin (BBLM) Bandung. Pada tahun 1983 nama bengkel Induk diubah menjadi Pabrik Mesin Tenera
                                    disingkat PMT. Penetapan Areal HGU Unit PMT masih berada dalam pengawasan atau menyatu dengan Unit Usaha Dolok Ilir

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-1 m-0 p-3 pl-4 bg-light">
                        <div style="min-height:300px;" class="d-flex justify-content-center align-items-center">
                            <div class="text-center font-weight-bolder">
                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                    <div class="image_wrapper"><img class="scale-with-grid" src="https://www.ptpn4.co.id/wp-content/uploads/2017/01/value-icon-mini.png" alt="value-icon-mini" width="35" height="35"></div>
                                </div>
                                <br>
                                <br>
                                <p style="font-size:smaller">
                                    PMT sudah melayani banyak PKS di Sumatera dan Kalimantan, dengan pengalaman yang dimiliki akan mampu melayani potensi pasar di seluruh Indonesia.</div>
                        </div>
                    </div>
                </div>
                <div class="row mb-0 pb-0  mt-md-4 mt-sm-0 mt-xl-4 mt-lg-4">
                    <div class="col-lg-4 col-md-4 p-4 col-sm-1 mainbgc d-flex justify-content-center align-items-center mb-xl-0 mb-lg-0 mb-md-0 mb-4">
                        <div class="text-light text-center">
                            <h1 class="display-4 fw-bold">KATALOG <br>PRODUK</h1>
                            <h3 class="text-dark">Produk PMT Dolok Ilir</h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-1 pe-0  ps-xl-3 ps-lg-3 ps-md-3 ps-sm-0 ps-0">
                        <div class="d-flex  flex-column align-items-center align-items-baseline ">
                            <div style="width: 100%;" class="row bg-dark align-self-center curpo zoom-hover">
                                <div class="col-lg-3 col-md-3 bg-secondary p-2 d-flex align-items-center justify-content-center"><img width="80px" height="80px" src="https://www.ptpn4.co.id/wp-content/uploads/2017/01/ICON-FOUNDRY.png" alt="" srcset=""></div>
                                <div class="col-lg-9 ps-4 col-md-9 bg-secondary d-flex align-items-center justify-content-center text-light text-center display-4 fw-bold">
                                    <p class="text-center text-lg-start text-xl-start text-md-center text-sm-center ">FOUNDRY</p>
                                </div>
                            </div>
                            <div style="width: 100%;" class="row bg-dark align-self-center mt-3 curpo zoom-hover">
                                <div class="col-lg-3 col-md-3 bg-secondary p-2 d-flex align-items-center  justify-content-center"><img width="80px" height="80px" src="https://www.ptpn4.co.id/wp-content/uploads/2017/01/ICON-6-STANDARISASI.png" alt="" srcset=""></div>
                                <div class="col-lg-9 ps-4 col-md-9 bg-secondary  d-flex align-items-center justify-content-center text-left text-light font-weight-bold">
                                    <h3 class="text-capitalize">6 STANDARISASI DAN PENYEDIAAN STOK DAN KOMPONEN MESIN INSTALASI PKS
                                    </h3>
                                </div>
                            </div>
                            <div style="width: 100%;" class="row bg-dark align-self-center mt-3 curpo zoom-hover">
                                <div class="col-lg-3 col-md-3 bg-secondary p-2 d-flex align-items-center justify-content-center"><img width="80px" height="80px" src="https://www.ptpn4.co.id/wp-content/uploads/2017/01/ICON-LAIN-LAIN.png" alt="" srcset=""></div>
                                <div class="col-lg-9 ps-4 col-md-9 bg-secondary  d-flex align-items-center justify-content-center text-left text-light  display-4 fw-bold">
                                    <p class="text-capitalize"> PRODUK LAIN</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3 mt-4 mainbgc ">
                    <div class="col-lg-8 col-md-8 col-sm-1 d-flex justify-content-start align-items-center">
                        <div class="text-light text-left">
                            <h3 class=" font-weight-bold">HUBUNGI KAMI
                            </h3>
                            <p>
                                Jika anda membutuhkan informasi lebih lengkap mengenai produk-produk PMT Dolok Ilir, <br> anda bisa menghubungi : <br> Telepon :(+62) 0622-64016 <br> Faksimili : (+62) 0622-64420 <br> Email : pmt_doi@ptpn4.co.id
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 d-flex justify-content-end">
                        <img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/pmt-trans.png" alt="" srcset="" height="200px" width="auto">
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Home Section -->`;
const login = `<!-- Login Section -->
    <section style="background-color: rgba(233, 233, 233, 0.938);" id="login">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h4 class="subtitle">Silakan Login Terlebih Dahulu</h4>
                <h2></h2>
            </div>
            <form>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    </div>
                    <input id="user" type="text" class="form-control" placeholder="Nama pengguna">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                    </div>
                    <input id="pass" type="password" class="form-control" placeholder="Kata sandi">
                </div>
                <div class="custom-control custom-checkbox">
                    <div class="row">
                        <div class="d-inline">
                            <div class="float-start mt-2 d-inline">
                                <input id="customCheck1" type="checkbox" checked="" class="custom-control-input">
                                <label for="customCheck1" class="custom-control-label ms-1 fw-bold">Ingat kata sandi</label>
                            </div>
                            <button type="button" onclick="verifyLogin($('#user').val(),$('#pass').val())" class="float-end text-light subtitle btn-light btn bg-primary align-self-end rounded-pill">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<!-- End of Login Section -->`;
const info_stok = `<!-- Info Stok Sparepart -->
        <section id="stok_sparepart" class="bg-light rounded-bottom">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Informasi Jumlah Stok Sparepart</h2>

                </div>
                <div class="bd-example mt-5 table-responsive p-2">
                    <table style="vertical-align: middle;" class="table table-bordered text-center align-items-center border-dark rounded">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;text-align:left ;border-radius: 5px 5px 0px 0px;" colspan="6" scope="col" class="subtitle">
                                  <span> Update Terakhir :</span><input class="subtitle" style="border:none;background-color:transparent;text-align:left; width:80%" id="tanggal_update" name="tanggal_update" type="text" disabled> 
                                </th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;" colspan="6" scope="col" class="lead fw-bold fs-3 text-center title">
                                    STOK SPAREPART PMT-DOI
                                </th>
                            </tr>
                            <tr>
                                <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">No</th>
                                <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">Uraian Mesin / Instalasi</th>
                                <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">Satuan</th>
                                <th class="bg-warning" style="vertical-align: middle;" scope="col">Stok Minimal Persediaan Barang Jadi</th>
                                <th class="bg-orange" style="vertical-align: middle;" scope="col">Stok Saat Ini Persediaan Barang Jadi</th>
                            </tr>
                            <tr class="bg-secondary">
                                <th class="text-center bg-warning ">Jumlah</th>
                                <th class="text-center bg-orange">Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td style="text-align: left;">Lori Rebusan (Kapasitas @ 2.500 kg TBS)</td>
                                <td>Unit</td>
                                <td>50</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="lori_rebusan" name="lori_rebusan" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td rowspan="2"></td>
                                <td style="text-align: left;">Roda Lori c/w As</td>
                                <td>Set</td>
                                <td>100</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roda_lori" name="roda_lori" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bushing</td>
                                <td>Pcs</td>
                                <td>200</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bushing_lori" name="bushing_lori" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td style="text-align: left;">Timba - Timba Buah Masak (Fruit Elevator)</td>
                                <td>Unit</td>
                                <td>1</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="fruit_elevator" name="fruit_elevator" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td style="text-align: left;">Bantingan (Thresher)</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td style="text-align: left;">As Bantingan</td>
                                <td>Set</td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="as_thresher" name="as_thresher" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Tromol Bantingan</td>
                                <td>Set</td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="tromol_thresher" name="tromol_thresher" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td style="text-align: left;"> CBC (Cake Breaker Conveyor)</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="3"></td>
                                <td style="text-align: left;">Bodi CBC
                                </td>
                                <td>Segmen</td>
                                <td>12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_cbc" name="body_cbc" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Gantungan CBC</td>
                                <td>Set</td>
                                <td>20</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="gantungan_cbc" name="gantungan_cbc" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Pedal - Pedal CBC c/w As</td>
                                <td>Segmen</td>
                                <td> 12 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="pedal_cbc" name="pedal_cbc" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td style="text-align: left;"> Polishing Drum</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="4"></td>
                                <td style="text-align: left;">Bodi Polishing Drum
                                </td>
                                <td>Set </td>
                                <td>1</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_polishdrum" name="body_polishdrum" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roll Bodi Polishing Drum</td>
                                <td> Set </td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roll_body_polishdrum" name="roll_body_polishdrum" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roll Bawah Polishing Drum </td>
                                <td>Set </td>
                                <td> 8 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roll_bawah_polishdrum" name="roll_bawah_polishdrum" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roda Gigi Polishing Drum </td>
                                <td>Buah </td>
                                <td> 2 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="gear_polishdrum" name="gear_polishdrum" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td style="text-align: left;"> Hydrocyclone</td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"></td>
                            </tr>
                            <tr>
                                <td rowspan="8"></td>
                                <td style="text-align: left;">Dewatering Drum
                                </td>
                                <td> Buah</td>
                                <td> 10</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="dewatering_drum" name="dewatering_drum" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bottom Cone Inti</td>
                                <td> Buah </td>
                                <td>12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bottom_cone_inti" name="bottom_cone_inti" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bottom Cone Cangkang</td>
                                <td> Buah </td>
                                <td> 12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bottom_cone_cangkang" name="bottom_cone_cangkang" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Vortex Finder </td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="vortex_finder" name="vortex_finder" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Feed Housing</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="feed_housing" name="feed_housing" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Body Cyclone</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_cyclone" name="body_cyclone" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Separating Cyclone</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="separating_cyclone" name="separating_cyclone" type="text" disabled></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Box Control</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="box_control" name="box_control" type="text" disabled></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>`;

const info_harga = `<section id="info-harga" class="team section-bg pt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title"> 
                <h2>Informasi Harga Tiap Mesin Instalasi</h2>
                <p>Berikut ini adalah daftar harga tiap-tiap mesin instalasi.</p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <img id="banner" width="100%" height="auto" src="" alt="" srcset="">
                </div>
                <div>
                    <h4 class="subtitle mt-4 mt-sm-5">
                        CATATAN:
                    </h4>
                    <p class="pt-sm-0">
                        <ul>
                            <li>

                                Harga BELUM termasuk biaya pengiriman (transportasi)
                            </li>
                            <li>

                                Harga sudah termasuk PPN 11% dan upah
                            </li>
                            <li>

                                Harga dapat berubah sewaktu-waktu sesuai kondisi pasar
                            </li>
                            <li>

                                Biaya belum termasuk tarif pekerja atau mandah di LUAR SUMATERA UTARA (luar wilayah)
                            </li>
                            <li>

                                Pemesanan selain PTPN IV harus melalui persetujuan BoM (Board of Management)
                            </li>
                        </ul>
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
                <div onclick="buildModal('Fruit Cages / Lori Buah','https://www.ptpn4.co.id/wp-content/uploads/2017/01/LORRY.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/lori-e1666766982504.png" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Fruit Cages / Lori Buah</h4>
                            <span>Klik untuk melihat rincian harga</span>
                        </div>
                    </div>
                </div>
                <div onclick="buildModal('Thresher','https://www.ptpn4.co.id/wp-content/uploads/2022/10/thresher-1.png','https://www.ptpn4.co.id/wp-content/uploads/2022/10/thresher-2.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/thresher-e1667277214452.png" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Thresher</h4>
                            <span>Klik untuk melihat rincian harga</span>
                        </div>
                    </div>
                </div>
                <div onclick="buildModal('Cake Breaker Conveyor','https://www.ptpn4.co.id/wp-content/uploads/2017/01/CBCA.png','https://www.ptpn4.co.id/wp-content/uploads/2017/01/CBC.B.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/cbc-e1666766820728.png" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Cake Breaker Conveyor</h4>
                            <span>Klik untuk melihat rincian harga</span>
                        </div>
                    </div>
                </div>
                <div onclick="buildModal('Fruit Elevator','https://www.ptpn4.co.id/wp-content/uploads/2022/10/timba-buah.png','https://www.ptpn4.co.id/wp-content/uploads/2022/10/timba-buah-2.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img style="height: 150px;" src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/fruitelev-e1667277149606.png" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Timba Buah</h4>
                            <span>Klik untuk melihat rincian harga</span>
                        </div>
                    </div>
                </div>
                <div onclick="buildModal('Hidrocyclone','https://www.ptpn4.co.id/wp-content/uploads/2022/11/row-1-column-1.png','https://www.ptpn4.co.id/wp-content/uploads/2022/11/row-2-column-1.png','https://www.ptpn4.co.id/wp-content/uploads/2022/11/row-3-column-1.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/isometric-e1667276965398.png" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Hydrocyclone</h4>
                            <span>Klik untuk melihat rincian harga</span>
                        </div>
                    </div>
                </div>
                <div onclick="buildModal('Polishing Drum','https://www.ptpn4.co.id/wp-content/uploads/2017/01/polishing-drum-A1-e1667279335920.png','https://www.ptpn4.co.id/wp-content/uploads/2017/01/polishing-drum-B-e1667279223245.png')" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/polishdrum-e1667277181789.png" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Polishing Drum</h4>
                            <span>Klik untuk melihat rincian harga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>`;

const info_produk =
    `
    <section id="info-produk" class="rounded-bottom pt-0">
    <!-- ======= Hero Section ======= -->
    <section style="backround-color:transparent;background-image:url(` +
    $(".base_url").val() +
    `assets/img/hero-bg.jpg);background-position:right!important" class="p-0">
        <div id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <h1>6 Standarisasi dan Penyediaan Stok & Komponen Mesin Instalasi PKS</h1>
                        <h2 class="text-light">Program 6 Standarisasi Mesin Instalasi PKS Dimulai pada Tahun 2022 Oleh Bagian Teknik dan Pengolahan PTPN 4</h2>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                        <img width="100%" src="` +
    $(".base_url").val() +
    `assets/img/header.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->
    <!-- ======= Tujuan Section ======= -->
    <section class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-light">
                <h2 class="subtitle text-light">Tujuan 6 Standarisasi Mesin dan Instalasi di PKS</h2>
                <p>Program 6 Standarisasi ini bertujuan : kualitas bahan yang dipakai, kualitas pekerjaan dan kualitas pemasangan yang lebih terjamin sehingga umur teknis lebih tinggi; performance meningkat (kapasitas dan mutu olah tercapai); dan memudahkan
                    PMT Dolok Ilir dalam menyediakan suku cadang/ spare part.
                </p>
            </div>
        </div>
    </section>



    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="200">

            <div class="section-title">
                <h2>Informasi Spesifikasi Produk</h2>
                <p>Berikut adalah informasi spesifikasi tiap-tiap produk PMT</p>
                <p class="text-center">(Klik untuk melihat spesifikasi)</p>
            </div>

            <div class="row">
                <div onclick="buildModal('Hidrocyclone','` + $(".base_url").val() + `assets/img/HIDROCYCLONE 1-2_1.jpg','` + $(".base_url").val() + `assets/img/HIDROCYCLONE 1-2_2.jpg')" class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/isometric-e1667276965398.png" alt="" srcset=""></i>
                        </div>
                        <h4>Hydrocyclone
                        </h4>
                        <p>Hydrocyclone adalah alat pemisah inti dan cangkang dalam cracksheel dari LTDS (Light Tenera Dust Separator) menggunakan media air.</p>
                    </div>
                </div>

                <div onclick="buildModal('Cake Breaker Conveyor','https://www.ptpn4.co.id/wp-content/uploads/2022/10/CBC.jpg','https://www.ptpn4.co.id/wp-content/uploads/2022/10/CBC-2.jpg')" class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 " data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/cbc-e1666766820728.png" alt="" srcset=""></i>
                        </div>
                        <h4>Cake Breaker Conveyor</h4>
                        <p>Cake breaker conveyor (CBC) adalah alat penghantar dan pemecah ampas kempa (sekaligus mengeringkannya) dari pressan ke Depericarper. Hasil proses di CBC menjadikan biji dan fibre terurai (tidak menggumpal) dan lebih kering.</p>
                    </div>
                </div>

                <div onclick="buildModal('Fruit Elevator','` + $(".base_url").val() + `assets/img/FRUIT ELEVATOR.jpg','` + $(".base_url").val() + `assets/img/FRUIT ELEVATOR2.jpg')" class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 " data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/fruitelev-e1667277149606.png" alt=""></div>
                        <h4>Fruit Elevator</h4>
                        <p>Fruit elevator adalah alat angkut yang memindahkan berondolan rebus dari elevasi rendah ke elevasi tinggi. Bagian utama dari fruit elevator yaitu: body, bucket dan rantai.</p>
                    </div>
                </div>
                <div onclick="buildModal('Fruit Cages/ Lori Buah','https://www.ptpn4.co.id/wp-content/uploads/2022/10/LORI.jpg','https://www.ptpn4.co.id/wp-content/uploads/2022/10/LORI-2.jpg')" class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 " data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/lori-e1666766982504.png" alt="" srcset=""></i>
                        </div>
                        <h4>Fruit Cages/ Lori Buah
                        </h4>
                        <p>Fruit Cage (Lori Buah) adalah komponen Pabrik Kelapa Sawit (PKS) yang berfungsi sebagai alat yang mengangkut Tandan Buah Segar (TBS) dari Loading Ramp yang nantinya dimasukkan kedalam Sterilizer untuk dilakukan proses perebusan
                            (masak).
                        </p>
                    </div>
                </div>
                <div onclick="buildModal('Hidrocyclone','https://www.ptpn4.co.id/wp-content/uploads/2022/10/POLISHING-DRUM.jpg','https://www.ptpn4.co.id/wp-content/uploads/2022/10/POLISHING-DRUM-2-1.jpg')" class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 " data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/polishdrum-e1667277181789.png" alt=""></div>
                        <h4>Polishing Drum
                        </h4>
                        <p>Polishing drum adalah tromol berputar yang berfungsi untuk memolish / membersihkan sisa-sisa serabut yang masih lengket pada permukaan biji</p>
                    </div>
                </div>

                <div onclick="buildModal('Thresher','https://www.ptpn4.co.id/wp-content/uploads/2022/10/THRESHER.jpg','https://www.ptpn4.co.id/wp-content/uploads/2022/10/THRESHER-2.jpg')" class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 " data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="https://www.ptpn4.co.id/wp-content/uploads/2022/10/thresher-e1667277214452.png" alt="" srcset="">
                        </div>
                        <h4>Thresher

                        </h4>
                        <p>Tresher berfungsi untuk memisahkan brondolan dengan tandan kosong dengan cara membanting dalam drum yang berputar. Tresher terdiri dari sebuah drum yang dindingnya terbentuk dari kisi-kisi dengan jarak tertentu, dan dilengkapi
                            dengan sirip untuk mengangkat janjangan dan membawanya ke ujung drum untuk dikeluarkan.</p>
                    </div>
                </div>
                </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact rounded-bottom">
        <div class="container" data-aos="fade-up">

            <div class="section-title text-light">
                <h2 class="text-light">Kontak Kami</h2>
            </div>

            <div class="info rounded p-sm-0 p-lg-3">
                <div class="col">
                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Contact Person:</h4>
                        <p class="lead fw-bold pb-0">Suhardiman <br>0813-9660-3334</p>

                    </div>
                </div>
                <div class="col">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokasi:</h4>
                        <p>Bandar Selamat, Kec. Dolok Batu Nanggar, Kabupaten Simalungun, Sumatera Utara 21155</p>
                    </div>

                    <iframe class="p-sm-1 p-lg-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.901765039673!2d99.15984856807069!3d3.1206798541886043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30317e69a3363351%3A0xe534e90602846ee2!2sPTPN%20IV%20Dolok%20Ilir!5e0!3m2!1sid!2sid!4v1666852086519!5m2!1sid!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </section>
    <!-- End Contact Section -->
    </section>
    `;
const faq = `<!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pertanyaan Umum (FAQ) Seputar 6 Standarisasi Mesin Instalasi PKS</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">1. Adakah Informasi Spesifikasi Produk Seperti: Gambar Produk, Bahan material, Dimensi, Keunggulan Produk? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <div class="ps-4 ps-lg-5 ps-sm-4 ps-md-4">
                                    <hr>
                                    <span>Ada, pada menu</span><span class="curpo subtitle" onclick="displayPage(info_produk,'menu-info-produk')"> Informasi Produk</span>
                                </div>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">2. Apakah Stok Persediaan Barang (Spare Part) ada dalam Website ini ?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <div class="ps-4 ps-lg-5 ps-sm-4 ps-md-4">
                                    <hr>
                                    <div class=" d-xl-none d-lg-none d-md-inline d-sm-inline">
                                        <span>Ada, pada menu</span><span class="curpo subtitle" onclick="displayPage(info_stok,'menu-info-stok')"> Informasi Stok Sparepart</span>
                                    </div>
                                    <div class="d-none d-xl-inline d-lg-inline d-md-none d-sm-none">
                                        <span>Ada, pada menu</span><span class="curpo subtitle" onclick="displayPage(info_stok,'menu-info-stok')"> Informasi Stok Sparepart</span>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">3. Apakah Informasi Harga Setiap Mesin Instalasi 6 Standarisasi ada dalam Website ini ?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <div class="ps-4 ps-lg-5 ps-sm-4 ps-md-4">
                                    <hr>
                                    <span>Ada, pada menu</span><span class="curpo subtitle" onclick="displayPage(info_harga,'menu-info-harga')"> Informasi Harga</span>
                                </div>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">4. Apa Dasar Peraturan Penetapan 6 Standarisasi Ini ?
                    
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <div class="ps-4 ps-lg-5 ps-sm-4 ps-md-4">
                                    <hr>
                                    <a class="ps-0" href="index.php/home/surat_edaran" target="_blank" rel="noopener noreferrer"> Surat Edaran (SE) Nomor : 04.05/SE/153/IX/2022</a>
                                    <p>
                                        Perihal : Penetapan 6 Standarisasi dan Penyediaan Stok Komponen MesinInstalasi PKS di PMT Dolok Ilir Tanggal 13 September 2022

                                    </p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <!-- End Frequently Asked Questions Section -->`;

function getData() {
    $.ajax({
        url: $(".base_url").val() + "/pmt-get-data.php",
        type: "post",
        dataType: "json",
        success: function(data) {
            for (i = 0; i < data.length; i++) {
                $("#tanggal_update").val(data[0].tanggal_update);
                $("#lori_rebusan").val(data[0].lori_rebusan);
                $("#fruit_elevator").val(data[0].fruit_elevator);
                $("#as_thresher").val(data[0].as_thresher);
                $("#tromol_thresher").val(data[0].tromol_thresher);
                $("#body_cbc").val(data[0].body_cbc);
                $("#gantungan_cbc").val(data[0].gantungan_cbc);
                $("#pedal_cbc").val(data[0].pedal_cbc);
                $("#body_polishdrum").val(data[0].body_polishdrum);
                $("#roll_body_polishdrum").val(data[0].roll_body_polishdrum);
                $("#roll_bawah_polishdrum").val(data[0].roll_bawah_polishdrum);
                $("#gear_polishdrum").val(data[0].gear_polishdrum);
                $("#dewatering_drum").val(data[0].dewatering_drum);
                $("#bottom_cone_inti").val(data[0].bottom_cone_inti);
                $("#bottom_cone_cangkang").val(data[0].bottom_cone_cangkang);
                $("#vortex_finder").val(data[0].vortex_finder);
                $("#feed_housing").val(data[0].feed_housing);
                $("#body_cyclone").val(data[0].body_cyclone);
                $("#separating_cyclone").val(data[0].separating_cyclone);
                $("#box_control").val(data[0].box_control);
                $("#roda_lori").val(data[0].roda_lori);
                $("#bushing_lori").val(data[0].bushing_lori);
            }
            console.log(data[0].message);
        },
        error: function() {
            console.log(data[0].message);
        },
    });
}

function setBanner() {
    $(function() {
        let path = $("#imagepath").val();
        $("#banner").attr("src", path);
    });
}