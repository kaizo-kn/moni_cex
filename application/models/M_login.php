<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function m_cek_username($username)
        {
        return $this->db->select('user.*,daftar_nama_pks.singkatan')
        ->from('user')
        ->where('username',$username)
        ->join('daftar_nama_pks','id_pks')
        ->get();
        }
        public function m_set_user_last_active($id_user, $time)
        {
                return $this->db->query("UPDATE `user` SET `last_active`='$time' WHERE `id_user` = $id_user");
        }
        public function m_get_user_last_active($id_user)
        {
                return $this->db->query("SELECT `last_active` FROM `user` WHERE `id_user` = $id_user")->result_array()[0]['last_active'];
        }
}
