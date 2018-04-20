<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->
<!-- Mirrored from themicon.co/theme/beadmin/v1.1/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jul 2016 08:23:28 GMT -->
<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Trivia Game</title>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
   <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/animo.js/animate-animo.css">
   <!-- App CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/app.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/common.css">
   <!-- Modernizr JS Script-->
   <script src="<?php echo base_url(); ?>/assets/vendor/modernizr/modernizr.custom.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="<?php echo base_url(); ?>/assets/vendor/fastclick/lib/fastclick.js" type="application/javascript"></script>
</head>

<body>
   <!-- START wrapper-->
   <div class="row row-table page-wrapper">
      <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 align-middle">
         <!-- START panel-->
         <div data-toggle="play-animation" data-play="fadeIn" data-offset="0" class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="#">
                 <img src="<?php echo base_url(); ?>/assets/images/ticktock.gif" alt="Image" class="block-center img-rounded" style="width:27%"/>
               </a>
               <p class="text-center mt-lg">
                  <strong>SIGN IN TO CONTINUE.</strong>
               </p>
            </div>
            <div class="panel-body">
            <div style="text-align: center;color: red;"><p><?php echo $this->session->flashdata('loginerror'); ?></p></div>
               <form role="form" class="mb-lg" method="post" action="<?php echo base_url();?>admin/login">
                  <!-- <div class="text-right mb-sm"><a href="#" class="text-muted">Want To Join The Fun?</a>
                  </div> -->
                  <div class="form-group has-feedback">
                     <input id="email" name="email" type="text" placeholder="Enter Email" class="form-control" required="required"/>
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input id="password" name="password" type="password" placeholder="Password" class="form-control" required="required"/>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <!-- <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="">
                           <span class="fa fa-check"></span>Remember Me</label>
                     </div>
                     <div class="pull-right"><a href="#" class="text-muted">Forgot Your Password?</a>
                     </div>
                  </div> -->
                  <div class="clearfix">
                  <button type="submit" class="btn btn-block btn-success">Login</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- END panel-->
      </div>
   </div>
   <!-- END wrapper-->
   <!-- START Scripts-->
   <!-- Main vendor Scripts-->
   <script src="<?php echo base_url(); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Animo-->
   <script src="<?php echo base_url(); ?>/assets/vendor/animo.js/animo.min.js"></script>
   <!-- Custom script for pages-->
   <script src="<?php echo base_url(); ?>/assets/js/pages.js"></script>
   <!-- END Scripts-->
</body>


<!-- Mirrored from themicon.co/theme/beadmin/v1.1/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jul 2016 08:23:29 GMT -->
</html>