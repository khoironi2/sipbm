<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#formDataKoleksi">
    <i class="fas fa-plus"></i>
    Tambah Data Koleksi
</button>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Koleksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Berat</th>
                        <th>Tahun</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Berat</th>
                        <th>Tahun</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>US001</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>2011/04/25</td>
                        <td>2011/04/25</td>
                        <td>2011/04/25</td>
                        <td>
                            <a href="<?= base_url('admin/update_koleksi') ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataKoleksi" tabindex="-1" aria-labelledby="formDataKoleksiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formDataKoleksiLabel">Form Tambah Data Koleksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_koleksi">Nama Koleksi</label>
                    <input type="text" class="form-control" id="nama_koleksi" name="nama_koleksi">
                </div>

                <div class="form-group">
                    <label for="jenis_koleksi">Jenis Koleksi</label>
                    <input type="text" class="form-control" id="jenis_koleksi" name="jenis_koleksi">
                </div>

                <div class="form-group">
                    <label for="panjang_koleksi">Panjang</label>
                    <input type="text" class="form-control" id="panjang_koleksi" name="panjang_koleksi">
                </div>

                <div class="form-group">
                    <label for="lebar_koleksi">Lebar</label>
                    <input type="text" class="form-control" id="lebar_koleksi" name="lebar_koleksi">
                </div>

                <div class="form-group">
                    <label for="berat_koleksi">Berat</label>
                    <input type="text" class="form-control" id="berat_koleksi" name="berat_koleksi">
                </div>

                <div class="form-group">
                    <label for="koleksi_tahun">Koleksi Tahun</label>
                    <input type="text" class="form-control" id="koleksi_tahun" name="koleksi_tahun">
                </div>

                <div class="form-group">
                    <label for="gambar_koleksi">Foto Koleksi</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar_koleksi" name="gambar_koleksi">
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