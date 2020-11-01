<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head><body>
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
</body></html>