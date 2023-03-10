<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
        public function m_dashboard()
        {
                $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
                return  $this->db->query("SELECT nama_progress, COUNT(uraian_pekerjaan.id_progress) AS jumlah FROM uraian_pekerjaan RIGHT JOIN progress ON uraian_pekerjaan.id_progres = progress.id_progress GROUP BY uraian_pekerjaan.id_progress;")->result_array();
        }


        public function m_progress_update()
        {
                $data_pks = $this->db->from('daftar_nama_pks')
                        ->select('*')
                        ->order_by('nama_pks', 'asc')
                        ->where('id_pks > 0')
                        ->get()
                        ->result_array();
                $data_progress = $this->db->from('progress')
                        ->select('*')
                        ->order_by('id_progress', 'asc')
                        ->get()
                        ->result_array();
                $data_pekerjaan = $this->db->from('uraian_pekerjaan')
                        ->select('*')
                        ->get()
                        ->result_array();
                return compact("data_pks", "data_progress", "data_pekerjaan");
        }
        public function m_progress_lap_invest()
        {
                $data_pekerjaan = $this->db->query("SELECT uraian_pekerjaan.id_pekerjaan,uraian_pekerjaan.id_pks,nama_progress,progress.id_progress,uraian_pekerjaan,nama_progress,folder,singkatan FROM uraian_pekerjaan JOIN daftar_nama_pks ON uraian_pekerjaan.id_pks = daftar_nama_pks.id_pks LEFT JOIN dokumen ON uraian_pekerjaan.id_pekerjaan = dokumen.id_pekerjaan LEFT JOIN progress ON progress.id_progress = uraian_pekerjaan.id_progress ORDER BY  uraian_pekerjaan.id_pekerjaan DESC")->result_array();


                foreach ($data_pekerjaan as $key => $value) {
                        $data_pekerjaan[$key]['persentase_progress'] = $this->m_get_persentase_pekerjaan($value['id_pekerjaan']);
                }
                return $data_pekerjaan;
        }


        private function m_get_persentase_pekerjaan($id_pekerjaan)
        {
                $return_arr = array();
                $result = $this->db->query("SELECT `persentase`, `minggu`, `tanggal`, `bukti` FROM `persentase_progress` WHERE id_pekerjaan = $id_pekerjaan")
                        ->result_array();
                foreach ($result as $key => $value) {
                        $tanggal = substr($value['tanggal'], 0, 10);
                        $month =  date('M', strtotime($tanggal));
                        $return_arr["W" . $value['minggu'] . "-$month"] = array('month' => $month, 'persentase' => $value['persentase'], 'bukti' => $value['bukti']);
                }
                return $return_arr;
        }
        public function m_dash_persentase($val1, $val2)
        {

                return $this->db->query("SELECT up.id_pekerjaan,up.id_progress,up.uraian_pekerjaan,dp.singkatan,pr.nama_progress,IFNULL(max(pp.persentase),0) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks LEFT JOIN persentase_progress AS pp ON up.id_pekerjaan = pp.id_pekerjaan JOIN progress AS pr ON up.id_progress = pr.id_progress GROUP BY up.id_pekerjaan HAVING persentase >=$val1 AND persentase <=$val2;")->result_array();
        }
        public function m_tambah_pekerjaan($data)
        {

                return $this->db->insert('uraian_pekerjaan', $data);
        }


        public function get_singkatan_pks($id_pks)
        {
                return $this->db
                        ->select('singkatan')
                        ->where('id_pks', $id_pks)
                        ->from('daftar_nama_pks')
                        ->get()
                        ->result_array()[0]['singkatan'];
        }

        public function m_get_data_pengawasan()
        {
                $data_pekerjaan = $this->db
                        ->query("select uraian_pekerjaan.id_pekerjaan, uraian_pekerjaan,singkatan,nama_progress,uraian_pekerjaan.id_progress 
                        FROM uraian_pekerjaan
                        LEFT JOIN progress ON progress.id_progress = uraian_pekerjaan.id_progress LEFT JOIN daftar_nama_pks ON uraian_pekerjaan.id_pks = daftar_nama_pks.id_pks ORDER BY  uraian_pekerjaan.id_pekerjaan DESC")
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
                try {
                        if ($id_pks == "null") {
                                return json_encode($this->db->query("SELECT up.id_pekerjaan,up.id_progress,up.uraian_pekerjaan,dp.singkatan,pr.nama_progress,max(pp.persentase) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks LEFT JOIN persentase_progress AS pp ON up.id_pekerjaan = pp.id_pekerjaan JOIN progress AS pr ON up.id_progress = pr.id_progress GROUP BY up.id_pekerjaan ORDER BY up.id_pekerjaan DESC;")
                                        ->result_array());
                        } else if ($id_pks == "tekpol" || $id_pks == "pks" || $id_pks == "hps" || $id_pks == "pengadaan" || $id_pks == "sppbj") {
                                return json_encode($this->db->query("SELECT up.id_pekerjaan,up.id_progress,up.uraian_pekerjaan,dp.singkatan,pr.nama_progress,max(pp.persentase) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks LEFT JOIN persentase_progress AS pp ON up.id_pekerjaan = pp.id_pekerjaan JOIN progress AS pr ON up.id_progress = pr.id_progress WHERE pr.nama_progress = '$id_pks' GROUP BY up.id_pekerjaan ORDER BY up.id_pekerjaan DESC;")
                                        ->result_array());
                        } else {
                                return json_encode($this->db->select('id_pekerjaan,id_progress,id_pks,uraian_pekerjaan')
                                        ->from('uraian_pekerjaan')
                                        ->where('id_pks', $id_pks)
                                        ->order_by("id_pekerjaan", "desc")
                                        ->get()
                                        ->result_array());
                        }
                } catch (\Throwable $th) {
                        return $this->db->last_query();
                }
        }

        public function m_dash_list_percent()
        {
                return $this->db
                        ->query("SELECT(SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan`) AS total_pekerjaan,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase = 0) AS progress_0,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase >=1 AND max_persentase <= 40) AS progress_40,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase >= 41 AND max_persentase <= 60) AS progress_60,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase >= 61 AND max_persentase <= 99) AS progress_99,
                        (SELECT COUNT(id_pekerjaan) FROM `uraian_pekerjaan` WHERE max_persentase =100) AS progress_100;")
                        ->result_array()[0];
        }

        public function m_ajax_get_list_doc_pekerjaan($id_pks)
        {
                $data = $this->db->query("SELECT uraian_pekerjaan, id_pekerjaan FROM `uraian_pekerjaan` WHERE id_pks = $id_pks ORDER BY id_pekerjaan DESC")
                        ->result_array();
                return json_encode($data);
        }

        public function m_ajax_get_history($id_pekerjaan)
        {
                $this->db->query('SET lc_time_names = "id_ID"');
                $data = $this->db->query("SELECT history.id_progress,nama_progress,DATE_FORMAT(STR_TO_DATE(tanggal, '%Y-%m-%d %H:%i:%s'), '%d %M %Y pukul %H:%i:%s WIB') as tanggal,keterangan
                        FROM `history` JOIN progress ON history.id_progress = progress.id_progress WHERE id_pekerjaan = $id_pekerjaan ORDER BY tanggal ASC")->result_array();
                return json_encode($data);
        }

        public function m_update_progress($data)
        {
                $data_hs = array('id_pekerjaan' => $data['id_pekerjaan'], 'id_progress' => $data['id_progress'], 'keterangan' => $this->filter_input_def($this->input->post('keterangan')));
                $this->db->where('id_pekerjaan', $data['id_pekerjaan']);
                if ($data['action'] == 'edit') {
                        unset($data['action']);
                        $this->db->update('uraian_pekerjaan', $data);
                        return $this->db->insert('history', $data_hs);
                } else {
                        $id_pekerjaan = array($data['id_pekerjaan']);
                        return $this->m_hapus_pekerjaan($id_pekerjaan);
                }
        }
        public function m_upload_dokumen_pekerjaan($data)
        {
                return $this->db->where('id_pekerjaan', $data['id_pekerjaan'])
                        ->update('dokumen', array('folder' => $data['folder']));
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


        function m_checkNumeric($array)
        {
                $keys = array_keys($array);
                for ($i = 1; $i < sizeof($array); $i++) {
                        if (!is_numeric($array[$keys[$i]])) {
                                return false;
                        }
                        return true;
                }
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
        public function m_get_balasan($id_balasan)
        {
                $gambar_balasan = null;
                $balasan_review = $this->db->select("*")
                        ->from('balasan_review')
                        ->where('id_balasan', $id_balasan)
                        ->get()
                        ->result_array()[0];
                $folder_balasan = $balasan_review['gambar_balasan'];
                if (isset($folder_balasan) || !empty($folder_balasan)) {
                        $path = FCPATH . "media/upload/answer/$folder_balasan/";
                        $foldername_array = directory_map($path);
                        if (!empty($foldername_array)) {
                                for ($xi = 0; $xi < count($foldername_array); $xi++) {
                                        $gambar_balasan[$xi] = $foldername_array[$xi];
                                }
                        }
                }
                $balasan_review['items_gambar_balasan'] = $gambar_balasan;
                return $balasan_review;
        }



        //List User
        public function m_list_user()
        {
                return $this->db->select('id_user,user.id_pks,nama,username,nama_pks,distrik,last_active')->from('user')->join('daftar_nama_pks', 'daftar_nama_pks.id_pks=user.id_pks')->order_by('nama_pks', 'asc')->where('user.id_pks >', 0)->get()->result_array();
        }

        //Reset User Password
        public function m_reset_user($id_user)
        {
                $this->db->where('id_user', $id_user);
                $this->db->update('user', array('password' => '$2y$05$OrKBL6uohN9IPdAbhfLT8eoHS/4yjQ47Vc6sCQUBEz8tJ6BpJouMm'));
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


        public function m_display_input_pekerjaan()
        {
                return $this->db->query('SELECT id_pks,nama_pks from daftar_nama_pks where id_pks > 0 order by nama_pks
        asc')->result_array();
        }
        public function m_display_hapus_pekerjaan()
        {
                return $this->db->query('SELECT up.id_progress, up.id_pekerjaan,up.uraian_pekerjaan,nama_progress,nama_pks,
        max(persentase) AS persentase FROM `uraian_pekerjaan` AS up JOIN daftar_nama_pks AS dp ON up.id_pks = dp.id_pks
        JOIN progress ON up.id_progress = progress.id_progress JOIN persentase_progress ON up.id_pekerjaan =
        persentase_progress.id_pekerjaan GROUP BY id_pekerjaan;')->result_array();
        }

        public function m_hapus_pekerjaan($id_pekerjaan)
        {
                $in = implode(",", $id_pekerjaan);
                $res = $this->db->query("SELECT id_pekerjaan,singkatan FROM `uraian_pekerjaan` JOIN daftar_nama_pks ON
        uraian_pekerjaan.id_pks = daftar_nama_pks.id_pks WHERE `id_pekerjaan` IN
        ($in)")->result_array();
                foreach ($res as $key => $value) {
                        if ($value['singkatan'] != "" && $value['id_pekerjaan'] != "") {
                                try {
                                        $this->deleteDirectory(FCPATH . "media/upload/dokumen/" . $value['singkatan'] . "/" . $value['id_pekerjaan']);
                                } catch (\Throwable $th) {
                                }
                                try {
                                        $this->deleteDirectory(FCPATH . "media/upload/bukti/" . $value['singkatan'] . "/" . $value['id_pekerjaan']);
                                } catch (\Throwable $th) {
                                }
                                try {
                                        $this->deleteDirectory(FCPATH . "media/upload/dokumentasi/" . $value['singkatan'] . "/" .
                                                $value['id_pekerjaan']);
                                } catch (\Throwable $th) {
                                }
                        }
                }
                return $this->db->query("DELETE FROM `uraian_pekerjaan` WHERE id_pekerjaan IN ($in)");
        }

    
}
        /* End of file M_user.php */
        /* Location: ./application/models/M_user.php */