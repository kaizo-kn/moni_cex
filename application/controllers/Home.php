<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->helper('url', 'directory');
      $this->load->model('m_home');
   }

   public function index()
   {
      $this->load->view('main/header.php', array('page_title' => 'Beranda'));
      $this->load->view('main/menu.php', array('m1' => 'nav-menu-active'));
      $this->load->view('main/beranda.php');
      $this->load->view('main/footer.php');
      if ($this->session->userdata('is_login') == true) {
         $this->session->set_userdata(array('sitenow'=>''));
      }
   }
   public function info_produk()
   {
      $this->load->view('main/header.php', array('page_title' => 'Informasi Produk PMT'));
      $this->load->view('main/menu.php', array('m2' => 'nav-menu-active'));
      $this->load->view('main/info_produk.php');
      $this->load->view('main/footer.php');
      if ($this->session->userdata('is_login') == true) {
         $this->session->set_userdata(array('sitenow'=>'home/info_produk'));
      }
   }
   public function info_harga()
   {
      $data = $this->m_home->m_get_catatan();
      $this->load->view('main/header.php', array('page_title' => 'Informasi Harga Produk PMT'));
      $this->load->view('main/menu.php', array('m3' => 'nav-menu-active'));
      $this->load->view('main/info_harga.php',$data);
      $this->load->view('main/footer.php');
      if ($this->session->userdata('is_login') == true) {
         $this->session->set_userdata(array('sitenow'=>'home/info_harga'));
      }
   }
   public function info_stok()
   {
      $info_stok = $this->m_home->m_get_stok();
      $this->load->view('main/header.php', array('page_title' => 'Informasi Stok Produk PMT'));
      $this->load->view('main/menu.php', array('m4' => 'nav-menu-active'));
      $this->load->view('main/info_stok.php', $info_stok);
      $this->load->view('main/footer.php');
      if ($this->session->userdata('is_login') == true) {
         $this->session->set_userdata(array('sitenow'=>'home/info_stok'));
      }
   }
   public function faq()
   {
      $this->load->view('main/header.php', array('page_title' => 'Pertanyaan Umum'));
      $this->load->view('main/menu.php', array('m5' => 'nav-menu-active'));
      $this->load->view('main/faq.php');
      $this->load->view('main/footer.php');
      if ($this->session->userdata('is_login') == true) {
         $this->session->set_userdata(array('sitenow'=>'home/faq'));
      }
   }

   public function review()
   {
      $this->load->view('main/header.php', array('page_title' => 'Halaman Review Produk'));
      $this->load->view('main/menu.php', array('m6' => 'nav-menu-active'));
      $this->load->view('main/review.php');
      $this->load->view('main/footer.php');
      if ($this->session->userdata('is_login') == true) {
         $this->session->set_userdata(array('sitenow'=>'home/review'));
      }
   }



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



   //Buat Review
   public function c_add_complaint()
   {
      $path = "";
      $message = "";
      $title =$this->filter_input($this->input->post('judul'));
      $name = $this->filter_input($this->input->post('nama'));
      $complaint = $this->filter_input($this->input->post('review'));
      $timestamp = $this->getTimestamp();
      if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
         $date = date("Y-m-d_H-i-s");
         $sname = substr(str_replace(" ", "", $name), 0, 5);
         $microtime = str_replace('.', '-', microtime(true));
         $folder = $sname . "_" . $microtime;
         $path = FCPATH . 'media/upload/complaint/' . $folder;
         if (!is_dir($path)) {
            mkdir($path, 0755, TRUE);
         }
         $filesCount = count($_FILES['files']['name']);
         for ($i = 0; $i < $filesCount && $i < 4; $i++) {
            $_FILES['file']['name']     = $_FILES['files']['name'][$i];
            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['files']['error'][$i];
            $_FILES['file']['size']     = $_FILES['files']['size'][$i];

            // File upload configuration 
            $file = $sname . "_" . $date . "_" . $i;
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;
            $config['overwrite']            = true;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $file;


            // Load and initialize upload library 
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server 
            if ($this->upload->do_upload('file')) {
               $message .= ('Gambar Berhasil Dikirim <br>');
            } else {
               $message .= $this->upload->display_errors() . "<br>";
            }
         }
         $this->session->set_flashdata('message', $this->flash_info($message));
      } else {
         $this->session->set_flashdata('message', $this->flash_success("Review Berhasil Dikirim"));
      }
      $data = array('nama' => $name, 'tanggal_komplain' => $timestamp, 'judul_komplain' => $title, 'isi_komplain' => $complaint, 'gambar' => $folder);
      $this->m_home->m_add_complaint($data);
      redirect('home/review');
      $this->session->set_flashdata('message', '');
   }

   //Balas Review
   public function c_balas_komplain()
   {
      if ($this->session->userdata('is_login') == FALSE) {
         redirect('/', 'refresh');
      } else {
         $folder = null;
         $path = "";
         $message = "";
         $id_komplain = $this->input->post('id-review');
         $balasan = $this->filter_input($this->input->post('balasan-review'));
         $timestamp = $this->getTimestamp();
         if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
            $date = date("Y-m-d_H-i-s");
            $data = $this->db->query('SELECT `nama`,`gambar` FROM `review` WHERE `id`=' . $id_komplain . '')->result_array()[0];
            $data1 = $this->db->query('SELECT `gambar_balasan` FROM `balasan_komplain` WHERE `id_balasan`=' . $id_komplain . '')->result_array()[0];
            $folder = $data['gambar'];
            $folder1 = $data1['gambar_balasan'];
            if (!isset($folder) && !isset($folder1)) {
               if ($folder == "") {
                  $folder = $microtime = str_replace('.', '-', microtime(true));
                  $folder = "balasan_" . $microtime;
               }
            }
            $sname = $data['nama'];
            if (isset($folder1)) {
               $folder = $folder1;
            }
            $path = FCPATH . 'media/upload/answer/' . $folder;
            if (!is_dir($path)) {
               mkdir($path, 0755, TRUE);
            }
            $filesCount = count($_FILES['files']['name']);
            for ($i = 0; $i < $filesCount && $i < 4; $i++) {
               $_FILES['file']['name']     = $_FILES['files']['name'][$i];
               $_FILES['file']['type']     = $_FILES['files']['type'][$i];
               $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
               $_FILES['file']['error']     = $_FILES['files']['error'][$i];
               $_FILES['file']['size']     = $_FILES['files']['size'][$i];

               // File upload configuration 
               $fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
               $file = $sname . "_" . $date . "_" . $i;
               $config['upload_path']          = $path;
               $config['allowed_types']        = 'gif|jpg|png';
               $config['max_size']             = 5000;
               $config['overwrite']            = true;
               $config['allowed_types'] = 'gif|jpg|png';
               $config['file_name'] = $file;


               // Load and initialize upload library 
               $this->load->library('upload', $config);
               $this->upload->initialize($config);

               // Upload file to server 
               if ($this->upload->do_upload('file')) {
                  $message .= ('Gambar Berhasil Dikirim <br>');
               } else {
                  $message .= $this->upload->display_errors() . "<br>";
               }
            }
            $this->session->set_flashdata('message', $this->flash_info($message));
         } else {
            $this->session->set_flashdata('message', $this->flash_success("Balasan Berhasil Dikirim"));
         }
         if (isset($folder)) {
            $data = array('id_balasan' => $id_komplain, 'tanggal_balasan' => $timestamp, 'balasan' => $balasan, 'gambar_balasan' => $folder);
         } else {
            $data = array('id_balasan' => $id_komplain, 'tanggal_balasan' => $timestamp, 'balasan' => $balasan);
         }
         $this->m_home->m_balas_komplain($data);
         redirect('home/review');
         $this->session->set_flashdata('message', '');
      }
   }

   //Ubah Review
   public function c_sembunyikan_komplain()
   {
      if ($this->session->userdata('is_login') == FALSE) {
         redirect('/', 'refresh');
      } else {
         $this->db->where('id', $this->input->post('id_komplain'));
         $this->db->update('review', array('is_hidden' => '1'));
         $this->session->set_flashdata('message', $this->flash_success('Review Disembunyian'));
         redirect('home/review');
         $this->session->set_flashdata('message', '');
      }
   }
   public function c_hapus_komplain()
   {
      $folder = null;
      $id = $this->input->post('id_komplain');
      $this->db->select('gambar');
      $this->db->where('id', $id);
      $folder = $this->db->get_where('review')->result_array();

      if (null != $folder) {
         $folder = $folder[0]['gambar'];
         if ($folder != '' && $folder != null  && trim($folder != ' ' && $folder != ' ')) {
            $path = FCPATH . 'media/upload/complaint/' . $folder;
            $this->deleteDirectory($path);
         }
      }
      $this->db->reset_query();
      $this->db->where('id', $id);
      $this->db->delete('review');

      $this->db->reset_query();
      $this->db->select('gambar_balasan');
      $this->db->where('id_balasan', $id);
      $folder = $this->db->get_where('balasan_komplain')->result_array();
      if (null != $folder) {
         $folder = $folder[0]['gambar_balasan'];
         if ($folder != '' && $folder != null && trim($folder != ' ' && $folder != ' ')) {
            $path = FCPATH . 'media/upload/answer/' . $folder;
            $this->deleteDirectory($path);
         }
      }
      $this->db->reset_query();
      $this->db->where('id_balasan', $id);
      $this->db->delete('balasan_komplain');
      $this->session->set_flashdata('message', $this->flash_success('Review Berhasil Dihapus'));
      redirect('home/review');
      $this->session->set_flashdata('message', '');
   }

   public function c_tampilkan_komplain()
   {
      if ($this->session->userdata('is_login') == FALSE) {
         redirect('/', 'refresh');
      } else {
         $this->db->where('id', $this->input->post('id_komplain'));
         $this->db->update('review', array('is_hidden' => '0'));
         $this->session->set_flashdata('message', $this->flash_success('Review Ditampilkan'));
         redirect('home/review');
         $this->session->set_flashdata('message', '');
      }
   }

   //Upload File
   public function ubah_info_harga()
   {
      if ($this->session->userdata('is_login') == FALSE) {
         redirect('/', 'refresh');
      } else {
         $title['page_title'] = "Ubah Informasi Harga";
         $this->load->view('header.php', $title);
         $this->load->view('user/admin_header.php');
         $this->load->view('user/info_harga.php', array('status' => $this->status, 'image' => $this->m_user->m_get_banner()));
         $this->load->view('main/footer.php');
      }
   }

   //Addon Function
  private function filter_input($input) {
      $search = array(
        '@<script[^>]*?>.*?</script>@si', // Menghapus script tag
'@<[ /!]*?[^<>]*?>@si', // Menghapus tag HTML
    '@<style[^>]*?>.*?</style>@siU', // Menghapus style tag
        );
        $output = preg_replace($search, '', $input);
        return $output;
        }


        private function getTimestamp()
        {
        $locale = 'id_ID';
        $dateObj = new DateTime;
        $formatter = new IntlDateFormatter(
        $locale,
        IntlDateFormatter::FULL,
        IntlDateFormatter::SHORT
        );
        $formatter->format($dateObj);
        $cDate = $formatter->format($dateObj);
        return substr($cDate, 0, -6) . " pukul " . substr($cDate, -5) . " WIB";
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