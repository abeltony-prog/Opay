<!doctype html>
<html class="no-js" lang="">
<?php include('class/logins.php') ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Opay | Add Student</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <?php
    if (Logins::isLoggedIn()) {
     ?>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                      <a href="#"><img width="90" src="img/logo/log.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><br>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                              <?php
                              if (Logins::isLoggedIn()) {
                                //$user = DB::query('SELECT user_id FROM logins WHERE user_id=:userid', array(':userid'=>Logins::isLoggedIn()));
                                //$name = DB::query('SELECT fullname FROM user WHERE id=:user', array(':user'=>$user));
                              $incase = DB::query('SELECT * FROM shop_account WHERE id = :stdid',array(':stdid'=>Logins::isLoggedIn()));
                              foreach ($incase as $var) {
                                ?>
                                <li><a data-toggle="collapse" href="index.php">Home</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Add</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                      <li><a href="change_password.php">Money</a>
                                      </li>
                                      <li><a href="change_password.php">Student</a>
                                      </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">More</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                      <li><a href="change_password.php">Change Password</a>
                                      </li>
                                      <li>
                                      <form class="" action="" method="post" enctype="multipart/form-data">
                                          <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                                      </form>
                                    </li>

                                      <?php
                                      if (isset($_POST['logout'])) {
                                          DB::query('DELETE FROM shop_login WHERE s_id =:sid', array(':sid'=>$var['id']));
                                            echo "<script>window.open('shop_login.php', '_self')</script>";
                                          setcookie('SNID', '1' , time()-3600);
                                          setcookie('SNID_', '1' , time()-3600);
                                      }
                                       ?>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="index.php"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li  class="active"><a data-toggle="tab" href="#Page2"><i class="notika-icon notika-bottom-angl"></i> Add</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-bottom-angl"></i>More</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Page2" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="addmoney.php">Money</a>
                                </li>
                                <li><a href="addStudent.php">Student</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content custom-menu-content">
                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="change_password.php">Change Password</a>
                                </li>
                                <li>

                                <form class="" action="" method="post" enctype="multipart/form-data">
                                    <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                                </form>
                              </li>

                                <?php
                                if (isset($_POST['logout'])) {
                                    DB::query('DELETE FROM shop_login WHERE s_id =:sid', array(':sid'=>$var['id']));
                                      echo "<script>window.open('shop_login.php', '_self')</script>";
                                    setcookie('SNID', '1' , time()-3600);
                                    setcookie('SNID_', '1' , time()-3600);
                                }
                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <div class="past-day-statis">
                            <h2>Add Student to the System</h2>
                        </div>
                                  <form class="form-example-wrap" action="" method="post" enctype="multipart/form-data" >
                                    <div class="form-example-int col-md-6">
                                        <div class="form-group">
                                            <label>Student Username</label>
                                            <div class="nk-int-st">
                                                <input type="text" name="uname" class="form-control input-sm" placeholder="Student Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int col-md-6">
                                        <div class="form-group">
                                          <label>Student Reg No</label><br>
                                          <div class="row col-md-3">
                                            <div class="nk-int-st">
                                                <input class="form-control input-sm" value="1" placeholder="Student Reg No">
                                            </div>
                                          </div>
                                          <div style="margin-left:20px;" class="row col-md-3">
                                            <div class="nk-int-st">
                                                <input class="form-control input-sm" value="01" placeholder="Student Reg No">
                                            </div>
                                          </div>
                                          <div style="margin-left:20px;" class="row col-md-3">
                                            <div class="nk-int-st">
                                                <input class="form-control input-sm" value="21" placeholder="Student Reg No">
                                            </div>
                                          </div>
                                          <div style="margin-left:20px;" class="row col-md-3">
                                            <div class="nk-int-st">
                                                <input type="number" name="no" class="form-control input-sm" placeholder="No">
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;" class="form-example-int col-md-6">
                                        <div class="form-group">
                                            <label>Money</label>
                                            <div class="nk-int-st">
                                                <input type="text" name="money" class="form-control input-sm" placeholder="Amount of Money">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int">
                                        <button style="margin-top: -110px;margin-left: 10px" type="submit" class="btn btn-warning notika-btn-warning" name="Add">Add Student</button>
                                    </div>
                                  </form>
                                  <?php
                                  if (isset($_POST['Add'])) {
                                    $uname = $_POST['uname'];
                                    $no = $_POST['no'];
                                    $money = $_POST['money'];
                                    if (!DB::query('SELECT no FROM student_account WHERE no=:no', array(':no'=>$no))) {
                                      DB::query('INSERT INTO student_account VALUES(\'\',:uname,:no,:money)', array(':uname'=>$uname,':no'=>$no,':money'=>$money));
                                      echo "<script>alert('student ".$uname." Added')</script>";
                                      echo "<script>window.open('addStudent.php', '_self')</script>";
                                    }else {
                                      echo "<script>alert('Registration number ".$no." already Exists')</script>";
                                    }
                                    }
                                   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
  }
}
  }else {
    echo "<script>window.open('shop_login.php', '_self')</script>";

  }
     ?>
    <!-- End Sale Statistic area-->
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
	<script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
</body>

</html>
