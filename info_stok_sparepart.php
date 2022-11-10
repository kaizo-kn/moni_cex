<?php 
$page_title='Informasi Stok Sparepart';
include 'head.php';
?>

<input type="hidden" id="username" value="humasptpn_adminPMTPN4">
<input type="hidden" name="" id="password" value="PMTPN4#@!admin">
<div class="container mt-4">
    <div style="font-size:2.4em" class="text-center text-dark font-weight-bold p-5 pt-2 mb-1 mt-3">
        Informasi Jumlah Stok Sparepart

    </div>

    <section id="table">
    <div style="display:flex;justify-content:center;margin-bottom:1rem" class="tg__-wrap">
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
                    <th colspan="5"
                        style="border:1px solid transparent;border-bottom:1px solid black;padding-bottom:0px">
                        <h5 style="text-align: left;">Update Terakhir : <span id="tanggal_update"></span>
                        </h5>
                    </th>
                    <th colspan="1" style="border:1px solid transparent;border-bottom:1px solid black">
                        <button class="btn btn-info" type="button" onclick="editData()" style="float:right">Edit
                            Data</button>
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
                    <td id="lori_rebusan" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-c3ow" colspan="2" rowspan="2"></td>
                    <td class="tg__-0pky">Roda Lori c/w As</td>
                    <td class="tg__-c3ow">Set</td>
                    <td class="tg__-c3ow">100</td>
                    <td id="roda_lori" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Bushing</td>
                    <td class="tg__-c3ow">Pcs</td>
                    <td class="tg__-c3ow">200</td>
                    <td id="bushing_lori" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-c3ow" colspan="2">2</td>
                    <td class="tg__-0pky">Timba - Timba Buah Masak (Fruit Elevator)</td>
                    <td class="tg__-c3ow">Unit</td>
                    <td class="tg__-c3ow">1</td>
                    <td id="fruit_elevator" class="tg__-mak0"></td>
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
                    <td id="as_thresher" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Tromol Bantingan</td>
                    <td class="tg__-c3ow">Set</td>
                    <td class="tg__-c3ow">2</td>
                    <td id="tromol_thresher" class="tg__-mak0"></td>
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
                    <td id="body_cbc" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Gantungan CBC</td>
                    <td class="tg__-c3ow">Set</td>
                    <td class="tg__-c3ow">20</td>
                    <td id="gantungan_cbc" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Pedal - Pedal CBC c/w As</td>
                    <td class="tg__-c3ow">Segmen</td>
                    <td class="tg__-c3ow">12</td>
                    <td id="pedal_cbc" class="tg__-mak0"></td>
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
                    <td id="body_polishdrum" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Roll Bodi Polishing Drum</td>
                    <td class="tg__-c3ow">Set</td>
                    <td class="tg__-c3ow">2</td>
                    <td id="roll_body_polishdrum" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Roll Bawah Polishing Drum</td>
                    <td class="tg__-c3ow">Set</td>
                    <td class="tg__-c3ow">8</td>
                    <td id="roll_bawah_polishdrum" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Roda Gigi Polishing Drum</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">2</td>
                    <td id="gear_polishdrum" class="tg__-mak0"></td>
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
                    <td id="dewatering_drum" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Bottom Cone Inti</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">12</td>
                    <td id="bottom_cone_inti" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Bottom Cone Cangkang</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">12</td>
                    <td id="bottom_cone_cangkang" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Vortex Finder</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">6</td>
                    <td id="vortex_finder" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Feed Housing</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">6</td>
                    <td id="feed_housing" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Body Cyclone</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">6</td>
                    <td id="body_cyclone" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Separating Cyclone</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">6</td>
                    <td id="separating_cyclone" class="tg__-mak0"></td>
                </tr>
                <tr>
                    <td class="tg__-0pky">Box Control</td>
                    <td class="tg__-c3ow">Buah</td>
                    <td class="tg__-c3ow">6</td>
                    <td id="box_control" class="tg__-mak0"></td>
                </tr>
                <tr style="border:solid 1px white;border-top:initial!important">
                    <td colspan="6" style="text-align: right;border:solid 0px ;border-top:initial!important">
                        <button class="btn btn-info" onclick="kirimData()">Kirim</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </section>
</div>
<script>
var arq = [
    `lori_rebusan`,
    `fruit_elevator`,
    `as_thresher`,
    `tromol_thresher`,
    `body_cbc`,
    `gantungan_cbc`,
    `pedal_cbc`,
    `body_polishdrum`,
    `roll_body_polishdrum`,
    `roll_bawah_polishdrum`,
    `gear_polishdrum`,
    `dewatering_drum`,
    `bottom_cone_inti`,
    `bottom_cone_cangkang`,
    `vortex_finder`,
    `feed_housing`,
    `body_cyclone`,
    `separating_cyclone`,
    `box_control`,
    `roda_lori`,
    `bushing_lori`
]



