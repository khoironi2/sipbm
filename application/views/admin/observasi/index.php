<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#formDataObservasi">
    <i class="fas fa-plus"></i>
    Tambah Data Observasi
</button>
<p><?php echo $this->session->flashdata('success'); ?></p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Observasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Koleksi</th>
                        <th>Nama ruang koleksi</th>
                        <th>Bahan</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <!-- <th>Tanggal observasi</th> -->
                        <th>Rekomendasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Koleksi</th>
                        <th>Nama ruang koleksi</th>
                        <th>Bahan</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <!-- <th>Tanggal observasi</th> -->
                        <th>Rekomendasi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($observasi as $data) : ?>
                        <tr>
                            <td><?= $no++  ?></td>
                            <td><?= $data->nama_koleksi; ?></td>
                            <td><?= $data->nama_ruang_koleksi; ?></td>
                            <td><?= $data->bahan_observasi_koleksi; ?></td>
                            <td><?= $data->keadaan_observasi_koleksi; ?></td>
                            <td><?= $data->no_vitrin_observasi_koleksi; ?></td>
                            <!-- <td><?= $data->time_observasi; ?></td> -->
                            <td><?= $data->rekomendasi_observasi_koleksi; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#ModalEdit<?= $data->id_koleksi; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalDetail<?= $data->id_koleksi; ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalUpdatePwd<?= $data->id_koleksi; ?>" class="btn btn-warning btn-sm"><i class="fas fa-key"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalHapus<?= $data->id_koleksi; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataObservasi" tabindex="-1" aria-labelledby="formDataObservasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataObservasiLabel">Form Tambah Data Observasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/postObservasi') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_koleksi">Nama koleksi</label>
                        <select class="form-control" id="id_koleksi" name="id_koleksi">
                            <?php foreach ($koleksi as $data) : ?>
                                <option value="<?= $data->id_koleksi; ?>"><?= $data->nama_koleksi; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_ruang_koleksi">Nama ruang koleksi</label>
                        <select class="form-control" id="id_ruang_koleksi" name="id_ruang_koleksi">
                            <?php foreach ($ruang as $dataruang) : ?>
                                <option value="<?= $dataruang->id_ruang_koleksi; ?>"><?= $dataruang->nama_ruang_koleksi; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bahan_observasi_koleksi">Bahan</label>
                        <input type="text" class="form-control" name="bahan_observasi_koleksi">
                        <input type="text" hidden class="form-control" name="id_users" value="<?= $users['id_users'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="keadaan_observasi_koleksi">Keadaan Koleksi</label>
                        <input type="text" class="form-control" name="keadaan_observasi_koleksi">
                    </div>

                    <div class="form-group">
                        <label for="no_vitrin_observasi_koleksi">No. Vitrin</label>
                        <input type="text" class="form-control" name="no_vitrin_observasi_koleksi">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_koleksi">Jumlah Koleksi</label>
                        <input type="text" class="form-control" name="jumlah_koleksi">
                    </div>

                    <div class="form-group">
                        <label for="time_create_observasi">Tanggal Observasi</label>
                        <input type="date" class="form-control" name="time_observasi">
                    </div>

                    <div class="form-group">
                        <label for="level">Rekomendasi</label>
                        <select name="rekomendasi_observasi_koleksi" class="form-control">
                            <option value="perawatan">Perawatan</option>
                            <option value="belum_rekomendasi">Belum Rekomendasi</option>
                            <option value="perbaikan">Perbaikan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Detail users -->
<?php foreach ($observasi as $data) : ?>
    <div class="modal fade" id="ModalDetail<?= $data->id_observasi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Observasi <?= $data->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $data->name; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $data->email; ?>" class="form-control" id="email" placeholder="Masukan email user">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?= $data->password; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" id="level">
                                <option value="<?= $datausers->level; ?>"><?= $datausers->level; ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Waktu Dibuat</label>
                            <input type="text" value="<?= $datausers->time_create_users; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Terakhir Login</label>
                            <input type="text" value="<?= $datausers->time_login_users; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Terakhir Logout</label>
                            <input type="text" value="<?= $datausers->time_logout_users; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php endforeach ?>
<!-- end Modal Detail Users -->

<!-- Modal Edit users -->
<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalEdit<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Users <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/updateUsers') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $datausers->name; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                            <input type="text" hidden name="id_users" value="<?= $datausers->id_users; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $datausers->email; ?>" class="form-control" id="email" placeholder="Masukan email user">
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" id="level">
                                <option value="<?= $datausers->level ?>"><?= $datausers->level ?></option>
                                <option value="admin">Admin</option>
                                <option value="pihak_pusat">Pihak Pusat</option>
                                <option value="pengelola">Pengelola</option>
                                <option value="petugas_perawatan">Petugas Perawatan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATALKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end Modal Edit Users -->

<!-- Modal Update password users -->
<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalUpdatePwd<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Passowrd <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/updatePwdUsers') ?>" method="POST">

                        <div class="form-group">
                            <input type="text" hidden name="id_users" value="<?= $datausers->id_users; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan password user">

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATALKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end Modal Update Password Users -->


<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalHapus<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Users <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Anda yakin ?</h4>
                        <p>Jika anda menghapus users <b><?= $datausers->name; ?></b> maka data dari user tersebut terhapus dari sistem !!. Jika ada kesalahan dan perlu di ubah maka lakukan update data dengan mengklik tombol EDIT yang berwarna hijau !!</p>
                        <hr>
                        <p class="mb-0">Namun jika memang anda sudah yakin maka silahkan klik tombol Yakin !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger" href="<?= base_url('Admin/deleteusers/' . $datausers->id_users) ?>">YAKIN !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>