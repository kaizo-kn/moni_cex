<!-- Info Stok Sparepart -->
<section id="stok_sparepart" class="bg-light rounded-bottom">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Ubah Informasi Jumlah Stok Sparepart</h2>

        </div>
        <div class="bd-example mt-5 table-responsive p-2">
            <table style="vertical-align: middle;" class="table table-bordered text-center align-items-center border-dark rounded">
                <thead>
                    <tr style="border:0px;">
                        <th style="border:0px;vertical-align: middle;text-align:left ;border-radius: 5px 5px 0px 0px;" colspan="6" scope="col" class="subtitle">
                            <span> Update Terakhir :</span><input class="subtitle" style="border:none;background-color:transparent;text-align:left; width:80%" id="tanggal_update" name="tanggal_update" type="text" disabled value="<?= $tanggal_update; ?>">
                        </th>
                    </tr>
                    <tr style="border:0px;">
                        <th style="border:0px;vertical-align: middle;" colspan="6" scope="col" class="lead fw-bold fs-3 text-center title">
                            STOK SPAREPART PMT-DOI
                        </th>
                    </tr>
                    <tr>
                        <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">No</th>
                        <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">Uraian
                            Mesin / Instalasi</th>
                        <th class="bg-warning" style="vertical-align: middle;" rowspan="2" scope="col">Satuan
                        </th>
                        <th class="bg-warning" style="vertical-align: middle;" scope="col">Stok Minimal
                            Persediaan Barang Jadi</th>
                        <th colspan="2" class="bg-orange" style="vertical-align: middle;" scope="col">Stok Saat Ini
                            Persediaan Barang Jadi</th>

                        <th class="mainbgc" style="vertical-align: middle;" rowspan="2" scope="col">Jumlah
                            Pesanan</th>
                    </tr>
                    <tr class="bg-secondary">
                        <th class="text-center bg-warning ">Jumlah</th>
                        <th class="text-center bg-orange">Stok</th>
                        <th class="text-center bg-orange">Sisa</th>

                    </tr>
                </thead>

                <tbody>
                    <form id="tabel_stok" action="<?=base_url('index.php/')?>user/update_stok" method="post">
                    <tr>
                        <td>1</td>
                        <td class="judul" style="text-align: left;">Lori Rebusan (Kapasitas @ 2.500 kg TBS)</td>
                        <td>Unit</td>
                        <td>50</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='lori_rebusan' class='form-control' value='$lori_rebusan'></td>";
                        $stok = intval($lori_rebusan) - intval($p_lori_rebusan);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_lori_rebusan) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_lori_rebusan ?></td>
                    </tr>


                    <tr>
                        <td rowspan="2"></td>
                        <td class="judul" style="text-align: left;">Roda Lori c/w As</td>
                        <td>Set</td>
                        <td>100</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='roda_lori' class='form-control' value='$roda_lori'></td>";
                        $stok = intval($roda_lori) - intval($p_roda_lori);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_roda_lori) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_roda_lori ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Bushing</td>
                        <td>Pcs</td>
                        <td>200</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='bushing_lori' class='form-control' value='$bushing_lori'></td>";
                        $stok = intval($bushing_lori) - intval($p_bushing_lori);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_bushing_lori) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_bushing_lori ?></td>
                    </tr>


                    <tr>
                        <td>2</td>
                        <td class="judul" style="text-align: left;">Timba - Timba Buah Masak (Fruit Elevator)</td>
                        <td>Unit</td>
                        <td>1</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='fruit_elevator' class='form-control' value='$fruit_elevator'></td>";
                        $stok = intval($fruit_elevator) - intval($p_fruit_elevator);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_fruit_elevator) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_fruit_elevator ?></td>
                    </tr>


                    <tr>
                        <td>3</td>
                        <td class="judul" style="text-align: left;">Bantingan (Thresher)</td>
                        <td></td>
                        <td></td>
                        <td class="bg-info"></td>
                        <td class="bg-info"></td>

                        <td class="bg-primary"></td>
                    </tr>
                    <tr>
                        <td rowspan="2"></td>
                        <td class="judul" style="text-align: left;">As Bantingan</td>
                        <td>Set</td>
                        <td>2</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='as_thresher' class='form-control' value='$as_thresher'></td>";
                        $stok = intval($as_thresher) - intval($p_as_thresher);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_as_thresher) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_as_thresher ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Tromol Bantingan</td>
                        <td>Set</td>
                        <td>2</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='tromol_thresher' class='form-control' value='$tromol_thresher'></td>";
                        $stok = intval($tromol_thresher) - intval($p_tromol_thresher);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_tromol_thresher) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_tromol_thresher ?></td>
                    </tr>


                    <tr>
                        <td>4</td>
                        <td class="judul" style="text-align: left;"> CBC (Cake Breaker Conveyor)</td>
                        <td></td>
                        <td></td>
                        <td class="bg-info"></td>
                        <td class="bg-info"></td>

                        <td class="bg-primary"></td>
                    </tr>
                    <tr>
                        <td rowspan="3"></td>
                        <td class="judul" style="text-align: left;">Bodi CBC
                        </td>
                        <td>Segmen</td>
                        <td>12</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='body_cbc' class='form-control' value='$body_cbc'></td>";
                        $stok = intval($body_cbc) - intval($p_body_cbc);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_body_cbc) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_body_cbc ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Gantungan CBC</td>
                        <td>Set</td>
                        <td>20</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='gantungan_cbc' class='form-control' value='$gantungan_cbc'></td>";
                        $stok = intval($gantungan_cbc) - intval($p_gantungan_cbc);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_gantungan_cbc) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_gantungan_cbc ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Pedal - Pedal CBC c/w As</td>
                        <td>Segmen</td>
                        <td> 12 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='pedal_cbc' class='form-control' value='$pedal_cbc'></td>";
                        $stok = intval($pedal_cbc) - intval($p_pedal_cbc);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_pedal_cbc) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_pedal_cbc ?></td>
                    </tr>


                    <tr>
                        <td>5</td>
                        <td class="judul" style="text-align: left;"> Polishing Drum</td>
                        <td></td>
                        <td></td>
                        <td class="bg-info"></td>
                        <td class="bg-info"></td>

                        <td class="bg-primary"></td>
                    </tr>
                    <tr>
                        <td rowspan="4"></td>
                        <td class="judul" style="text-align: left;">Bodi Polishing Drum
                        </td>
                        <td>Set </td>
                        <td>1</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='body_polishdrum' class='form-control' value='$body_polishdrum'></td>";
                        $stok = intval($body_polishdrum) - intval($p_body_polishdrum);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_body_polishdrum) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_body_polishdrum ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Roll Bodi Polishing Drum</td>
                        <td> Set </td>
                        <td>2</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='roll_body_polishdrum' class='form-control' value='$roll_body_polishdrum'></td>";
                        $stok = intval($roll_body_polishdrum) - intval($p_roll_body_polishdrum);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_roll_body_polishdrum) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_roll_body_polishdrum ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Roll Bawah Polishing Drum </td>
                        <td>Set </td>
                        <td> 8 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='roll_bawah_polishdrum' class='form-control' value='$roll_bawah_polishdrum'></td>";
                        $stok = intval($roll_bawah_polishdrum) - intval($p_roll_bawah_polishdrum);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_roll_bawah_polishdrum) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_roll_bawah_polishdrum ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Roda Gigi Polishing Drum </td>
                        <td>Buah </td>
                        <td> 2 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='gear_polishdrum' class='form-control' value='$gear_polishdrum'></td>";
                        $stok = intval($gear_polishdrum) - intval($p_gear_polishdrum);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_gear_polishdrum) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_gear_polishdrum ?></td>
                    </tr>


                    <tr>
                        <td>6</td>
                        <td class="judul" style="text-align: left;"> Hydrocyclone</td>
                        <td></td>
                        <td></td>
                        <td class="bg-info"></td>
                        <td class="bg-info"></td>
                        <td class="bg-primary"></td>
                    </tr>
                    <tr>
                        <td rowspan="8"></td>
                        <td class="judul" style="text-align: left;">Dewatering Drum
                        </td>
                        <td> Buah</td>
                        <td> 10</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='dewatering_drum' class='form-control' value='$dewatering_drum'></td>";
                        $stok = intval($dewatering_drum) - intval($p_dewatering_drum);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_dewatering_drum) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_dewatering_drum ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Bottom Cone Inti</td>
                        <td> Buah </td>
                        <td>12</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='bottom_cone_inti' class='form-control' value='$bottom_cone_inti'></td>";
                        $stok = intval($bottom_cone_inti) - intval($p_bottom_cone_inti);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_bottom_cone_inti) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_bottom_cone_inti ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Bottom Cone Cangkang</td>
                        <td> Buah </td>
                        <td> 12</td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='bottom_cone_cangkang' class='form-control' value='$bottom_cone_cangkang'></td>";
                        $stok = intval($bottom_cone_cangkang) - intval($p_bottom_cone_cangkang);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_bottom_cone_cangkang) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_bottom_cone_cangkang ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Vortex Finder </td>
                        <td> Buah </td>
                        <td> 6 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='vortex_finder' class='form-control' value='$vortex_finder'></td>";
                        $stok = intval($vortex_finder) - intval($p_vortex_finder);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_vortex_finder) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_vortex_finder ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Feed Housing</td>
                        <td> Buah </td>
                        <td> 6 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='feed_housing' class='form-control' value='$feed_housing'></td>";
                        $stok = intval($feed_housing) - intval($p_feed_housing);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_feed_housing) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_feed_housing ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Body Cyclone</td>
                        <td> Buah </td>
                        <td> 6 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='body_cyclone' class='form-control' value='$body_cyclone'></td>";
                        $stok = intval($body_cyclone) - intval($p_body_cyclone);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_body_cyclone) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_body_cyclone ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Separating Cyclone</td>
                        <td> Buah </td>
                        <td> 6 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='separating_cyclone' class='form-control' value='$separating_cyclone'></td>";
                        $stok = intval($separating_cyclone) - intval($p_separating_cyclone);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_separating_cyclone) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_separating_cyclone ?></td>
                    </tr>


                    <tr>
                        <td class="judul" style="text-align: left;">Box Control</td>
                        <td> Buah </td>
                        <td> 6 </td>
                        <?php
                        echo "<td class='bg-info'><input type='number' style='width:max-content' name='box_control' class='form-control' value='$box_control'></td>";
                        $stok = intval($box_control) - intval($p_box_control);
                        if ($stok < 0) {
                            $stock_color = "text-danger";
                        } else {
                            $stock_color = "text-dark";
                        }
                        echo "<td class='bg-info $stock_color'>$stok</td>";
                        ?>
                        <td data-pesanan="<?= implode(',', $id_p_box_control) ?>" onclick="getPesanan($(this).parent().find('.judul').text(),$(this).data('pesanan'))" class="bg-primary curpo text-light fw-bolder"><?= @$p_box_control ?></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="7">
                            <button type="submit" form="tabel_stok" class="btn text-light mainbgc float-end ms-2">Kirim</button>
                            <a href="<?=base_url('index.php/')?>user/">
                            <button class="btn btn-secondary float-end">Kembali</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


