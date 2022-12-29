<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{


        public function m_register()
        {

                $config['upload_path']          = 'assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 2000;
                $config['max_height']           = 2000;
                $config['overwrite']            = true;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('profil')) {
                        $this->status = array('status' => $this->upload->display_errors());
                } else {
                        $this->status = array('status' => $this->upload->data());

                        $name = $this->status['status']['orig_name'];
                        $data = array('banner_harga' => $name);
                        if ($this->m_user->m_update_image('info_harga', '1', $data) == 1) {
                                //$this->session->set_flashdata('pesan', flash_success('Berhasil Diperbaharui'));
                                redirect('/user/ubah_info_harga', 'refresh');
                        } else {
                                //$this->session->set_flashdata('pesan', flash_error('SQL ERROR'));
                                redirect('/user/ubah_info_harga', 'refresh');
                        }
                }

                $data = array(
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => get_hash($this->input->post('password'))
                );

                return $this->db->insert('user', $data);
        }

        public function m_cek_mail()
        {

                return $this->db->get_where('user', array('email' => $this->input->post('email')));
        }

        public function m_get_user($key)
        {
                return  $this->db->get_where('user', array('email' => $key));
        }

        public function m_update_data($table, $where, $data)
        {
                if ($this->m_checkNumeric($data) == TRUE) {
                        $this->db->where('id', $where);
                        return $this->db->update($table, $data);
                } else {
                        return "Data Mengandung Nilai Non-Numerik";
                }
        }


        public function m_update_profile($table, $where, $data)
        {
                $this->db->where('email', $where);
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
        function m_update_catatan_harga($data){
                $this->db->update('catatan_info_harga',array('catatan'=>$data));
        }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */