<link rel="stylesheet" href="<?= base_url("assets/vendor/selectize/css/selectize.css") ?>">
<section id="input_uraian_pekerjaan">
    <div class="container mt-3 mb-5 pb-5">
        <div class="section-title">
            <h2> Update Progress Pengadaan</h2>
        </div>
        <form action="<?= base_url('index.php/') ?>admin/update_progress_pekerjaan" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hover rounded">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            Pilih PKS
                        </td>
                        <td class="control-group">
                            <select onchange="$(`#type_progress`).val('disabled');getListPekerjaan($(this).val())" name="id_pks" id="list_pks" required>
                                <option disabled selected value="">Pilih PKS</option>
                                <?php for ($i = 0; $i < count($data_pks); $i++) {
                                    echo ' <option class="curpo" value=' . $data_pks[$i]['id_pks'] . '>' . $data_pks[$i]['nama_pks'] . '</option>';
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
                            <select onchange="$(`#list_pekerjaan-selectized`).prop('required',false);$('#u_p').text($(this).children('option').filter(':selected').text());setCorrection($(this).val())" name="id_pekerjaan" id="list_pekerjaan" required>
                                <option disabled selected value="">Pilih Uraian Pekerjaan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Update Progress Pengadaan
                        </td>
                        <td class="control-group">
                            <select style="border-color:#b8b8b8;color:#303030;;font-size:13px" class="form-select" name="id_progress" id="type_progress" required>
                                <option style="color:#b8b8b8!important;" disabled selected value="disabled">Pilih Progress... </option>
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
                            <textarea id="u_p" name="uraian_pekerjaan" rows="5" cols="5" class="form-control w-100" placeholder="Uraian Pekerjaan..."></textarea>
                        </td>
                    </tr>
                </tbody>

            </table>
            <div class="row justify-content-end">

                <div class="col-3 col-lg-1 ">
                    <button class="btn btn-danger text-light  fw-bold" type="submit">Hapus</button>
                </div>
                <div class="col-3 col-lg-1 me-2">
                    <button onclick="$('#koreksi').removeClass('d-none')" class="btn btn-warning text-light fw-bold" type="button">Koreksi</button>
                </div>
                <div class="col-3 col-lg-1 ">
                    <button class="btn mainbgc text-light fw-bold" type="submit">Kirim</button>
                </div>

            </div>
        </form>
    </div>
</section>
<script>
    function setCorrection(id_val) {

        if (id_val != "") {
            id_progress = JSON.parse("[" + id_val + "]")[1];
            $('#type_progress').selectize()[0].selectize.destroy();
            $(`#type_progress`).val(id_progress).change()
        }


    }



    $(document).ready(function() {
        $('#list_pks').selectize();
        $('#list_pekerjaan').selectize();
    });


    function getListPekerjaan(id_pks) {
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
                    create: false
                });
                $(`#list_pekerjaan-selectized`).prop('required', true)
                $('html').css('overflow', 'overlay');
                $('#loader').css('display', 'none');
                $('#loader>div').removeClass('lds-ellipsis')
            },
            error: function(arguments, status,error) {
                setTimeout(() => {
                    $('html').css('overflow', 'overlay');
                    $('#loader').css('display', 'none');
                    $('#loader>div').removeClass('lds-ellipsis')
                }, 300);
                toastMixin.fire({
                    icon: 'error',
                    animation: true,
                    title: error
                });
            }
        });
    }
</script>