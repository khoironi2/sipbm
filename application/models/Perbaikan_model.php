<?php

class Perbaikan_model extends CI_Model
{
    public function getAllImprovement()
    {
        // $query = "SELECT `tbl_permintaan_perbaikan`.*, `tbl_koleksi`.`nama_koleksi`
        //             FROM `tbl_permintaan_perbaikan` JOIN `tbl_koleksi`
        //               ON `tbl_permintaan_perbaikan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
        //         ";
        $query = "SELECT `tbl_permintaan_perbaikan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_ruang_koleksi`.`nama_ruang_koleksi`
        FROM `tbl_permintaan_perbaikan`
        INNER JOIN `tbl_koleksi` ON `tbl_permintaan_perbaikan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
        INNER JOIN `tbl_ruang_koleksi` ON `tbl_permintaan_perbaikan`.`id_ruang_koleksi` = `tbl_ruang_koleksi`.`id_ruang_koleksi`";

        return $this->db->query($query)->result_array();
    }

    public function getImprovementById($id)
    {
        return $this->db->get_where('tbl_permintaan_perbaikan', ['id_permintaan_perbaikan' => $id])->row_array();
    }
}