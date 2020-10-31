<?php

class Admin extends CI_Controller
{
    // |------------------------------------------------------
    // | Dashboard
    // |------------------------------------------------------
    public function index()
    {
        $data = [
            'title' => 'Admin | Dashboard'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
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
            'title' => 'Admin | Perbaikan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perbaikan/index');
        $this->load->view('templates/footer');
    }

    public function update_perbaikan()
    {
        $data = [
            'title' => 'Admin | Update Perbaikan'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perbaikan/update');
        $this->load->view('templates/footer');
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
}