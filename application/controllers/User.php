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


  public function index()
  {

    if ($this->session->userdata('is_login') == TRUE) {
      redirect('user/admin_dashboard', 'refresh');
    }

    $data['page_title'] = "Log In";
    $this->load->view('header.php', $data);
    $this->load->view('user/login_header.php');
    $this->load->view('user/form_login.php');
    $this->load->view('main/footer.php');
  }

  public function admin_dashboard()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('/', 'refresh');
    } else {
      $data['page_title'] = "Admin Dashboard";
      $this->load->view('main/header.php', $data);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/admin_dashboard.php');
      $this->load->view('main/footer.php');
    }
  }

  public function ubah_info_stok()
  {

    if ($this->session->userdata('is_login') == FALSE) {
      redirect('/', 'refresh');
    } else {
      $data['page_title'] = "Ubah Info Stok Sparepart";
      $this->load->view('main/header.php', $data);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/info_stok.php');
      $this->load->view('main/footer.php');
    }
  }


  public function ubah_info_harga()
  {
    $data = $this->m_user->m_get_catatan();
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('/', 'refresh');
    } else {
      $title['page_title'] = "Ubah Informasi Harga";
      $this->load->view('header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/info_harga.php', $data);
      $this->load->view('main/footer.php');
    }
  }

  //Profil User
  public function user_profile()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('user/', 'refresh');
    } else {
      $title['page_title'] = "Profil User";
      $this->load->view('header.php', $title);
      $this->load->view('user/admin_header.php');
      $this->load->view('user/ubah_profil.php');
      $this->load->view('main/footer.php');
    }
  }

  public function login_proses()
  {
    $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

    if ($this->form_validation->run() == TRUE) {

      if ($this->m_user->m_cek_mail()->num_rows() == 1) {

        $db = $this->m_user->m_cek_mail()->row();
        if (hash_verified($this->input->post('password'), $db->password)) {
          $data_login = array(
            'sitenow' => 'user',
            'is_login' => TRUE,
            'email'  => $db->email,
            'nama'   => $db->nama,
            'profile'   => $db->profile_pic
          );
          $this->session->set_userdata($data_login);
          $this->session->set_flashdata('message', $this->flash_success('Login Berhasil!'));
          redirect('user/admin_dashboard', 'refresh');
        } else {
          $this->session->set_flashdata('message', $this->flash_error('Login gagal: email atau password salah!'));
          redirect('user', 'refresh');
          $this->session->set_flashdata('message', '');
        }
      } else {
        $this->session->set_flashdata('message', $this->flash_error('Login gagal: email tidak terdaftar!'));
        redirect('user', 'refresh');
      }
    } else {
      $this->session->set_flashdata('message', $this->flash->error('Login gagal: email atau password salah!'));
      redirect('user', 'refresh');
    }
    $this->session->set_flashdata('message', '');
  }



  public function logout()
  {
    $sitenow = $this->session->userdata('sitenow');
    $this->session->unset_userdata('sitenow');
    $this->session->unset_userdata('is_login');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('email');
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', $this->flash_success('Log Out Berhasil'));
    redirect($sitenow, 'refresh');
  }

  public function update_data()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('/', 'refresh');
    } else {
      $table = "stok_sparepart_PMT";
      $where = "1";
      $tanggal_update = dateUpdate();
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
      $result = $this->m_user->m_update_data($table, $where, $data);
      if ($result == 1) {
        $result = "Data Sukses Diperbaharui";
      }
      $this->session->set_flashdata('message', $this->flash_success($result));
      redirect('/user/ubah_info_stok', 'refresh');
      $this->session->set_flashdata('message', '');
    }
  }



  //Upload File
  public function upload_info_harga()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('/', 'refresh');
    } else {
      $catatan = $this->input->post('catatan');
      if (!empty($_FILES['berkas']['name'])) {
        delete_files('media/upload/banner_harga/');
        $config['upload_path']          = 'media/upload/banner_harga';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['overwrite']            = true;
        $config['file_name']            = 'banner_harga';
        $this->load->library('upload', $config);
        $this->upload->overwrite = true;
        if (!$this->upload->do_upload('berkas')) {
          $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
        }        
      }else{
        $this->m_user->m_update_catatan_harga($catatan);
        $this->session->set_flashdata('message', $this->flash_success('Harga Diperbaharui'));
      }
      $this->ubah_info_harga();
      $this->session->set_flashdata('message', '');
    }
  }




  //Edit Profil User
  public function edit_profil()
  {
    if ($this->session->userdata('is_login') == FALSE) {
      redirect('/', 'refresh');
    } else {
      $data = null;
      $wp = false;
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
      if (!$this->input->post('password') == "") {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');
        $wp = true;
      }

      if ($this->form_validation->run() == TRUE) {
        if (empty($_FILES['berkas']['name'])) {
          if ($wp == true) {
            $data = array(
              'nama' => $this->input->post('nama'),
              'password' =>  get_hash($this->input->post('password')),
            );
          } else {
            $data = array(
              'nama' => $this->input->post('nama'),
            );
          }
          $this->m_user->m_update_profile('user', $this->session->userdata['email'], $data);
          $this->session->set_flashdata('message', $this->flash_success('Profil Berhasil Diperbaharui'));
          $db = $this->m_user->m_cek_mail()->row();
          $data_login = array(
            'sitenow' => 'user',
            'is_login' => TRUE,
            'email'  => $db->email,
            'nama'   => $db->nama,
            'profile'   => $db->profile_pic
          );
          $this->session->set_userdata($data_login);
        } else {
          $config['upload_path']          = 'assets/img/profile_picture/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 5000;
          $config['overwrite']            = true;
          $config['file_name']            = 'profile';
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('berkas')) {
            $this->status = array('status' => $this->upload->display_errors());
            $this->session->set_flashdata('message', $this->flash_error($this->upload->display_errors()));
          } else {
            $this->status = array('status' => $this->upload->data());
            $profile = 'profile.' . pathinfo($_FILES["berkas"]["name"], PATHINFO_EXTENSION);
            if ($wp == true) {
              $data = array(
                'nama' => $this->input->post('nama'),
                'password' =>  get_hash($this->input->post('password')),
                'profile_pic' => $profile
              );
            } else {
              $data = array(
                'nama' => $this->input->post('nama'),
                'profile_pic' => $profile
              );
            }
            $this->m_user->m_update_profile('user', $this->session->userdata['email'], $data);
            $this->session->set_flashdata('message', $this->flash_success('Profil Berhasil Diperbaharui'));
            $db = $this->m_user->m_cek_mail()->row();
            $data_login = array(
              'sitenow' => 'user',
              'is_login' => TRUE,
              'email'  => $db->email,
              'nama'   => $db->nama,
              'profile'   => $db->profile_pic
            );
            $this->session->set_userdata($data_login);
          }
        }
      } else {
        $this->session->set_flashdata('message', $this->flash_error('Unknown Error Ocurred'));
      }
      $this->user_profile();
      $this->session->set_flashdata('message', '');
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
}
function dateUpdate()
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

/* End of file User.php */
/* Location: ./application/controllers/User.php */

 /*
  public function register()
  {

    if ($this->session->userdata('is_login') == TRUE) {
      redirect('user/admin_dashboard', 'refresh');
    }
    $this->load->view('header', array('page_title' => 'Form Register'));
    $this->load->view('user/admin_header');
    $this->load->view('user/form_register');
    $this->load->view('footer');
  }

  public function register_proses()
  {

    $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
    $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[user.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

    if ($this->form_validation->run() == TRUE) {

      if ($this->m_user->m_register()) {

        $this->session->set_flashdata('message', 'Register berhasil, silahkan  Sign In.');
        redirect('user/register', 'refresh');
      } else {

        $this->session->set_flashdata('message', 'Register user gagal!');
        redirect('user/register', 'refresh');
      }
    } else {
      $this->template->load('user/form_register');
    }
  }

  */