<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

        public function m_progress_lap_invest()
        {
                $id_pks = $this->session->userdata('id_pks');
                $data_pekerjaan = $this->db->query("SELECT uraian_pekerjaan.id_pekerjaan,nama_progress,progress.id_progress,uraian_pekerjaan,nama_progress,folder,singkatan FROM uraian_pekerjaan JOIN daftar_nama_pks ON uraian_pekerjaan.id_pks = daftar_nama_pks.id_pks LEFT JOIN dokumen ON uraian_pekerjaan.id_pekerjaan = dokumen.id_pekerjaan LEFT JOIN progress ON progress.id_progress = uraian_pekerjaan.id_progress WHERE uraian_pekerjaan.id_pks=$id_pks ORDER BY  uraian_pekerjaan.id_pekerjaan DESC")->result_array();


                foreach ($data_pekerjaan as $key => $value) {
                        $data_pekerjaan[$key]['persentase_progress'] = $this->m_get_persentase_pekerjaan($value['id_pekerjaan']);
                }
                return $data_pekerjaan;
        }

        private function m_get_persentase_pekerjaan($id_pekerjaan)
        {
                $return_arr = array();
                $result = $this->db->query("SELECT `persentase`, `minggu`, `tanggal`, `bukti` FROM `persentase_progress` WHERE `id_pekerjaan` = '$id_pekerjaan'")
                        ->result_array();
                foreach ($result as $key => $value) {
                        $tanggal = substr($value['tanggal'], 0, 10);
                        $month =  date('M', strtotime($tanggal));
                        $return_arr["W" . $value['minggu'] . "-$month"] = array('month' => $month, 'persentase' => $value['persentase'], 'bukti' => $value['bukti']);
                }
                return $return_arr;
        }

        public function m_input_persentase($id_pekerjaan, $persentase)
        {
                if (!empty($_FILES['bukti']['name'])) {
                        $mgg = array();
                        $upfile = "";
                        $singkatan_pks = $this->session->userdata("singkatan");
                        $bukti = $this->session->userdata('id_pks') . $id_pekerjaan . date("Y-m-d_H-i-s") . "(Kosong)";
                        $t = $this->db->query("SELECT id_persentase,tanggal,minggu FROM `persentase_progress` WHERE id_pekerjaan  = '$id_pekerjaan';")->result_array();
                        foreach ($t as $key => $value) {
                                $mgg[$key] = date("m", strtotime($value['tanggal'])) . $value['minggu'];
                        }
                        $m = max(($mgg));
                        $curm = $this->db->query("SELECT WEEK(CURRENT_DATE) - WEEK(DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')) + 1 AS curm")->result_array()[0]['curm'];
                        $curm = date('m') . $curm;
                        if ($curm == $m) {
                                $sm = substr($m, 2, 1);
                                $this->db->query("UPDATE persentase_progress SET persentase = $persentase,bukti='$bukti' WHERE id_pekerjaan = $id_pekerjaan and minggu = $sm");
                                $this->db->query("UPDATE `uraian_pekerjaan` SET `max_persentase` = (SELECT MAX(persentase) FROM `persentase_progress` WHERE id_pekerjaan = $id_pekerjaan) WHERE `id_pekerjaan` = $id_pekerjaan;");
                        } else {
                                $this->db->query("INSERT INTO `persentase_progress`(`id_pekerjaan`, `minggu`, `persentase`, `bukti`) VALUES ('$id_pekerjaan',(SELECT WEEK(CURRENT_DATE) - WEEK(DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')) + 1),'$persentase','$bukti')");
                                $this->db->query("UPDATE `uraian_pekerjaan` SET `max_persentase` = (SELECT MAX(persentase) FROM `persentase_progress` WHERE id_pekerjaan = $id_pekerjaan) WHERE `id_pekerjaan` = $id_pekerjaan;");
                        }

                        $result = $this->db->query("select id_persentase,id_pekerjaan,tanggal,minggu FROM `persentase_progress` WHERE bukti = '$bukti'")->result_array()[0];
                        $id_pekerjaan = $result["id_pekerjaan"];
                        $id_persentase = $result['id_persentase'];
                        $tanggal = substr($result['tanggal'], 0, 10);
                        $month =  date('M', strtotime($tanggal));
                        $ext = pathinfo($_FILES["bukti"]["name"], PATHINFO_EXTENSION);
                        $filename = 'bukti_' . $singkatan_pks . "-W" . $result['minggu'] . "-$month-$id_pekerjaan." . $ext;
                        $filenames = 'bukti_' . $singkatan_pks . "-W" . $result['minggu'] . "-$month-$id_pekerjaan";
                        $upfile = $this->db->query("UPDATE persentase_progress SET bukti = '$filename' WHERE id_persentase = $id_persentase");
                        $path = FCPATH . "media/upload/bukti/$singkatan_pks/$id_pekerjaan/$filenames";
                        if (!is_dir($path)) {
                                mkdir($path, 0755, TRUE);
                        }
                        // File upload configuration 
                        $config['upload_path'] = $path;
                        $config['allowed_types'] = 'jpeg|jpg|png';
                        $config['max_size'] = 5000;
                        $config['overwrite'] = true;
                        $config['file_name'] = $filename;

                        // Load and initialize upload library 
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        // Upload file to server 
                        if ($this->upload->do_upload('bukti')) {
                                $message = ('Bukti berhasil di-upload');
                        } else {
                                $message =  "Bukti gagal di-upload: <br>" . $this->upload->display_errors();
                        }
                } else {
                        $message = "Bukti Kosong";
                }
                return array('status' => $upfile, 'message' => $message);
        }

        
        public function m_input_pengawasan($id_pekerjaan, $dokumentasi)
        {
                $upfile = "";
                if (!empty($_FILES['doc']['name'])) {
                        $singkatan_pks = $this->session->userdata('singkatan');
                        $ext = pathinfo($_FILES["doc"]["name"], PATHINFO_EXTENSION);
                        $filename = "{$dokumentasi}_{$singkatan_pks}_{$id_pekerjaan}";
                        $path = FCPATH . "media/upload/dokumentasi/$singkatan_pks/$id_pekerjaan";
                        if (!is_dir($path)) {
                                mkdir($path, 0755, TRUE);
                        }
                        // File upload configuration 
                        $config['upload_path'] = $path;
                        $config['allowed_types'] = 'jpeg|jpg|png';
                        $config['max_size'] = 5000;
                        $config['overwrite'] = true;
                        $config['file_name'] = $filename;

                        // Load and initialize upload library 
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        // Upload file to server 
                        if ($this->upload->do_upload('doc')) {
                                $message = ('Dokumentasi berhasil di-upload');
                                $upfile = $this->db->query("UPDATE `dokumentasi` SET `$dokumentasi`='$filename.$ext'  WHERE `id_pekerjaan`  = '$id_pekerjaan' ");
                        } else {
                                $message =  "Dokumentasi gagal di-upload: <br>" . $this->upload->display_errors();
                        }
                } else {
                        $message = "Dokumentasi Kosong";
                }
                return array('status' => $upfile, 'message' => $message);
        }

        public function m_get_data_pengawasan()
        {
                $id_pks = $this->session->userdata('id_pks');
                $data_pekerjaan = $this->db

                        ->query("select uraian_pekerjaan.id_pekerjaan, uraian_pekerjaan,singkatan,nama_progress,uraian_pekerjaan.id_progress 
                        FROM uraian_pekerjaan
                        LEFT JOIN progress ON progress.id_progress = uraian_pekerjaan.id_progress LEFT JOIN daftar_nama_pks ON uraian_pekerjaan.id_pks = daftar_nama_pks.id_pks WHERE uraian_pekerjaan.id_pks = $id_pks ORDER BY  uraian_pekerjaan.id_pekerjaan DESC")
                        ->result_array();

                foreach ($data_pekerjaan as $key => $value) {
                        $dokumentasi = $this->db
                                ->select("rta,material,k3sp,komis")
                                ->from("dokumentasi")
                                ->where('id_pekerjaan', $value['id_pekerjaan'])
                                ->get()
                                ->result_array();
                        if (!empty($dokumentasi)) {
                                $dokumentasi = $dokumentasi[0];
                        } else {
                                $dokumentasi = null;
                        }
                        $data_pekerjaan[$key]['dokumentasi'] = $dokumentasi;
                }
                return $data_pekerjaan;
        }

        //ajax get list pekerjaan
        public function m_ajax_get_list_pekerjaan($id_pks)
        {
                $id_pkss = $this->session->userdata('id_pks');
                if ($id_pks == "null") {
                        return ($this->db->query(
                                "SELECT up.id_pekerjaan,up.id_progress,up.uraian_pekerjaan,dp.singkatan,pr.nama_progress,IFNULL(max(pp.persentase),0) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks LEFT JOIN persentase_progress AS pp ON up.id_pekerjaan = pp.id_pekerjaan JOIN progress AS pr ON up.id_progress = pr.id_progress WHERE up.id_pks = $id_pkss GROUP BY up.id_pekerjaan ORDER BY up.id_pekerjaan DESC;"
                        )
                                ->result_array());
                } else if ($id_pks == "tekpol" || $id_pks == "pks" || $id_pks == "hps" || $id_pks == "pengadaan" || $id_pks == "sppbj") {
                        return ($this->db->query("SELECT up.id_pekerjaan,up.id_progress,up.uraian_pekerjaan,dp.singkatan,pr.nama_progress,max(pp.persentase) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks LEFT JOIN persentase_progress AS pp ON up.id_pekerjaan = pp.id_pekerjaan JOIN progress AS pr ON up.id_progress = pr.id_progress WHERE pr.nama_progress = '$id_pks' AND up.id_pks = $id_pkss GROUP BY up.id_pekerjaan ORDER BY up.id_pekerjaan DESC;")
                                ->result_array());
                } else {
                        return ($this->db->select('id_pekerjaan,id_progress,id_pks,id_user,uraian_pekerjaan')
                                ->from('uraian_pekerjaan')
                                ->where('id_pks', $id_pks)
                                ->order_by("id_pekerjaan", "desc")
                                ->get()
                                ->result_array());
                }
        }
        //ajax get list dokumentasi
        public function m_ajax_get_list_dokumentasi($id_pekerjaan)
        {
                return $this->db->select('*')
                        ->from('dokumentasi')
                        ->where('id_pekerjaan', $id_pekerjaan)
                        ->get()
                        ->result_array();
        }

        //ajax get history
        public function m_ajax_get_history($id_pekerjaan)
        {
                $this->db->query('SET lc_time_names = "id_ID"');
                $data = $this->db->query("SELECT history.id_progress,nama_progress,DATE_FORMAT(STR_TO_DATE(tanggal, '%Y-%m-%d %H:%i:%s'), '%d %M %Y pukul %H:%i:%s WIB') as tanggal,keterangan
                        FROM `history` JOIN progress ON history.id_progress = progress.id_progress WHERE id_pekerjaan = $id_pekerjaan ORDER BY tanggal ASC")->result_array();
                return json_encode($data);
        }

        public function m_dash_list_percent($id_pks)
        {
                return $this->db
                        ->query("SELECT(SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan`) AS total_pekerjaan,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase = 0 AND id_pks = $id_pks) AS progress_0,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase >=1 AND max_persentase <= 40 AND id_pks = $id_pks) AS progress_40,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase >= 41 AND max_persentase <= 60 AND id_pks = $id_pks) AS progress_60,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase >= 61 AND max_persentase <= 99 AND id_pks = $id_pks) AS progress_99,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase =100 AND id_pks = $id_pks) AS progress_100;")
                        ->result_array()[0];
        }

        public function m_dash_persentase($val1, $val2, $id_pks)
        {
                return $this->db->query("SELECT up.id_pekerjaan,up.id_progress,up.uraian_pekerjaan,dp.singkatan,pr.nama_progress,IFNULL(max(pp.persentase),0) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks LEFT JOIN persentase_progress AS pp ON up.id_pekerjaan = pp.id_pekerjaan JOIN progress AS pr ON up.id_progress = pr.id_progress WHERE up.id_pks = $id_pks GROUP BY up.id_pekerjaan HAVING persentase >=$val1 AND persentase <=$val2;")->result_array();
        }

        public function m_cek_username()
        {
                $username = $this->input->post('username');

                return $this->db->query("SELECT user.*,daftar_nama_pks.singkatan,daftar_nama_pks.id_pks,daftar_nama_pks.nama_pks FROM user
                INNER JOIN daftar_nama_pks ON user.id_pks = daftar_nama_pks.id_pks WHERE user.username='$username';");
        }

        public function m_update_profile($table, $where, $data)
        {
                $this->db->where('username', $where);
                return $this->db->update($table, $data);
        }


        //Set Last Online
        public function m_set_user_last_active($id_user, $time)
        {
                return $this->db->query("UPDATE `user` SET `last_active`='$time' WHERE `id_user` = $id_user");
        }
        //Get Last Online
        public function m_get_user_last_active($id_user)
        {
                return $this->db->query("SELECT `last_active` FROM `user` WHERE `id_user` = $id_user")->result_array()[0]['last_active'];
        }





        //List User
        public function m_list_user()
        {
                return $this->db->select('id_user,user.id_pks,nama,username,nama_pks,distrik,last_active')->from('user')->join('daftar_nama_pks', 'daftar_nama_pks.id_pks=user.id_pks')->order_by('nama_pks', 'asc')->where('user.id_pks >', 0)->get()->result_array();
        }



        //Rmdir
        private function deleteDirectory($dir)
        {
                if (!file_exists($dir)) {
                        return true;
                }

                if (!is_dir($dir)) {
                        return unlink($dir);
                }

                foreach (scandir($dir) as $item) {
                        if ($item == '.' || $item == '..') {
                                continue;
                        }

                        if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                                return false;
                        }
                }

                return rmdir($dir);
        }

        //Input Filter
        private function filter_input_def($input)
        {
                $search = array(
                        '@<script[^>]*?>.*?</script>@si',
                        // Menghapus script tag
                        '@<[ /!]*?[^<>]*?>@si',
                        // Menghapus tag HTML
                        '@<style[^>]*?>.*?</style>@siU',
                        // Menghapus style tag
                        '/`/',
                        "/'/",
                        '/"/'
                );
                $output = preg_replace($search, '', $input);
                $output = htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
                return $output;
        }
}
