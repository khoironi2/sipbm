      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MADIN MTA YOGYAKARTA 2020 | <a style="color: black;" href="http://khoironi.net/">KHRN</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout ?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini..</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Bootstrap core JavaScript-->

      <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <!--   <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script> -->

      <!-- Page level custom scripts -->
      <!--  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>  -->
      <!--     <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>  -->



      <!-- Page level plugins -->
      <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

      <script>
        function autofill() {
          var ids = document.getElementById('ids').value;
          $.ajax({
            url: "<?php echo base_url('/'); ?>mata_pelajaran/akhlak/cari",
            data: '&ids=' + ids,
            success: function(data) {
              var hasil = JSON.parse(data);

              $.each(hasil, function(key, val) {

                document.getElementById('ids').value = val.ids;
                document.getElementById('nama_santri').value = val.nama_santri;
                document.getElementById('id').value = val.id;


              });
            }
          });

        }
      </script>



      <script>
        <?php if ($this->session->userdata('level') == "SuperAdmin") { ?>
          $(document).ready(function() {

            $(".cetakpdfnilaisantri").remove();

          });
        <?php }

        if ($this->session->userdata('level') == "Admin") { ?>

          $(document).ready(function() {
            $(".deletesantri").remove();

            $(".cetakpdfnilaisantri").remove();

            $(".menuustad").remove();

          });

        <?php } else if ($this->session->userdata('level') == "Santri") { ?>

          $(document).ready(function() {

            $("#btn-action").remove();

            $("#btn-actionfot").remove();

            $(".coba").remove();

            $(".td-btn").remove();

            $(".pagestu").remove();

            $(".panel-atas").remove();

            $(".admin").remove();

            $(".biodatamain").remove();

            $(".kelolasantri").remove();

            $(".matapelajaranmenu").remove();

            $(".menuustad").remove();


          });

        <?php } else {
        }; ?>
      </script>



      </body>

      </html>