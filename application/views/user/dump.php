<div class="table-responsive">
    <table id="tabel_review" class="table table-bordered">
        <thead class="mainbgc text-light">
            <th>No.</th>
            <th>Nama Reviewer</th>
            <th>Judul Review</th>
            <th>Tanggal Review</th>
            <th>Isi Review</th>
            <th>Foto</th>
            <th>Opsi</th>
        </thead>

        <tbody>
            <?php
            if (count($data_review) > 0) {
                for ($i = 0; $i < count($data_review); $i++) {
                    $r_gambar_review = "";
                    $num = $i + 1;
                    extract($data_review[$i]);
                    $gambar_review = array();
                    if (isset($gambar) || !empty($gambar)) {
                        $path = FCPATH . "media/upload/review/$gambar/";
                        $foldername_array = directory_map($path);
                        if (!empty($foldername_array)) {
                            for ($xi = 0; $xi < count($foldername_array); $xi++) {
                                $gambar_review[$xi] = $foldername_array[$xi];
                            }
                        }
                    }
                    if (count($gambar_review) > 0) {
                        for ($xi = 0; $xi < count($gambar_review); $xi++) {
                            $n = $xi + 1;
                            $rgr = $gambar_review[$xi];
                            $r_gambar_review .= "<a href='" . base_url('media/upload/review/') . "$gambar/$rgr' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link text-start ps-s me-1' title='Review $nama'>Foto $n</a>";
                        }
                    }
                    if ($is_hidden == '0') {
                        $opt1 = "<button class='btn btn-warning' type='button' >Sembuyikan</button>";
                        $statusclass = 'text-info';
                    } else if ($is_hidden == '1') {
                        $opt1 = "<button class='btn btn-secondary' type='button' >Tampilkan</button>";
                        $statusclass = 'text-secondary';
                    }

                    if ($id_balasan == null) {
                        $opt2 = "<button class='btn btn-primary' type='button' >Tulis Balasan</button>";
                    } else {
                        $opt2 = "<button onclick='editRev(`$id_balasan`)' class='btn btn-primary' type='button' >Lihat Balasan</button>";
                    }

                    $opt3 = "<button class='btn btn-danger' type='button' >Hapus Review</button>";

                    echo "
                                <tr class='$statusclass'>
                                <td>$num</td>
                            <td>$nama</td>
                            <td>$judul_review</td>
                            <td>$tanggal_review</td>
                            <td><p class='text-left' style='white-space: pre-line;'>$isi_review</p></td>
                            <td>$r_gambar_review</td>
                            <td class='text-center'> <ul class='dropdown'>
                            <button style='border:solid 1px grey' type='button' onmouseleave='$(this).parent().find(`li`).removeClass(`act-hover`)' onclick='$(this).parent().find(`li`).toggleClass(`act-hover`)' class='rounded-circle section-bg btn'><i class='bi bi-three-dots-vertical'></i>
                                    </button>
                            <li style='list-style:none'  class='dropdown'>
                                <ul style='position:absolute;right:80%;top:0px;transform:translateY(-60%);background-color:light-gray' class='ms-2'>
                                    <li class='ps-1'>$opt1</li>
                                    <li class='ps-1'>$opt2</li>
                                    <li class='ps-1'>$opt3</li>
                                </ul>
                            </li>
                        </ul></td>
                                </tr>
                               
                               
                               ";
                }
            }


            ?>
        </tbody>
    </table>
</div>



<section id="modalContent">

</section>

<script>
    $(document).ready(function() {
        $('#tabel_review').DataTable({
            pageLength: 25
        });
    });



    function editRev(id_balasan) {
        try {
            let basepath = $('#basepath').val()
            $.ajax({
                url: basepath + "index.php/user/ajax_get_balasan",
                type: "POST",
                dataType: 'json',
                data: {
                    id_balasan: id_balasan,
                },
                success: function(response) {
                    console.log(response)
                    try {
                        let balasan = response['balasan']
                        let gambar_balasan = response['items_gambar_balasan']
                        let folder_gambar_balasan = response['gambar_balasan']
                        let gambar_balasan_html = ``;
                        if (gambar_balasan != null) {
                            for (let index = 0; index < gambar_balasan.length; index++) {
                                const element = gambar_balasan[index];
                                gambar_balasan_html += `<div class='d-block mb-2'>
                                <button class='btn mainbgc text-light rounded-pill' onclick='Swal.fire({
                            showConfirmButton: true,
                            title: "Gambar ${index+1}",
                            
                            imageUrl:"${basepath}/media/upload/answer/${folder_gambar_balasan}/${element}"
                        })'>Gambar ${index+1}</button></div>`
                            }
                        }
                        let html = `<textarea rows="10" class="w-100 form-control " style='white-space:pre-line'> ${balasan}</textarea>${gambar_balasan_html}
                        `
                        buildOrderModal(html);



                        //     preConfirm: () => {


                        //     }
                        // })
                    } catch (error) {

                    }

                },
                error: function(arguments, status) {
                    console.log(arguments)
                    Swal.fire({
                        icon: "warning",
                        title: "Error",
                        text: error
                    })

                }
            });
        } catch (error) {
            console.log(error)
        }


        //let komentar = $(`textarea#${id_pesanan}`).text();

        // Swal.fire({
        //     title: "Komentar",
        //     html: `<input type='hidden' value='${id_pesanan}' id='id_${id_pesanan}'> <textarea onchange="$('#chb_${id_pesanan}').prop('checked', true),$('textarea#${id_pesanan}').prop('disabled',false);"  rows="15" class="w-100 form-control " style='white-space:pre-line' id='c_${id_pesanan}'>${komentar}</textarea>`,
        //     preConfirm: () => {
        //         const comment = Swal.getPopup().querySelector(`#c_${id_pesanan}`).value
        //         return {
        //             komentar: comment,
        //             r_id_pesanan: id_pesanan
        //         }
        //     }
        // }).then((result) => {

        // })
    }
</script>


<?php
if ($this->session->userdata('is_login') == true && $this->session->userdata('id_pks') == '0') {
    $role = 'admin';
} else {
    $role = 'user';
}
if ($this->session->userdata('is_login') == true && $this->session->userdata('id_pks') == '0') {
    echo '<li><a href="' . site_url("admin/lap_invest") . '">Progress Lap. Investasi</a></li>
            <li><a href="' . site_url("admin/pengawasan_pekerjaan_lap") . '">Pengawasan Pekerjaan Lap.</a></li>
            <li><a href="' . site_url("admin/input_pekerjaan") . '">Input Uraian Pekerjaan</a></li>
            <li><a href="' . site_url("admin/update_progress") . '">Update Progress</a></li>
            <li><a href="' . site_url("admin/upload_dokumen") . '">Upload Dokumen</a></li>
            <li><a href="' . site_url("admin/hapus_pekerjaan") . '">Hapus Uraian Pekerjaan</a></li>
            <li><a href="' . site_url("admin/reset_user") . '">Reset Password User</a></li>';
} else {
    echo '<li><a href="' . site_url("user/input_progress_lap") . '">Input Progress Lap. Invest.</a></li>
            <li><a href="' . site_url("user/input_pengawasan_lap") . '"><small>Upload Dokumen Pengawasan Pekerjaan Lap.</small></a></li>
            ';
}
?>