function collectData() {
    let username = $('#username').val()
    let password = $('#password').val()
    let lori_rebusan = $('#lori_rebusan').text()
    let fruit_elevator = $('#fruit_elevator').text()
    let as_thresher = $('#as_thresher').text()
    let tromol_thresher = $('#tromol_thresher').text()
    let body_cbc = $('#body_cbc').text()
    let gantungan_cbc = $('#gantungan_cbc').text()
    let pedal_cbc = $('#pedal_cbc').text()
    let body_polishdrum = $('#body_polishdrum').text()
    let roll_body_polishdrum = $('#roll_body_polishdrum').text()
    let roll_bawah_polishdrum = $('#roll_bawah_polishdrum').text()
    let gear_polishdrum = $('#gear_polishdrum').text()
    let dewatering_drum = $('#dewatering_drum').text()
    let bottom_cone_inti = $('#bottom_cone_inti').text()
    let bottom_cone_cangkang = $('#bottom_cone_cangkang').text()
    let vortex_finder = $('#vortex_finder').text()
    let feed_housing = $('#feed_housing').text()
    let body_cyclone = $('#body_cyclone').text()
    let separating_cyclone = $('#separating_cyclone').text()
    let box_control = $('#box_control').text()
    let roda_lori = $('#roda_lori').text()
    let bushing_lori = $('#bushing_lori').text()
    let dataToSend = {
        username: username,
        password: password,
        lori_rebusan: lori_rebusan,
        fruit_elevator: fruit_elevator,
        as_thresher: as_thresher,
        tromol_thresher: tromol_thresher,
        body_cbc: body_cbc,
        gantungan_cbc: gantungan_cbc,
        pedal_cbc: pedal_cbc,
        body_polishdrum: body_polishdrum,
        roll_body_polishdrum: roll_body_polishdrum,
        roll_bawah_polishdrum: roll_bawah_polishdrum,
        gear_polishdrum: gear_polishdrum,
        dewatering_drum: dewatering_drum,
        bottom_cone_inti: bottom_cone_inti,
        bottom_cone_cangkang: bottom_cone_cangkang,
        vortex_finder: vortex_finder,
        feed_housing: feed_housing,
        body_cyclone: body_cyclone,
        separating_cyclone: separating_cyclone,
        box_control: box_control,
        roda_lori: roda_lori,
        bushing_lori: bushing_lori
    }
    return dataToSend
}


function editData() {
    for (i = 0; i < arq.length; i++) {
        $('#' + arq[i] + '').attr('contenteditable', 'true')
    }
}

function kirimData() {
    console.log(collectData())
    for (i = 0; i < arq.length; i++) {
        $('#' + arq[i] + '').attr('contenteditable', 'false')
    }
    $.ajax({
        url: 'http://pmt.ptpn4.co.id//pmt-update-data.php',
        type: 'post',
        dataType: 'json',
        data: collectData(),
        success: function(data) {
            alert(data.message)
            console.log(data.message)
        },
        error: function(data) {
            alert(arguments[2])
            console.log(arguments)
        }
    });
}

function getData() {
    $.ajax({
        url: 'http://pmt.ptpn4.co.id//pmt-get-data.php',
        type: 'post',
        dataType: 'json',
        success: function(data) {
            for (i = -1; i < data.length; i++) {
                $('#tanggal_update').text(data[0].tanggal_update)
                $('#lori_rebusan').text(data[0].lori_rebusan)
                $('#fruit_elevator').text(data[0].fruit_elevator)
                $('#as_thresher').text(data[0].as_thresher)
                $('#tromol_thresher').text(data[0].tromol_thresher)
                $('#body_cbc').text(data[0].body_cbc)
                $('#gantungan_cbc').text(data[0].gantungan_cbc)
                $('#pedal_cbc').text(data[0].pedal_cbc)
                $('#body_polishdrum').text(data[0].body_polishdrum)
                $('#roll_body_polishdrum').text(data[0].roll_body_polishdrum)
                $('#roll_bawah_polishdrum').text(data[0].roll_bawah_polishdrum)
                $('#gear_polishdrum').text(data[0].gear_polishdrum)
                $('#dewatering_drum').text(data[0].dewatering_drum)
                $('#bottom_cone_inti').text(data[0].bottom_cone_inti)
                $('#bottom_cone_cangkang').text(data[0].bottom_cone_cangkang)
                $('#vortex_finder').text(data[0].vortex_finder)
                $('#feed_housing').text(data[0].feed_housing)
                $('#body_cyclone').text(data[0].body_cyclone)
                $('#separating_cyclone').text(data[0].separating_cyclone)
                $('#box_control').text(data[0].box_control)
                $('#roda_lori').text(data[0].roda_lori)
                $('#bushing_lori').text(data[0].bushing_lori)
                $('#' + arq[i] + '').attr('contenteditable', 'false')
            }
            console.log(data[0].message)
        },
        error: function() {
            console.log(data[0].message);
        }
    });
}
getData();
</script>
<?php include 'footer.php' ?>