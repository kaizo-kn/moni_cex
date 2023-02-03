<section id="pesanan_saya" class="section-bg">
    <div class="container-fluid">
        <div class="section-title">
            <h2>Daftar Pesanan Saya</h2>
            <div class="mt-4 table-responsive">
                <table id="tabel_pesanan_saya" class="table table-hover">
                    <thead class="mainbgc text-light rounded-top">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Selesai</th>
                        <th>Status Pesanan</th>
                        <th>Surat</th>
                        <th>Komentar</th>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($data_pesanan); $i++) {
                            $surat_pemesanan = "";
                            $num = $i + 1;
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
    <td>$nama_produk</td>
    <td>$jumlah_pesanan</td>
    <td>$tanggal_pemesanan_x</td>
    <td>$tanggal_selesai</td>
    <td class='curpo text-center'><button type='button' class='btn rounded-pill $status_color text-light text-center'>$status_pesanan</button></td><td>$surat_pemesanan</td><td><p style='white-space:pre-line;text-align:left;'>$komentar</p>
    </td></tr>";
                        } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>

<script>
$(document).ready(function() {
        $('#tabel_pesanan_saya').DataTable({
            columnDefs: [{
                targets: [6],
                orderable: false
            }]
        });
    });
</script>