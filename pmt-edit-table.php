<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['username'] == 'adminPMTPN4' && $_SESSION['password'] == 'PMTPN4#@!admin') {

    $page_title = 'Edit Info Sparepart';
    include 'head.php';



    $host = "localhost";
    $database = "data-pmt";
    $username = "root";
    $password = "";
    $connect = mysqli_connect($host, $username, $password, $database);
    $query = 'select* from stok_sparepart_PMT';
    $result1 = mysqli_query($connect, $query);
    $result = mysqli_fetch_array($result1);

    if (!isset($_SESSION['msg'])) {
    } else if (($_SESSION['msg'] != '')) {
        echo '<div style="position:absolute;z-index:2;left:40%;margin-top:10px;" id="fm" >' . $_SESSION['msg'] . '</div>
<script>
setTimeout(() => {
    $("#fm").fadeOut(200,function(){$("#fm").html("")})
}, 4000);
</script>';
        $_SESSION['msg'] = '';
    }
    echo '<div class="container mt-4">

        <div class="text-center p-5 pt-2 mb-1 mt-3">
            <h2 class="text-dark font-weight-bold " style="font-size:2.4em">Edit Informasi Jumlah Stok Sparepart</h2>
           ';
    
    echo '<section id="table">
    <div style="display:flex;justify-content:center;margin-bottom:1rem" class="tg__-wrap">
        <form action="pmt-update-data.php" method="post" id="stok-sparepart-pmt">
            <table class="tg__" style="table-layout: fixed; width: 879px;margin-left:20px">
                <colgroup>
                    <col style="width: 22px">
                    <col style="width: 25px">
                    <col style="width: 281px">
                    <col style="width: 63px">
                    <col style="width: 244px">
                    <col style="width: 244px">
                </colgroup>
                <thead>
                    <tr>
                        <th colspan="5" style="border:1px solid transparent;border-bottom:1px solid black;padding-bottom:0px">
                            <h5 style="text-align: left;">Update Terakhir : <span id="tanggal_update">' . $result['tanggal_update'] . '</span>
                            </h5>
                        </th>
                        <th colspan="1" style="border:1px solid transparent;border-bottom:1px solid black">

                        </th>
                    <tr>
                        <th colspan="6">
                            <h3 style="text-align:center">STOK SPAREPART PMT-DOI</h3>
                        </th>
                    </tr>
                    </tr>
                    <tr>
                        <th style=" background-color: #ffcc67;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top" class="tg__-cnwr" colspan="2" rowspan="3">No</th>
                        <th style=" background-color: #ffcc67;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top" class="tg__-cnwr" rowspan="3"><br>
                            <div style="margin-top:2px"> Uraian Mesin / Instalasi</div>
                        </th>
                        <th style=" background-color: #ffcc67;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top" class="tg__-cnwr" rowspan="3"><br>
                            <div style="margin-top:2px"> Satuan</div>
                        </th>
                        <th style=" background-color: #ffcc67;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top;" class="tg__-cnwr" rowspan="2">Stok Minimal Persediaan Barang Jadi</th>
                        <th style="background-color: #f56b00;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top;" class="tg__-rmk1" rowspan="2">Stok Saat Ini Persediaan Barang Jadi</th>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <th style=" background-color: #ffcc67;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top" class="tg__-cnwr">Jumlah</th>
                        <th style="background-color: #f56b00;
                        border-color: inherit;
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tg__-c3ow" colspan="2">1</td>
                        <td class="tg__-0pky">Lori Rebusan (Kapasitas @ 2.500 kg TBS)</td>
                        <td class="tg__-c3ow">Unit</td>
                        <td class="tg__-c3ow">50</td>
                        <td id="lori_rebusan" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="lori_rebusan" value="' . $result["lori_rebusan"] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2" rowspan="2"></td>
                        <td class="tg__-0pky">Roda Lori c/w As</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">100</td>
                        <td id="roda_lori" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="roda_lori" value="' . $result['roda_lori'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Bushing</td>
                        <td class="tg__-c3ow">Pcs</td>
                        <td class="tg__-c3ow">200</td>
                        <td id="bushing_lori" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="bushing_lori" value="' . $result['bushing_lori'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2">2</td>
                        <td class="tg__-0pky">Timba - Timba Buah Masak (Fruit Elevator)</td>
                        <td class="tg__-c3ow">Unit</td>
                        <td class="tg__-c3ow">1</td>
                        <td id="fruit_elevator" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="fruit_elevator" value="' . $result['fruit_elevator'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2">3</td>
                        <td class="tg__-0pky">Bantingan (Thresser)</td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-mak0"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2" rowspan="2"></td>
                        <td class="tg__-0pky">As Bantingan</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">2</td>
                        <td id="as_thresher" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="as_thresher" value="' . $result['as_thresher'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Tromol Bantingan</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">2</td>
                        <td id="tromol_thresher" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="tromol_thresher" value="' . $result['tromol_thresher'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2">4</td>
                        <td class="tg__-0pky">CBC (Cake Breaker Conveyor)</td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-mak0"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2" rowspan="3"></td>
                        <td class="tg__-0pky">Bodi CBC</td>
                        <td class="tg__-c3ow">Segmen</td>
                        <td class="tg__-c3ow">12</td>
                        <td id="body_cbc" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="body_cbc" value="' . $result['body_cbc'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Gantungan CBC</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">20</td>
                        <td id="gantungan_cbc" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="gantungan_cbc" value="' . $result['gantungan_cbc'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Pedal - Pedal CBC c/w As</td>
                        <td class="tg__-c3ow">Segmen</td>
                        <td class="tg__-c3ow">12</td>
                        <td id="pedal_cbc" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="pedal_cbc" value="' . $result['pedal_cbc'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2">5</td>
                        <td class="tg__-0pky">Polishing Drum</td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-mak0"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2" rowspan="4"></td>
                        <td class="tg__-0pky">Bodi Polishing Drum</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">1</td>
                        <td id="body_polishdrum" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="body_polishdrum" value="' . $result['body_polishdrum'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Roll Bodi Polishing Drum</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">2</td>
                        <td id="roll_body_polishdrum" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="roll_body_polishdrum" value="' . $result['roll_body_polishdrum'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Roll Bawah Polishing Drum</td>
                        <td class="tg__-c3ow">Set</td>
                        <td class="tg__-c3ow">8</td>
                        <td id="roll_bawah_polishdrum" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="roll_bawah_polishdrum" value="' . $result['roll_bawah_polishdrum'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Roda Gigi Polishing Drum</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">2</td>
                        <td id="gear_polishdrum" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="gear_polishdrum" value="' . $result['gear_polishdrum'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2">6</td>
                        <td class="tg__-0pky">Hydrocyclone</td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-c3ow"></td>
                        <td class="tg__-mak0"></td>
                    </tr>
                    <tr>
                        <td class="tg__-c3ow" colspan="2" rowspan="8"></td>
                        <td class="tg__-0pky">Dewatering Drum</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">10</td>
                        <td id="dewatering_drum" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="dewatering_drum" value="' . $result['dewatering_drum'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Bottom Cone Inti</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">12</td>
                        <td id="bottom_cone_inti" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="bottom_cone_inti" value="' . $result['bottom_cone_inti'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Bottom Cone Cangkang</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">12</td>
                        <td id="bottom_cone_cangkang" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="bottom_cone_cangkang" value="' . $result['bottom_cone_cangkang'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Vortex Finder</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">6</td>
                        <td id="vortex_finder" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="vortex_finder" value="' . $result['vortex_finder'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Feed Housing</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">6</td>
                        <td id="feed_housing" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="feed_housing" value="' . $result['feed_housing'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Body Cyclone</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">6</td>
                        <td id="body_cyclone" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="body_cyclone" value="' . $result['body_cyclone'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Separating Cyclone</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">6</td>
                        <td id="separating_cyclone" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="separating_cyclone" value="' . $result['separating_cyclone'] . '"></td>
                    </tr>
                    <tr>
                        <td class="tg__-0pky">Box Control</td>
                        <td class="tg__-c3ow">Buah</td>
                        <td class="tg__-c3ow">6</td>
                        <td id="box_control" class="tg__-mak0"><input type="text" class="pmt-tabledata" name="box_control" value="' . $result['box_control'] . '"></td>
                    </tr>
                    
                </tbody>
            </table>
                </form>
    </div>
    </section>
    </div>
    ';
    echo '  <form id="logout" action="pmt-logout.php" method="post"></form>';
} else {
    header("Location: forbidden.php");
}
?>
<script>
    $(document).ready(function() {
        $('#navbarSupportedContent').html('');
        $('#db').addClass('row')
        $('#db').html(`<div class="row text-light fw-bolder m-3 w-100">
        <span class="lead mr-2"><?php echo 'Halo, ' . $_SESSION['username'] . '|' ?> </span>
        <button style="transform:translateY(-4px);color:red;" form="logout" type="submit" class="bg-transparent border-0">Keluar</button><div style="width:400px"></div><button form="stok-sparepart-pmt" style="float:left;" class="btn btn-info mr-3 " type="submit">Kirim</button>
    </div>`)
        var current = 'info_stok_sparepart.php'
        console.log(current)
        $('#navbarSupportedContent ul li a').each(function() {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($this.attr('href').indexOf(current) !== -1) {
                $this.parent().addClass('active');
            } else {
                $this.parent().removeClass('active');
            }
        })
    });
</script>
<?php include 'footer.php';
?>