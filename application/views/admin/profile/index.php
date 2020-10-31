<div class="row">
    <div class="col-sm-7"> 
        <div class="card">
            <div class="card-header">
                Edit Profile Admin
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/Logo.png') ?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>