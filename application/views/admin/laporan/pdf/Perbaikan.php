<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head><body>
    <h1>SISTEM INFORMASI PERAWATAN BENDA MUSEUM</h1>
    <h1>LAPORAN PERBAIKAN</h1>
    <p><span>Range Date </span></span>:<?= $awal; ?> - <?= $akhir; ?></p>
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
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($improvements as $improvement) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $improvement->nama_koleksi; ?></td>
                    <td><?= $improvement->nama_ruang_koleksi; ?></td>
                    <td><?= $improvement->bahan_permintaan_perbaikan; ?></td>
                    <td><?= $improvement->keadaan_koleksi_permintaan_perbaikan; ?></td>
                    <td><?= $improvement->no_vitrin_permintaan_perbaikan; ?></td>
                    <td><?= $improvement->time_permintaan_perbaikan; ?></td>
                    <td class="text-center"><img src="<?= base_url('assets/img/perbaikan/' . $improvement->gambar_kerusakan_permintaan_perbaikan); ?>" width="70" class="img-thumbnail" alt=""></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body></html>