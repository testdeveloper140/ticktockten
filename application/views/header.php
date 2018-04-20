<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>TickTockTen</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/imagehover.css" rel="stylesheet">
      
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
    <!--Parallax Slider-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/layerslider.min.css?v=5.5.242" type="text/css" />

    <!-- Owl Carousel Assets -->
    <link  rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

      <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/swiper.min.css">
    <!-- Swiper JS -->
    <script src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>


 <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/zebra_dialog.css" type="text/css">
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/zebra_dialog.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57c808f35a249a01"></script>
 <style>
.my-form{min-width: 300px;
padding: 14px 14px 0;
overflow: hidden;
color: #fff;
border: none;

background: rgba(0, 0, 0, 0.7);}

.reg{background-color: transparent !important;}
.usr{color:#fff;font: 500 14px/25px 'CenturyGothic', sans-serif;}

.btn1{color: #fff;
background-color: #1a95e6 !important;
border-color: #1a95e6 !important; margin-bottom:10px;}
label + .form-control + .form-control-feedback {
    top: 38px;
}
.log{
    padding: 8px 30px !important;;margin-top: 7px!important;}

</style>

<script>
$(function() {
  return $(".modal").on("show.bs.modal", function() {
    var curModal;
    curModal = this;
    $(".modal").each(function() {
      if (this !== curModal) {
        $(this).modal("hide");
      }
    });
  });
});
    function login()
    {
        var email = $('#emailid').val();
        var password = $('#password').val();
        
        $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>login",
    		data:'email='+email+'&password='+password,
    		success: function(data){
                 //alert(data);
                 if(data == "false")
                 {
document.getElementById("loginerrormsg").innerHTML = "Invalid Email or Password";
                 }
                 else
                 {
                    location.reload(); 
                 }
 	          }
		  });
    }
    
</script>

<script>

    function emailcheck(email)
    {
        $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>check_email",
    		data:'email='+email,
    		success: function(data){
                 //alert(data);
                 $('#emailmsg').html(data);
 	          }
		  });
    }
</script>

<script>
        function pwdcheck()
                {
                    var pass1 = document.getElementById('userpassword');
                    var pass2 = document.getElementById('userpassword1');
                    var message = document.getElementById('pwdmsg');
                    var goodColor = "#66cc66";
                    var badColor = "#ff6666";
                    if(pass1.value == pass2.value){ 
                        pass2.style.backgroundColor = goodColor;
                        message.style.color = goodColor;
                        message.innerHTML = "Passwords Match!"
                    }else{
                        pass2.style.backgroundColor = badColor;
                        message.style.color = badColor;
                        message.innerHTML = "Passwords Do Not Match!"
                    }
                }  
                
                function isNumberKey(evt)
      			{
         		var charCode = (evt.which) ? evt.which : event.keyCode
         		if (charCode > 31 && (charCode < 48 || charCode > 57))
            		return false;

         		return true;
      			}
    </script>
    
    <script>
$(document).on('submit','#regform',function(e){
        
         
            if($('#emailmsg').html() != "" || $('#pwdmsg').html() == "Passwords Do Not Match!")
            {
$('#reg-error').modal();            
e.stopPropagation();
    e.preventDefault();

            }
        });
    
    </script>
    
<script>
    function forgotpassword()
    {
        var email = $('#pwdemail').val();
        $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>forgot_password",
    		data:'email='+email,
    		success: function(data){
                 //alert(data);
                 $('#frgtpwdmsg').html(data);
                 $('#pwdemail').val('');
 	          }
		  });
    }
