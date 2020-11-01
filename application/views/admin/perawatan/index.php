<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Perawatan</li>
    </ol>
</nav>

<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-4 mt-2" data-toggle="modal" data-target="#formDataPerbaikan">
    <i class="fas fa-plus"></i>
    Tambah Data Perawatan
</button>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Perawatan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama petugas</th>
                        <th>Nama koleksi</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <th>Tanggal perawatan</th>
                        <th>Kegiatan</th>
                        <th>Bahan yang digunakan</th>
                        <th>Tambahan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama petugas</th>
                        <th>Nama koleksi</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <th>Tanggal perawatan</th>
                        <th>Kegiatan</th>
                        <th>Bahan yang digunakan</th>
                        <th>Tambahan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($perawatan as $per) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $per["name"] ?></td>
                            <td><?= $per["nama_koleksi"]; ?></td>
                            <td><?= $per["keadaan_koleksi_perawatan"]; ?></td>
                            <td><?= $per["no_vitrin_koleksi_perawatan"]; ?></td>
                            <td><?= $per["time_perawatan"]; ?></td>
                            <td><?= $per["kegiatan_perawatan"]; ?></td>
                            <td><?= $per["bahan_perawatan"]; ?></td>
                            <td><?= $per["tambahan_perawatan"]; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail_perawatan/' . $per["id_perawatan"]); ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('admin/update_perawatan/' . $per["id_perawatan"]); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Data perawatan akan terhapus');" href="<?= base_url('admin/deletePerawatan/' . $per["id_perawatan"]); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataPerbaikan" tabindex="-1" aria-labelledby="formDataPerbaikanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataPerbaikanLabel">Form Tambah Data Perawatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/perawatan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_users">Nama Petugas</label>
                        <select class="form-control" id="id_users" name="id_users">
                            <option disabled>-- pilih petugas --</option>
                            <?php foreach ($petugas as $pet) : ?>
                                <option value="<?= $pet["id_users"] ?>"><?= $pet["name"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_koleksi">Nama koleksi</label>
                        <select class="form-control" id="id_koleksi" name="id_koleksi">
                            <option disabled>-- pilih koleksi --</option>
                            <?php foreach ($collections as $collection) : ?>
                                <option value="<?= $collection["id_koleksi"] ?>"><?= $collection["nama_koleksi"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keadaan_koleksi_perawatan">Keadaan Koleksi</label>
                        <input type="text" class="form-control" id="keadaan_koleksi_perawatan" name="keadaan_koleksi_perawatan">
                        <?= form_error('keadaan_koleksi_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="no_vitrin_koleksi_perawatan">No. vitrin</label>
                        <input type="text" class="form-control" id="no_vitrin_koleksi_perawatan" name="no_vitrin_koleksi_perawatan">
                        <?= form_error('no_vitrin_koleksi_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="time_perawatan">Tanggal Perawatan</label>
                        <input type="date" class="form-control" id="time_perawatan" name="time_perawatan">
                        <?= form_error('time_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="kegiatan_perawatan">Kegiatan</label>
                        <textarea id="kegiatan_perawatan" class="form-control" name="kegiatan_perawatan"></textarea>
                        <?= form_error('kegiatan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="bahan_perawatan">Bahan yang digunakan</label>
                        <textarea id="bahan_perawatan" class="form-control" name="bahan_perawatan"></textarea>
                        <?= form_error('bahan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="tambahan_perawatan">Tambahan</label>
                        <input type="text" class="form-control" id="tambahan_perawatan" name="tambahan_perawatan">
                        <?= form_error('tambahan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>