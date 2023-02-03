<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function m_add_review($data)
    {
        $this->db->insert('review', $data);
        return $this->db->last_query();
    }
    

    public function m_get_data_review()
    {
            $reviews = $this->db->select('*')
                    ->from('review')
                    ->join('balasan_review', 'review.id_review=balasan_review.id_balasan', 'left')
                    ->where('is_hidden','0')
                    ->order_by('review.id_review','desc')
                    ->get()
                    ->result_array();
            return $reviews;
    }
    public function m_get_balasan($id)
    {
        $result = $this->db->get_where('balasan_review', array('id_balasan' => $id))->result_array()[0];
        if (isset($result)) {
            return  $result;
        }
    }
    public function m_get_stok()
    {
        $r_id_produk_array = null;
        $new_result_array = null;
        $new_t_pesanan_array = null;
        $result = $this->db->query("SELECT* FROM `stok_produk_pmt` ")->result_array();
        $t_pesanan = $this->db->query("SELECT pr.nama_alias_produk,IFNULL(SUM(ps.jumlah_pesanan),0) AS jumlah_pesanan 
        FROM `produk_pmt` AS pr 
        LEFT JOIN (select p.id_produk,p.jumlah_pesanan from pesanan as p where p.status_pesanan in (0,1,null)) as ps USING (id_produk) 
        GROUP BY nama_alias_produk;")->result_array();
        $daftar_produk = $this->db->query("SELECT produk_pmt.id_produk,produk_pmt.nama_alias_produk FROM `produk_pmt`;")->result_array();
        if (count($daftar_produk)>0) {
           
            for ($i = 0; $i < count($daftar_produk); $i++) {
                $id_produk = $daftar_produk[$i]['id_produk'];
                $nama_alias_produk = "id_p_" . $daftar_produk[$i]['nama_alias_produk'];
                
                $r = $this->db->query("SELECT `id_pesanan` FROM `pesanan` WHERE `id_produk` = '$id_produk'")->result_array();
                
                if (count($r)>0) {
                    for ($xi = 0; $xi < count($r); $xi++) {
                        $r_id_produk_array[$nama_alias_produk][$xi] = $r[$xi]['id_pesanan'];
                    }
                } else if(count($r)==0){
                    $r_id_produk_array[$nama_alias_produk][0] = "";
                }
            }
        }


        if (isset($t_pesanan)) {
            for ($i = 0; $i < count($t_pesanan); $i++) {
                $key = $t_pesanan[$i]['nama_alias_produk'];
                $val = $t_pesanan[$i]['jumlah_pesanan'];
                $new_t_pesanan_array["p_" . $key] = $val;
            }
        }

        if (isset($result)) {
            for ($i = 0; $i < count($result); $i++) {
                $key = $result[$i]['nama_alias_produk'];
                if ($key == "tanggal_update") {
                    $val = $result[$i]['tanggal_update'];
                } else {
                    $val = $result[$i]['jumlah_stok'];
                }

                $new_result_array[$key] = $val;
            }
        }
        
        return array_merge($new_result_array, $new_t_pesanan_array, $r_id_produk_array);
       
    }


    public function m_get_catatan()
    {
        return $this->db->get('catatan_info_harga')->result_array()[0];
    }

    public function m_get_json_data($id_pesanan)

    {
        $result = ($this->db->query("SELECT dp.nama_pks,ps.status_pesanan,ps.jumlah_pesanan,ps.tanggal_pemesanan,ps.komentar FROM `pesanan` AS ps INNER JOIN `daftar_nama_pks` AS dp USING (id_pks) WHERE id_pesanan IN ($id_pesanan) ORDER BY dp.nama_pks ASC;")->result_array());
        return json_encode($result);
    }
   
}
