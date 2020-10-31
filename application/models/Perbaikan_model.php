<?php

class Perbaikan_model extends CI_Model
{
    public function getAllImprovement()
    {
        $query = "SELECT `tbl_permintaan_perbaikan`.*, `tbl_koleksi`.`nama_koleksi`
                    FROM `tbl_permintaan_perbaikan` JOIN `tbl_koleksi`
                      ON `tbl_permintaan_perbaikan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
                ";
        return $this->db->query($query)->result_array();
    }
}