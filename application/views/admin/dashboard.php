<section id="dashboard" class="team pt-4" style="background-color:#e2e2e2;">
    <?php extract($jumlah_per_progress) ?>
    <div class="container-fluid">
        <div class="h-100">
            <div class="section-title mt-5 ">
                <h2>Dashboard</h2>
            </div>
            <div class="row justify-content-center">
                <div onclick="showModal('null','')" class="col-xl-4 col-lg-4 col-md-4 col-10 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                    <div class="member bg-light nb-shadow">
                        <div class="row justify-content-start mb-2">
                            <div class="col-4">
                                <img style="width:100%" height="auto" src="<?= base_url('assets/img/icons/') ?>progress.png" alt="" srcset="">
                            </div>
                            <div class="col-8">
                                <h2 class="text-main fw-bolder text-start ms-lg-3 mt-2">
                                    JUMLAH PAKET PEKERJAAN
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline text-main mt-3 ms-lg-3 ms-xl-3">
                        <strong class="fs-1 fw-bolder me-1">
                            <?php if (!isset($total_pekerjaan)) {
                                echo "0";
                            } else {
                                echo $total_pekerjaan;
                            } ?>
                        </strong>
                        <strong class="fs-4">
                            PAKET
                        </strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly justify-content-md-center justify-content-sm-center mt-4 pt-4">
            <div class="col-12">
                <h1 class="fw-bold text-main text-center">PROGRESS PENGADAAN PEKERJAAN INVESTASI</h1>
            </div>
            <div onclick="showModal('pks',$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>pks.png" alt="" srcset="">
                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS DI PKS
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_pks)) {
                            echo "0";
                        } else {
                            echo $progress_pks;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="showModal('tekpol',$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>tekpol.png" alt="" srcset="">

                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS DI TEKPOL
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_tekpol)) {
                            echo "0";
                        } else {
                            echo $progress_tekpol;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="showModal('hps',$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>hps.png" alt="" srcset="">

                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS DI HPS
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_hps)) {
                            echo "0";
                        } else {
                            echo $progress_hps;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="showModal('pengadaan',$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>pengadaan.png" alt="" srcset="">

                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS DI PENGADAAN
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_pengadaan)) {
                            echo "0";
                        } else {
                            echo $progress_pengadaan;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="showModal('sppbj',$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>sppbj.png" alt="" srcset="">

                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                TERBIT SPPBJ
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_sppbj)) {
                            echo "0";
                        } else {
                            echo $progress_sppbj;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly justify-content-md-center justify-content-sm-center mt-4 pt-4">
            <div class="col-12">
                <h1 class="fw-bold text-main text-center">PROGRESS PENGADAAN PEKERJAAN INVESTASI</h1>
            </div>
            <div onclick="getPercentage(0,0,$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>progress.png" alt="" srcset="">

                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS 0%
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_0)) {
                            echo "0";
                        } else {
                            echo $progress_0;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="getPercentage(1,40,$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>progress.png" alt="" srcset="">

                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS <br> 1 - 40%
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_40)) {
                            echo "0";
                        } else {
                            echo $progress_40;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="getPercentage(41,60,$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>progress.png" alt="" srcset="">
                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS <br> 41 - 60%
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_60)) {
                            echo "0";
                        } else {
                            echo $progress_60;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="getPercentage(61,99,$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>progress.png" alt="" srcset="">
                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PROGRESS <br> 61 - 99%
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_99)) {
                            echo "0";
                        } else {
                            echo $progress_99;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
            <div onclick="getPercentage(100,100,$(this).find('p.text-main').text())" class="col-xl-2 col-lg-3 col-md-4 col-9 mt-4 zoom-hover rounded bg-light p-3 curpo me-3 me-sm-4 mb-2 ms-3">
                <div class="member bg-light nb-shadow">
                    <div class="row justify-content-start mb-2">
                        <div class="col-4">
                            <img style="transform: translate(-45%,-35%);" width="85px" height="auto" src="<?= base_url('assets/img/icons/') ?>done.png" alt="" srcset="">
                        </div>
                        <div class="col-8">
                            <p class="text-main fw-bolder text-start">
                                PEKERJAAN SELESAI
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-inline text-main mt-3">
                    <strong class="fs-2 fw-bolder me-1">
                        <?php if (!isset($progress_100)) {
                            echo "0";
                        } else {
                            echo $progress_100;
                        } ?>
                    </strong>
                    <strong class="fs-5">
                        PAKET
                    </strong>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="modalContent" style="padding:0px"></section>



<script>
    let basepath = $('#basepath').val()

    function showModal(id_pks, title) {
        let type_color = ""
        const callback = () => ($(`#${id_pks}`).DataTable({
            "language": {
                "url": "<?= base_url() ?>assets/vendor/datatables/js/indonesian.json"
            }
        }), $(`#${id_pks}_filter`).addClass('mb-2 me-1'))
        let persentase = 0;
        let wait = true
        setTimeout(() => {
            if (wait) {
                $('#loader>div').addClass('lds-ellipsis')
                $('#loader').css('display', 'block');
                $('html').css('overflow', 'hidden');
            }
        }, 30);
        let content = ""
        let num = 1;
        $.ajax({
            url: basepath + "index.php/admin/ajax_get_list_pekerjaan",
            type: "POST",
            dataType: 'json',
            data: {
                id_pks: id_pks,
            },
            success: function(object) {
                wait = false
                for (const key in object) {
                    if (Object.hasOwnProperty.call(object, key)) {
                        const element = object[key];
                        if (element.persentase != null) {
                            persentase = element.persentase
                        } else {
                            persentase = 0;
                        }

                        switch (element.id_progress) {
                            case '1':
                                type_color = "text-dark";
                                break;
                            case '2':
                                type_color = "text-danger";
                                break;
                            case '3':
                                type_color = "text-orange";
                                break;
                            case '4':
                                type_color = "text-warning";
                                break;
                            case '5':
                                type_color = "text-main";
                                break;
                        }

                        content += `<tr >
        <td >${num}</td>
        <td class="${type_color}">${element.uraian_pekerjaan}</td>
        <td class="${type_color}">${element.singkatan}</td>
        <td  class="${type_color}">${element.nama_progress}</td>
        <td  class="${type_color}">${persentase}%</td>
    </tr>`
                        num++


                    }
                }
                if (id_pks == 'null') {
                    title = 'Jumlah Paket Pekerjaan'
                }
                let html = `
                <div style='transform:translateY(20px)' class='section-title mb-0 pb-0 mt-2'>
                <h2 class='fs-3 mb-0'>${title}</h2>
                </div>
                <div class='p-3'>
<table  id="${id_pks}" class="table table-bordered mb-0">
<thead class="mainbgc text-light fw-bold">
    <th>No. </th>
    <th>Uraian Pekerjaan</th>
    <th>PKS</th>
    <th>Progress</th>
    <th>Persentase Progress</th>
</thead>
<tbody>
    ${content}
</tbody>
</table>
</div>`
                $('html').css('overflow', 'hidden');
                $('#loader').css('display', 'none');
                $('#loader>div').removeClass('lds-ellipsis')
                buildModal(html, callback);
            },
            error: function(arguments, status) {
                wait = false;
                $('html').css('overflow', 'overlay');
                $('#loader').css('display', 'none');
                $('#loader>div').removeClass('lds-ellipsis')
                alert('Error, cek koneksi');
            }
        });

    }

    function getPercentage(val1, val2, title) {

        let type_color = ""
        const callback = () => ($(`#progress${val1}`).DataTable(), $(`#progress${val1}_filter`).addClass('mb-2 me-1'))
        let persentase = 0;
        let wait = true
        setTimeout(() => {
            if (wait) {
                $('#loader>div').addClass('lds-ellipsis')
                $('#loader').css('display', 'block');
                $('html').css('overflow', 'hidden');
            }
        }, 30);
        let content = ""
        let num = 1;
        $.ajax({
            url: basepath + "index.php/admin/ajax_dash_persentase",
            type: "POST",
            dataType: 'json',
            data: {
                val1: val1,
                val2: val2
            },
            success: function(object) {
                wait = false
                for (const key in object) {
                    if (Object.hasOwnProperty.call(object, key)) {
                        const element = object[key];
                        if (element.persentase != null) {
                            persentase = element.persentase
                        } else {
                            persentase = 0;
                        }

                        switch (element.id_progress) {
                            case '1':
                                type_color = "text-dark";
                                break;
                            case '2':
                                type_color = "text-danger";
                                break;
                            case '3':
                                type_color = "text-orange";
                                break;
                            case '4':
                                type_color = "text-warning";
                                break;
                            case '5':
                                type_color = "text-main";
                                break;
                        }

                        content += `<tr >
        <td >${num}</td>
        <td class="${type_color}">${element.uraian_pekerjaan}</td>
        <td class="${type_color}">${element.singkatan}</td>
        <td  class="${type_color}">${element.nama_progress}</td>
        <td  class="${type_color}">${persentase}%</td>
    </tr>`
                        num++
                    }
                }
                let html = `
                <div style='transform:translateY(20px)' class='section-title mb-0 pb-0 mt-2'>
                <h2 class='fs-3 mb-0'>${title}</h2>
                </div>
                <div class='p-3'>
<table  id="progress${val1}" class="table table-bordered mb-0">
<thead class="mainbgc text-light fw-bold">
    <th>No. </th>
    <th>Uraian Pekerjaan</th>
    <th>PKS</th>
    <th>Progress</th>
    <th>Persentase Progress</th>
</thead>
<tbody>
    ${content}
</tbody>
</table>
</div>`
                $('html').css('overflow', 'hidden');
                $('#loader').css('display', 'none');
                $('#loader>div').removeClass('lds-ellipsis')
                buildModal(html, callback);
            },
            error: function(arguments, status) {
                alert('Error, cek koneksi')
            }
        });



    }
</script>