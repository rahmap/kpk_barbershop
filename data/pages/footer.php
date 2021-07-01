

    </div>
  </div>
  <!-- / content -->

  <!-- theme switcher -->
<!--  <div id="switcher">-->
<!--    <div class="switcher box-color dark-white text-color" id="sw-theme">-->
<!--      <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">-->
<!--        <i class="fa fa-gear"></i>-->
<!--      </a>-->
<!--      <div class="box-header">-->
<!--        <h2>Theme Switcher</h2>-->
<!--      </div>-->
<!--      <div class="box-divider"></div>-->
<!--      <div class="box-body">-->
<!--        <div data-target="bg" class="row no-gutter text-u-c text-center _600 clearfix">-->
<!--          <label class="p-a col-sm-6 light pointer m-0">-->
<!--            <input type="radio" name="theme" value="" hidden>-->
<!--            Light-->
<!--          </label>-->
<!--          <label class="p-a col-sm-6 grey pointer m-0">-->
<!--            <input type="radio" name="theme" value="grey" hidden>-->
<!--            Grey-->
<!--          </label>-->
<!--          <label class="p-a col-sm-6 dark pointer m-0">-->
<!--            <input type="radio" name="theme" value="dark" hidden>-->
<!--            Dark-->
<!--          </label>-->
<!--          <label class="p-a col-sm-6 black pointer m-0">-->
<!--            <input type="radio" name="theme" value="black" hidden>-->
<!--            Black-->
<!--          </label>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->

  <script src="../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>

  <script src="scripts/palette.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>
  <!-- <script src="../../../../libs/jquery/footable/dist/footable.all.min.js"></script> -->
  <script src="scripts/app.js"></script>

  <!-- ajax -->
  <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="scripts/ajax.js"></script>
  <!-- <script type="text/javascript" src="../js/addon.js"></script> -->
<!-- endbuild -->


		<?php if(isset($_GET['page']) AND $_GET['page'] == 'data-transaksi'): ?>

			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.js"></script>

		<script>
      $(document).ready(function() {
        $('#tblTransaksi').DataTable( {
          dom: 'Bfrtip',
          buttons: [
            'pdf', 'print'
          ]
        });
      });
		</script>
		<?php endif; ?>
</body>
</html>
