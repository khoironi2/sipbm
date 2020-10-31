<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#formDataPerbaikan">
    <i class="fas fa-plus"></i>
    Tambah Data Perbaikan
</button>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Perbaikan</h6>
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
                        <th>Tanggal Perbaikan</th>
                        <th>Foto kerusakan</th>
                        <th>Status</th>
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
                        <th>Tanggal Perbaikan</th>
                        <th>Foto kerusakan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>US001</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>2011/04/25</td>
                        <td>2011/04/25</td>
                        <td>2011/04/25</td>
                        <td>
                            <a href="<?= base_url('admin/update_perbaikan') ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
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
            <h5 class="modal-title" id="formDataPerbaikanLabel">Form Tambah Data Perbaikan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_koleksi">Nama koleksi</label>
                    <select class="form-control" id="id_koleksi" name="id_koleksi">
                        <option disabled>-- pilih koleksi --</option>
                        <option value="admin">Foto</option>
                        <option value="pihak_pusat">Minatur Pesawat</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_ruang_koleksi">Nama ruang koleksi</label>
                    <select class="form-control" id="id_ruang_koleksi" name="id_ruang_koleksi">
                        <option disabled>-- pilih koleksi --</option>
                        <option value="admin">Bagian dalam</option>
                        <option value="pihak_pusat">Bagian pojok lemari</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bahan_observasi_koleksi">Bahan</label>
                    <input type="text" class="form-control" id="bahan_observasi_koleksi" name="bahan_observasi_koleksi">
                </div>

                <div class="form-group">
                    <label for="keadaan_observasi_koleksi">Keadaan Koleksi</label>
                    <textarea type="text" class="form-control" id="keadaan_observasi_koleksi" name="keadaan_observasi_koleksi"></textarea>
                </div>

                <div class="form-group">
                    <label for="no_vitrin_observasi_koleksi">No. Vitrin</label>
                    <input type="text" class="form-control" id="no_vitrin_observasi_koleksi" name="no_vitrin_observasi_koleksi">
                </div>

                <div class="form-group">
                    <label for="tanggal_perbaikan">Tanggal Perbaikan</label>
                    <input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan">
                </div>

                <div class="form-group">
                    <label for="foto_kerusakan">Foto Kerusakan</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto_kerusakan" name="foto_kerusakan">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>