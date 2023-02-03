<section>
    <div class="container mt-3">
        <div class="section-title">
            <h2>Buat Pesanan</h2>
        </div>
        <form action="<?= base_url('index.php/') ?>user/buat_pesanan" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hover rounded">
                <tbody>
                    <tr>
                        <td>
                            Nama Produk
                        </td>
                        <td>
                            <select name="id_produk" id="" class="form-select" required>
                                <option disabled selected value="">Pilih Produk</option>
                                <?php for ($i = 0; $i < count($produk_pmt); $i++) {
                                    echo ' <option class="curpo" value=' . $produk_pmt[$i]['id_produk'] . '>' . $produk_pmt[$i]['nama_produk'] . '</option>';
                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jumlah Pesanan
                        </td>
                        <td>
                            <input class="form-control" type="number" min="1" name="jumlah_pesanan" id="" placeholder="Jumlah Produk" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Surat Permohonan <span class="text-danger">*</span>
                        </td>
                        <td>
                            <input class="form-control" type="file" name="surat_1" id="" placeholder="Surat 1" accept=".jpeg,.jpg,.png" required>
                            <?php echo form_error('surat_1', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PP(/PABE/PABI) <span class="text-danger">*</span>

                        </td>
                        <td>
                            <input class="form-control" type="file" name="surat_2" id="" placeholder="Surat 2" accept=".jpeg,.jpg,.png" required>
                            <?php echo form_error('surat_2', '<p class="text-danger">', '</p>'); ?>
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <button class="btn mainbgc text-light float-end fw-bold" type="submit">Kirim</button>
        </form>
        <p class="mt-2"><span class="text-danger">*</span> Hanya menerima gambar dengan format jpg/jpeg/png dan ukuran maks. 5MB</p>
    </div>
</section>