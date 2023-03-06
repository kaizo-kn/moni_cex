<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('m_login');
    }


    public function index()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            if (
                $this->session->userdata('singkatan') == 'admin'
            ) {
                redirect('admin', 'refresh');
            } else {
                redirect('user', 'refresh');
            }
        } else {
            $data['page_title'] = "Log In";
            $this->load->view('__partials/form_login.php', $data);
        }
    }

    public function login_process()
    {
        $this->form_validation->set_rules('username', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $db = $this->m_login->m_cek_username($username);
            if ($db->num_rows() == 1) {
                $db = $db->row();
                if (hash_verified($this->input->post('password'), $db->password)) {
                    $last_active = intval($this->m_login->m_get_user_last_active($db->id_user));
                    $difference = time() - $last_active;
                    if (intval($difference) > 15) {
                        $this->m_login->m_set_user_last_active($db->id_user, time());
                        $data_login = array(
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
                            redirect('admin/', 'refresh');
                        } else {
                            redirect('user/', 'refresh');
                        }
                        $this->session->set_flashdata('message', '');
                    } else {
                        $this->session->set_flashdata('message', $this->flash_error('Login Gagal! <br> Akun Sedang Digunakan!'));
                        $this->session->set_flashdata('username', $this->input->post('username'));
                        redirect('login/', 'refresh');
                        $this->session->set_flashdata('message', '');
                        $this->session->sess_destroy();
                    }
                } else {
                    $this->session->set_flashdata('message', $this->flash_error('Login gagal: username atau password salah!'));
                    $this->session->set_flashdata('username', $this->input->post('username'));
                    redirect('login/', 'refresh');
                    $this->session->set_flashdata('message', '');
                }
            } else {
                $this->session->set_flashdata('username', $this->input->post('username'));
                $this->session->set_flashdata('message', $this->flash_error('Login gagal: username tidak terdaftar!'));
                redirect('login/', 'refresh');
            }
        } else {
            $this->session->set_flashdata('username', $this->input->post('username'));
            $this->session->set_flashdata('message', $this->flash_error('Login gagal: Periksa Data!'));
            redirect('login/', 'refresh');
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
            $this->m_login->m_set_user_last_active($this->session->userdata('id_user'), (time() - 15));
        }
        $this->session->set_flashdata('message', $this->flash_success('Log Out Berhasil'));
        $sitenow = $this->session->userdata('sitenow');
        redirect($sitenow, 'refresh');
        $this->session->sess_destroy();
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
