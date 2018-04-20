<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->


<!-- Mirrored from themicon.co/theme/beadmin/v1.1/dashboard.v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jul 2016 08:21:20 GMT -->
<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>TickTockTen Admin</title>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
   <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
   <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/animo.js/animate-animo.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/whirl/dist/whirl.css">
   <!-- START Page Custom CSS-->
   <!-- Data Table styles-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/datatables/media/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/datatables-colvis/css/dataTables.colVis.css">
   <!-- END Page Custom CSS-->
   <!-- App CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/app.css">
   <!-- Modernizr JS Script-->
   <script src="<?php echo base_url(); ?>/assets/vendor/modernizr/modernizr.custom.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="<?php echo base_url(); ?>/assets/vendor/fastclick/lib/fastclick.js" type="application/javascript"></script>
   <!-- Main vendor Scripts-->
   <script src="<?php echo base_url(); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<?php
    if($this->session->userdata('admin_name') == "")
    {
        redirect('admin');
    }
?>

<body>
   <!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="<?php echo base_url(); ?>admin/" class="navbar-brand">
               <div class="brand-logo">
                  <img src="<?php echo base_url(); ?>/assets/images/ticktock.gif" alt="Ticktock" class="img-responsive"/>
               </div>
               <div class="brand-logo-collapsed">
                  <img src="<?php echo base_url(); ?>/assets/images/ticktock.gif" alt="Ticktock" class="img-responsive"/>
               </div>
            </a>
         </div>
         <!-- END navbar header-->
         <!-- START Nav wrapper-->
         <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>
               <!-- START Messages menu (dropdown-list)-->
               
               <!-- END Messages menu (dropdown-list)-->
               <!-- START User avatar toggle-->
              <!-- <li>
                  
                  <a href="#" data-toggle-state="aside-user">
                     <em class="fa fa-user"></em>
                  </a>
               </li> -->
               <!-- END User avatar toggle-->
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">
               <!-- Search icon-->
               <li>
                  <a href="#" data-toggle="navbar-search">
                     <em class="fa fa-search"></em>
                  </a>
               </li>
               <!-- Fullscreen-->
               <li>
                  <a href="#" data-toggle="fullscreen">
                     <em class="fa fa-expand"></em>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url(); ?>admin/signout" title="Sign out">
                     <em class="fa fa-sign-out"></em>
                  </a>
               </li>
               <!-- START Alert menu-->
               
               <!-- END Alert menu-->               
            </ul>
            <!-- END Right Navbar-->
         </div>
         <!-- END Nav wrapper-->
         <!-- START Search form-->
         <form role="search" action="http://themicon.co/theme/beadmin/v1.1/search.html" class="navbar-form">
            <div class="form-group has-feedback">
               <input type="text" placeholder="Type and hit Enter.." class="form-control">
               <div data-toggle="navbar-search-dismiss" class="fa fa-times form-control-feedback"></div>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
         </form>
         <!-- END Search form-->
      </nav>
      <!-- END Top Navbar-->
      
      <?php echo $this->load->view('admin/sidebar'); ?>