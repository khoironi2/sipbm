<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h2><img src="<?= base_url('assets/img/Logo.png') ?>" height="70" alt=""></h2>
                                    <br>
                                </div>

                                <form class="user" method="post" action="<?= base_url('auth/loginForm') ?>">
                                    <?php
                                    $errors = $this->session->flashdata('errors');
                                    if (!empty($errors)) {
                                    ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger text-center">
                                                    <?php foreach ($errors as $key => $error) { ?>
                                                        <?php echo "$error<br>"; ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    if ($msg = $this->session->flashdata('error_login')) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger text-center">
                                                    <?= $msg ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else if ($msg = $this->session->flashdata('success_login')) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success text-center">
                                                    <?= $msg ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" name="email" type="email" id="inputEmail" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">

                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" name="password" type="password" id="inputPassword" placeholder="Password">

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>