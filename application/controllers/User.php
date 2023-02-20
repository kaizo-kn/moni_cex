<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    $this->load->helper(array('form', 'url', 'file'));
  }

  // public function testdata()
  // {
  //   $r = $this->db->query("select * from daftar_nama_pks where id_pks > 0")->result_array();
  //   for ($i = 0; $i < count($r); $i++) {
  //     $ii=$i+1;
  //     $id_pks = $r[$i]['id_pks'];
  //     $nama = $r[$i]['nama_pks'];
  //     $username = $r[$i]['singkatan'];
  //     $pass = '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe';
  //     echo "INSERT INTO `user`(`id_user`, `id_pks`, `username`, `nama`, `password`, `foto_profil`, `date_created`, `last_active`) VALUES ($ii,$id_pks,'pks_$username','PKS $nama','$pass','default.png','','');";

  //     //$this->db->insert('user')->get_compiled();
  //   }
  // }
  public function index()
  {

    if ($this->session->userdata('is_login') == TRUE) {
      $id_pks = $this->session->userdata('id_pks');
      $total = $this->db->query("SELECT COUNT(id_pekerjaan) AS jumlah_pekerjaan from `uraian_pekerjaan` WHERE `id_pks` = $id_pks")->result_array()[0]['jumlah_pekerjaan'];
      $jumlah_per_progress = $this->db->query("SELECT nama_progress, COUNT(uraian_pekerjaan.id_progress) AS jumlah FROM uraian_pekerjaan RIGHT JOIN progress ON uraian_pekerjaan.id_progress = progress.id_progress WHERE id_pks = $id_pks GROUP BY uraian_pekerjaan.id_progress;")->result_array();
      $new = array();
      foreach ($jumlah_per_progress as $key => $value) {
        $new["progress_" . strtolower($value['nama_progress'])] = $value['jumlah'];
      }
      $jumlah_per_progress = $new;
      $data = $this->m_user->m_dash_list_percent($id_pks);
      $this->load->view('__partials/header.php', array('page_title' => 'Dashboard'));
      $this->load->view('__partials/menu.php', array('m1' => 'nav-menu-active'));
      $this->load->view('user/dashboard.php', array_merge($data, $jumlah_per_progress, array('total_pekerjaan' => $total)));
      $this->load->view('__partials/footer.php');
    } else {
      $this->session->set_flashdata('message', $this->flash_error("Silakan Login Terlebih Dahulu!"));
      redirect('login', 'refresh');
    }
  }

  //ajax dashboard persentase
  public function ajax_dash_persentase()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      echo json_encode($this->m_user->m_dash_persentase($this->input->post('val1'), $this->input->post('val2'), $this->input->post('id_pks')));
    } else {
      echo json_encode(array('message' => 'forbidden'));
    }
  }
  //Profil User
  public function profile()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('user/', 'refresh');
    } else {
      $userdata = array('nama' => $this->session->userdata('nama'), 'profile' => $this->session->userdata('profile'), 'username' => $this->session->userdata('username'));
      $title['page_title'] = "Profil User";
      $this->load->view('__partials/header.php', $title);
      $this->load->view('__partials/menu.php');
      $this->load->view('user/ubah_profil.php', $userdata);
      $this->load->view('__partials/footer.php');
    }
  }

  

  public function lap_invest()
  {
     if ($this->session->userdata('is_login') == TRUE) {
        $data_pekerjaan = array('data_pekerjaan' => $this->m_user->m_progress_lap_invest());

        $data = array('progress_0' => 3, 'progress_40' => 3, 'progress_60' => 3, 'progress_99' => 3, 'progress_100' => 3, 'progress_pks' => 3, 'progress_tekpol' => 3, 'progress_hps' => 3, 'progress_pengadaan' => 3, 'keluar_sppbj' => 3);
        $total = 0;
        foreach ($data as $key => $value) {
           $total += $value;
        }
        $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
        $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
        $this->load->view('user/lap_invest', array_merge($data_pekerjaan, $data, array('total_pekerjaan' => $total)));
        $this->load->view('__partials/footer.php');
     } else {
        redirect('login', 'refresh');
     }
  }

  public function pengawasan_pekerjaan_lap()
  {
     if ($this->session->userdata('is_login') == TRUE) {
        $data = array('data_pekerjaan' => $this->m_user->m_get_data_pengawasan());
        $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
        $this->load->view('__partials/menu.php', array('m3' => 'nav-menu-active'));
        $this->load->view('admin/pengawasan_pekerjaan_lap.php', $data);
        $this->load->view('__partials/footer.php');
     } else {
        redirect('login', 'refresh');
     }
  }



  //ajax last active

  public function ajax_set_user_last_active()
  {
    if ($this->session->userdata('is_login') === true) {
      $this->m_user->m_set_user_last_active($this->session->userdata('id_user'), time());
    }
  }

  //ajax get list pekerjaan
  public function ajax_get_list_pekerjaan()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      echo json_encode($this->m_user->m_ajax_get_list_pekerjaan($this->input->post('id_pks')));
    } else {
      echo json_encode(array('message' => 'forbidden'));
    }
  }

  //Upload File
  public function upload_info_harga()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $catatan = $this->input->post('catatan');
      $tanggal_update = $this->dateUpdate();
      $filename = 'banner_harga';
      if (!empty($_FILES['berkas']['name'])) {
        delete_files('media/upload/banner_harga/');
        $config['upload_path'] = 'media/upload/banner_harga';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000;
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->overwrite = true;
        if (!$this->upload->do_upload('berkas')) {
          $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
        }
        $filename = $filename . '.' . pathinfo($_FILES["berkas"]["name"], PATHINFO_EXTENSION);
        $this->m_user->m_update_catatan_harga(array('catatan' => $catatan, 'tanggal_update' => $tanggal_update, 'banner_harga' => $filename));
      } else {
        $this->m_user->m_update_catatan_harga(array('catatan' => $catatan, 'tanggal_update' => $tanggal_update));
      }
      $this->session->set_flashdata('message', $this->flash_success('Harga Diperbaharui'));
      redirect('user/ubah_info_harga', 'refresh');
      $this->session->set_flashdata('message', '');
    }
  }




  //Edit Profil User
  public function edit_profil()
  {
    if ($this->session->userdata('is_login') == true) {
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
          $this->m_user->m_update_profile('user', $username, $data);
        } else {
          $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
        }
      } else if ($this->form_validation->run() == TRUE && $is_exist_img == false) {
        $data['password'] = get_hash($password);
        $this->m_user->m_update_profile('user', $username, $data);
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
          $this->m_user->m_update_profile('user', $username, $data);
        } else {
          $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
        }
      } else {
        $this->m_user->m_update_profile('user', $username, $data);
      }
      $this->session->set_flashdata('message', $this->flash_success('Profil Berhasil Diperbaharui'));
      $db = $this->m_user->m_cek_username()->row();
      $data_login = array(
        'sitenow' => 'user',
        'is_login' => TRUE,
        'id_user' => $db->id_user,
        'id_pks' => $db->id_pks,
        'username' => $db->username,
        'nama' => $db->nama,
        'profile' => $db->foto_profil,
        'singkatan' => $db->singkatan
      );
      $this->session->set_userdata($data_login);
      redirect('user/profile', 'refresh');
      $this->session->set_flashdata('message', '');
    } else {
      redirect('user/', 'refresh');
    }
  }



  public function buat_pesanan()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') == "0") {
      redirect('user/', 'refresh');
    } else {
      $id_pks = $this->session->userdata('id_pks');
      if ($id_pks != "0") {
        $id_user = $this->session->userdata('id_user');
        $singkatan_pks = $this->session->userdata('singkatan');
        $id_produk = $this->input->post('id_produk');
        $jumlah_pesanan = $this->input->post('jumlah_pesanan');
        $message = "";
        $valid = false;
        $date = date("d-m-Y_H-i-s");

        if (!empty($_FILES['surat_1']['name'])) {
          $path = FCPATH . "media/upload/pesanan/$singkatan_pks/$date";
          if (!is_dir($path)) {
            mkdir($path, 0755, TRUE);
          }
          // File upload configuration 
          $file = "surat_pemesanan_$singkatan_pks" . "_" . $date . "_1";
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpeg|jpg|png|pdf';
          $config['max_size'] = 5000;
          $config['overwrite'] = true;
          $config['file_name'] = $file;

          // Load and initialize upload library 
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          // Upload file to server 
          if ($this->upload->do_upload('surat_1')) {
            $message = ('Surat 1 OK <br>');
            $valid = true;
          } else {
            $message .= $this->upload->display_errors() . "<br>";
          }
          $this->session->set_flashdata('message', $this->flash_info($message));
        } else {
          $message = "Surat 1 Kosong <br>";
        }
        if (!empty($_FILES['surat_2']['name'])) {
          $path = FCPATH . "media/upload/pesanan/$singkatan_pks/$date";
          if (!is_dir($path)) {
            mkdir($path, 0755, TRUE);
          }
          // File upload configuration 
          $file = "surat_pemesanan_$singkatan_pks" . "_" . $date . "_2";
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpeg|jpg|png|pdf';
          $config['max_size'] = 5000;
          $config['overwrite'] = true;
          $config['file_name'] = $file;

          // Load and initialize upload library 
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          // Upload file to server 
          if ($this->upload->do_upload('surat_2')) {
            $message .= ('Surat 2 OK <br>');
            $valid = true;
          } else {
            $message .= $this->upload->display_errors() . "<br>";
            $valid = false;
          }
          $this->session->set_flashdata('message', $this->flash_info($message));
        } else {
          $message .= "Surat 2 Kosong <br>";
          $valid = false;
        }
        if ($valid == true) {
          $data = array('id_pesanan' => '', 'id_user' => $id_user, 'id_pks' => $id_pks, 'id_produk' => $id_produk, 'status_pesanan' => '0', 'jumlah_pesanan' => $jumlah_pesanan, 'tanggal_pemesanan' => $date, 'tanggal_selesai' => ' ');
          $this->session->set_flashdata('message', $this->flash_success('Pesanan Berhasil Dikirim'));
          $this->m_user->m_buat_pesanan($data);
        } else {
          $this->session->set_flashdata('message', $this->flash_error($message));
        }
      } else {
        $this->session->set_flashdata('message', $this->flash_error('Admin Tidak Bisa Memesan Produk!'));
      }
      redirect('user/pemesanan_produk', 'refresh');
      $this->session->set_flashdata('message', '');
    }
  }
  public function ubah_pesanan()
  {
    if ($this->session->userdata('id_pks') == '0' && $this->session->userdata('is_login') == true) {
      $value = array('komentar' => $this->input->post('komentar[]'), 'option' => $this->input->post('opt[]'), 'action' => $this->input->post('act'));
      if (!empty($value['option'])) {
        if ($this->m_user->m_ubah_pesanan($value) == true) {
          $this->session->set_flashdata('message', $this->flash_success('Data Berhasil Diubah'));
        }
      } else {
        $this->session->set_flashdata('message', $this->flash_info('Tidak Ada Perubahan Diterapkan'));
      }
      redirect('user/manajemen_pesanan', 'refresh');
      $this->session->set_flashdata('message', '');
    } else {
      redirect('user', 'refresh');
    }
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
  private function dateUpdate()
  {
    $locale = 'id_ID';
    $dateObj = new DateTime;
    $formatter = new IntlDateFormatter(
      $locale,
      IntlDateFormatter::FULL,
      IntlDateFormatter::SHORT
    );
    $cDate = $formatter->format($dateObj);
    return substr($cDate, 0, -6) . " pukul " . substr($cDate, -5) . " WIB";
  }


  public function register()
  {
    if ($this->session->userdata('id_pks') == 0) {
      $pks = $this->db->query('SELECT dp.id_pks,dp.nama_pks FROM `daftar_nama_pks` AS dp WHERE id_pks>0 ORDER BY nama_pks ASC')->result_array();
      $this->load->view('header', array('page_title' => 'Form Register'));
      $this->load->view('user/admin_header');
      $this->load->view('user/form_register', array('nama_pks' => $pks));
      $this->load->view('footer');
    } else {
      redirect('user/', 'refresh');
    }
  }

  public function register_proses()
  {
    if ($this->session->userdata('id_pks') == '0') {

      $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
      $this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required|min_length[3]|max_length[45]|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

      if ($this->form_validation->run() == TRUE) {
        $data = array(
          'nama' => $this->input->post('nama'),
          'id_pks' => $this->input->post('id_pks'),
          'username' => $this->input->post('username'),
          'password' => get_hash($this->input->post('password'))
        );

        if ($this->m_user->m_register($data)) {

          $this->session->set_flashdata('message', $this->flash_success('Register berhasil, silahkan  Sign In.'));
          redirect('user/register', 'refresh');
        } else {

          $this->session->set_flashdata('message', $this->flash_error('Register user gagal!'));
          redirect('user/register', 'refresh');
        }
      } else {
        $this->session->set_flashdata('message', $this->flash_error('Isi data yang diperlukan dengan baik!'));
        redirect('user/register', 'refresh');
      }
    } else {
      redirect('user', 'refresh');
    }
  }
}
