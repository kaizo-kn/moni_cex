<section id="manajemen_pesanan section-bg pt-3">
    <div class="container-fluid">
        <div class="section-title mb-2">
            <h2>Hapus Uraian Pekerjaan</h2>
        </div>
        <form id="uraian_pekerjaan" action="<?= base_url('index.php') ?>/admin/action_hapus_pekerjaan" method="post">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabel_pekerjaan">
                    <thead class="mainbgc text-light rounded-top">
                        <th>No</th>
                        <th>Nama PKS</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Progress</th>
                        <th>Persentase</th>
                        <th><span class="form-inline"><input onclick="$('.chb').prop('checked',$(this).prop('checked'));checkAllProp($(this).prop('checked'))" class='form-check-input' type='checkbox' name='option'></span>
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pekerjaan as $key => $value) {
                            extract($value);
                            $type_color = '';
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
                            <td>
                            $no
                            </td>
                            <td class='$type_color'>
                            $uraian_pekerjaan
                            </td>
                            <td class='$type_color'>
                            $nama_pks
                            </td>
                            <td class='$type_color'>
                            $nama_progress
                            </td>
                            <td class='$type_color'>
                            $persentase%
                            </td>
                            <td>
                            <input id='chb_$id_pekerjaan' onchange='checkProp(`$id_pekerjaan`)' class='form-check-input chb' type='checkbox' name='id_pekerjaan[]' value='$id_pekerjaan'>
                            </td>
                                    </tr>";
                            $no++;
                        }
                        ?>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-end">
                                <input onclick="confirmDeletion();" name="act" form="pesanan" type="button" value="Hapus" role="button" class="btn btn-danger text-light">
                            </td>
                        </tr>
                    </tfoot>
                    </tbody>

                </table>
            </div>
        </form>
    </div>
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
                $("#uraian_pekerjaan").submit()
            }
        })
    }

    let tabel_pekerjaan = $('#tabel_pekerjaan').DataTable({
        columnDefs: [{
            targets: [5],
            orderable: false
        }]
    });
    let filtertype = `<div id="filter_type" class="form-inline float-start me-4 pe-3 d-none d-lg-block d-xl-block">
            <span class="ms-2 text-dark"><label for="pks" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="pks" id="pks" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">PKS</small></label></span>
            <span class="ms-2 text-danger"><label for="tekpol" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="tekpol" id="tekpol" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">TEKPOL</small></label></span>
            <span class="ms-2 text-orange"><label for="hps" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="hps" id="hps" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">HPS</small></label></span>
            <span class="ms-2 text-warning"><label for="pengadaan" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="pengadaan" id="pengadaan" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">PENGD</small></label></span>
            <span class="ms-2 text-main"><label for="sppbj" ><input onchange="filterType()" style="transform:translateY(25%);" type="checkbox" checked name="" value="sppbj" id="sppbj" class="form-check curpo d-inline"><small class="me-1 curpo ms-1 fw-bolder">SPPBJ</small></label></span>
            <span class="ms-2 me-2" onclick="$(this).parent().find('input:checkbox').prop('checked',true);filterType()"><i class="text-secondary bi bi-bootstrap-reboot curpo"></i></span>
        </div> `

    $(document).ready(function() {

        setTimeout(() => {
            $('#tabel_pekerjaan_filter').append(filtertype);
            $('#tabel_pekerjaan_filter').addClass("mb-3 me-3");
        }, 100);
    });


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
        tabel_pekerjaan.columns(3).search(`${res}`, true, false).draw();
    }

    function checkAllProp(val) {
        val = !val;
        const ta = $(`.cm`);
        ta.prop('disabled', val)
    }

    function checkProp(id) {
        val = $(`#chb_${id}`).prop('checked')
        val = !val;
        $(`#${id}`).prop('disabled', val)
    }
</script>