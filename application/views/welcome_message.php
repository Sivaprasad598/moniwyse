<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/uplon/horizontal/ui-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Dec 2017 18:24:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon
        <link rel="shortcut icon" href="<?php // echo base_url(); ?>assets/images/favicon.ico">
-->
        <!-- App title -->
        <title>deliverEASE dashboard</title>

        <!-- Switchery css -->
        <link href="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>


    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="<?php echo base_url('welcome'); ?>" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i>
                            <span>deliverEASE</span>
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras navbar-topbar">

                        <ul class="list-inline float-right mb-0">


                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="text-overflow"><small>Welcome ! <?php echo $_SESSION['user_name']; ?></small> </h5>
                                    </div>


                                    <a href="<?php echo base_url('sign_out'); ?>" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                    </div> <!-- end menu-extras -->
                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->


          <?php $this->load->view('nav_menu'); ?>
        </header>
        <!-- End Navigation Bar-->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        <h4 class="page-title">dashboard</h4>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                  <?php /* ?>
                <div class="col-md-4">
                    <div class="card m-b-20 card-body">
                        <h3 class="card-title">Single Player</h3>
                        <p class="card-text">Single player tambola win condition section
                            .</p>
                        <a href="<?php echo base_url('single_mode'); ?>" class="btn btn-primary">Go</a>
                    </div>
                </div>
                  <?php */ ?>

            </div>




            </div> <!-- container -->


            <!-- Footer -->
            <footer class="footer">
                2017 - 2018 © Delivery.
            </footer>
            <!-- End Footer -->



        </div> <!-- End wrapper -->




        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>


    </body>

<!-- Mirrored from coderthemes.com/uplon/horizontal/ui-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Dec 2017 18:24:51 GMT -->
</html>
