

    </div>
  </div>
  <!-- / content -->

  <!-- theme switcher -->
  <div id="switcher">
    <div class="switcher box-color dark-white text-color" id="sw-theme">
      <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">
        <i class="fa fa-gear"></i>
      </a>
      <div class="box-header">
        <h2>Theme Switcher</h2>
      </div>
      <div class="box-divider"></div>
      <div class="box-body">
        <div data-target="bg" class="row no-gutter text-u-c text-center _600 clearfix">
          <label class="p-a col-sm-6 light pointer m-0">
            <input type="radio" name="theme" value="" hidden>
            Light
          </label>
          <label class="p-a col-sm-6 grey pointer m-0">
            <input type="radio" name="theme" value="grey" hidden>
            Grey
          </label>
          <label class="p-a col-sm-6 dark pointer m-0">
            <input type="radio" name="theme" value="dark" hidden>
            Dark
          </label>
          <label class="p-a col-sm-6 black pointer m-0">
            <input type="radio" name="theme" value="black" hidden>
            Black
          </label>
        </div>
      </div>
    </div>
  </div>
  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>
  <button class="md-btn md-flat xs-b-sm w-xs text-primary" data-toggle="modal" data-target="#uploadAwal" ui-toggle-class="zoom" hidden=""  ui-target="#animate" id="btnShowPhoto">Klik Saya</button>
<!-- large modal -->
<div id="uploadAwal" class="modal fade animate" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" id="animate">
    <div class="modal-content dark">
      <div class="modal-header">
        <h5 class="modal-title">Uplaod Foto Anda!</h5>
      </div>
      <div class="row">
        <div class="col-sm-12">
        <form id="uploadFoto" enctype='multipart/form-data' method="post" action="prosses/prosses-upload-photo.php" >
          <div class="box">
            <div class="box-body">
              <p class="text-muted">Anda wajib mengupload photo profil, anda hanya boleh mengakses halaman dashboard jika anda telah selesai mengupload photo profil.</p>
              <div class="form-group row">
                <div class="col-sm-12 text-center">
                  <label for="photo" id="lblPhoto" class="btn btn-danger">Pilih Foto..</label>
                  <input type="file" name="photo" hidden="" id="photo">
                </div>
              </div>
             </div> 
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn info p-x-md">Upload</button>
        </div>
        </div></div>
      </form></div></div></div></div></div>
      </form>
    </div><!-- /.modal-content -->
  </div>
<!-- / .modal -->
<script type="text/javascript">
  function awal(){
    $("#photo").change(function() {
      filename = this.files[0].name;
      $('#lblPhoto').text(filename);
    });
  }
  awal();

</script>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="../../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../../libs/jquery/PACE/pace.min.js"></script>

  <script src="../scripts/config.lazyload.js"></script>

  <script src="../scripts/palette.js"></script>
  <script src="../scripts/ui-load.js"></script>
  <script src="../scripts/ui-jp.js"></script>
  <script src="../scripts/ui-include.js"></script>
  <script src="../scripts/ui-device.js"></script>
  <script src="../scripts/ui-form.js"></script>
  <script src="../scripts/ui-nav.js"></script>
<!--   <script src="../scripts/ui-screenfull.js"></script> -->
  <script src="../scripts/ui-scroll-to.js"></script>
  <script src="../scripts/ui-toggle-class.js"></script>

  <script src="../scripts/app.js"></script>

  <!-- ajax -->
  <script src="../../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="../scripts/ajax.js"></script>
  <!-- <script src="js/dropzone-5.5.0/dist/dropzone.js"></script> -->
  <!-- <script type="text/javascript" src="../js/addon.js"></script> -->
<!-- endbuild -->
</body>
</html>
