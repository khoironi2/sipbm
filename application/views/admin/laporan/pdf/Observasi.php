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
                    <td><?= $data->nama_koleksi; ?></td>
                    <td><?= $data->nama_ruang_koleksi; ?></td>
                    <td><?= $data->bahan_observasi_koleksi; ?></td>
                    <td><?= $data->keadaan_observasi_koleksi; ?></td>
                    <td><?= $data->no_vitrin_observasi_koleksi; ?></td>
                    <td><?= $data->time_observasi; ?></td>
                    <td><?= $data->rekomendasi_observasi_koleksi; ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body></html>