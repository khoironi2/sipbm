<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">laporan Perbaikan</li>
    </ol>
</nav>

<div class="row">
    <div class="col-xl-7">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <form action="<?= base_url('admin/laporan_perbaikan_pdf'); ?>" method="POST">
                    <div class="form-group">
                        <label for="dari">Dari</label>
                        <input type="date" class="form-control" id="dari" name="keyword1">
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai</label>
                        <input type="date" class="form-control" id="sampai" name="keyword2">
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



<div class="card shadow mt-4">
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
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($improvements as $improvement) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $improvement["nama_koleksi"]; ?></td>
                            <td><?= $improvement["nama_ruang_koleksi"]; ?></td>
                            <td><?= $improvement["bahan_permintaan_perbaikan"]; ?></td>
                            <td><?= $improvement["keadaan_koleksi_permintaan_perbaikan"]; ?></td>
                            <td><?= $improvement["no_vitrin_permintaan_perbaikan"]; ?></td>
                            <td><?= $improvement["time_permintaan_perbaikan"]; ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/perbaikan/' . $improvement["gambar_kerusakan_permintaan_perbaikan"]); ?>" width="70" class="img-thumbnail" alt=""></td>
                            <td>
                                <?php if ($improvement['status_permintaan_perbaikan'] == "closed") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-secondary"> Closed</a>
                                <?php } elseif ($improvement['status_permintaan_perbaikan'] == "waiting") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-warning"> waiting</a>
                                <?php } elseif ($improvement['status_permintaan_perbaikan'] == "finish") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-danger"> Open</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
