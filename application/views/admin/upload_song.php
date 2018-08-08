<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-04
 * Time: 3:36 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>dashboardHelper/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>dashboardHelper/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>dashboardHelper/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>dashboardHelper/assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <script src="<?php echo base_url()?>dashboardHelper/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url()?>dashboardHelper/assets/css/demo.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-image="<?php echo base_url()?>dashboardHelper/assets/img/sidebar-5.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    SINGTN
                </a>
            </div>
            <ul class="nav">
                <li >
                    <a class="nav-link" href="<?php echo base_url() ?>/dashboard">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>Upload Musical Piece</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url() ?>/users">
                        <i class="nc-icon nc-notes"></i>
                        <p>Users</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class=" container-fluid  ">
                <a class="navbar-brand" href="#pablo"> Upload Musical Piece </a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="nc-icon nc-palette"></i>
                                <span class="d-lg-none">D</span>
                            </a>
                        </li>
                        <li class="dropdown nav-item">

                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="#">Notification 1</a>
                                <a class="dropdown-item" href="#">Notification 2</a>
                                <a class="dropdown-item" href="#">Notification 3</a>
                                <a class="dropdown-item" href="#">Notification 4</a>
                                <a class="dropdown-item" href="#">Another notification</a>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nc-icon nc-zoom-split"></i>
                                <span class="d-lg-block">&nbsp;Search</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('DashboardController/logout'); ?>">
                                <span class="no-icon">Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">New Musical Piece</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body table-full-width table-responsive">

                                <?php /*if(has_alert()):
                                    foreach(has_alert() as $type => $message): */?>
                                        <div class="alert alert-dismissible <?php /*echo $type; */?>">
                                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <?php /*echo $message; */?>
                                        </div>
                                    <?php /*endforeach;
                                endif; */?>
                                    <?php /*echo form_open_multipart('SongsController/do_upload');*/?>
<?php /*echo "&nbsp;&nbsp;&nbsp;&nbsp;<input name='userfile'  value='upload file' type='file' accept='audio/mpeg,.m4r'>"; */?>
                                <br /><br />
<?php /*echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='upload'/>";*/?>


                                <?php /*echo "</form>"*/?>

                                </div>
                        </div>
                    </div>
                </div>-->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
<!--                                <h4 class="card-title">Synchronized Lyrics</h4>-->
                                <p class="card-category"></p>
                                <div class="card-body table-full-width table-responsive">
                        <?php var_dump(base_url().UPLOADS); ?>
                                  <form class="ucf form-horizontal" action="<?php echo base_url('SongsController/do_upload'); ?>" enctype="multipart/form-data" method="post" novalidate>
                                     <fieldset>
                                         <?php if(has_alert()):
                                    foreach(has_alert() as $type => $message): ?>
                                         <div class="alert alert-dismissible <?php echo $type; ?>">
                                             <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                             <?php echo $message; ?>
                                         </div>
                                         <?php endforeach;
                                endif; ?>
                                         <legend>Please Provide all the informations</legend>
                                         <div class="form-group">
                                             <label for="songN" accesskey="U" class="col-sm-2 control-label">
                                                 <span>Song name</span>

                                             </label>
                                             <div class="col-sm-10">
                                                 <input class="form-control" type="text" name="songName" size="30" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="artistN" accesskey="U" class="col-sm-2 control-label">
                                             <span>Artist name</span>

                                             </label>
                                             <div class="col-sm-10">
                                                 <input class="form-control" type="text" name="artistName" size="30" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="imagaN" accesskey="U" class="col-sm-2 control-label">
                                                 <span>Song picture</span>

                                             </label>
                                             <div class="col-sm-10">

                                                 <?php echo "<input class= 'form-control' name='imageSong' type='file' accept='image/jpeg,image/png'>"; ?>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="songSrc" accesskey="U" class="col-sm-2 control-label">
                                                 <span>Song</span>

                                             </label>
                                             <div class="col-sm-10">

                                                 <?php echo "<input class= 'form-control' name='userfile' type='file' accept='.mp3,.m4r' maxlength='255'>"; ?>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="lyricN" accesskey="U" class="col-sm-2 control-label">
                                                 <span>Lyric</span>

                                             </label>
                                             <div class="col-sm-10">

                                                 <?php echo "<input class= 'form-control' name=' userlyrics' type='file' accept='.txt,.lrc'>"; ?>
                                             </div>
                                             <div align="left" >
                                                 <div> if you don't have a synchronized lyric file,you can create one thanks to lrcgenerator.</div>
                                                 <a href = "http://lrcgenerator.com" target="_blank">Click here!</a>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <div class="col-sm-offset-2 col-sm-10">
                                                 <div class="progress-container"
                                             </div>
                                             <button type="submit" class="btn btn-lg btn-primary" >
                                                 Save Changes
                                             </button>
                                             </div>
                                         </div>
                                     </fieldset>
                                  </form>


                                </div>
                            </div>
<!--                        <center><form name="f" action="SongsController/save_song" method="POST">-->
<!--                        <input type="text" name="song" value="--><?php // if (isset($data['raw_name'])) { echo $data['raw_name'];}; ?><!--"  hidden/>-->
<!--                            <input type="text" name="lyric" value="--><?php //if (isset($data2['raw_name'])) { echo $data2['raw_name'];}; ?><!--" hidden/>-->
<!--                            <input align="center" type="submit" class="btn" />-->
<!--                        </form></center>-->
                    </div>

                </div>

            </div>

        </div>


        <footer class="footer">
            <div class="container">
                <nav>

                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        SINGTN
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>
<!--   -->
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url()?>dashboardHelper/assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url()?>dashboardHelper/assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url()?>dashboardHelper/assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url()?>dashboardHelper/assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

        </ul>
    </div>
</div>

</body>
<!--   Core JS Files   -->

<script src="<?php echo base_url()?>dashboardHelper/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>dashboardHelper/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url()?>dashboardHelper/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!--  Chartist Plugin  -->
<script src="<?php echo base_url()?>dashboardHelper/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url()?>dashboardHelper/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url()?>dashboardHelper/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<!--
<script src="dashboardHelper/assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>
-->

</html>