</script>
      <script>
    $(document).ready(function() {
<?php if($this->session->flashdata('reg-message')!=''){?>
$('#reg-success').modal();
<?php }?>

      var owl = $("#owl-demo");

      owl.owlCarousel({

      items : 8, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: true,
      slideSpeed:200,
      paginationSpeed : 8000,
      rewindSpeed : 10000,
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


    });
function message()
    {
        //alert("You need to login!")
$.Zebra_Dialog('<strong>Login Error !</strong>, You must be logged in to continue.', {
    'type':     'error',
    'title':    'Error'
});
    }
    </script>
  </head>


  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<!--          <a class="navbar-brand" href="#">Project name</a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?=(strpos(current_url(),'contact')!=FALSE ||strpos(current_url(),'games')!=FALSE ||strpos(current_url(),'about')!=FALSE ||strpos(current_url(),'howtoplay')!=FALSE)?'':'active';?>"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="<?=(strpos(current_url(),'about')!=FALSE)?'active':'';?>"><a href="<?php echo base_url(); ?>about">About</a></li>      
            <li class="<?=(strpos(current_url(),'games')!=FALSE)?'active':'';?>"><a href="<?php echo base_url(); ?>games">Games</a></li> 
            <li class="<?=(strpos(current_url(),'howtoplay')!=FALSE)?'active':'';?>"><a href="<?php echo base_url(); ?>howtoplay">How To Play</a></li>  
            <li class="<?=(strpos(current_url(),'contact')!=FALSE)?'active':'';?>"><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>  
            <!--<li class="<?=(strpos(current_url(),'sports')!=FALSE)?'active':'';?>"><a href="<?php echo base_url(); ?>sports">Sports</a></li>
            <li class="<?=(strpos(current_url(),'promotions')!=FALSE)?'active':'';?>" ><a href="<?php echo base_url(); ?>promotions">Promotions</a></li>-->            
          </ul>
<!--            <div class="logo"><a href=""><img src="images/logo.png" alt="logo"></a></div>-->
          <ul class="nav navbar-nav navbar-right">
          <?php
 if($this->session->userdata('customerid') == "")
 {
 ?>
            <li  class="dropdown"><a href="" class="btn-create-account" data-toggle="modal" data-target="#createaccountModal" data-dismiss="modal">Create account</a>
            
            <ul id="login-dp" class="dropdown-menu reg">
				
    </ul>
 </li>
 <li>
 
<a class="text-muted forget_2" style="text-align: right;text-decoration:none;color:#1a95e6;" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login</a>

        
  
 </li>
 <?php
 } else{
 ?> 
 <li>
    <a href="" data-toggle="dropdown" class="dropdown-toggle log"><?php echo $this->session->userdata('customername'); ?></a>
   <ul id="login-dp" class="dropdown-menu reg">
    <li>
       <a target="_blank" href="<?php echo base_url(); ?>dashboard" class="btn-create-account">Profile</a>
    </li>
    <li>
       <a href="<?php echo base_url(); ?>signout" class="btn-create-account">Logout</a>
    </li>
   </ul>
 </li>
 <?php
 }
 ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      
<?php if($is_home){?> 
    <div class="banner">
        <p class="banner-logo"><img src="<?php echo base_url(); ?>assets/images/ticktock.gif" alt="" class="img-responsive"></p>
        
        <marquee  behavior="alternate" scrollamount="20"><p>WHERE TIMING <span>IS</span> EVERYTHING</p></marquee>
        
        <!--<span class="qz"><img src="<?php echo base_url(); ?>assets/images/qz.png" alt=""></span>
        <a href="#" class="btn-start"></a>  -->
    </div>    
    <!--Parallax Slider//--> 
      
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-bottom" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
<!--    <a class="navbar-brand" href="#">Brand</a>-->
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <div class="col-sm-3 col-md-3">
    <form class="navbar-form" role="search">
        <div class="input-group nav-search">
        <span class="input-group-btn">
            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
        </span>
            <input type="text" class="form-control" placeholder="Search for..." id="nav-search">
        </div><!-- /input-group -->
    </form>
    </div>
    <ul class="nav navbar-nav left-mar-13">
      <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
      <li><a href="<?php echo base_url(); ?>about">About</a></li>      
      <li><a href="<?php echo base_url(); ?>games">Games</a></li>      
      <li><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>      
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>   

<?php }?>   
    <!-- /container -->
   <!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	   
        <div class="modal-content forget_1" style="width:60%;margin:0 auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title pwd-head">Login </h4>
      </div>
      <div class="modal-body">
            <div role="form" class=""> 
                <div style="text-align: center;"><p style="color: red;" id="loginerrormsg"></p></div>
                  <div class="form-group has-feedback">
                     <label for="signupInputEmail1" class="text-muted pwd1">Email Address</label>
                     <input id="emailid" placeholder="Enter Email" class="form-control" type="email"/>
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputPassword1" class="text-muted pwd1">Password</label>
                     <input vk_10e50="subscribed" id="password" placeholder="Password" class="form-control" type="password"/>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <a class="text-muted forget_2" style="text-align: right;text-decoration:underline;" data-toggle="modal" data-target="#forgotpwdModal" data-dismiss="modal"> Forgot Password? </a>
                  </div>

                  
                  <button type="submit" class="btn btn-block btn-success btn1" onclick="login()">Login</button>
               </div>
            </div>
	       </div>

  </div>
</div>
<!-- //Modal -->  
<!-- Modal -->
<div id="forgotpwdModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content forget_1" style="width:60%;margin:0 auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title pwd-head">Forgot Password ? </h4>
      </div>
      <div class="modal-body">
      <p id="frgtpwdmsg" style="text-align: center; color: red;"></p>
      
      </div>    
    </div>
  </div>
</div>
<!-- //Modal -->
<!-- Modal -->
<div id="reg-error" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content forget_1" style="width:60%;margin:0 auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title pwd-head">Registration Error !</h4>
      </div>
      <div class="modal-body">
      <p id="frgtpwdmsg" style="text-align: center; color: red;"><strong>Error occurred!</strong>, Please check the registration form and submit again.</p>
      
      </div>    
    </div>
  </div>
</div>
<!-- //Modal -->

<!-- Modal -->
<div id="reg-success" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content forget_1" style="width:60%;margin:0 auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title pwd-head">Registration Successful </h4>
      </div>
      <div class="modal-body">
      <p style="text-align: center; color: green;"><strong></strong> An activation link is sent to your email address.</p>
      
      </div>    
    </div>
  </div>
</div>
<!-- //Modal -->

<!-- Modal -->
<div id="createaccountModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
 <div class="modal-content forget_1" style="width:60%;margin:0 auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title pwd-head">Register </h4>
      </div>
      <div class="modal-body">                   
	<form role="form" class="" method="post" action="<?php echo base_url(); ?>add_customer" id="regform" >
                   <div class="form-group has-feedback">
                   
                     <label for="signupInputEmail1" class="text-muted pwd1">User Name</label>
                     <input vk_10e50="subscribed" name="username" id="username" placeholder="Enter Name" class="form-control" type="text" required="required"/>
                     <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputEmail1" class="text-muted pwd1">Email Address</label>
                     <input id="useremail" name="useremail" placeholder="Enter Email" class="form-control" type="email" required="required" onchange="emailcheck(this.value); return false;"/>
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                     <span id="emailmsg" style="color: red;"></span>
                  </div>
                  
                  <div class="form-group has-feedback">
                     <label for="signupInputEmail1" class="text-muted pwd1">Phone</label>
                     <input id="userphone" name="userphone" placeholder="Enter Phone" class="form-control" type="text" required="required" onkeypress="return isNumberKey(event)" maxlength="10"/>
                     <span class="fa fa-phone form-control-feedback text-muted"></span>
                  </div>
                  
                  
                  
                  <div class="form-group has-feedback">
                     <label for="signupInputPassword1" class="text-muted pwd1">Password</label>
                     <input vk_10e50="subscribed" name="userpassword" id="userpassword" placeholder="Password" class="form-control" type="password" required="required"/>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputRePassword1" class="text-muted pwd1">Retype Password</label>
                     <input vk_10e50="subscribed" name="userpassword1" id="userpassword1" placeholder="Retype Password" class="form-control" type="password" required="required" onkeyup="pwdcheck();"/>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                     <span id="pwdmsg" style="color: red;"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input value="" type="checkbox" class="chk1" required="required"/>
                          I agree with <a target="_blank" href="<?php echo base_url(); ?>termsnconditions">Terms  &amp; Conditions</a>
                        </label>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-success btn1">Register</button>
               </form>

  </div>
</div>
</div>
</div>
<!-- //Modal -->