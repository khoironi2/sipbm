<div class="card">
    <div class="card-header">
        Edit Data Perbaikan
    </div>
    <div class="card-body">
        <form action="" method="POST">
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

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>