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
    var_dump($this->session->userdata());
    // if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('singkatan') == 'admin') {
    //   redirect('user/admin_dashboard', 'refresh');
    // } else if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('singkatan') != 'admin') {
    //   redirect('user/user_dashboard', 'refresh');
    // } else {
    //   $data['page_title'] = "Log In";
    //   $this->load->view('main/header.php', $data);
    //   $this->load->view('user/login_header.php');
    //   $this->load->view('user/form_login.php');
    //   $this->load->view('main/footer.php');
    // }
  }

  public function admin_dashboard()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $data['page_title'] = "Admin Dashboard";
      $this->load->view('main/header.php', $data);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/admin_dashboard.php');
      $this->load->view('main/footer.php');
    }
  }
  public function user_dashboard()
  {
    if ($this->session->userdata('is_login') == true && $this->session->userdata('id_pks') != "0") {
      $data['page_title'] = "User Dashboard";
      $this->load->view('main/header.php', $data);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/user_dashboard.php');
      $this->load->view('main/footer.php');
    } else {
      $this->session->set_flashdata('message', $this->flash_info('Silakan Login Terlebih Dahulu!'));
      redirect('user/', 'refresh');
    }
  }

  public function daftar_pesanan()
  {
    if ($this->session->userdata('is_login') == true && $this->session->userdata('id_pks') != "0") {
      $data_pesanan = $this->m_user->m_daftar_pesanan($this->session->userdata('id_pks'));
      $surat = array();
      for ($i = 0; $i < count($data_pesanan); $i++) {
        $path = FCPATH . "media/upload/pesanan/" . $data_pesanan[$i]['singkatan'] . "/" . $data_pesanan[$i]['tanggal_pemesanan'] . "";
        $foldername_array = directory_map($path);
        if (!empty($foldername_array)) {
          for ($xi = 0; $xi < count($foldername_array); $xi++) {
            $surat[$data_pesanan[$i]['tanggal_pemesanan']][$xi] = ($foldername_array[$xi]);
          }
        }
      }
      $data['page_title'] = "Daftar Pesanan";
      $this->load->view('main/header.php', $data);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/pesanan_saya.php', array('data_pesanan' => $data_pesanan, 'surat' => $surat));
      $this->load->view('main/footer.php');
    } else {
      redirect('user/', 'refresh');
    }
  }

  public function ubah_info_stok()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $info_stok = $this->m_user->m_get_stok();
      $data['page_title'] = "Ubah Info Stok Sparepart";
      $this->load->view('main/header.php', $data);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/info_stok.php', $info_stok);
      $this->load->view('main/footer.php');
    }
  }

  public function ubah_info_harga()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $data = $this->m_user->m_get_catatan();
      $title['page_title'] = "Ubah Informasi Harga";
      $this->load->view('main/header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/info_harga.php', $data);
      $this->load->view('main/footer.php');
    }
  }
  public function pemesanan_produk()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') == "0") {
      redirect('user/', 'refresh');
    } else {
      $data = array('produk_pmt' => $this->db->query('select * from produk_pmt order by nama_produk ASC')->result_array());
      $title['page_title'] = "Pemesanan Produk";
      $this->load->view('main/header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/pemesanan_produk.php', $data);
      $this->load->view('main/footer.php');
    }
  }

  public function manajemen_review()
  {
    if ($this->session->userdata('is_login') == TRUE && $this->session->userdata('id_pks') == '0') {

      $data_review = $this->m_user->m_get_data_review();
      $title['page_title'] = "Manajemen Review Produk";
      $this->load->view('main/header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/manajemen_review', array('data_review' => $data_review));
      $this->load->view('main/footer.php');
    } else {
      redirect('user/', 'refresh');
    }
  }



  public function c_hapus_review()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $id_review = $this->input->post('id_review');
      $this->m_user->m_hapus_review($id_review);
      $this->session->set_flashdata('message', $this->flash_success('Review Berhasil Dihapus'));
      redirect('user/manajemen_review');
      $this->session->set_flashdata('message', '');
    }
  }

  public function c_tampilkan_review()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      if ($this->m_user->m_tampilkan_review($this->input->post('id_review')) == '1') {
        $this->session->set_flashdata('message', $this->flash_success('Review Ditampilkan'));
      } else {
        $this->session->set_flashdata('message', $this->flash_error('Error'));
      }
      redirect('user/manajemen_review');
      $this->session->set_flashdata('message', '');
    }
  }

  //Balas Review
  public function c_balas_review()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $path = "";
      $message = "";
      $nama = $this->input->post('nama_reviewer');
      $gambar_balasan = $this->input->post('gambar_balasan');
      $id_review = $this->input->post('id-review');
      $balasan = $this->input->post('balasan-review');
      $timestamp = $this->dateUpdate();
      if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
        $date = date("Y-m-d_H-i-s");
        if (!isset($gambar_balasan) || empty($gambar_balasan) || $gambar_balasan == "") {
          $folder = $nama . "_" . $date;
          $gambar_balasan = $folder;
        } else {
          $folder = $gambar_balasan;
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
          $file = $nama . "_" . $date . "_" . $i;
          $config['upload_path']          = $path;
          $config['allowed_types']        = 'jpeg|jpg|png';
          $config['max_size']             = 5000;
          $config['overwrite']            = true;
          $config['allowed_types'] = 'jpeg|jpg|png';
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
      $data = array('id_balasan' => $id_review, 'tanggal_balasan' => $timestamp, 'balasan' => $balasan, 'gambar_balasan' => $gambar_balasan);
      $this->m_user->m_balas_review($data);
      redirect('user/manajemen_review');
      $this->session->set_flashdata('message', '');
    }
  }

  //Ubah Review
  public function c_sembunyikan_review()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $this->m_user->m_sembunyikan_review($this->input->post('id_review'));
      $this->session->set_flashdata('message', $this->flash_success('Review Disembunyian'));
      redirect('user/manajemen_review');
      $this->session->set_flashdata('message', '');
    }
  }



  public function manajemen_pesanan()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != '0') {
      redirect('user/', 'refresh');
    } else {
      $data_pesanan = $this->m_user->m_manajemen_pesanan();
      $surat = array();
      for ($i = 0; $i < count($data_pesanan); $i++) {
        $path = FCPATH . "media/upload/pesanan/" . $data_pesanan[$i]['singkatan'] . "/" . $data_pesanan[$i]['tanggal_pemesanan'] . "";
        $foldername_array = directory_map($path);
        if (!empty($foldername_array)) {
          for ($xi = 0; $xi < count($foldername_array); $xi++) {
            $surat[$data_pesanan[$i]['tanggal_pemesanan']][$xi] = ($foldername_array[$xi]);
          }
        }
      }
      $title['page_title'] = "Manajemen Pesanan Produk";
      $this->load->view('main/header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/manajemen_pesanan', array('data_pesanan' => $data_pesanan, 'surat' => $surat));
      $this->load->view('main/footer.php');
    }
  }

  //Profil User
  public function user_profile()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('user/', 'refresh');
    } else {
      $userdata = array('nama' => $this->session->userdata('nama'), 'profile' => $this->session->userdata('profile'), 'username' => $this->session->userdata('username'));
      $title['page_title'] = "Profil User";
      $this->load->view('main/header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/ubah_profil.php', $userdata);
      $this->load->view('main/footer.php');
    }
  }

  public function reset_user()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $data_user = array('data_user' => $this->m_user->m_list_user());
      $title['page_title'] = "Reset Password User";
      $this->load->view('main/header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/reset_user.php', $data_user);
      $this->load->view('main/footer.php');
    }
  }
  public function action_reset_user()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $id_user = $this->input->post('id_user');
      $this->m_user->m_reset_user($id_user);
    }
  }


  public function login_proses()
  {
    $this->form_validation->set_rules('username', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

    if ($this->form_validation->run() == TRUE) {

      if ($this->m_user->m_cek_username()->num_rows() == 1) {
        $db = $this->m_user->m_cek_username()->row();
        if (hash_verified($this->input->post('password'), $db->password)) {
          $last_active = intval($this->m_user->m_get_user_last_active($db->id_user));
          $difference = time() - $last_active;
          if ($difference > 15) {
            $this->m_user->m_set_user_last_active($db->id_user, time());
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
            $this->session->set_flashdata('message', $this->flash_success('Login Berhasil!'));
            if ($this->session->userdata('id_pks') == '0') {
              redirect('user/admin_dashboard', 'refresh');
            } else {
              redirect('user/user_dashboard', 'refresh');
            }

            $this->session->set_flashdata('message', '');
          } else {
            $this->session->set_flashdata('message', $this->flash_error('Login Gagal! <br> Akun Sedang Digunakan!'));
            redirect('user/', 'refresh');
            $this->session->set_flashdata('message', '');
            $this->session->sess_destroy();
          }
          $this->session->set_flashdata('message', $this->flash_success('Login Berhasil!'));
          redirect('user/admin_dashboard', 'refresh');
        } else {
          $this->session->set_flashdata('message', $this->flash_error('Login gagal: username atau password salah!'));
          $this->session->set_flashdata('username', $this->input->post('username'));
          redirect('user', 'refresh');
          $this->session->set_flashdata('message', '');
        }
      } else {
        $this->session->set_flashdata('username', $this->input->post('username'));
        $this->session->set_flashdata('message', $this->flash_error('Login gagal: username tidak terdaftar!'));
        redirect('user', 'refresh');
      }
    } else {
      $this->session->set_flashdata('username', $this->input->post('username'));
      $this->session->set_flashdata('message', $this->flash_error('Login gagal: username atau password salah!'));
      redirect('user', 'refresh');
    }
    $this->session->set_flashdata('message', '');
  }



  public function logout()
  {
    $this->session->unset_userdata('sitenow');
    $this->session->unset_userdata('is_login');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('username');
    if ($this->session->userdata('id_user') != null || !empty($this->session->userdata('id_user'))) {
      $this->m_user->m_set_user_last_active($this->session->userdata('id_user'), (time() - 15));
    }
    $this->session->sess_destroy();
    $this->load->library('session');
    $this->session->set_flashdata('message', $this->flash_success('Log Out Berhasil'));
    $sitenow = $this->session->userdata('sitenow');
    redirect($sitenow, 'refresh');
    $this->session->sess_destroy();
  }

  public function update_stok()
  {
    if ($this->session->userdata('is_login') == FALSE || $this->session->userdata('id_pks') != "0") {
      redirect('user/', 'refresh');
    } else {
      $tanggal_update = $this->dateUpdate();
      $data = array(
        'tanggal_update' => $tanggal_update,
        'lori_rebusan' => $this->input->post('lori_rebusan', TRUE),
        'roda_lori' => $this->input->post('roda_lori', TRUE),
        'bushing_lori' => $this->input->post('bushing_lori', TRUE),
        'fruit_elevator' => $this->input->post('fruit_elevator', TRUE),
        'as_thresher' => $this->input->post('as_thresher', TRUE),
        'tromol_thresher' => $this->input->post('tromol_thresher', TRUE),
        'body_cbc' => $this->input->post('body_cbc', TRUE),
        'gantungan_cbc' => $this->input->post('gantungan_cbc', TRUE),
        'pedal_cbc' => $this->input->post('pedal_cbc', TRUE),
        'body_polishdrum' => $this->input->post('body_polishdrum', TRUE),
        'roll_body_polishdrum' => $this->input->post('roll_body_polishdrum', TRUE),
        'roll_bawah_polishdrum' => $this->input->post('roll_bawah_polishdrum', TRUE),
        'gear_polishdrum' => $this->input->post('gear_polishdrum', TRUE),
        'dewatering_drum' => $this->input->post('dewatering_drum', TRUE),
        'bottom_cone_inti' => $this->input->post('bottom_cone_inti', TRUE),
        'bottom_cone_cangkang' => $this->input->post('bottom_cone_cangkang', TRUE),
        'vortex_finder' => $this->input->post('vortex_finder', TRUE),
        'feed_housing' => $this->input->post('feed_housing', TRUE),
        'body_cyclone' => $this->input->post('body_cyclone', TRUE),
        'separating_cyclone' => $this->input->post('separating_cyclone', TRUE),
        'box_control' => $this->input->post('box_control', TRUE)
      );
      $result = $this->m_user->m_update_stok($data);
      if ($result == 1) {
        $result = "Data Sukses Diperbaharui";
        $this->session->set_flashdata('message', $this->flash_success($result));
      } else {
        $this->session->set_flashdata('message', $this->flash_error($result));
      }
      redirect('/user/ubah_info_stok', 'refresh');
      $this->session->set_flashdata('message', '');
    }
  }

  //ajax last active

  public function ajax_set_user_last_active()
  {
    if ($this->session->userdata('is_login') === true) {
      $this->m_user->m_set_user_last_active($this->session->userdata('id_user'), time());
    }
  }
  public function ajax_update_comment()
  {
    if ($this->session->userdata('is_login') === true && $this->session->userdata('id_pks') == '0') {
      $id_pesanan = $this->input->post('id_pesanan');
      $komentar = $this->input->post('komentar');
      $this->m_user->m_set_user_comment($id_pesanan, $komentar);
    }
  }

  //ajax get balasan
  public function ajax_get_balasan()
  {
    if ($this->session->userdata('is_login') === true && $this->session->userdata('id_pks') == '0') {
      $id_balasan = $this->input->post('id_balasan');
      echo json_encode($this->m_user->m_get_balasan($id_balasan));
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
      redirect('user/user_profile', 'refresh');
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
