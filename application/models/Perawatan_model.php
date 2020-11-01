<?php 

class Perawatan_model extends CI_Model
{
    public function getAllPerawatan()
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`";

        return $this->db->query($query)->result_array();
    }

    public function insertDataPerawatan()
    {
        $data = [
            'id_users' => $this->input->post('id_users'),
            'id_koleksi' => $this->input->post('id_koleksi'),
            'keadaan_koleksi_perawatan' => $this->input->post('keadaan_koleksi_perawatan'),
            'no_vitrin_koleksi_perawatan' => $this->input->post('no_vitrin_koleksi_perawatan'),
            'time_perawatan' => $this->input->post('time_perawatan'),
            'kegiatan_perawatan' => $this->input->post('kegiatan_perawatan'),
            'bahan_perawatan' => $this->input->post('bahan_perawatan'),
            'tambahan_perawatan' => $this->input->post('tambahan_perawatan'),
            'time_create_perawatan' => date("Y-m-d h:i:sa"),
            'time_update_perawatan' => date("Y-m-d h:i:sa"),
        ];

        $this->db->insert('tbl_perawatan', $data);
    }

    public function getPerawatanById($id)
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`
              WHERE `tbl_perawatan`.`id_perawatan` = $id
              ";

        return $this->db->query($query)->row_array();
    }

    public function updateDataPerawatan($id)
    {
        $data = [
            'id_users' => $this->input->post('id_users'),
            'id_koleksi' => $this->input->post('id_koleksi'),
            'keadaan_koleksi_perawatan' => $this->input->post('keadaan_koleksi_perawatan'),
            'no_vitrin_koleksi_perawatan' => $this->input->post('no_vitrin_koleksi_perawatan'),
            'time_perawatan' => $this->input->post('time_perawatan'),
            'kegiatan_perawatan' => $this->input->post('kegiatan_perawatan'),
            'bahan_perawatan' => $this->input->post('bahan_perawatan'),
            'tambahan_perawatan' => $this->input->post('tambahan_perawatan'),
            'time_update_perawatan' => date("Y-m-d h:i:sa"),
        ];

        $this->db->where('id_perawatan', $this->input->post('id_perawatan'));
        $this->db->update('tbl_perawatan', $data);
    }

    public function getAllHistory()
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`
              WHERE `tbl_perawatan`.`validasi_perawatan` = 'sudah'
              ";

        return $this->db->query($query)->result_array();
    }

    public function getPerawatanByDate($keyword1, $keyword2)
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`";

        $this->db->where('time_perawatan >=', $keyword1);
        $this->db->where('time_perawatan <=', $keyword2);

        return $this->db->query($query)->result_array();
    }
}