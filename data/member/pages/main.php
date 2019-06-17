
<!-- ############ PAGE START-->
<?php 
include '../../assets/config/koneksi.php'; 
if (isset($_SESSION['id_user'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_SESSION['id_user']."'");
    $res = mysqli_fetch_assoc($q);
} else if (isset($_COOKIE['ID'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_COOKIE['ID']."' ");
    $res = mysqli_fetch_assoc($q);
}
?>
  <div class="item">
    <div class="item-bg">
      <img src="../assets/images/photo-user/<?= $res['foto'] ?>" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="../assets/images/photo-user/<?= $res['foto'] ?>">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-0 m-b-xs"><?= $res['fullname'] ?></h3>
            <p class="text-muted"><span class="m-r"><?= $res['email'] ?></span> <small></small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter light-blue"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus red"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-linkedin cyan-600"></i>
              </a>
            </div>
            <a href class="btn btn-sm warn btn-rounded m-b">Follow</a>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <div class="dker p-x">
    <div class="row">
      <div class="col-sm-6 push-sm-6">
        <div class="p-y text-center text-sm-right">
          <a href class="inline p-x text-center">
            <span class="h4 block m-0">2k</span>
            <small class="text-xs text-muted">Followers</small>
          </a>
          <a href class="inline p-x b-l b-r text-center">
            <span class="h4 block m-0">250</span>
            <small class="text-xs text-muted">Following</small>
          </a>
          <a href class="inline p-x text-center">
            <span class="h4 block m-0">89</span>
            <small class="text-xs text-muted">Activities</small>
          </a>
        </div>
      </div>
      <div class="col-sm-6 pull-sm-6">
        <div class="p-y-md clearfix nav-active-primary">
          <ul class="nav nav-pills nav-sm">
            <li class="nav-item active">
              <a class="nav-link" href data-toggle="tab" data-target="#tab_1">Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href data-toggle="tab" data-target="#tab_4">Profile</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="padding">
    <div class="row">
      <div class="col-sm-8 col-lg-9">
        <div class="tab-content">      
          <div class="tab-pane p-v-sm active" id="tab_1">
            <div class="streamline b-l m-b m-l">
              <div class="sl-item">

              </div>
            </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_2">
            <div class="streamline b-l m-b m-l">
              <div class="sl-item">

              </div>
            </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_3">
            <div class="streamline b-l m-b m-l">
              <div class="sl-item">

              </div>
            </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_4">
            <div class="streamline b-l m-b m-l">
              <div class="sl-item">
                <?php include 'pages/profile.php'; ?> <!-- PROFILE -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-3">
        <div>
          <div class="box">
              <div class="box-header">
                <h3>Who to follow</h3>
              </div>
              <div class="box-divider m-0"></div>
              <ul class="list no-border p-b">
                <li class="list-item">
                  <a herf class="list-left">
                    <span class="w-40 avatar">
                      <img src="../../assets/images/a4.jpg" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div><a href>Chris Fox</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </li>
              </ul>
          </div>
          <div class="box info dk">
            <div class="box-body">
              <a href class="pull-left m-r">
                <img src="../assets/images/a0.jpg" class="img-circle w-40">
              </a>
              <div class="clear">
                <a href>@Mike Mcalidek</a>
                <small class="block text-muted">2,415 followers / 225 tweets</small>
                <a href class="btn btn-sm btn-rounded btn-info m-t-xs"><i class="fa fa-twitter m-t-xs"></i> Follow</a>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h2>Latest Tweets</h2>
            </div>
            <div class="box-divider m-0"></div>
            <ul class="list">
              <li class="list-item">
                <div class="list-body">
                  <p>Wellcome <a href class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p>
                  <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 2 minuts ago</small>
                </div>
              </li>
              <li class="list-item">
                <div class="list-body">
                  <p>Morbi nec <a href class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p>
                  <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 1 hour ago</small>
                </div>
              </li>
              <li class="list-item">
                <div class="list-body">                   
                  <p><a href class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis</p>
                  <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 2 hours ago</small>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ############ PAGE END-->


