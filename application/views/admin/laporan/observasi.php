<div class="row">
    <div class="col-xl-7">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <form action="<?= base_url('admin/laporan_observasi_pdf'); ?>" method="POST">
                    <div class="form-group">
                        <label for="dari">Dari</label>
                        <input type="date" class="form-control" id="dari" name="dari">
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai</label>
                        <input type="date" class="form-control" id="sampai" name="sampai">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($observasi)) : ?>
<a href="<?= base_url('admin/laporan_observasi_pdf'); ?>" class="btn btn-danger mt-5">
    <i class="fas fa-file"></i>    
    Export PDF
</a>
<div class="card shadow mb-4 mt-3">
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
                        <th>Tanggal observasi</th>
                        <th>Rekomendasi</th>
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
                        <th>Tanggal observasi</th>
                        <th>Rekomendasi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($observasi as $data) : ?>
                        <tr>
                            <td><?= $no++  ?></td>
                            <td><?= $data["nama_koleksi"]; ?></td>
                            <td><?= $data["nama_ruang_koleksi"]; ?></td>
                            <td><?= $data["bahan_observasi_koleksi"]; ?></td>
                            <td><?= $data["keadaan_observasi_koleksi"]; ?></td>
                            <td><?= $data["no_vitrin_observasi_koleksi"]; ?></td>
                            <td><?= $data["time_observasi"]; ?></td>
                            <td><?= $data["rekomendasi_observasi_koleksi"]; ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="alert alert-danger mt-5">
        Data tanggal yang dicari belum ditemukan!
    </div>
<?php endif; ?>