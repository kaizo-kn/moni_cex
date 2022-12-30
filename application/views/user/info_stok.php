<body>
    <!-- Info Stok Sparepart -->
    <section id="stok_sparepart" class="section-bg rounded-bottom">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Edit Informasi Jumlah Stok Sparepart</h2>
            </div>

            <div class="bd-example mt-1 table-responsive p-2">
                <form action="<?php echo site_url() ?>/user/update_data" method="post">
                    <table style="vertical-align: middle;" class="table table-bordered text-center align-items-center border-dark rounded">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;text-align:left ;border-radius: 5px 5px 0px 0px;" colspan="6" scope="col" class="subtitle">
                                    <span> Update Terakhir :</span><input class="subtitle" style="border:none;background-color:transparent;text-align:left; width:80%" id="tanggal_update" name="tanggal_update" type="text" disabled value="<?= $tanggal_update; ?>">
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
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="lori_rebusan" name="lori_rebusan" type="text" value="<?= $lori_rebusan; ?>"></td>
                            </tr>

                            <tr>
                                <td rowspan="2"></td>
                                <td style="text-align: left;">Roda Lori c/w As</td>
                                <td>Set</td>
                                <td>100</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roda_lori" name="roda_lori" type="text" value="<?= $roda_lori; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bushing</td>
                                <td>Pcs</td>
                                <td>200</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bushing_lori" name="bushing_lori" type="text" value="<?= $bushing_lori; ?>"></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td style="text-align: left;">Timba - Timba Buah Masak (Fruit Elevator)</td>
                                <td>Unit</td>
                                <td>1</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="fruit_elevator" name="fruit_elevator" type="text" value="<?= $fruit_elevator; ?>"></td>
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
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="as_thresher" name="as_thresher" type="text" value="<?= $as_thresher; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Tromol Bantingan</td>
                                <td>Set</td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="tromol_thresher" name="tromol_thresher" type="text" value="<?= $tromol_thresher; ?>"></td>
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
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_cbc" name="body_cbc" type="text" value="<?= $body_cbc; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Gantungan CBC</td>
                                <td>Set</td>
                                <td>20</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="gantungan_cbc" name="gantungan_cbc" type="text" value="<?= $gantungan_cbc; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Pedal - Pedal CBC c/w As</td>
                                <td>Segmen</td>
                                <td> 12 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="pedal_cbc" name="pedal_cbc" type="text" value="<?= $pedal_cbc; ?>"></td>
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
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_polishdrum" name="body_polishdrum" type="text" value="<?= $body_polishdrum; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roll Bodi Polishing Drum</td>
                                <td> Set </td>
                                <td>2</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roll_body_polishdrum" name="roll_body_polishdrum" type="text" value="<?= $roll_body_polishdrum; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roll Bawah Polishing Drum </td>
                                <td>Set </td>
                                <td> 8 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="roll_bawah_polishdrum" name="roll_bawah_polishdrum" type="text" value="<?= $roll_bawah_polishdrum; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Roda Gigi Polishing Drum </td>
                                <td>Buah </td>
                                <td> 2 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="gear_polishdrum" name="gear_polishdrum" type="text" value="<?= $gear_polishdrum; ?>"></td>
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
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="dewatering_drum" name="dewatering_drum" type="text" value="<?= $dewatering_drum; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bottom Cone Inti</td>
                                <td> Buah </td>
                                <td>12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bottom_cone_inti" name="bottom_cone_inti" type="text" value="<?= $bottom_cone_inti; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Bottom Cone Cangkang</td>
                                <td> Buah </td>
                                <td> 12</td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="bottom_cone_cangkang" name="bottom_cone_cangkang" type="text" value="<?= $bottom_cone_cangkang; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Vortex Finder </td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="vortex_finder" name="vortex_finder" type="text" value="<?= $vortex_finder; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Feed Housing</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="feed_housing" name="feed_housing" type="text" value="<?= $feed_housing; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Body Cyclone</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="body_cyclone" name="body_cyclone" type="text" value="<?= $body_cyclone; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Separating Cyclone</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="separating_cyclone" name="separating_cyclone" type="text" value="<?= $separating_cyclone; ?>"></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">Box Control</td>
                                <td> Buah </td>
                                <td> 6 </td>
                                <td class="bg-info"><input style="border:none;background-color:transparent;text-align:center;color:black; max-width:3rem;" id="box_control" name="box_control" type="text" value="<?= $box_control; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="6">

                                    <button class="float-end btn bg-info btn-dark rounded-pill me-2" type="submit">Kirim</button>

                                    <a href="<?php echo site_url() ?>/user">
                                        <button type="button" class="btn btn-dark bg-danger rounded-pill float-end ms-4 me-4 clearfix">Kembali</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>