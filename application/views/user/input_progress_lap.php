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
                                onchange="$(`#list_pekerjaan-selectized`).prop('required',false);$('#u_p').text($(this).children('option').filter(':selected').text());setCorrection($(this).val())"
                                name="id_pekerjaan" id="list_pekerjaan" required>
                                <option disabled selected value="">Pilih Uraian Pekerjaan</option>
                                <?php
                                foreach ($list_pekerjaan as $key => $value) {
                                    if ($value['id_pekerjaan'] == $selected) {
                                        echo "<option selected value='{$value['id_pekerjaan']}'>{$value['uraian_pekerjaan']} ({$value['persentase']}%)</option>";
                                    } else {
                                        echo "<option value='{$value['id_pekerjaan']}'>{$value['uraian_pekerjaan']} ({$value['persentase']}%)</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Isi Persentase Progress
                        </td>
                        <td><input min="0" max="100" class="form-control" type="number" name="persentase_progress" id=""
                                required></td>
                    </tr>
                    <tr>
                        <td style="width:30%">
                            Bukti<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="bukti" id="" accept=".jpeg,.jpg,.png"
                                required>
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
$(document).ready(function() {
    $('#list_pekerjaan').selectize();
});
</script>