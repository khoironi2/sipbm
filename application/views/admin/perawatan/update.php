<div class="card">
    <div class="card-header">
        Edit Data Perawatan
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_users">Nama Petugas</label>
                <input type="text" class="form-control" id="id_users" name="id_users">
            </div>

            <div class="form-group">
                <label for="id_koleksi">Nama koleksi</label>
                <select class="form-control" id="id_koleksi" name="id_koleksi">
                    <option disabled>-- pilih koleksi --</option>
                    <option value="admin">Foto</option>
                    <option value="pihak_pusat">Minatur Pesawat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keadaan_koleksi_perawatan">Keadaan Koleksi</label>
                <input type="text" class="form-control" id="keadaan_koleksi_perawatan" name="keadaan_koleksi_perawatan">
            </div>

            <div class="form-group">
                <label for="no_vitrin_koleksi_perawatan">No. vitrin</label>
                <input type="text" class="form-control" id="no_vitrin_koleksi_perawatan" name="no_vitrin_koleksi_perawatan">
            </div>

            <div class="form-group">
                <label for="time_perawatan">Tanggal Perawatan</label>
                <input type="date" class="form-control" id="time_perawatan" name="time_perawatan">
            </div>

            <div class="form-group">
                <label for="kegiatan_perawatan">Kegiatan</label>
                <textarea name="kegiatan" id="kegiatan_perawatan" class="form-control" name="kegiatan_perawatan"></textarea>
            </div>

            <div class="form-group">
                <label for="bahan_perawatan">Bahan yang digunakan</label>
                <textarea name="kegiatan" id="bahan_perawatan" class="form-control" name="bahan_perawatan"></textarea>
            </div>

            <div class="form-group">
                <label for="tambahan_perawatan">Tambahan</label>
                <input type="text" class="form-control" id="tambahan_perawatan" name="tambahan_perawatan">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>