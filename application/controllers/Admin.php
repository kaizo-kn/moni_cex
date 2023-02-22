<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{






   public function list_week_in_year()
   {
      $weeklist = array();
      $query = "";
      $month_array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
      foreach ($month_array as $key => $value) {
         $month = $value;
         $year = date('Y');
         $tdays = cal_days_in_month(CAL_GREGORIAN, $value, $year);
         $query .= "(SELECT WEEK(LAST_DAY('$year-$month-$tdays') + INTERVAL 1 DAY, 1) - WEEK('$year-$month-02', 1) + 1)  AS '$month',";
      }
      $query = substr($query, 0, -1);
      $result = $this->db->query("SELECT $query")
         ->result_array()[0];
      foreach ($result as $keys => $values) {
         $timestamp = mktime(0, 0, 0, $keys, 1);
         $monthname = date('M', $timestamp);
         for ($i = 0; $i < intval($values); $i++) {
            $m = ($i + 1);
            $week_name['weekname'] = "W" . $m . " $monthname";
            $week_name['weeknum'] =  "w$m-m$keys";
            array_push($weeklist, $week_name);
         }
      }
      return $weeklist;
   }


   public function testmode()
   {
      $weeklist = array();
      $query = "";
      $month_array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
      foreach ($month_array as $key => $value) {
         $month = $value;
         $year = date('Y');
         $tdays = cal_days_in_month(CAL_GREGORIAN, $value, $year);
         $query .= "(SELECT WEEK(LAST_DAY('$year-$month-$tdays') + INTERVAL 1 DAY, 1) - WEEK('$year-$month-02', 1) + 1)  AS '$month',";
      }
      $query = substr($query, 0, -1);
      $result = $this->db->query("SELECT $query")
         ->result_array()[0];
         var_dump($result);
      foreach ($result as $keys => $values) {
         $timestamp = mktime(0, 0, 0, $keys, 1);
         $monthname = date('M', $timestamp);
         for ($i = 0; $i < intval($values); $i++) {
            $m = ($i + 1);
            $week_name['weekname'] = "W" . $m . " $monthname";
            $week_name['weeknum'] =  "w$m-m$key";
            array_push($weeklist, $week_name);
         }
      }
   }

   private function weekOfMonth($date)
   {
      //Get the first day of the month.
      $firstOfMonth = strtotime(date("Y-m-01", $date));
      //Apply above formula.
      return $this->weekOfYear($date) - $this->weekOfYear($firstOfMonth) + 1;
   }

   private function weekOfYear($date)
   {
      $weekOfYear = intval(date("W", $date));
      if (date('n', $date) == "1" && $weekOfYear > 51) {
         // It's the last week of the previos year.
         return 0;
      } else if (date('n', $date) == "12" && $weekOfYear == 1) {
         // It's the first week of the next year.
         return 53;
      } else {
         // It's a "normal" week.
         return $weekOfYear;
      }
   }


   public function __construct()
   {
      parent::__construct();
      $this->load->helper(array('url', 'directory'));
      $this->load->model('m_admin');
   }


   public function index()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $jumlah_per_progress = $this->db->query("SELECT nama_progress, COUNT(uraian_pekerjaan.id_progress) AS jumlah FROM uraian_pekerjaan RIGHT JOIN progress ON uraian_pekerjaan.id_progress = progress.id_progress GROUP BY uraian_pekerjaan.id_progress;")->result_array();
         $new = array();
         foreach ($jumlah_per_progress as $key => $value) {
            $new["progress_" . strtolower($value['nama_progress'])] = $value['jumlah'];
         }
         $jumlah_per_progress = $new;
         $data = array('jumlah_per_progress' => $jumlah_per_progress);
         $this->load->view('__partials/header.php', array('page_title' => 'Dashboard'));
         $this->load->view('__partials/menu.php', array('m1' => 'nav-menu-active'));
         $this->load->view('admin/dashboard.php',array_merge($this->m_admin->m_dash_list_percent(),$data));
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }
   public function lap_invest()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data_pekerjaan = array('data_pekerjaan' => $this->m_admin->m_progress_lap_invest());

        
         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
         $this->load->view('admin/lap_invest', array_merge($data_pekerjaan, array('weeklist' => $this->list_week_in_year())));
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }
   public function input_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = $this->db->query('SELECT id_pks,nama_pks from daftar_nama_pks where id_pks > 0 order by nama_pks asc')->result_array();
         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
         $this->load->view('admin/input_uraian_pekerjaan.php', array('data_pks' => $data));
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }

   public function update_progress()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = $this->m_admin->m_progress_update();
         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
         $this->load->view('admin/update_progress.php', $data);
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }

   public function reset_user()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data_user = array('data_user' => $this->m_admin->m_list_user());
         $title['page_title'] = "Reset Password User";
         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
         $this->load->view('admin/reset_user.php', $data_user);
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }

   public function get_persentase_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
      } else {
         redirect('login', 'refresh');
      }
   }
   public function update_progress_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $id_pekerjaan = $this->input->post('id_pekerjaan');
         $id_pekerjaan = explode(",", $id_pekerjaan);
         $id_pekerjaan = $id_pekerjaan[0];
         $id_pks = $this->input->post('id_pks');
         $uraian_pekerjaan = $this->filter_input($this->input->post('uraian_pekerjaan'));
         $id_progress = $this->input->post('id_progress');
         $data = compact('id_pekerjaan', 'id_pks', 'id_progress', 'uraian_pekerjaan');
         if ($this->m_admin->m_update_progress($data) == 1) {
            $this->session->set_flashdata('message', $this->flash_success('Berhasil'));
         } else {
            $this->session->set_flashdata('message', $this->flash_success('Error'));
         }
         redirect('admin/update_progress', 'refresh');
      } else {
         redirect('login', 'refresh');
      }
   }

   public function upload_dokumen_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $id_pekerjaan = $this->input->post('id_pekerjaan');
         $id_pekerjaan = explode(",", $id_pekerjaan);
         $id_pekerjaan = $id_pekerjaan[0];
         $id_pks = $this->input->post('id_pks');
         $singkatan = $this->m_admin->get_singkatan_pks($id_pks);
         $folder = date('d-m-Y_H-i-s');
         $path = FCPATH . "media/upload/dokumen/$singkatan/$folder/";
         $config['upload_path'] = "$path";
         $config['allowed_types'] = 'pdf';
         $config['max_size'] = 5000;
         $config['overwrite'] = true;
         $message = "";

         if (!is_dir($path)) {
            mkdir($path, 0755, TRUE);
         }
         if (isset($_FILES["rab"]["name"])) {
            $config['file_name'] = "rab_$singkatan-$folder.pdf";
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('rab')) {
               $message = "RAB Ok" . "<br>";
            } else {
               $message = "RAB: " . $this->upload->display_errors() . "<br>";
            }
         }
         if (isset($_FILES["st_rkst_kak"]["name"])) {
            $config['file_name'] = "st_rkst_kak_$singkatan-$folder.pdf";
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('st_rkst_kak')) {
               $message .= "ST/RKST/KAK Ok" . "<br>";
            } else {
               $message .= "ST/RKST/KAK: " . $this->upload->display_errors() . "<br>";
            }
         }
         if (isset($_FILES["kontrak"]["name"])) {
            $config['file_name'] = "kontrak_$singkatan-$folder.pdf";
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('kontrak')) {
               $message .= "Kontrak Ok <br>";
            } else {
               $message .= "Kontrak: " . $this->upload->display_errors() . "<br>";
            }
         }
         $data = compact('id_pekerjaan', 'folder');
         if ($this->m_admin->m_upload_dokumen_pekerjaan($data) == 1) {
            $message .= "Data Ok";
         } else {
            $message .= "Data Error";
         }
         $this->session->set_flashdata('message', $this->flash_info($message));
         redirect('admin/upload_dokumen', 'refresh');
      } else {
         redirect('login', 'refresh');
      }
   }
   public function upload_dokumen()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = $this->db->query('SELECT id_pks,nama_pks from daftar_nama_pks where id_pks > 0 order by nama_pks asc')->result_array();
         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
         $this->load->view('admin/upload_dokumen.php', array('data_pks' => $data, 'data_pekerjaan' => $data));
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }

   public function pengawasan_pekerjaan_lap()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = array('data_pekerjaan' => $this->m_admin->m_get_data_pengawasan());
         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m3' => 'nav-menu-active'));
         $this->load->view('admin/pengawasan_pekerjaan_lap.php', $data);
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }

   //Profil 
   public function profile()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $userdata = array('nama' => $this->session->userdata('nama'), 'profile' => $this->session->userdata('profile'), 'username' => $this->session->userdata('username'));
         $title['page_title'] = "Profil";

         $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
         $this->load->view('__partials/menu.php', array('m3' => 'nav-menu-active'));
         $this->load->view('admin/ubah_profil.php', $userdata);
         $this->load->view('__partials/footer.php');
      } else {
         redirect('login', 'refresh');
      }
   }


   //Edit Profil 
   public function edit_profil()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $username = $this->input->post('username');
         $nama = $this->input->post('nama');
         $password = $this->input->post('password');
         $is_exist_img = !empty($_FILES['berkas']['name']);
         $data = array("nama" => $nama, 'username' => $username);
         if (trim($password) != '') {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');
         }
         if ($this->form_validation->run() == TRUE && $is_exist_img == true) {
            $filename = $this->session->userdata('singkatan');
            $config['upload_path'] = 'assets/img/profile_picture/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 5000;
            $config['overwrite'] = true;
            $config['file_name'] = "$filename";
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('berkas')) {
               $data['password'] = get_hash($password);
               $data['foto_profil'] = "$filename." . pathinfo($_FILES["berkas"]["name"], PATHINFO_EXTENSION);
               if ($data['foto_profil'] != $this->session->userdata('profile')) {
                  try {
                     unlink("assets/img/profile_picture/" . $this->session->userdata('profile'));
                  } catch (\Throwable $th) {
                     //throw $th;
                  }
               }
               $this->m_admin->m_update_profile('user', $username, $data);
            } else {
               $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
            }
         } else if ($this->form_validation->run() == TRUE && $is_exist_img == false) {
            $data['password'] = get_hash($password);
            $this->m_admin->m_update_profile('user', $username, $data);
         } else if ($this->form_validation->run() == false && $is_exist_img == true) {
            $filename = $this->session->userdata('singkatan');
            $config['upload_path'] = 'assets/img/profile_picture/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 5000;
            $config['overwrite'] = true;
            $config['file_name'] = "$filename";
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('berkas')) {
               $data['foto_profil'] = "$filename." . pathinfo($_FILES["berkas"]["name"], PATHINFO_EXTENSION);
               if ($data['foto_profil'] != $this->session->userdata('profile')) {
                  try {
                     unlink("assets/img/profile_picture/" . $this->session->userdata('profile'));
                  } catch (\Throwable $th) {
                     //throw $th;
                  }
               }
               $this->m_admin->m_update_profile('user', $username, $data);
            } else {
               $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
            }
         } else {
            $this->m_admin->m_update_profile('user', $username, $data);
         }
         $this->session->set_flashdata('message', $this->flash_success('Profil Berhasil Diperbaharui'));
         $db = $this->m_admin->m_cek_username()->row();
         $data_login = array(
            'sitenow' => 'admin',
            'is_login' => TRUE,
            'id_user' => $db->id_user,
            'id_pks' => $db->id_pks,
            'username' => $db->username,
            'nama' => $db->nama,
            'profile' => $db->foto_profil,
            'singkatan' => $db->singkatan
         );
         $this->session->set_userdata($data_login);
         redirect('admin/profile', 'refresh');
         $this->session->set_flashdata('message', '');
      } else {
         redirect('login/', 'refresh');
      }
   }

   //reset user pass
   public function action_reset_user()
   {

      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $id_user = $this->input->post('id_user');
         $this->m_admin->m_reset_user($id_user);
      } else {
         echo json_encode(array('message' => 'forbidden'));
      }
   }


   //tambah_pekerjaan
   public function tambah_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = array(
            'id_pks' => $this->input->post('id_pks'),
            'uraian_pekerjaan' => $this->filter_input($this->input->post('uraian_pekerjaan'))
         );
         if ($this->m_admin->m_tambah_pekerjaan($data) == 1) {
            $this->session->set_flashdata('message', $this->flash_success('Berhasil'));
         } else {
            $this->session->set_flashdata('message', $this->flash_success('Error'));
         }
         redirect('admin/input_pekerjaan', 'refresh');
      } else {
         redirect('login', 'refresh');
      }
   }


   //ajax get list pekerjaan
   public function ajax_get_list_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = $this->m_admin->m_ajax_get_list_pekerjaan($this->input->post('id_pks'));
         echo $data;
      } else {
         echo json_encode(array('message' => 'forbidden'));
      }
   }
   //ajax get list doc pekerjaan
   public function ajax_get_list_doc_pekerjaan()
   {
      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         $data = $this->m_admin->m_ajax_get_list_doc_pekerjaan($this->input->post('id_pks'));
         echo $data;
      } else {
         echo json_encode(array('message' => 'forbidden'));
      }
   }

   //ajax dashboard persentase
   public function ajax_dash_persentase()
   {

      if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {
         echo json_encode($this->m_admin->m_dash_persentase($this->input->post('val1'), $this->input->post('val2')));
      } else {
         echo json_encode(array('message' => 'forbidden'));
      }
   }

   //set user last active
   public function ajax_set_user_last_active()
   {
      if ($this->session->userdata('is_login') === true) {
         $this->m_admin->m_set_user_last_active($this->session->userdata('id_user'), time());
      }
   }


   //Addon Function

   //Rmdir
   function deleteDirectory($dir)
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
   private function filter_input($input)
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


   private function flash_success($message)
   {
      return "
        toastMixin.fire({
        icon: 'success',
        animation: true,
        title: '" . $message . "'
        });";
   }
   private function flash_info($message)
   {
      return "
        toastMixin.fire({
        icon: 'info',
        animation: true,
        title: '" . $message . "'
        });";
   }
   private function flash_error($message)
   {
      return "
        toastMixin.fire({
        icon: 'error',
        animation: true,
        title: '" . $message . "'
        });";
   }
}
