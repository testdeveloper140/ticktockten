<?php
    //echo $this->session->userdata('customerid').'<br/>';
    //echo $this->session->userdata('customername').'<br/>';
    //echo $this->session->userdata('customeremail');
?>

<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
<title>TickTockTen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link href="http://renaissancelivedemo.in/ticktockten/assets/css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500italic,500,700,300italic,300,400italic,700italic" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link  rel="stylesheet" href="<?php echo base_url(); ?>assets/css/creditly.css" rel="stylesheet">
    <!--datepicker-->
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/creditly.js"></script>
</head>
<style>
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
    color: #0974ba !important;}
.icon-user{text-align:center; color:#000;font-size: 40px;}
.icon-user img{border: 1px solid #000;
width: 81px;
height: 80px;
border-radius: 50%;
display:inline;
line-height: 70px;
margin-top: 5px;}

</style>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
$(function() {
      var creditly = Creditly.initialize(
          '.expiration-month-and-year',
          '.credit-card-number',
          '.security-code',
          '.card-type');

      $(".creditly-card-form .submit").click(function(e) {
        e.preventDefault();
        var output = creditly.validate();
        if (output) {
          // Your validated credit card output
          console.log(output);
        }
      });
    });
</script>


<body>
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
          </ul>
<!--            <div class="logo"><a href=""><img src="images/logo.png" alt="logo"></a></div>-->
          <ul class="nav navbar-nav navbar-right user_2">
             <li>
                <a href="" data-toggle="dropdown" class="dropdown-toggle log user-name"><?php echo $this->session->userdata('customername'); ?></a>
               <ul id="login-dp" class="dropdown-menu reg user-dropdown">
                <li>
                   <a href="<?php echo base_url(); ?>dashboard" class="drpdwn1" >Profile</a>
                </li>
                <li>
                   <a href="<?php echo base_url(); ?>signout" class="drpdwn1">Logout</a>
                </li>
               </ul>
             </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="green-sec" >
    <div class="container">
        <div class="row">
            <div class="cont" style="margin-top: 50px;">
                <div class="col-md-5">
                    <div class="fb-profile" style="background:#1a95e6;height:200px;border-radius: 50%;display: table;padding: 20px;">
                        <!--<img align="left" class="fb-image-lg" src="<?php echo base_url(); ?>assets/images/newbg.jpg" alt="Profile image"/>-->
<?php 
if($user->cust_image==''){
$avt_image = 'assets/images/user2.png';
}else{
$avt_image = $user->cust_image;
}
?>
                        <div class="profile-info" style="top:30px;">
                         <div class="display:table-cell">
                        <a href="#" data-toggle="modal" data-target="#playerImageModal" class="icon-user"><img align="left" class="fb-image-profile thumbnail" style="margin-bottom:5px" src="<?php echo base_url().$avt_image; ?>" alt="Upload Image"/></a>
                            <a href="#" data-toggle="modal" data-target="#myModal" class="edit">Edit</a>
                            </div> 
                            
                        <div class="fb-profile-text" style="display:table-cell;float:none;vertical-align: top;">
                            <h3 class="user-1"><?php echo $user->cust_name; ?></h3>
 <span id="dob"><?php echo date_diff(date_create(date("d M, Y",strtotime($user->cust_dob))), date_create('today'))->y; ?> years old</span>
                            <!-- <p class="step1">Beginner</p> -->
                            <p class="step1"><!-- <img src="<?php //echo base_url(); ?>assets/images/country.jpg" class="img-circle fixed-size"/>   --><i class="fa fa-map-marker"></i>  <?php echo $user->cust_address; ?></p>
                            <p class="step1"><i class="fa fa-mobile"></i>  <?php echo $user->cust_phone; ?></p>
                        </div>
                        
                        
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content forget_1">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
<ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#home">Edit Profile</a></li>
  <li><a data-toggle="pill" href="#menu1">Saved Card</a></li>
  
</ul>

                          <!--<h4 class="modal-title lbl-prof">Edit Profile</h4>-->
                        </div>
                        <div class="modal-body">
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <form method="post" action="<?php echo base_url();?>edit_player_detail">
                            <input type="hidden" name="custid" id="custid" value="<?php echo $user->cust_id; ?>" />
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="lbl-prof">Name</label>
                                <input type="text" class="form-control"  placeholder="Name" value="<?php echo $user->cust_name; ?>" name="name"/>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="lbl-prof">Phone</label>
                                <input type="text" class="form-control"  placeholder="Phone" value="<?php echo $user->cust_phone; ?>" name="phone"/>
                                
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="lbl-prof">Date Of Birth</label>
                                <input class="form-control" id="date" name="date" placeholder="DD-MM-YYYY" type="text" value="<?php echo date('d-m-Y',strtotime($user->cust_dob)); ?>"/>
                              </div> 
                              <!-- <div class="form-group">
                                <label for="exampleInputEmail1" class="lbl-prof">Date Of Birth</label>
                                  <div class="input-group date" data-provide="datepicker" >
                                    <input type="text" class="form-control" id="custdob"/>
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                              </div> -->
                              
                              <div class="form-group">
                                <label for="exampleSelect1" class="lbl-prof">Country</label>
                                <select class="form-control" id="exampleSelect1" name="country">
                                  <option value="<?php echo $user->cust_address; ?>"><?php echo $user->cust_address; ?></option>
                                  <option value="United States">United States</option>
                                  <option value="England">England</option>
                                  <option value="India">India</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Russia">Russia</option>
                                </select>
                              </div>
                              
                            <input type="submit" class="btn btn-info" value="Save Changes" />  
                            
                            </form>
  </div>
  <div id="menu1" class="tab-pane fade">
<?php if(!empty($user_cc)){?>
<form id="cc_form1" method="post" action="<?php echo base_url();?>edit_player_cc">
                            <input type="hidden" name="custid" id="custid" value="<?php echo $user->cust_id; ?>" />
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Card Number</label>
                                <p class="form-control" style="border:none;"><?=$user_cc->card_number;?></p>
                              </div>
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Card Holder Name</label>
                                <p class="form-control" style="border:none;"><?=$user_cc->card_name;?></p>
                                
                              </div>
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Expiry Date</label>

<p class="form-control" style="border:none;"><?=$user_cc->expiry_date;?></p>
                                

                               

                              </div> 
                               
                            <div class="form-action">  
                            <input type="submit" class="btn btn-info" value="Edit" onclick="$('#cc_form1').hide();$('#cc_form').show();return false;" />  
                            </div>
                            </form>
<form id="cc_form" method="post" action="<?php echo base_url();?>edit_player_cc" style="display:none;">
                            <input type="hidden" name="custid" id="custid" value="<?php echo $user->cust_id; ?>" />
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Card Number</label>
                                <input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                              </div>
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Card Holder Name</label>
                                <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                                
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1" class="lbl-prof">Expiry Date</label>
<!--<div class="input-group">
    <select class="form-control" name="expiry_month" >
<option value="">MM</option>
                                   <?php
for($month = 1;$month<=12;$month++){
?>
<option value="<?=sprintf('%02d',$month)?>"><?=sprintf('%02d',$month)?></option>
<?php }?>
                                </select>
    <span class="input-group-addon">-</span>
    <select class="form-control" name="expiry_year" >
<option value="">YYYY</option>
                                   <?php
for($year = date('Y');$year<=date('Y')+35;$year++){
?>
<option value="<?=$year?>"><?=$year?></option>
<?php }?>
                                </select>
</div>-->
<input class="expiration-month-and-year form-control"
                  type="text" name="expiration-month-and-year"
                  placeholder="MM / YY">
                                

                               

                              </div> 
                              <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1" class="lbl-prof">CVV/CVC</label>
                                <input class="security-code form-control"·
                  inputmode="numeric"
                  type="password" name="security-code"
                  placeholder="&#149;&#149;&#149;">
                              </div> 
                              <div class="card-type"></div>
                            <div class="form-action">  
                            <input type="submit" class="btn btn-info" value="Save Changes" />
<input type="submit" class="btn btn-info" value="Close" onclick="$('#cc_form').hide();$('#cc_form1').show();return false;" />   
                            </div>
                            </form>
<?php }else{?>
    <form id="cc_form" method="post" action="<?php echo base_url();?>edit_player_cc">
                            <input type="hidden" name="custid" id="custid" value="<?php echo $user->cust_id; ?>" />
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Card Number</label>
                                <input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                              </div>
                              <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" class="lbl-prof">Card Holder Name</label>
                                <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                                
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1" class="lbl-prof">Expiry Date</label>
<!--<div class="input-group">
    <select class="form-control" name="expiry_month" >
<option value="">MM</option>
                                   <?php
for($month = 1;$month<=12;$month++){
?>
<option value="<?=sprintf('%02d',$month)?>"><?=sprintf('%02d',$month)?></option>
<?php }?>
                                </select>
    <span class="input-group-addon">-</span>
    <select class="form-control" name="expiry_year" >
<option value="">YYYY</option>
                                   <?php
for($year = date('Y');$year<=date('Y')+35;$year++){
?>
<option value="<?=$year?>"><?=$year?></option>
<?php }?>
                                </select>
</div>-->
<input class="expiration-month-and-year form-control"
                  type="text" name="expiration-month-and-year"
                  placeholder="MM / YY">
                                

                               

                              </div> 
                              <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1" class="lbl-prof">CVV/CVC</label>
                                <input class="security-code form-control"·
                  inputmode="numeric"
                  type="password" name="security-code"
                  placeholder="&#149;&#149;&#149;">
                              </div> 
                              <div class="card-type"></div>
                            <div class="form-action">  
                            <input type="submit" class="btn btn-info" value="Save Changes" /> 

                            </div>
                            </form>
<?php }?>
  </div>
</div>
                            
                        </div>
                        <!--<div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>-->
                      </div>
                      
                    </div>
                  </div>
                  
                   <div class="modal fade" id="playerImageModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content forget_1">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title lbl-prof">Change Profile Picture</h4>
                        </div>
                        <div class="modal-body" style="display: table;width: 100%;">
                            <form method="post" action="<?php echo base_url();?>edit_player_image" enctype="multipart/form-data">
                            <input type="hidden" name="custid" id="custid" value="<?php echo $user->cust_id; ?>" />
                            <div class="form-group">
                               <div class="col-sm-10 col-sm-offset-1">
                                  <label for="exampleSelect1" class="lbl-prof">Select Image</label>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="col-sm-10 col-sm-offset-1">
                                  <input type="file" class="form-control" name="myfile" onchange="readURL(this);" style="height: auto;margin-bottom: 10px;"/>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <div class="media">
                                        <img  class="img-responsive img-circle" id="proimg" src="<?php echo base_url().$avt_image; ?>" alt="" style="margin-bottom: 10px; width: 100px; height: 100px;"/>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-1 col-sm-10">
                                 <button type="submit" class="btn btn-info">Save Changes</button>
                              </div>
                           </div>
                            </form>
                        </div>
                        <!--<div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>-->
                      </div>
                      
                    </div>
                  </div>     
                        
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="green-sec" style="background:transparent">
                  
                    <!-- <h3 class="user-info">View Your Details</h3> -->
                    <hr />
                        <div>
                            <h2 class="white-text">Your Total Credits : <span style="text-align: right;"><strong>
                            <?php 
                            if($user->cradit==''){echo "0";}else{ echo number_format($user->cradit);}
                          
                            ?></strong></span></h2>
                            <h2 class="white-text">Purchase More Credits :<a href="<?php echo base_url();?>purches" class="btn btn-purchase">Purchase</a></h2>
                        </div>
                       
                    
                    </div>
                    
                    <div class="green-sec" style="background:transparent">
                    <hr />
                        <div>
                            <h2 class="white-text">Highest Scored : <span style="text-align: right;"><strong><?php echo $highest_score; ?></strong></span> points</h2>
                     </div>
                    
                    
  <div class="green-sec"  style="background:transparent">
                   
                    <hr />
                        <div>
                            <h2 class="white-text">Games Played : <span style="text-align: right;"><strong><?php echo $total_games; ?></strong></span></h2>
                        </div>
                    <hr />
                    </div>
                                    
    
                        
                        
                        
                    
                    </div>
                  </div>
                
                <div class="col-md-6 col-sm-offset-1">
                <div class="section-game" style="padding-bottom:15px">
<!--                 <h3 class="user-info text-left">Game History</h3>-->
                 	<ul class="topic">
                    <?php 
                        foreach($games as $g)
                        {
                    ?>
                        <li class="col-sm-3"><p><img width="35" height="35" src="<?php echo base_url().$g->qtopic_image; ?>" alt=""/></p>
                        <p class="title"><?php echo $g->qtopic_name; ?></p><div class="cat"><p><?php echo $g->qcat_name; ?></p><p>( <?php echo $g->qp_points; ?> )</p></div></li>
                        <!-- <li class="col-sm-3"><p><img src="<?php //echo base_url(); ?>assets/images/GameIcon2.png" alt=""/></p>
                        <p>Game Name(win)</p></li>
                        <li class="col-sm-3"><p><img src="<?php //echo base_url(); ?>assets/images/GameIcon1.png" alt=""/></p>
                        <p>Game Name (win)</p></li>
                        <li class="col-sm-3"><p><img src="<?php //echo base_url(); ?>assets/images/GameIcon2.png" alt=""/></p>
                        <p>Game Name (win)</p></li> --> 
                    <?php
                        }
                    ?>
                    </ul>
                    <div class="clearfix"></div>
                 
                 </div>
                 
                 <div class="section-game" style="margin-top:20px">
                 <h3 class="user-info" style="font: 300 24px/26px 'CenturyGothic', sans-serif;color: #3f90ab;text-transform:uppercase;text-align:center">Products Won</h3>
                 	<ul class="topic product">
                    <?php 
                        foreach($products as $p)
                        {
                    ?>
                        <li class="col-sm-3"><p><img width="35" height="35" src="<?php echo base_url().$p->prod_image; ?>" alt="<?php echo $p->prod_name; ?>"/></p>
                        <div class="product-des"><p><?php echo $p->prod_name; ?></p><p><?php echo $p->psub_name; ?></p></div></li>
                        <!-- <li class="col-sm-3"><p><img src="<?php //echo base_url(); ?>assets/images/camera.png" alt=""/></p>
                        <p>Camera</p></li>
                       <li class="col-sm-3"><p><img src="<?php //echo base_url(); ?>assets/images/mob.png" alt=""/></p>
                        <p>Mobile (win)</p></li>
                        <li class="col-sm-3"><p><img src="<?php //echo base_url(); ?>assets/images/camera.png" alt=""/></p>
                        <p>Nikon</p></li> --> 
                    <?php
                        }
                    ?>
                    </ul>
                    <div class="clearfix"></div>
                 
                 </div>
                 
                </div>
                <div class="clearfix"></div>
                </div>
        </div>
    </div>    
</div>

 <script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#proimg')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>   

<?php echo $this->load->view('footer'); ?>
