<section id="reset_user_password" class="section-bg">
    <div class="section-title">
        <h2 class="title mt-4 mb-3">Reset Password User</h2>
    </div>
    <div class="table-responsive container-fluid">
        <table id="tabel_user" class="table table-hover table-bordered">
            <thead class="mainbgc text-light text-center">
                <th>No.</th>
                <th>Nama User</th>
                <th>Nama PKS</th>
                <th>Distrik</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($data_user); $i++) {
                    $no = $i + 1;
                    $id_user = $data_user[$i]['id_user'];
                    $nama = $data_user[$i]['nama'];
                    $nama_pks = $data_user[$i]['nama_pks'];
                    $distrik = $data_user[$i]['distrik'];
                    $last_active = $data_user[$i]['last_active'];
                    if ((time() - intval($last_active)) <= 15) {
                        $last_active = "<span class='text-success'>User Sedang Aktif</span>";
                    } else {
                        $last_active = 'Terakhir Online: ' . date('d-M-Y H:i', $data_user[$i]['last_active']);
                    }
                    echo "<tr><td>$no</td>
                <td>$nama</td>
                <td>$nama_pks</td>
                <td>$distrik</td>
                <td>$last_active</td>
                <td class='text-left'><button type='button' onclick='resetUser(`$id_user`)' class='btn btn-warning rounded-pill'><span id='btn_$id_user'>Reset</span></button><span style='position:absolute' class='ms-2 mt-2' id='msg_$id_user'></span></td></tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
</section>
<script>
    $(function() {
        $('#tabel_user').DataTable({
            "language": {
                "url": "<?= base_url() ?>assets/vendor/datatables/js/indonesian.json"
            },
            columnDefs: [{
                targets: [5],
                orderable: false
            }],
            pageLength: 25
        });
    })
</script>