<?php
$page_title = 'Frequently Asked Questions';
include 'head.php';
?>
<div class="container mt-3 mb-5">

    <div style="font-size:2em" class="text-center text-dark font-weight-bold p-5 pt-2 mb-1 mt-3">
        Pertanyaan Umum (FAQ) Seputar 6 Standarisasi Mesin Instalasi PKS

    </div>
    <div id="faqAccordions" class="list-group w-100">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <div class="btn text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-1">1. Adakah Informasi Spesifikasi Produk Seperti: Gambar Produk, Bahan material, Dimensi, Keunggulan Produk?</h5>
                    </div>
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">
                    Ada, pada menu <a style="text-decoration: none;" href="index.php"> Informasi Produk</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <div class="btn text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-1">2. Apakah Stok Persediaan Barang (Spare Part) ada dalam Website ini ?
                    </div>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                <div class="card-body">
                    Ada, pada menu <a href="info_stok_sparepart.php">Informasi Stok Spare Part</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <div class="btn text-left" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-1">3. Apakah Informasi Harga Setiap Mesin Instalasi 6 Standarisasi ada dalam Website ini ?
                    </div>
                </h2>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="headingThree">
                <div class="card-body">
                    Ada, pada menu <a href="info_harga.php"> Informasi Harga</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="heading4">
                <h2 class="mb-0">
                    <div class="btn text-left" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-1">4. Apa Dasar Peraturan Penetapan 6 Standarisasi Ini ?
                    </div>
                </h2>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4">
                <div class="card-body">
                    <a href="surat-edaran.php" target="_blank" rel="noopener noreferrer"> Surat Edaran (SE) Nomor : 04.05/SE/153/IX/2022</a> <br>
                    Perihal : Penetapan 6 Standarisasi dan Penyediaan Stok Komponen MesinInstalasi PKS di PMT Dolok Ilir
                    Tanggal 13 September 2022
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>