<section id="modalContent">

</section>

<script>
    function getPesanan(title, id_pesanan) {
        if (id_pesanan != null || id_pesanan != undefined || id_pesanan != "") {
            $.ajax({
                url: "<?= base_url() ?>index.php/home/get_json_data",
                type: "POST",
                dataType: "json",
                data: {
                    id_pesanan: id_pesanan
                },
                success: function(result) {
                    let text_status = ""
                    let html = "";
                    let i = 1;
                    for (const key in result) {
                        if (Object.hasOwnProperty.call(result, key)) {
                            const element = result[key];
                            console.log(element['status_pesanan'])
                            let status = ""
                            if (element['status_pesanan'] == "2") {
                                status = 'bg-danger'
                                text_status = "Ditolak"

                            } else if (element['status_pesanan'] == "1") {
                                status = 'bg-success'
                                text_status = "Diterima/Progress Pengerjaan"
                            } else if (element['status_pesanan'] == "0") {
                                status = 'bg-info'
                                text_status = "Diajukan"
                            } else if (element['status_pesanan'] == "3") {
                                status = 'bg-secondary'
                                text_status = "Selesai"
                            }

                            html +=
                                `
                        <tr class='text-center'><td style='width:max-content'>${i }</td><td>PKS ${element['nama_pks'] }</td><td style='width:max-content'>${element['jumlah_pesanan'] }</td><td style='text-align:center'  onclick="Swal.fire($('#txa${i}').text())" class='curpo text-center align-items-center' data-toggle='tooltip' data-placement='top' title='${element['komentar'] }'><textarea id='txa${i}' class='d-none'>${element['komentar'] }</textarea><button class='btn rounded-pill text-light ${status}'> ${text_status}</button></td></tr>`
                            i++
                        }
                    }

                    let table = `<table class="table table-bordered table-hover">
                <h3 class='text-center subtitle mb-3 pt-2 w-100'>Jumlah Pesanan ${title}</h3>
                <thead class="text-center mainbgc">
                
                    <th>
                        No.
                    </th>
                    <th>
                        Nama PKS
                    </th>
                    <th>
                        Jumlah Pesanan
                    </th>
                    <th>
                        Status
                    </th>
                </thead>
                <tbody>
                    ${html}
                </tbody>
            </table>
            <form><button data-bs-dismiss="modal" class="btn mainbgc text-light float-end me-3 mb-3" type="button">OK</button></form>`
                    buildOrderModal(table)
                },
                error: function(arguments) {
                    console.log(arguments)
                }
            });
        }

    }
</script>