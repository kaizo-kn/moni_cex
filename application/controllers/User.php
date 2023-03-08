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
  public function list_week_in_year()
  {
    $weeklist = array();
    $result = array();
    for ($i = 1; $i <= 12; $i++) {
      if ($i < 10) {
        $month = "0$i";
      } else {
        $month = $i;
      }
      $year = date('Y');
      $tdays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
      $result[$i] = $this->db->query("SELECT WEEK('$year-$month-$tdays') - WEEK(DATE_FORMAT('$year-$month-01', '%Y-%m-01')) + 1 AS '$month'")->result_array()[0][$month];
    }
    foreach ($result as $keys => $values) {
      if (intval($keys) < 10) {
        $ms = "0$keys";
      } else {
        $ms = $keys;
      }
      $monthname =  date("M", strtotime("2023-{$ms}-01"));
      for ($i = 0; $i < intval($values); $i++) {
        $m = ($i + 1);
        $week_name['weekname'] = "W" . $m . " $monthname";
        $week_name['weeknum'] =  "w$m-m$keys";
        array_push($weeklist, $week_name);
      }
    }
    return $weeklist;
  }
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
      $this->load->view('__partials/header.php', array('page_title' => 'Progress Lap. Investasi'));
      $this->load->view('__partials/menu.php', array('m2' => 'nav-menu-active'));
      $this->load->view('user/lap_invest', array_merge($data_pekerjaan, array('weeklist' => $this->list_week_in_year())));
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
      $this->load->view('user/pengawasan_pekerjaan_lap.php', $data);
      $this->load->view('__partials/footer.php');
    } else {
      redirect('login', 'refresh');
    }
  }

  public function input_progress_lap()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      $id_pks = $this->session->userdata('id_pks');
      $selected = "";
      $selected = $this->input->get('selected');
      $list_pekerjaan = $this->db->query("SELECT uraian_pekerjaan.id_pekerjaan,uraian_pekerjaan, MAX(persentase) AS persentase FROM uraian_pekerjaan JOIN persentase_progress ON uraian_pekerjaan.id_pekerjaan = persentase_progress.id_pekerjaan WHERE id_pks = $id_pks GROUP BY uraian_pekerjaan.id_pekerjaan ORDER BY id_pekerjaan DESC")->result_array();
      $this->load->view('__partials/header.php', array('page_title' => 'Input Progress Lap. Investasi'));
      $this->load->view('__partials/menu.php');
      $this->load->view('user/input_progress_lap.php', array('list_pekerjaan' => $list_pekerjaan, 'selected' => $selected));
      $this->load->view('__partials/footer.php');
    } else {
      redirect('login', 'refresh');
    }
  }


  public function input_pengawasan_lap()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      $id_pks = $this->session->userdata('id_pks');
      $s_id_pekerjaan = $this->input->get('s_id_pekerjaan');
      $list_pekerjaan = $this->db->query("SELECT id_pekerjaan,uraian_pekerjaan FROM uraian_pekerjaan WHERE id_pks = $id_pks ORDER BY id_pekerjaan DESC")->result_array();
      $this->load->view('__partials/header.php', array('page_title' => 'Input Progress Lap. Investasi'));
      $this->load->view('__partials/menu.php');
      $this->load->view('user/input_pengawasan_lap.php', array('list_pekerjaan' => $list_pekerjaan, 's_id_pekerjaan' => $s_id_pekerjaan, 's_item' => $s_id_pekerjaan = $this->input->get('s_item')));
      $this->load->view('__partials/footer.php');
    } else {
      redirect('login', 'refresh');
    }
  }


  public function input_progress()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      $id_pekerjaan = $this->input->post('id_pekerjaan');
      $persentase_progress = $this->input->post('persentase_progress');
      $res = $this->m_user->m_input_persentase($id_pekerjaan, $persentase_progress);
      if ($res['status'] == 1) {
        $this->session->set_flashdata('message', $this->flash_info($res['message']));
      } else {
        $this->session->set_flashdata('message', $this->flash_error($res['message']));
      }
      redirect('user/input_progress_lap', 'refresh');
    } else {
      redirect('login', 'refresh');
    }
  }

  public function input_pengawasan()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      $id_pekerjaan = $this->input->post('id_pekerjaan');
      $dokumentasi = $this->input->post('id_dokumentasi');
      $res = $this->m_user->m_input_pengawasan($id_pekerjaan, $dokumentasi);
      if ($res['status'] == 1) {
        $this->session->set_flashdata('message', $this->flash_info($res['message']));
      } else {
        $this->session->set_flashdata('message', $this->flash_error($res['message']));
      }
      redirect('user/input_pengawasan_lap', 'refresh');
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
  //ajax get list pekerjaan
  public function ajax_get_list_dokumentasi()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      echo json_encode($this->m_user->m_ajax_get_list_dokumentasi($this->input->post('id_pekerjaan')));
    } else {
      echo json_encode(array('message' => 'forbidden'));
    }
  }

  //ajax get history
  public function ajax_get_history()
  {
    if ($this->session->userdata('is_login') == TRUE) {
      $data = $this->m_user->m_ajax_get_history($this->input->post('id_pekerjaan'));
      echo $data;
    } else {
      echo json_encode(array('message' => 'forbidden'));
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
