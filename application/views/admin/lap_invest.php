<style>
.sonar-wrapper {
    position: absolute;
    z-index: 99;
    padding: 8rem 0;
    overflow: none;
}

/* The circle */
.sonar-emitter {
    position: relative;
    margin: 0 auto;
    width: 14px;
    height: 14px;
    border-radius: 9999px;
}

/* the 'wave', same shape and size as its parent */
.sonar-wave {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 9999px;
    background-color: inherit;
    opacity: 0;
    z-index: -1;
    pointer-events: none;
}

/*
  Animate!
  NOTE: add browser prefixes where needed.
*/
.sonar-wave {
    animation: sonarWave 2s ease-in-out infinite;
}

@keyframes sonarWave {
    from {
        opacity: 0.7;
    }

    to {
        transform: scale(3);
        opacity: 0;
    }


}
</style>
<section id="lap_invest" class="pt-4 section-bg">
    <div class="container-fluid me-5">
        <div class="section-title mt-5 ">
            <h2>progress lap. investasi</h2>
        </div>

        <input type="hidden" id="weeks" value="<?= date('W') ?>">
        <div style="width: 100%;">
            <table style="table-layout: fixed;width:100%" id="tabel_lap_invest"
                class="table table-hover table-bordered w-100 me-4">
                <div class="row justify-content-end">


                    <?php $tw = "50em";

                    ?>

                </div>
                <thead class="mainbgc text-light mt-2">
                    <th style="width:1em">No.</th>
                    <th style="min-width:30rem">Uraian Pekerjaan</th>
                    <th style="width:1em">PKS</th>
                    <th style="width:1em;display:none;">Progress</th>
                    <th style='width:20em'>Dokumen</th>
                    <th style="max-width:30em;margin-right:1rem">
                        <div id='scr' onscroll="$('.tbs').scrollLeft($(this).scrollLeft())"
                            class="table-responsive b-scroll" style="width:100%">
                            <table class="text-light tbw">
                                <tbody>
                                    <tr>
                                        <?php
                                        foreach ($weeklist as $key => $value) {
                                            $weeknum = $value['weeknum'];
                                            $weekname = $value['weekname'];
                                            echo "<td style='white-space:nowrap ;' class='$weeknum'><div   style='width:60px; margin-left:2px'>$weekname</div></td>";
                                        } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </th>
                </thead>

                <tbody>
                    <?php
                    $basepath = base_url();
                    $fcpath = FCPATH;
                    $type_color = '';
                    for ($i = 0; $i < count($data_pekerjaan); $i++) {
                        extract($data_pekerjaan[$i]);
                        $num = $i + 1;

                        switch ($id_progress) {
                            case 1:
                                $type_color = "text-dark";
                                break;
                            case 2:
                                $type_color = "text-danger";
                                break;
                            case 3:
                                $type_color = "text-orange";
                                break;
                            case 4:
                                $type_color = "text-warning";
                                break;
                            case 5:
                                $type_color = "text-main";
                                break;
                        }
                        echo "<tr>
                    <td>$num</td>
                    <td class='$type_color curpo dropdown'>
                    <div class='dropdown'>
                        <p>
                        $uraian_pekerjaan</p>
                <ul style='position:absolute;right:-8em;top:0px;transform:translateY(-30px)' class='ms-2'>
                <li><a onclick='fireHist(`$id_pekerjaan`)'>History</a></li>
                    <li><a href='{$basepath}index.php/admin/update_progress?s_id_pks=$id_pks&s_id_pekerjaan=$id_pekerjaan&s_id_progress=$id_progress'>Update Progress</a></li>
                    <li><a href='{$basepath}index.php/admin/upload_dokumen?s_id_pks=$id_pks&s_id_pekerjaan=$id_pekerjaan&s_id_progress=$id_progress'>Upload Dokumen</a></li>
                    </ul>
</div>
                    </td>
                    
                    <td class='$type_color'>$singkatan</td>
                    <td class='d-none'>$nama_progress</td>
                    <td >
                        <div class='row justify-content-evenly '>";


                        if (file_exists("{$fcpath}media/upload/dokumen/$singkatan/$id_pekerjaan/rab_$folder.pdf")) {
                            echo "
                                <button onclick='displayDoc(`{$basepath}media/upload/dokumen/$singkatan/$id_pekerjaan/rab_$folder.pdf`)' class='border-0 col-2 btn mainbgc text-light p-1 m-1 text-light'>RAB</button>";
                        } else {
                            echo "<button style='pointer-events: none;' class='col-2 btn btn-secondary text-light p-1 m-1'>RAB</button>";
                        }
                        if (file_exists("{$fcpath}media/upload/dokumen/$singkatan/$id_pekerjaan/st_rkst_kak_$folder.pdf")) {
                            echo "
                                <button onclick='displayDoc(`{$basepath}media/upload/dokumen/$singkatan/$id_pekerjaan/st_rkst_kak_$folder.pdf`)' class='border-0 col-2 btn mainbgc text-light p-1 m-1 text-light'>RKST</button>";
                        } else {
                            echo "<button style='pointer-events: none;' class='col-2 btn btn-secondary text-light p-1 m-1'>RKST</button>";
                        }
                        if (file_exists("{$fcpath}media/upload/dokumen/$singkatan/$id_pekerjaan/kontrak_$folder.pdf")) {
                            echo "
                                <button onclick='displayDoc(`{$basepath}media/upload/dokumen/$singkatan/$id_pekerjaan/kontrak_$folder.pdf`)' class='border-0 col-2 btn mainbgc text-light p-1 m-1 text-light'><small>Kontrak</small></button>";
                        } else {
                            echo "<button style='pointer-events: none;' class='col-2 btn btn-secondary text-light p-1 m-1'><small>Kontrak</small></button>";
                        }
                        if (file_exists("{$fcpath}media/upload/dokumen/$singkatan/$id_pekerjaan/sppbj_$folder.pdf")) {
                            echo "
                                <button onclick='displayDoc(`{$basepath}media/upload/dokumen/$singkatan/$id_pekerjaan/sppbj_$folder.pdf`)' class='border-0 col-2 btn mainbgc text-light p-1 m-1 text-light'><small>SPPBJ</small></button>";
                        } else {
                            echo "<button style='pointer-events: none;' class='col-2 btn btn-secondary text-light p-1 m-1'><small>SPPBJ</small> </button>";
                        }
                        echo "</div>
                    </td>
                        <td>
                       
                        <div style='width:100%;overflow-x:hidden' class='tbs'>
                            <table class='tbw' class='table table-dark'> ";
                        echo " 
                                <tbody>
                                
                                ";
                        $week = 1;
                        $persentase_s = "";
                        $ppl = count($persentase_progress);
                        $counter = 0;
                        foreach ($weeklist as $key => $value) {
                            $weeknum = $value['weeknum'];
                            $weekname = str_replace(" ", "-", $value['weekname']);
                            if (isset($persentase_progress[$weekname])) {
                                extract($persentase = $persentase_progress[$weekname]);
                                $persentase_s = $persentase . "%";
                                if (isset($bukti)) {
                                    $fold = pathinfo($bukti)['filename'];
                                    $foto_bukti = base_url("media/upload/bukti/$singkatan/$id_pekerjaan/$fold/$bukti");
                                    echo "<td style='white-space:nowrap;text-align:center' class='$weeknum curpo'><div style='width:60px; margin-left:2px'><a onclick='setDownloadImage(`$foto_bukti`)' href='$foto_bukti' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link text-start ps-0' title='$bukti'>$persentase_s
                                        </a></div></td>";
                                } else {
                                    echo "<td style='white-space:nowrap;text-align:center;cursor:default' class='$weeknum text-secondary'><div style='width:60px; margin-left:2px'>$persentase_s</div></td>";
                                }
                                $counter++;
                            } else {
                                if ($ppl <= $counter) {
                                    $persentase_s = "";
                                }
                                echo "<td style='white-space:nowrap;text-align:center;' class='$weeknum text-secondary'><div style='width:60px; margin-left:2px'> $persentase_s</div></td>";
                            }
                            $week++;
                        }
                        echo "
                                </tbody>
                            </table>
                        </div>
                        </td>
                    
                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section id="modalContent" style="padding:0px">

</section>


<script>
function displayDoc(val) {
    $('#modalContent').removeClass('d-none')
    let callback = () => console.log()
    let content = `
        <div class="modal-header"><div class="modal-title">Dokumen</div>
        <button onclick="$('#staticBackdrop').modal('toggle')" type="button" class="border-0 text-secondary fw-bold fs-4 bi bi-x float-end">
        </button>
      </div>
        <iframe src="${val}" style="width: auto;height: 95vh;border: none;"></iframe>
    `
    buildModal(content, callback)
}

let tabel_lap_invest = $('#tabel_lap_invest').DataTable({
    "language": {
        "url": "<?= base_url() ?>assets/vendor/datatables/js/indonesian.json"
    },
    columnDefs: [{
        targets: [4, 5],
        orderable: false
    }],
    pageLength: 25
});

let filtertype = `<div id="filter_type" class="form-inline float-start me-4 pe-3 d-none d-lg-block d-xl-block">
            <span class="ms-2 text-dark"><label for="pks" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="pks" id="pks" class="form-check curpo d-inline"><small class="me-1 ms-1">PKS</small></label></span>
            <span class="ms-2 text-danger"><label for="tekpol" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="tekpol" id="tekpol" class="form-check curpo d-inline"><small class="me-1 ms-1">TEKPOL</small></label></span>
            <span class="ms-2 text-orange"><label for="hps" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="hps" id="hps" class="form-check curpo d-inline"><small class="me-1 ms-1">HPS</small></label></span>
            <span class="ms-2 text-warning"><label for="pengadaan" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="pengadaan" id="pengadaan" class="form-check curpo d-inline"><small class="me-1 ms-1">PENGD</small></label></span>
            <span class="ms-2 text-main"><label for="sppbj" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="sppbj" id="sppbj" class="form-check curpo d-inline"><small class="me-1 ms-1">SPPBJ</small></label></span>
            <span class="ms-2 me-2" onclick="$(this).parent().find('input:checkbox').prop('checked',true);filterType()"><i class="text-secondary bi bi-bootstrap-reboot curpo"></i></span>
        </div> `


let filtertime = `<div class="d-inline">
                <span class="ms-2">From:</span>
                <label class="mb-3" for="flt_weekfrom">
                    <select value="1" onchange='filterTime()' class="form-select" name="" id="flt_weekfrom">
                        <option selected value="1">W1</option>
                        <option value="2">W2</option>
                        <option value="3">W3</option>
                        <option value="4">W4</option>
                        <option value="5">W5</option>
                        <option value="6">W6</option>
                    </select>
                </label>
                <label class="ms-1" for="">
                    <select val="1" onchange='filterTime()' class="form-select" name="" id="flt_monthfrom">
                        <option selected value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">Mei</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Agu</option>
                        <option value="9">Sep</option>
                        <option value="10">Okt</option>
                        <option value="11">Nov</option>
                        <option value="12">Des</option>
                    </select>
                </label>
                <span class="ms-2">To:</span>
                <label class="mb-3" for="flt_weekto">
                    <select value="4" onchange='filterTime()' class="form-select" name="" id="flt_weekto">
                        <option value="1">W1</option>
                        <option value="2">W2</option>
                        <option value="3">W3</option>
                        <option value="4">W4</option>
                        <option selected value="5">W5</option>
                        <option selected value="6">W6</option>
                    </select>
                </label>

                <label class="float-end ms-1" for="">
                    <select val="12" onchange='filterTime()' class="form-select" name="" id="flt_monthto">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">Mei</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Agu</option>
                        <option value="9">Sep</option>
                        <option value="10">Okt</option>
                        <option value="11">Nov</option>
                        <option selected value="12">Des</option>
                    </select>
                </label>
            </div>`

function scrl(params) {
    if (params > 3) {
        $('#scr').scrollLeft(params * 85);
    }
}

$(document).ready(function() {
    scrl($('#weeks').val())
    setTimeout(() => {
        $('#tabel_lap_invest_filter').addClass("me-3");
        $('#tabel_lap_invest_filter').append(filtertype);
        $('#tabel_lap_invest_filter').append(filtertime);
    }, 100);
});


function filterType() {
    let filter_value = $('#filter_type input:checked').map(function() {
        return $(this).val();
    }).get()
    let res = ""
    for (let index = 0; index < filter_value.length; index++) {
        if (filter_value.length == (index + 1)) {
            res += filter_value[index];
        } else {
            res += filter_value[index] + "|";
        }
    }
    tabel_lap_invest.columns(3).search(`${res}`, true, false).draw();
}

function filterTime() {
    let weekfrom = parseInt($('#flt_weekfrom').val())
    let weekto = parseInt($('#flt_weekto').val())
    let monthfrom = parseInt($('#flt_monthfrom').val())
    let monthto = parseInt($('#flt_monthto').val())


    if (monthfrom > monthto) {
        let tmp = monthfrom
        monthfrom = monthto
        monthto = tmp
    } else if (monthfrom == monthto) {
        if (weekfrom > weekto) {
            let tmp = weekfrom
            weekfrom = weekto
            weekto = tmp
        }
    }

    let x = weekfrom
    $(`.tbw td`).hide()
    for (monthfrom; monthfrom <= monthto; monthfrom++) {
        if (monthfrom < monthto) {
            for (x; x <= 6; x++) {
                let mw = ("w" + x + "-m" + monthfrom)
                $(`.tbw td.${mw}`).show();
            }
            x = 1;
        } else if (monthfrom == monthto) {
            if (weekfrom != weekto) {
                x = 1;
            } else {
                x = weekfrom;
            }
            for (x; x <= weekto; x++) {
                let mw = ("w" + x + "-m" + monthfrom)
                $(`.tbw td.${mw}`).show();
            }
        }
    }
}

function setDownloadImage(url) {
    let elem = `<a href="${url}" class="bi bi-download fw-bold ms-3" download></a>`
    setTimeout(() => {
        $('.gslide-title').append(elem)
    }, 100);
}


function fireHist(id_pekerjaan) {
    let bsp = $('#basepath').val();
    let wait = true
    let type_color = ''
    let text_color = ''
    let timeline_item = ``
    let content = ``
    let icontype = "bi-chevron-down"
    let ket = ""
    setTimeout(() => {
        if (wait) {
            $('#loader>div').addClass('lds-ellipsis')
            $('#loader').css('display', 'block');
            $('html').css('overflow', 'hidden');
        }
    }, 30);
    $.ajax({
        url: bsp + "index.php/admin/ajax_get_history",
        type: "POST",
        dataType: 'json',
        data: {
            id_pekerjaan: id_pekerjaan
        },
        success: function(object) {
            wait = false
            for (let index = 0; index < object.length; index++) {
                if (Object.hasOwnProperty.call(object, index)) {
                    const element = object[index];
                    switch (element.id_progress) {
                        case '1':
                            type_color = "bg-dark";
                            text_color = "text-dark";
                            break;
                        case '2':
                            type_color = "bg-danger";
                            text_color = "text-danger";
                            break;
                        case '3':
                            type_color = "bg-orange";
                            text_color = "text-orange";
                            break;
                        case '4':
                            type_color = "bg-warning";
                            text_color = "text-warning";
                            break;
                        case '5':
                            type_color = "mainbgc";
                            text_color = "text-main";
                            break;
                    }
                    if (element.keterangan != " " || element.keterangan != "") {
                        ket = `<p style='white-space:pre-line;transform:translateY(-35px)' class="text-muted m-0">
        ${element.keterangan}
      </p>`
                    } else {
                        ket = ''
                    }
                    if (index == 0) {
                        timeline_item += `<li class="timeline-item mb-0">
    <span class="timeline-icon">
    <i class='bi bi-chevron-down fw-bold text-dark'></i>      
      </span>
      <h5 class="fw-bold">${element.tanggal}</h5>
      <p class='${text_color} progress-bg'>${element.nama_progress}</p>
      ${ket}
    </li>`
                    } else if ((index + 1) == object.length) {
                        timeline_item += `<li class="timeline-item mb-0">
    <span class="timeline-icon">
    <div class="sonar-wrapper">
            <div class="sonar-emitter ${type_color}">
            <div class="sonar-wave">
                    <div class="sonar-wave">
                    </div>
                </div>
            </div>
        </div>        
      </span>
      <h5 class="fw-bold">${element.tanggal}</h5>
      <p class='${text_color} progress-bg'>${element.nama_progress}</p>
      ${ket}
    </li>
    <li style="
    background: white;
    position: absolute;
    bottom: 0;
    width: 20px;
    height: 100px;
    transform: translateX(-3rem);"></li>
    `
                    } else {
                        timeline_item += `<li class="timeline-item mb-0">
    <span class="timeline-icon">
    <div class="sonar-wrapper">
            <div class="sonar-emitter ${type_color}">
            
            </div>
        </div>        
      </span>
      <h5 class="fw-bold">${element.tanggal}</h5>
      <p class='${text_color} progress-bg'>${element.nama_progress}</p>
      ${ket}
    </li>
    `
                    }


                    icontype = `bi-circle-fill`
                }
            }
            content = `

<!-- Section: Timeline -->
<div class="modal-header">
        <div class='d-flex justify-content-center'><h4 class="subtitle text-center" id="exampleModalLabel">History</h4></div>
        <button onclick="$('#staticBackdrop').modal('toggle')" type="button" class="border-0 text-secondary fw-bold fs-4 bi bi-x float-end">
        </button>
      </div>
<section style='overflow:unset' class="p-2 ms-3">
<div class=' container'>
  <ul class="timeline-with-icons">
${timeline_item}   
  </ul>
  </div>
</section>
<!-- Section: Timeline -->
`
            $('html').css('overflow', 'hidden');
            $('#loader').css('display', 'none');
            $('#loader>div').removeClass('lds-ellipsis')

            buildModal(content, function() {
                $('.modal-dialog').addClass('w-75')
            })
        },
        error: function(arguments, status, error) {
            wait = false;
            $('html').css('overflow', 'overlay');
            $('#loader').css('display', 'none');
            $('#loader>div').removeClass('lds-ellipsis')
            Swal.fire({
                icon: "warning",
                title: "Error",
                text: error
            })
        }
    });
}
</script>