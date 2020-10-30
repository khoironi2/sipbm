<?php

class Admin extends CI_Controller
{
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
}