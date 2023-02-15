<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
        public function m_register($data)
        {
                return $this->db->insert('user', $data);
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

        public function m_tambah_pekerjaan($data)
        {
                return $this->db->insert('uraian_pekerjaan', $data);
        }



        //ajax get list pekerjaan
        public function m_ajax_get_list_pekerjaan($id_pks)
        {
                return json_encode($this->db->select('id_pekerjaan,id_progress,id_pks,id_user,uraian_pekerjaan')
                        ->from('uraian_pekerjaan')
                        ->where('id_pks', $id_pks)
                        ->get()
                        ->result_array());
        }

        public function m_update_progress($data)
        {
                $this->db->where('id_pekerjaan',$data['id_pekerjaan']);
                return $this->db->update('uraian_pekerjaan',$data);
        }


        public function m_get_stok()
        {
                $r_id_produk_array = null;
                $new_result_array = null;
                $new_t_pesanan_array = null;
                $result = $this->db->query("SELECT* FROM `stok_produk_pmt` ")->result_array();
                $t_pesanan = $this->db->query("SELECT pr.nama_alias_produk,IFNULL(SUM(ps.jumlah_pesanan),0) AS jumlah_pesanan 
        FROM `produk_pmt` AS pr 
        LEFT JOIN (select p.id_produk,p.jumlah_pesanan from pesanan as p where p.status_pesanan in (0,1,null)) as ps USING (id_produk) 
        GROUP BY nama_alias_produk;")->result_array();
                $daftar_produk = $this->db->query("SELECT produk_pmt.id_produk,produk_pmt.nama_alias_produk FROM `produk_pmt`;")->result_array();
                if (count($daftar_produk) > 0) {

                        for ($i = 0; $i < count($daftar_produk); $i++) {
                                $id_produk = $daftar_produk[$i]['id_produk'];
                                $nama_alias_produk = "id_p_" . $daftar_produk[$i]['nama_alias_produk'];

                                $r = $this->db->query("SELECT `id_pesanan` FROM `pesanan` WHERE `id_produk` = '$id_produk'")->result_array();

                                if (count($r) > 0) {
                                        for ($xi = 0; $xi < count($r); $xi++) {
                                                $r_id_produk_array[$nama_alias_produk][$xi] = $r[$xi]['id_pesanan'];
                                        }
                                } else if (count($r) == 0) {
                                        $r_id_produk_array[$nama_alias_produk][0] = "";
                                }
                        }
                }


                if (isset($t_pesanan)) {
                        for ($i = 0; $i < count($t_pesanan); $i++) {
                                $key = $t_pesanan[$i]['nama_alias_produk'];
                                $val = $t_pesanan[$i]['jumlah_pesanan'];
                                $new_t_pesanan_array["p_" . $key] = $val;
                        }
                }

                if (isset($result)) {
                        for ($i = 0; $i < count($result); $i++) {
                                $key = $result[$i]['nama_alias_produk'];
                                if ($key == "tanggal_update") {
                                        $val = $result[$i]['tanggal_update'];
                                } else {
                                        $val = $result[$i]['jumlah_stok'];
                                }

                                $new_result_array[$key] = $val;
                        }
                }

                return array_merge($new_result_array, $new_t_pesanan_array, $r_id_produk_array);
        }
        public function m_cek_username()
        {
                $username = $this->input->post('username');

                return $this->db->query("SELECT user.*,daftar_nama_pks.singkatan,daftar_nama_pks.id_pks,daftar_nama_pks.nama_pks FROM user
                INNER JOIN daftar_nama_pks ON user.id_pks = daftar_nama_pks.id_pks WHERE user.username='$username';");
        }


        public function m_update_stok($data)
        {
                if ($this->m_checkNumeric($data) == TRUE) {
                        foreach ($data as $key => $value) {
                                if ($key == 'tanggal_update') {
                                        $this->db->where('nama_alias_produk', $key);
                                        $this->db->update('stok_produk_pmt', array('tanggal_update' => $value));
                                } else {
                                        $this->db->where('nama_alias_produk', $key);
                                        $this->db->update('stok_produk_pmt', array('jumlah_stok' => $value));
                                }
                        }
                        return 1;
                } else {
                        return "Data Mengandung Nilai Non-Numerik";
                }
        }
        public function m_update_pesanan($data)
        {
                $status_pesanan = array('status' => $data['status_pesanan']);
                $id_pesanan = $data['id_pesanan'];
                $this->db->where('id', $id_pesanan);
                $this->db->update('status_pesanan', $status_pesanan);
                return $this->db->last_query();
        }


        public function m_update_profile($table, $where, $data)
        {
                $this->db->where('username', $where);
                return $this->db->update($table, $data);
        }

        public function m_get_catatan()
        {
                return $this->db->get('catatan_info_harga')->result_array()[0];
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
        function m_update_catatan_harga($data)
        {
                $this->db->update('catatan_info_harga', $data);
        }

        //Buat Pesanan
        public function m_buat_pesanan($data)
        {
                $this->db->insert('pesanan', $data);
        }

        //Set User Comment 
        public function m_set_user_comment($id_pesanan, $komentar)
        {
                $f_komentar = $this->filter_input_def($komentar);
                $this->db->where('id_pesanan', $id_pesanan)->update('pesanan', array('komentar' => $f_komentar));
                return $this->db->last_query();
        }

        //Manajemen Pesanan
        public function m_manajemen_pesanan()
        {
                return $this->db->query('SELECT d.singkatan, p1.id_pesanan, p1.komentar, p1.jumlah_pesanan,p1.tanggal_pemesanan,p1.tanggal_selesai,p1.status_pesanan, u.nama as nama_user,d.nama_pks,p2.nama_produk
                FROM `pesanan` as p1
                join produk_pmt as p2 on p1.id_produk = p2.id_produk
                JOIN daftar_nama_pks as d on d.id_pks = p1.id_pks
                join user as u on u.id_user=p1.id_user ORDER BY p1.tanggal_pemesanan DESC')->result_array();
        }
        //Daftar Pesanan User
        public function m_daftar_pesanan($id_pks)
        {
                return $this->db->query("SELECT d.singkatan, p1.id_pesanan, p1.komentar, p1.jumlah_pesanan,p1.tanggal_pemesanan,p1.tanggal_selesai,p1.status_pesanan, u.nama as nama_user,d.nama_pks,p2.nama_produk
                FROM `pesanan` as p1
                join produk_pmt as p2 on p1.id_produk = p2.id_produk
                JOIN daftar_nama_pks as d on d.id_pks = p1.id_pks
                join user as u on u.id_user=p1.id_user WHERE p1.id_pks = '$id_pks' ORDER BY p1.tanggal_pemesanan DESC")->result_array();
        }

        //Ubah Pesanan
        public function m_ubah_pesanan($value)
        {
                $komentar = $value['komentar'];
                for ($i = 0; $i < count($komentar); $i++) {
                        $komentar[$i] = $this->filter_input_def($komentar[$i]);
                }
                $option = $value['option'];
                $id_pesanan = implode(',', $option);
                if ($value['action'] == 'Hapus') {
                        $result = $this->db->query("SELECT dp.singkatan,ps.tanggal_pemesanan FROM `pesanan` AS ps JOIN daftar_nama_pks AS dp ON dp.id_pks = ps.id_pks WHERE ps.id_pesanan IN ($id_pesanan);")->result_array();
                        for ($i = 0; $i < count($result); $i++) {
                                if (isset($result[$i]['tanggal_pemesanan'])) {
                                        $path = FCPATH . "media/upload/pesanan/" . $result[$i]['singkatan'] . "/" . $result[$i]['tanggal_pemesanan'];
                                        $path = str_replace('\\', '/', $path);
                                        $this->deleteDirectory($path);
                                }
                        }
                        $this->db->query("delete from `pesanan` where `id_pesanan` in ($id_pesanan)");
                } else if ($value['action'] == 'Tolak') {
                        $id_komentar = preg_split("/[\s,]+/", $id_pesanan);
                        for ($i = 0; $i < count($id_komentar); $i++) {
                                $query = "UPDATE `pesanan` SET `status_pesanan`='2', `komentar` ='$komentar[$i]' WHERE `id_pesanan` = $id_komentar[$i];";
                                $this->db->query($query);
                        }
                } else if ($value['action'] == 'Terima') {

                        $id_komentar = preg_split("/[\s,]+/", $id_pesanan);
                        for ($i = 0; $i < count($id_komentar); $i++) {
                                $query = "UPDATE `pesanan` SET `status_pesanan`='1', `komentar` ='$komentar[$i]' WHERE `id_pesanan` = $id_komentar[$i];";
                                $this->db->query($query);
                        }
                } else if ($value['action'] == 'Selesaikan') {
                        $id_komentar = preg_split("/[\s,]+/", $id_pesanan);
                        $time = date("d-m-Y H:i:s");
                        for ($i = 0; $i < count($id_komentar); $i++) {
                                $query = "UPDATE `pesanan` SET `status_pesanan`='3', `komentar` ='$komentar[$i]', `tanggal_selesai`='$time'  WHERE `id_pesanan` = $id_komentar[$i];";
                                $this->db->query($query);
                        }
                }
                return true;
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

        //Get Data Review
        public function m_get_data_review()
        {
                $reviews = $this->db->select('*')
                        ->from('review')
                        ->join('balasan_review', 'review.id_review=balasan_review.id_balasan', 'left')
                        ->order_by('review.id_review', 'desc')
                        ->get()
                        ->result_array();
                return $reviews;
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


        //Balas Review 
        public function m_balas_review($data)
        {
                $check_id_balasan = ($this->db->query('SELECT `id_balasan` FROM `balasan_review` WHERE `id_balasan`=' . $data['id_balasan'])->result_array()[0]['id_balasan']);
                if (!isset($check_id_balasan)) {
                        $this->db->insert('balasan_review', $data);
                        $this->db->where('id_review', $data['id_balasan']);
                        $this->db->update('review', array('id_balasan' => $data['id_balasan']));
                } else {
                        $this->db->where('id_balasan', $data['id_balasan']);
                        $this->db->update('balasan_review', $data);
                        $this->db->reset_query();
                        $this->db->query('UPDATE `review` SET `id_balasan` = ' . $data["id_balasan"] . ' WHERE `id_review` =' . $data["id_balasan"] . '');
                }
        }

        public function m_hapus_review($id_review)
        {
                $this->db->select('gambar');
                $this->db->where('id_review', $id_review);
                $folder = $this->db->get_where('review')->result_array();
                if (null != $folder) {
                        $folder = $folder[0]['gambar'];
                        if ($folder != '' && $folder != null && trim($folder != ' ' && $folder != ' ')) {
                                $path = FCPATH . 'media/upload/review/' . $folder;
                                $this->deleteDirectory($path);
                        }
                }
                $this->db->reset_query();
                $this->db->where('id_review', $id_review);
                $this->db->delete('review');

                $this->db->reset_query();
                $this->db->select('gambar_balasan');
                $this->db->where('id_balasan', $id_review);
                $folder = $this->db->get_where('balasan_review')->result_array();
                if (null != $folder) {
                        $folder = $folder[0]['gambar_balasan'];
                        if ($folder != '' && $folder != null && trim($folder != ' ' && $folder != ' ')) {
                                $path = FCPATH . 'media/upload/answer/' . $folder;
                                $this->deleteDirectory($path);
                        }
                }
                $this->db->reset_query();
                $this->db->where('id_balasan', $id_review);
                $this->db->delete('balasan_review');
        }

        public function m_tampilkan_review($id_review)
        {
                $this->db->where('id_review', $id_review);
                return $this->db->update('review', array('is_hidden' => '0'));
        }
        public function m_sembunyikan_review($id_review)
        {
                $this->db->where('id_review', $id_review);
                return $this->db->update('review', array('is_hidden' => '1'));
        }
}
/* End of file M_user.php */
/* Location: ./application/models/M_user.php */