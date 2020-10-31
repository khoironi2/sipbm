<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
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
    // data users
    public function users()
    {
        $data = [
            'title' => 'Admin | Users'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['allusers'] = $this->Users_model->getAllUsers();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/users/index');
        $this->load->view('templates/footer');
    }
    public function registerFormUsers()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin/users');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pass,
                'level' => $level,
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');
                redirect('Admin/users');
            }
        }
    }

    public function updateUsers()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin/users');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $id = $this->input->post('id_users');
            $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'level' => $level,
                'time_update_users' => date('Y-m-d H:i:s')
            ];
            $update = $this->Users_model->update($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
                redirect('Admin/users');
            }
        }
    }

    public function updatePwdUsers()
    {
        $password = $this->input->post('password');
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $id = $this->input->post('id_users');

        // date_default_timezone_set("ASIA/JAKARTA");
        $data = [
            'password' => $pass,
            'time_update_users' => date('Y-m-d H:i:s')
        ];
        $update = $this->Users_model->update($id, $data);
        if ($update) {
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
            redirect('Admin/users');
        }
    }

    public function deleteusers($id)
    {
        $data['id_users'] = $this->Users_model->delete($id);
        $data['id_users'] = $this->Users_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('Admin/users');
    }


    //end data users
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
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('admin');
            }
        }
        $data = [
            'title' => 'Admin | Koleksi'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->Jenis_koleksi_model->getAll();
        $data['koleksi'] = $this->Koleksi_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/koleksi/index', $data);
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
    public function doTambahBerita()
    {
        $this->form_validation->set_rules(
            'nama_koleksi',
            'nama koleksi',
            'required',
            array('required' => 'Nama Koleksi Harus di Isi')
        );

        $this->form_validation->set_rules(
            'panjang_koleksi',
            'Panjang Koleksi',
            'required',
            'required',
            array('required' => 'Panjang Koleksi Harus di Isi')
        );
        $this->form_validation->set_rules(
            'lebar_koleksi',
            'Lebar Koleksi',
            'required',
            'required',
            array('required' => 'Lebar Koleksi Harus di Isi')
        );
        $this->form_validation->set_rules(
            'berat_koleksi',
            'Berat Koleksi',
            'required',
            'required',
            array('required' => 'Berat Koleksi Harus di Isi')
        );
        $this->form_validation->set_rules(
            'tahun_koleksi',
            'Tahun Koleksi',
            'required',
            'required',
            array('required' => 'Tahun Koleksi Harus di Isi')
        );

        if ($this->form_validation->run() ===  FALSE) {
            $this->koleksi();
        } else {
            //CONFIGURASI UPLOAD IMAGE
            $config['upload_path']         = './assets/upload/post';
            $config['allowed_types']     = 'jpg|png|svg|jpeg';
            $config['max_size']         = '12000';

            $this->load->library('upload', $config);

            //PROSES UPLOAD IMAGE
            if (!$this->upload->do_upload('gambar_koleksi')) {
                $data['errors']     = $this->upload->display_errors();
                print_r($data);
            } else {
                //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/post/' . $upload_data['uploads']['file_name'];
                $config['new_image']         = './assets/upload/post/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['quality']             = "100%";
                $config['max_size'] = '100M';
                $config['maintain_ratio']     = FALSE;
                $config['width']             = 5028; // Pixel
                $config['height']             = 3364; // Pixel
                $config['x_axis']             = 0;
                $config['y_axis']             = 0;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                //PROSES MASUK KEDATABASE
                //$slug = url_title($this->input->post('judul_post'), 'dash', TRUE);
                //date_default_timezone_set("ASIA/JAKARTA");
                $data = array(
                    'nama_koleksi'         => $this->input->post('nama_koleksi'),
                    //'slug_post'        => $slug,
                    'id_jenis_koleksi'    => $this->input->post('id_jenis_koleksi'),
                    'panjang_koleksi'        => $this->input->post('panjang_koleksi'),
                    'lebar_koleksi'        => $this->input->post('lebar_koleksi'),
                    'berat_koleksi'        => $this->input->post('berat_koleksi'),
                    'tahun_koleksi'        => $this->input->post('tahun_koleksi'),
                    'time_create_koleksi'    => date('Y-m-d H:i:s'),
                    'gambar_koleksi'        => $upload_data['uploads']['file_name'],
                    'id_users'        => $this->input->post('id_users')
                );

                $this->Koleksi_model->insert($data);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');

                redirect(site_url('Admin/koleksi'));
            }
        }
    }

    public function UpdateGambarKoleksi()
    {
        $id = $this->input->post('id_koleksi');


        //CONFIGURASI UPLOAD IMAGE
        $config['upload_path']         = './assets/upload/post';
        $config['allowed_types']     = 'jpg|png|svg|jpeg';
        $config['max_size']         = '12000';

        $this->load->library('upload', $config);

        //PROSES UPLOAD IMAGE
        if (!$this->upload->do_upload('gambar_koleksi')) {
            $data['errors']     = $this->upload->display_errors();
            print_r($data);
        } else {
            //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
            $upload_data                = array('uploads' => $this->upload->data());
            // Image Editor
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/post/' . $upload_data['uploads']['file_name'];
            $config['new_image']         = './assets/upload/post/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['quality']             = "100%";
            $config['max_size'] = '100M';
            $config['maintain_ratio']     = FALSE;
            $config['width']             = 5028; // Pixel
            $config['height']             = 3364; // Pixel
            $config['x_axis']             = 0;
            $config['y_axis']             = 0;
            $config['thumb_marker']     = '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //PROSES MASUK KEDATABASE
            //$slug = url_title($this->input->post('judul_post'), 'dash', TRUE);
            //date_default_timezone_set("ASIA/JAKARTA");
            $data = array(
                'time_update_koleksi'    => date('Y-m-d H:i:s'),
                'gambar_koleksi'        => $upload_data['uploads']['file_name'],
                'id_users'        => $this->input->post('id_users')
            );

            $this->Koleksi_model->update($id, $data);

            $this->session->set_flashdata('succses', 'Berita Berhasil di Tambahkan');

            redirect(site_url('Admin/koleksi'));
        }
    }

    public function updateKoleksi()

    {
        $nama_koleksi = $this->input->post('nama_koleksi');
        $id_jenis_koleksi = $this->input->post('id_jenis_koleksi');
        $panjang_koleksi = $this->input->post('panjang_koleksi');
        $lebar_koleksi = $this->input->post('lebar_koleksi');
        $berat_koleksi = $this->input->post('berat_koleksi');
        $tahun_koleksi = $this->input->post('tahun_koleksi');
        $id_users = $this->input->post('id_users');

        $id = $this->input->post('id_koleksi');

        $data = [
            'nama_koleksi' => $nama_koleksi,
            'id_jenis_koleksi' => $id_jenis_koleksi,
            'panjang_koleksi' => $panjang_koleksi,
            'lebar_koleksi' => $lebar_koleksi,
            'berat_koleksi' => $berat_koleksi,
            'tahun_koleksi' => $tahun_koleksi,
            'id_users' => $id_users,
            'time_update_koleksi' => date('Y-m-d H:i:s')
        ];

        $update = $this->Koleksi_model->update1($id, $data);

        if ($update) {

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
            redirect('admin/koleksi');
        }
    }

    public function updatekoleksssi()
    {
        $this->form_validation->set_rules('nama_koleksi', 'nama koleksi', 'required');
        $this->form_validation->set_rules('id_jenis_koleksi', 'jenis koleksi', 'required');
        $this->form_validation->set_rules('panjang_koleksi', 'panjang koleksi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin');
        } else {
            $nama_koleksi = $this->input->post('nama_koleksi');
            $id_jenis_koleksi = $this->input->post('id_jenis_koleksi');
            $id = $this->input->post('id_koleksi');
            $panjang_koleksi = $this->input->post('panjang_koleksi');
            $lebar_koleksi = $this->input->post('lebar_koleksi');
            $berat_koleksi = $this->input->post('berat_koleksi');
            $tahun_koleksi = $this->input->post('tahun_koleksi');
            $id_users = $this->input->post('id_users');
            //date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'nama_koleksi' => $nama_koleksi,
                'id_jenis_koleksi' => $id_jenis_koleksi,
                'panjang_koleksi' => $panjang_koleksi,
                'lebar_koleksi' => $lebar_koleksi,
                'berat_koleksi' => $berat_koleksi,
                'tahun_koleksi' => $tahun_koleksi,
                //'time_update_koleksi' => date('Y-m-d H:i:s'),
                'id_users' => $id_users
            ];
            $update = $this->Koleksi_model->update($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
                redirect('Admin/koleksi');
            }
        }
    }

    public function deletekoleksi($id)
    {
        $data['id_koleksi'] = $this->Koleksi_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('Admin/koleksi');
    }

    //end Koleksi

    // observasi
    public function observasi()
    {
        $data = [
            'title' => 'Admin | Observasi'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['koleksi'] = $this->Koleksi_model->getAll();
        $data['ruang'] = $this->Ruang_koleksi_model->getAll();
        $data['observasi'] = $this->Observasi_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/observasi/index', $data);
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

    public function updateObservasi()
    {

        $id_koleksi = $this->input->post('id_koleksi');
        $id_ruang_koleksi = $this->input->post('id_ruang_koleksi');
        $bahan_observasi_koleksi = $this->input->post('bahan_observasi_koleksi');
        $keadaan_observasi_koleksi = $this->input->post('keadaan_observasi_koleksi');
        $no_vitrin_observasi_koleksi = $this->input->post('no_vitrin_observasi_koleksi');
        $jumlah_koleksi = $this->input->post('jumlah_koleksi');
        $time_observasi = $this->input->post('time_observasi');
        $rekomendasi_observasi_koleksi = $this->input->post('rekomendasi_observasi_koleksi');
        $id_users = $this->input->post('id_users');
        $id = $this->input->post('id_observasi');

        $data = [
            'id_koleksi' => $id_koleksi,
            'id_ruang_koleksi' => $id_ruang_koleksi,
            'bahan_observasi_koleksi' => $bahan_observasi_koleksi,
            'keadaan_observasi_koleksi' => $keadaan_observasi_koleksi,
            'no_vitrin_observasi_koleksi' => $no_vitrin_observasi_koleksi,
            'jumlah_koleksi' => $jumlah_koleksi,
            'time_observasi' => $time_observasi,
            'rekomendasi_observasi_koleksi' => $rekomendasi_observasi_koleksi,
            'time_update_observasi' => date('Y-m-d H:i:s'),
            'id_users' => $id_users
        ];

        $insert = $this->Observasi_model->update($id, $data);

        if ($insert) {

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil di Update !</div>');
            redirect('admin/observasi');
        }
    }

    public function postObservasi()
    {

        $id_koleksi = $this->input->post('id_koleksi');
        $id_ruang_koleksi = $this->input->post('id_ruang_koleksi');
        $bahan_observasi_koleksi = $this->input->post('bahan_observasi_koleksi');
        $keadaan_observasi_koleksi = $this->input->post('keadaan_observasi_koleksi');
        $no_vitrin_observasi_koleksi = $this->input->post('no_vitrin_observasi_koleksi');
        $jumlah_koleksi = $this->input->post('jumlah_koleksi');
        $time_observasi = $this->input->post('time_observasi');
        $rekomendasi_observasi_koleksi = $this->input->post('rekomendasi_observasi_koleksi');
        $id = $this->input->post('id_users');

        $data = [
            'id_koleksi' => $id_koleksi,
            'id_ruang_koleksi' => $id_ruang_koleksi,
            'bahan_observasi_koleksi' => $bahan_observasi_koleksi,
            'keadaan_observasi_koleksi' => $keadaan_observasi_koleksi,
            'no_vitrin_observasi_koleksi' => $no_vitrin_observasi_koleksi,
            'jumlah_koleksi' => $jumlah_koleksi,
            'time_observasi' => $time_observasi,
            'rekomendasi_observasi_koleksi' => $rekomendasi_observasi_koleksi,
            'time_create_observasi' => date('Y-m-d H:i:s'),
            'id_users' => $id
        ];

        $insert = $this->Observasi_model->tambah('tbl_observasi', $data);

        if ($insert) {

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');
            redirect('admin/observasi');
        }
    }

    public function deleteObservasi($id)
    {
        $data['id_observasi'] = $this->Observasi_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('Admin/observasi');
    }

    // observasi
    public function petugas()
    {
        $data = [
            'title' => 'Admin | Petugas'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->Petugas_model->getpetugas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/petugas/index', $data);
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

    public function registerPetugas()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_users', 'alamat', 'required');
        $this->form_validation->set_rules('telepon_users', 'telepon', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin/users');
        } else {

            $name = $this->input->post('name');
            $alamat_users = $this->input->post('alamat_users');
            $telepon_users = $this->input->post('telepon_users');

            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'alamat_users' => $alamat_users,
                'telepon_users' => $telepon_users,
                'level' => 'petugas_perawatan',
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data petugas berhasil ditambahkan !</div>');
                redirect('Admin/petugas');
            }
        }
    }

    public function updatePetugas()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_users', 'alamat', 'required');
        $this->form_validation->set_rules('telepon_users', 'telepon', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin/users');
        } else {
            $name = $this->input->post('name');
            $alamat_users = $this->input->post('alamat_users');
            $telepon_users = $this->input->post('telepon_users');
            $id = $this->input->post('id_users');

            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'alamat_users' => $alamat_users,
                'telepon_users' => $telepon_users,
                'time_update_users' => date('Y-m-d H:i:s')
            ];
            $update = $this->Users_model->update($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
                redirect('Admin/petugas');
            }
        }
    }

    public function deletePetugas($id)
    {
        $data['id_users'] = $this->Users_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('Admin/petugas');
    }

    // end petugas

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

        $this->form_validation->set_rules('bahan_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('keadaan_koleksi_permintaan_perbaikan', 'Keadaan koleksi', 'required');
        $this->form_validation->set_rules('no_vitrin_permintaan_perbaikan', 'no vitrin', 'required');
        $this->form_validation->set_rules('time_permintaan_perbaikan', 'tanggal permintaan', 'required');

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

    public function update_perbaikan($id)
    {
        $data = [
            'title' => 'Admin | Update Perbaikan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'collection_rooms' => $this->db->get('tbl_ruang_koleksi')->result_array(),
            'improvement' => $this->Perbaikan_model->getImprovementById($id),
        ];

        $old_image = $data["improvement"]["gambar_kerusakan_permintaan_perbaikan"];

        // form validations
        $this->form_validation->set_rules('bahan_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('keadaan_koleksi_permintaan_perbaikan', 'Keadaan koleksi', 'required');
        $this->form_validation->set_rules('no_vitrin_permintaan_perbaikan', 'no vitrin', 'required');
        $this->form_validation->set_rules('time_permintaan_perbaikan', 'tanggal permintaan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perbaikan/update');
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
                'time_update_permintaan_perbaikan' => date("Y-m-d h:i:sa")
            ];

            $upload_image = $_FILES['gambar_kerusakan_permintaan_perbaikan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/perbaikan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_kerusakan_permintaan_perbaikan')) {
                    // $old_image = $data['improvement']['gambar_kerusakan_permintaan_perbaikan'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/perbaikan/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_kerusakan_permintaan_perbaikan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perbaikan Berhasil Diubah</div>');
            // $this->db->insert('tbl_permintaan_perbaikan', $data);
            $this->db->where('id_permintaan_perbaikan', $this->input->post('id_permintaan_perbaikan'));
            $this->db->update('tbl_permintaan_perbaikan', $data);
            redirect('admin/perbaikan');
        }
    }

    public function deletePerbaikan($id)
    {
        $data = [
            'improvement' => $this->Perbaikan_model->getImprovementById($id),
        ];

        $old_image = $data["improvement"]["gambar_kerusakan_permintaan_perbaikan"];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/perbaikan/' . $old_image);
        }

        $this->db->delete('tbl_permintaan_perbaikan', ['id_permintaan_perbaikan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perbaikan Berhasil Dihapus!</div>');
        redirect('admin/perbaikan');
    }

    // perbaikan
    public function perawatan()
    {
        $data = [
            'title' => 'Admin | Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];
<<<<<<< HEAD

        // validations
        $this->form_validation->set_rules('no_vitrin_permintaan_perbaikan', 'no vitrin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perawatan/index');
            $this->load->view('templates/footer');
        } else {
            echo 'ok';
        }
=======
        $data['petugas'] = $this->Petugas_model->getpetugas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perawatan/index');
        $this->load->view('templates/footer');
>>>>>>> 3c929739e8673795105655e22007f9bb490411bc
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
