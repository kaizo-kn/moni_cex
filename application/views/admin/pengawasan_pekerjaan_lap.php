<section id="lap_invest" class="pt-4 section-bg">
    <div class="container-fluid ">
        <div class="section-title mt-5 ">
            <h2>pengawasan pekerjaan lapangan</h2>
        </div>
        <div style="width: 100%;">
            <table style="table-layout: fixed;width:100%" id="tabel_lap_invest" class="table table-hover table-bordered w-100">
                <div class="row justify-content-end">


                    <?php $tw = "50em";
                    $url = base_url('media/upload/surat/SE-Penetapan-6-Standarisasi-PMT_page-0002.jpg');
                    ?>

                </div>
                <thead class="mainbgc text-light mt-2">
                    <th style="width:1em;vertical-align:middle;text-align:left">No.</th>
                    <th style="min-width:30rem;vertical-align:middle;text-align:center">Uraian Pekerjaan</th>
                    <th style="width:1em;vertical-align:middle;text-align:center">PKS</th>
                    <th style="display:none;">Progress</th>
                    <th style="width:8%;vertical-align:text-top;text-align:center">Presentasi Timeline dan Safety Induction</th>
                    <th style="width:8%;vertical-align:text-top;text-align:center">Pengecekan Administrasi (Sertifikat, dll)</th>
                    <th style="width:8%;vertical-align:text-top;text-align:center">Memastikan Pemakaian APD</th>
                    <th style="width:8%;vertical-align:text-top;text-align:center">Pengecekan Dokumen RKST, RAB, dan Kontrak</th>
                    <th style="width:8%;vertical-align:text-top;text-align:center">Pengecekan Material Masuk</th>
                </thead>

                <tbody>
                    <?php
                    $basepath = base_url();
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
                   <td class='$type_color'>$uraian_pekerjaan</td>
                   <td class='$type_color'>$singkatan</td>
                   <td class='d-none'>$nama_progress</td>";
                        if (!empty($dokumentasi)) {
                            foreach ($dokumentasi as $key => $foto_dokumentasi) {
                                if (!empty($foto_dokumentasi)) {
                                    echo
                                    "<td class='text-center'>
                                <a onclick ='setDownloadImage(`$basepath/media/upload/dokumentasi_progress/$singkatan/$id_pekerjaan/$foto_dokumentasi`)' href='$basepath/media/upload/dokumentasi_progress/$singkatan/$id_pekerjaan/$foto_dokumentasi' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link' title='$foto_dokumentasi'><i class='curpo bi bi-check-circle text-main fs-4 fw-bold text-center'></i></td></a>";
                                } else {
                                    echo
                                    "<td class='text-center'><i class=' bi bi-x-circle text-danger fs-4 fw-bold text-center></i>'</td>";
                                }
                            }
                        } else {
                            for ($iy = 0; $iy < 5; $iy++) {
                                echo
                                "<td class='text-center'><i class=' bi bi-x-circle text-danger fs-4 fw-bold text-center></i>'</td>";
                            }
                        }

                        echo "</tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    let tabel_lap_invest = $('#tabel_lap_invest').DataTable({
        columnDefs: [{
            targets: [3, 4, 5, 6, 7, 8],
            orderable: false
        }],
        pageLength: 25
    });

    let filtertype = `<div id="filter_type" class="form-inline float-start me-4 pe-3">
            <span class="ms-2 text-dark"><label for="pks" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="pks" id="pks" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">PKS</small></label></span>
            <span class="ms-2 text-danger"><label for="tekpol" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="tekpol" id="tekpol" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">TEKPOL</small></label></span>
            <span class="ms-2 text-orange"><label for="hps" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="hps" id="hps" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">HPS</small></label></span>
            <span class="ms-2 text-warning"><label for="pengadaan" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="pengadaan" id="pengadaan" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">PENGD</small></label></span>
            <span class="ms-2 text-main"><label for="sppbj" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="sppbj" id="sppbj" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">SPPBJ</small></label></span>
            <span class="ms-2 me-2" onclick="$(this).parent().find('input:checkbox').prop('checked',true);filterType()"><i class="text-secondary bi bi-bootstrap-reboot curpo"></i></span>
        </div> `



    $(document).ready(function() {

        setTimeout(() => {
            $('#tabel_lap_invest_filter').append(filtertype);
            $('#tabel_lap_invest_filter').addClass("mb-3 me-3");
        }, 100);
    });

    function setDownloadImage(url) {
        let elem = `<a href="${url}" class="bi bi-download fw-bold ms-3" download></a>`
        setTimeout(() => {
            $('.gslide-title').append(elem)
        }, 100);
    }

    function filterType() {
        let res = ""
        let filter_value = $('#filter_type input:checked').map(function() {
            return $(this).val();
        }).get()
        if (filter_value.length < 1) {
            res = 'x'
        }

        for (let index = 0; index < filter_value.length; index++) {
            if (filter_value.length == (index + 1)) {
                res += filter_value[index];
            } else {
                res += filter_value[index] + "|";
            }
        }
        tabel_lap_invest.columns(3).search(`${res}`, true, false).draw();
    }
</script>