<link rel="stylesheet" href="<?= base_url("assets/vendor/selectize/css/selectize.css") ?>">
<section id="input_uraian_pekerjaan">
    <div class="container mt-3">
        <div class="section-title">
            <h2>Input Progress Lap. Investasi</h2>
        </div>
        <form action="<?= base_url('index.php/') ?>user/input_progress" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hover rounded">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            Pilih Uraian Pekerjaan
                        </td>
                        <td class="control-group">
                            <select
                                onchange="$(`#list_pekerjaan-selectized`).prop('required',false);getListDokumentasi($(this).val())"
                                name="id_pekerjaan" id="list_pekerjaan" required>
                                <option disabled selected value="">Pilih Uraian Pekerjaan</option>
                                <?php
                                foreach ($list_pekerjaan as $key => $value) {
                                    if ($value['id_pekerjaan'] == $selected) {
                                        echo "<option selected value='{$value['id_pekerjaan']}'>{$value['uraian_pekerjaan']}</option>";
                                    } else {
                                        echo "<option value='{$value['id_pekerjaan']}'>{$value['uraian_pekerjaan']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Item Pengawasan Pekerjaan Lap.
                        </td>
                        <td class="control-group">
                            <select onchange="$(`#list_dokumentasi-selectized`).prop('required',false);"
                                name="id_dokumentasi" id="list_dokumentasi" required>
                                <option disabled selected value="">Pilih Item Pengawasan Pekerjaan Lap.</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Dokumentasi<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="bukti" id="" accept=".jpeg,.jpg,.png">
                            <?php echo form_error('bukti', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="mt-2"><span class="text-danger">*</span>Hanya menerima gambar berformat jpeg/jpg/png dan ukuran
                maks. 5MB</p>
            <button class="btn mainbgc text-light float-end fw-bold" type="submit">Kirim</button>
        </form>
    </div>
</section>
<script>


    $(document).ready(function () {
        $('#list_pekerjaan').selectize();
        $('#list_dokumentasi').selectize();
<?php
echo "getListDokumentasi($selected)";
?>
        
    });

    function getListDokumentasi(id_pekerjaan) {
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
            url: basepath + "index.php/user/ajax_get_list_dokumentasi",
            type: "POST",
            dataType: 'json',
            data: {
                id_pekerjaan: id_pekerjaan,
            },
            success: function (data) {
                console.log(data)
                wait = false
                $('#list_dokumentasi').selectize()[0].selectize.destroy();
                let my_options = []
                let i = 0;
                const data_element = data[0];

                let content = { 'ptsi': 'Presentasi Timeline dan Safety Induction', 'pa': 'Pengecekan Administrasi (Sertifikat, dll)', 'apd': 'Memastikan Pemakaian APD', 'doc': 'Pengecekan Dokumen RKST, RAB, dan Kontrak', 'material': 'Pengecekan Material Masuk' }

                for (const key in content) {
                    if (Object.hasOwnProperty.call(content, key)) {
                        const element = content[key];
                        if (data_element[key] == null) {
                            my_options[i] = {
                                'id': key,
                                'dokumentasi': element + " (Kosong)"
                            }
                        } else {
                            my_options[i] = {
                                'id': key,
                                'dokumentasi': element
                            }
                        }
                    }
                    i++
                }
                $('#list_dokumentasi').selectize({
                    maxItems: 1,
                    valueField: 'id',
                    labelField: 'dokumentasi',
                    searchField: 'dokumentasi',
                    options: my_options,
                    create: false
                });
                $(`#list_pekerjaan-selectized`).prop('required', true)
                $('html').css('overflow', 'overlay');
                $('#loader').css('display', 'none');
                $('#loader>div').removeClass('lds-ellipsis')
            },
            error: function (arguments, status, error) {
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