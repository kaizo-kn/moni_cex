<link rel="stylesheet" href="<?= base_url("assets/vendor/selectize/css/selectize.css") ?>">
<section id="input_uraian_pekerjaan">
    <div class="container mt-3 mb-5 pb-5">
        <div class="section-title">
            <h2> Update Progress Pengadaan</h2>
        </div>
        <form id="table_progress" action="<?= base_url('index.php/') ?>admin/update_progress_pekerjaan" method="post"
            enctype="multipart/form-data">
            <table class="table table-bordered table-hover rounded">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            Pilih PKS
                        </td>
                        <td class="control-group">
                            <select onchange="$(`#type_progress`).val('disabled');getListPekerjaan($(this).val())"
                                name="id_pks" id="list_pks" required>

                                <?php

                                if (empty($s_id_pks) || empty($s_id_pekerjaan)) {
                                    echo ' <option disabled selected value="">Pilih PKS</option>';
                                } else {
                                    echo ' <option disabled value="">Pilih PKS</option>';
                                }
                                for ($i = 0; $i < count($data_pks); $i++) {
                                    if ($data_pks[$i]['id_pks'] == $s_id_pks) {
                                        echo ' <option class="curpo" value=' . $data_pks[$i]['id_pks'] . ' selected>' . $data_pks[$i]['nama_pks'] . '</option>';
                                    } else {
                                        echo ' <option class="curpo" value=' . $data_pks[$i]['id_pks'] . '>' . $data_pks[$i]['nama_pks'] . '</option>';
                                    }
                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Pilih Uraian Pekerjaan
                        </td>
                        <td class="control-group">
                            <select
                                onchange="$(`#list_pekerjaan-selectized`).prop('required',false);$('#u_p').text($(this).children('option').filter(':selected').text());setCorrection($(this).val())"
                                name="id_pekerjaan" id="list_pekerjaan" required>
                                <option disabled selected value="">Pilih Uraian Pekerjaan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Update Progress Pengadaan
                        </td>
                        <td class="control-group">
                            <select onchange="$('#keterangan').removeClass('d-none')"
                                style="border-color:#b8b8b8;color:#303030;;font-size:13px" class="form-select"
                                name="id_progress" id="type_progress" required>
                                <option style="color:#b8b8b8!important;" disabled selected value="disabled">Pilih
                                    Progress... </option>
                                <?php try {
                                    for ($i = 0; $i < count($data_progress); $i++) {
                                        echo ' <option class="curpo" value=' . $data_progress[$i]['id_progress'] . '>' . $data_progress[$i]['nama_progress'] . '</option>';
                                    }
                                } catch (\Throwable $th) {
                                    echo "<option>None</option>";
                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr id="koreksi" class="d-none">
                        <td style="width:30%">
                            Uraian Pekerjaan
                        </td>
                        <td>
                            <textarea id="u_p" name="uraian_pekerjaan" rows="5" cols="5" class="form-control w-100"
                                placeholder="Uraian Pekerjaan..."></textarea>
                        </td>
                    </tr>
                    <tr id="keterangan" class="d-none">
                        <td style="width:30%">
                            Keterangan
                        </td>
                        <td>
                            <textarea id='txt_ket' name="keterangan" rows="5" cols="5" class="form-control w-100"
                                placeholder="Keterangan..."></textarea>
                        </td>
                    </tr>
                </tbody>

            </table>
            <div class="row justify-content-end">
                <input id="action" type="hidden" name="action">
                <div class="col-3 col-lg-1 ">
                    <button onclick="confirmDeletion();$('#action').val('hapus')"
                        class="btn btn-danger text-light  fw-bold" type="button">Hapus</button>
                </div>
                <div class="col-3 col-lg-1 me-2">
                    <button onclick="$('#koreksi').removeClass('d-none')" class="btn btn-warning text-light fw-bold"
                        type="button">Koreksi</button>
                </div>
                <div class="col-3 col-lg-1 ">
                    <button onclick="$('#action').val('edit');$('#table_progress').submit()"
                        class="btn mainbgc text-light fw-bold" type="button">Kirim</button>
                </div>

            </div>
        </form>
    </div>
    <input type="hidden" id="s_id_pks" value="<?= @$s_id_pks ?>">
    <input type="hidden" id="s_id_pekerjaan" value="<?= @$s_id_pekerjaan . ',' . @$s_id_progress ?>">

</section>

<script>
function confirmDeletion() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $("#table_progress").submit()
        }
    })
}

function setCorrection(id_val) {
    if (id_val != "") {
        id_progress = JSON.parse("[" + id_val + "]")[1];
        $('#type_progress').selectize()[0].selectize.destroy();
        $(`#type_progress`).val(id_progress)
    }


}
$(document).ready(function() {
    $('#list_pks').selectize();
    $('#list_pekerjaan').selectize();
    getListPekerjaan($('#s_id_pks').val())
});


function getListPekerjaan(id_pks) {
    if (id_pks == '') {
        return 0
    }
    let wait = true
    setTimeout(() => {
        if (wait) {
            $('#loader>div').addClass('lds-ellipsis')
            $('#loader').css('display', 'block');
            $('html').css('overflow', 'hidden');
        }
    }, 100);
    let basepath = $('#basepath').val()
    $.ajax({
        url: basepath + "index.php/admin/ajax_get_list_pekerjaan",
        type: "POST",
        dataType: 'json',
        data: {
            id_pks: id_pks,
        },
        success: function(data) {
            wait = false
            let pekerjaan_selected = $("#s_id_pekerjaan").val();
            $('#list_pekerjaan').selectize()[0].selectize.destroy();
            let my_options = []
            for (let index = 0; index < data.length; index++) {
                const element = data[index];
                my_options[index] = {
                    'id': element['id_pekerjaan'] + "," + element['id_progress'],
                    'uraian_pekerjaan': element['uraian_pekerjaan']
                }
            }
            $('#list_pekerjaan').selectize({
                maxItems: 1,
                valueField: 'id',
                labelField: 'uraian_pekerjaan',
                searchField: 'uraian_pekerjaan',
                options: my_options,
                create: false,
                selected: 0
            });
            $(`#list_pekerjaan-selectized`).prop('required', true)
            $('#list_pekerjaan').selectize()[0].selectize.setValue(`${pekerjaan_selected}`)
            $('html').css('overflow', 'overlay');
            $('#loader').css('display', 'none');
            $('#loader>div').removeClass('lds-ellipsis')
        },
        error: function(arguments, status, error) {
            $('html').css('overflow', 'overlay');
            $('#loader').css('display', 'none');
            $('#loader>div').removeClass('lds-ellipsis')
            toastMixin.fire({
                icon: 'error',
                
                title: error
            });
        }
    });
}
</script>