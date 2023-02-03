<section id="manajemen_pesanan section-bg pt-3">
    <div class="container-fluid">
        <div class="section-title mb-2">
            <h2>Manajemen Pesanan</h2>
        </div>
        <form id="pesanan" action="<?= base_url('index.php') ?>/user/ubah_pesanan" method="post">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabel_pesanan">
                    <thead class="mainbgc text-light rounded-top">
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Nama PKS</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Selesai</th>
                        <th>Status Pesanan</th>
                        <th>Surat</th>
                        <th><span class="form-inline"><input onclick="$('.chb').prop('checked',$(this).prop('checked'));checkAllProp($(this).prop('checked'))" class='form-check-input' type='checkbox' name='option'></span></th>

                    </thead>
                    <tbody>

                        <?php for ($i = 0; $i < count($data_pesanan); $i++) {
                            $surat_pemesanan = "";
                            $num = $i + 1;
                            $id_pesanan = $data_pesanan[$i]['id_pesanan'];
                            $nama_user = $data_pesanan[$i]['nama_user'];
                            $singkatan_pks = $data_pesanan[$i]['singkatan'];
                            $nama_pks = $data_pesanan[$i]['nama_pks'];
                            $nama_produk = $data_pesanan[$i]['nama_produk'];
                            $jumlah_pesanan = $data_pesanan[$i]['jumlah_pesanan'];
                            $tanggal_pemesanan =  $data_pesanan[$i]['tanggal_pemesanan'];
                            $tanggal_pemesanan_x = substr($data_pesanan[$i]['tanggal_pemesanan'], 0, 10) . " " . str_replace('-', ':', substr($data_pesanan[$i]['tanggal_pemesanan'], -8, 10));
                            $tanggal_selesai = $data_pesanan[$i]['tanggal_selesai'];
                            $status_pesanan = $data_pesanan[$i]['status_pesanan'];
                            $status_color = "";
                            $komentar = $data_pesanan[$i]['komentar'];
                            if (isset($surat[$tanggal_pemesanan])) {
                                for ($xi = 0; $xi < count($surat[$tanggal_pemesanan]); $xi++) {
                                    $nb = ($xi + 1);
                                    $surat_pemesanan .= "<a href='" . base_url('media/upload/pesanan/') . "$singkatan_pks/$tanggal_pemesanan/" . @$surat[$tanggal_pemesanan][$xi] . "' data-gallery='portfolioGallery' class='text-center justify-content-center portfolio-lightbox preview-link fw-bold' title='Surat Pemesanan $nb <br> PKS $nama_pks'><p class='text-center'>$nb</p>
                                </a>
                                ";
                                }
                            }
                            switch ($status_pesanan) {
                                case '0':
                                    $status_pesanan = "Diajukan";
                                    $status_color = "btn-info";
                                    break;

                                case '1':
                                    $status_pesanan = "Diterima/Progress Pengerjaan";
                                    $status_color = "btn-success";
                                    break;

                                case '2':
                                    $status_pesanan = "Ditolak";
                                    $status_color = "btn-danger";
                                    break;

                                case '3':
                                    $status_pesanan = "Selesai";
                                    $status_color = "btn-secondary";
                                    break;
                            }
                            echo "<tr><td>$num</td>
    <td>$nama_user</td>
    <td>$nama_pks</td>
    <td>$nama_produk</td>
    <td>$jumlah_pesanan</td>
    <td>$tanggal_pemesanan_x</td>
    <td>$tanggal_selesai</td>
    <td class='curpo text-center' onclick='fireCom(`$id_pesanan`,`$tanggal_pemesanan`)'><textarea class='d-none cm' id='$id_pesanan' name='komentar[]' disabled>$komentar</textarea><button type='button' class='btn rounded-pill $status_color text-light text-center'>$status_pesanan</button></td><td>$surat_pemesanan</td><td><input id='chb_$id_pesanan' onchange='checkProp(`$id_pesanan`)' class='form-check-input chb' type='checkbox' name='opt[]' value='$id_pesanan'>
    </td></tr>";
                        } ?>

                    </tbody>

                </table>
            </div>
        </form>
        <div class="mt-2">
            <h5 class="">Aksi</h5>
            <div class="">
                <input name="act" form="pesanan" type="submit" value="Hapus" role="button" class="btn btn-danger rounded-pill text-light">
                <input name="act" form="pesanan" type="submit" value="Tolak" role="button" class="btn btn-danger rounded-pill text-light">
                <input name="act" form="pesanan" type="submit" value="Terima" role="button" class="btn btn-success rounded-pill text-light">
                <input name="act" form="pesanan" type="submit" value="Selesaikan" role="button" class="btn btn-secondary rounded-pill text-light">
            </div>
        </div>

    </div>
</section>
<script>
    $(document).ready(function() {
        $('#tabel_pesanan').DataTable({
            columnDefs: [{
                targets: [8, 9],
                orderable: false
            }]
        });
    });


    function fireCom(id_pesanan, date) {
        let komentar = $(`textarea#${id_pesanan}`).text();

        Swal.fire({
            showCancelButton:true,
            title: "Komentar",
            html: `<input type='hidden' value='${id_pesanan}' id='id_${id_pesanan}'> <textarea onchange="$('#chb_${id_pesanan}').prop('checked', true),$('textarea#${id_pesanan}').prop('disabled',false);"  rows="15" class="w-100 form-control " style='white-space:pre-line' id='c_${id_pesanan}'>${komentar}</textarea>`,
            preConfirm: () => {
                const comment = Swal.getPopup().querySelector(`#c_${id_pesanan}`).value
                return {
                    komentar: comment,
                    r_id_pesanan: id_pesanan
                }
            }
        }).then((result) => {
            try {
                let comment = result.value.komentar;
                let id_pesanan = result.value.r_id_pesanan;
                $(`textarea#${id_pesanan}`).text(comment);
                let basepath = $('#basepath').val()
                $.ajax({
                    url: basepath + "index.php/user/ajax_update_comment",
                    type: "POST",
                    dataType: 'text',
                    data: {
                        id_pesanan: id_pesanan,
                        komentar: comment
                    },
                    success: function(response) {
                        console.log(response)
                    },
                    error: function(arguments, status) {
                        alert('set komentar gagal, cek koneksi')
                    }
                });
            } catch (error) {
                console.log(error)
            }
        })
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