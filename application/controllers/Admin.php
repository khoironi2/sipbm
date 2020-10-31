<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
    }

    // |------------------------------------------------------
    // | Dashboard
    // |------------------------------------------------------

    public function index()
    {
        $data = [
            'title' => 'Admin | Dashboard'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard/index');
        $this->load->view('templates/footer');
    }

    // |------------------------------------------------------
    // | Data Master
    // |------------------------------------------------------
    // users
    public function users()
    {
        $data = [
            'title' => 'Admin | Users'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/users/index');
        $this->load->view('templates/footer');
    }

    public function update_users()
    {
        $data = [
            'title' => 'Admin | Update User'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/users/update');
        $this->load->view('templates/footer');
    }

    // koleksi
    public function koleksi()
    {
        $data = [
            'title' => 'Admin | Koleksi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/koleksi/index');
        $this->load->view('templates/footer');
    }

    public function update_koleksi()
    {
        $data = [
            'title' => 'Admin | Koleksi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/koleksi/update');
        $this->load->view('templates/footer');
    }

    // observasi
    public function observasi()
    {
        $data = [
            'title' => 'Admin | Observasi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/observasi/index');
        $this->load->view('templates/footer');
    }

    public function update_observasi()
    {
        $data = [
            'title' => 'Admin | Update Observasi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/observasi/update');
        $this->load->view('templates/footer');
    }

    // observasi
    public function petugas()
    {
        $data = [
            'title' => 'Admin | Petugas'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/petugas/index');
        $this->load->view('templates/footer');
    }

    public function update_petugas()
    {
        $data = [
            'title' => 'Admin | Update Petugas'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/petugas/update');
        $this->load->view('templates/footer');
    }

    // |------------------------------------------------------
    // | Kegiatan
    // |------------------------------------------------------
    // perbaikan
    public function perbaikan()
    {
        $data = [
            'title' => 'Admin | Perbaikan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'collection_rooms' => $this->db->get('tbl_ruang_koleksi')->result_array(),
            'improvements' => $this->Perbaikan_model->getAllImprovement(),
        ];

        var_dump($data['improvements']);

        $this->form_validation->set_rules('bahan_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('keadaan_koleksi_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('no_vitrin_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('time_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perbaikan/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_koleksi' => $this->input->post('id_koleksi', true),
                'id_ruang_koleksi' => $this->input->post('id_ruang_koleksi', true),
                'id_users' => $data["users"]["id_users"],
                'bahan_permintaan_perbaikan' => $this->input->post('bahan_permintaan_perbaikan', true),
                'keadaan_koleksi_permintaan_perbaikan' => $this->input->post('keadaan_koleksi_permintaan_perbaikan', true),
                'no_vitrin_permintaan_perbaikan' => $this->input->post('no_vitrin_permintaan_perbaikan', true),
                'time_permintaan_perbaikan' => $this->input->post('time_permintaan_perbaikan', true),
                'validasi_permintaan_perbaikan' => 'belum',
                'status_permintaan_perbaikan' => 'closed',
                'time_create_permintaan_perbaikan' => date("Y-m-d h:i:sa"),
                'time_update_permintaan_perbaikan' => date("Y-m-d h:i:sa")
            ];

            $upload_image = $_FILES['gambar_kerusakan_permintaan_perbaikan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/perbaikan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_kerusakan_permintaan_perbaikan')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_kerusakan_permintaan_perbaikan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perbaikan Berhasil Ditambahkan</div>');
            $this->db->insert('tbl_permintaan_perbaikan', $data);
            redirect('admin/perbaikan');
        }            
    }

    public function update_perbaikan()
    {
        $data = [
            'title' => 'Admin | Update Perbaikan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        // form validations
        $this->form_validation->set_rules('menu', 'Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perbaikan/update');
            $this->load->view('templates/footer');
        } else {
            echo 'ok';
        }
    }

    // perbaikan
    public function perawatan()
    {
        $data = [
            'title' => 'Admin | Perawatan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perawatan/index');
        $this->load->view('templates/footer');
    }

    public function update_perawatan()
    {
        $data = [
            'title' => 'Admin | Update Perawatan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perawatan/update');
        $this->load->view('templates/footer');
    }

    public function detail_perawatan()
    {
        $data = [
            'title' => 'Admin | Detail Perawatan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perawatan/show');
        $this->load->view('templates/footer');
    }

    // |------------------------------------------------------
    // | LAPORAN
    // |------------------------------------------------------
    // history perawatan
    public function history()
    {
        $data = [
            'title' => 'Admin | History Perawatan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/history/index');
        $this->load->view('templates/footer');
    }

    public function laporan_observasi()
    {
        $data = [
            'title' => 'Admin | Laporan Observasi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/observasi');
        $this->load->view('templates/footer');
    }

    public function laporan_perbaikan()
    {
        $data = [
            'title' => 'Admin | History Perbaikan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/perbaikan');
        $this->load->view('templates/footer');
    }

    public function laporan_perawatan()
    {
        $data = [
            'title' => 'Admin | History Perawatan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/perawatan');
        $this->load->view('templates/footer');
    }

    // |------------------------------------------------------
    // | ADMIN PANEL
    // |------------------------------------------------------
    // profile
    public function profile()
    {
        $data = [
            'title' => 'Admin | Profile'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/profile/index');
        $this->load->view('templates/footer');
    }
}