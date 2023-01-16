<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function m_add_complaint($data)
    {
        $this->db->insert('review', $data);
        return $this->db->last_query();
    }
    public function m_balas_komplain($data)
    {
        $check_id_balasan = ($this->db->query('SELECT `id_balasan` FROM `balasan_komplain` WHERE `id_balasan`=' . $data['id_balasan'])->result_array()[0]['id_balasan']);
        if (!isset($check_id_balasan)) {
            $this->db->insert('balasan_komplain', $data);
            echo $this->db->last_query();
            echo "<br>";
            $this->db->where('id', $data['id_balasan']);
            $this->db->update('review', array('id_balasan' => $data['id_balasan']));
        } else {
            $this->db->where('id_balasan', $data['id_balasan']);
            $this->db->update('balasan_komplain', $data);
            echo $this->db->last_query();
            echo "<br>";
            $this->db->reset_query();
            $this->db->query('UPDATE `reviewSET `id_balasan` = ' . $data["id_balasan"] . ' WHERE `id` =' . $data["id_balasan"] . '');
        }
    }

    public function m_get_complaint()
    {
        return $this->db->get('review')->result_array();
    }
    public function m_get_balasan($id)
    {
        $result = $this->db->get_where('balasan_komplain', array('id_balasan' => $id))->result_array()[0];
        if (isset($result)) {
            return  $result;
        }
    }
    public function m_get_stok()
    {
        $this->db->where('id', 1);
        return $this->db->get('stok_sparepart_pmt')->result_array()[0];
    }
    public function m_get_catatan()
    {
        return $this->db->get('catatan_info_harga')->result_array()[0];
    }
}
