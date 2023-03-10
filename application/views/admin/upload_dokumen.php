<link rel="stylesheet" href="<?= base_url("assets/vendor/selectize/css/selectize.css") ?>">
<section id="upload_dokumen" class="section_bg">
    <div class="container mt-3">
        <div class="section-title">
            <h2> Upload Dokumen</h2>
        </div>
        <form action="<?= base_url('index.php/') ?>admin/upload_dokumen_pekerjaan" method="post"
            enctype="multipart/form-data">
            <table class="table table-bordered table-hover rounded">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            Pilih PKS
                        </td>
                        <td class="control-group">
                            <select onchange="getListPekerjaan($(this).val())" name="id_pks" id="list_pks" required>
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
                                onchange="$(`#list_pekerjaan-selectized`).prop('required',false)"
                                name="id_pekerjaan" id="list_pekerjaan" class="" required>
                                <option disabled selected value="">Pilih Uraian Pekerjaan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            RAB<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="rab" id="" accept=".pdf">
                            <?php echo form_error('rab', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Spesifikasi Teknis/RKST/KAK<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="st_rkst_kak" id="" accept=".pdf">
                            <?php echo form_error('st_rkst_kak', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Kontrak<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="kontrak" id="" accept=".pdf">
                            <?php echo form_error('kontrak', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            SPPBJ<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="sppbj" id="" accept=".pdf">
                            <?php echo form_error('sppbj', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                </tbody>

            </table>
            <p class="mt-2"><span class="text-danger">*</span>Hanya menerima dokumen dengan format .pdf dan ukuran maks.
                5MB</p>
            <div class="row justify-content-end">
                <div class="col-3 col-lg-1 ">
                    <button class="btn mainbgc text-light fw-bold" type="submit">Kirim</button>
                </div>

            </div>
        </form>
    </div>
</section>
<input type="hidden" id="s_id_pks" value="<?= $s_id_pks ?>">
<input type="hidden" id="s_id_pekerjaan" value="<?= $s_id_pekerjaan ?>">
<script>
$(function() {
    getListPekerjaan($('#s_id_pks').val())
});

$('#list_pks').selectize();
$('#list_pekerjaan').selectize();

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
        url: basepath + "index.php/admin/ajax_get_list_doc_pekerjaan",
        type: "POST",
        dataType: 'json',
        data: {
            id_pks: id_pks,
        },
        success: function(data) {
            let pekerjaan_selected = $("#s_id_pekerjaan").val();
            wait = false
            $('#list_pekerjaan').selectize()[0].selectize.destroy();
            let my_options = []
            for (let index = 0; index < data.length; index++) {
                const element = data[index];
                my_options[index] = {
                    'id': element['id_pekerjaan'],
                    'uraian_pekerjaan': element['uraian_pekerjaan']
                }
            }
            $('#list_pekerjaan').selectize({
                maxItems: 1,
                valueField: 'id',
                labelField: 'uraian_pekerjaan',
                searchField: 'uraian_pekerjaan',
                options: my_options,
                create: false
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
            Swal.fire({
                icon: "warning",
                title: "Error",
                text: error
            })
        }
    });
}
</script>