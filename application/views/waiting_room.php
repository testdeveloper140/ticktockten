<?php echo $this->load->view('header') ; ?>
<style>
.title_wait{font-family: 'Lato', sans-serif;

padding: 10px;
color: #fff;
font-size: 25px;
letter-spacing: 3px;
text-align:center;
margin-bottom: 0px;
}
.blue-bg-1{background: #1a95e6;
}

.btn-wait{font-family: 'Lato', sans-serif;
    display: table;
    margin: 0 auto;
    background: #1a95e6;
    padding: 10px 0px;
    color: #fff;
    border: 2px solid #fff;
    font-size: 32px;
    margin-top: 9px;
    float: left;
    margin-bottom: 4px;
    width: 100%;
}
.btn-wait:hover{background:#1a6799}
.content{background:#eee;}
.icon-user{text-align:center; color:#000;font-size: 40px;}
.icon-user img{border: 1px solid #000;
width: 81px;
height: 80px;
border-radius: 50%;
display:inline;
line-height: 70px;}

.white-bg1 {
    background: #FFF;
padding: 36px 20px;
border: 1px solid #c8c8c8;
margin-bottom: 0px;}
.usr-name{font-family: 'Lato', sans-serif;
color: #1A95E6;
text-align: center;
font-size: 20px;    margin-bottom: 2px;
}
.searchable-container{margin:0px 0 0 0}
.searchable-container label.btn-default.active{background-color:#007ba7;color:#FFF}
.searchable-container label.btn-default{width:100%;border:1px solid #0F6096;margin:5px;border: 1px solid #0F6096;
padding: 1px 16px;
border-radius: 0px;
background: #fff;font-sixe:14px;font-family: 'Lato', sans-serif;
color: #0F6096; /*box-shadow:5px 8px 8px 0 #ccc;*/}
.searchable-container label .bizcontent{width:100%;}
.searchable-container .btn-group{width: auto;
display: table;
margin: 0 auto;}
.searchable-container .btn span.glyphicon{
    opacity: 0;
}
.searchable-container .btn.active span.glyphicon {
    opacity: 1;
}
.hd_1{font-size: 14px;
font-weight: 400;}
.block-info{margin-bottom:0px;}
.gap{margin-bottom:20px;}
.img_catgry{width: 110px;
margin-top: 20px !important;
display: table;
margin: 0 auto;
margin-bottom: 20px !important;
height: 110px !important;border: 2px solid #01a2e9;}
.hdr_1{ font-family: 'CenturyGothic', sans-serif;font-size: 16px;
line-height: 22px;margin: 0}
.top_1{margin-top: 16px;color: white}
.gap_10{margin-bottom:16px;}
.top_11{float:right;}

.t_right{text-align:right;}

.highlt{font-size: 44px;
width: 100%;
padding: 0px;
background: #081F2C;}
.nt-highlt{font-size: 16px;
width: 59%;
display: table;

text-align: center;
margin-left: 20%;
padding: 10px 0px;}

button[disabled], html input[disabled] {
    cursor: default;
    opacity: 0.6;
}
.hdr_2 {
    font-family: 'Lato', sans-serif;
    font-size: 16px;
    line-height: 22px;
    text-align: center;}
    
    .top_0{margin-top:43px;}
    .bold1{font-weight:800;}
	
	.opacity-off{opacity: 0.3;
background: #000;
z-index: -99}

.opacity-on{position: absolute;
background: #fff;
opacity: 1;
z-index: 9999;
width: auto;
margin-top: 59px;
left: 33%;
padding: 20px;
min-height: 300px;
}

.text-2{font-family: 'Lato', sans-serif;
font-size: 22px;
color: #2393DA;
text-align: center;
line-height: 27px;}
.overlay{
position: absolute;
top: 209px;
left: 105px;
width: 85%;
height: 98%;
z-index: 10;
background-color: transparent; /*dim the background*/
}
.purchase{display: table;
margin: 0 auto;
background: #35A5EC;
color: #fff;
border: 1px solid #fff;
padding: 12px 36px;
font-size: 18px;
margin-bottom: 8px;}

.practice{display: table;
margin: 0 auto;
background: #145781;
color: #fff;
border: 1px solid #fff;
padding: 9px 16px;

font-size: 16px;}

/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 5em;
  width: 5em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<script>
</script>
</head>

<body>

<?php $user_id = $this->session->userdata('customerid');
$last_insert_id = $this->session->userdata('last_insert_id');
$player_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'player_id', " and id ='".$last_insert_id."'");


 if($user_id==''){
 redirect('');
 }

?>
<section class="blue-bg-1">
<div class="container">
	<div class="row">
    	<div class="col-sm-12">
    	<div class="col-sm-3">
    	<p style="margin-top: 20px;
font-size: 21px;font-weight:bold;color: #fff;
background: transparent;
text-align: center; padding: 16px 6px;border: 2px solid white;border-radius: 12px;"> Player ID : <?php echo $player_id;?>
<input type='hidden' id="my_player_id" value="<?php echo $player_id; ?>"/></p>
    	</div>
    	<div class="col-sm-5">
        <h3 class="title_wait" style="font-size:47px;margin-top:20px">Waiting Room</h3>      
      </div>
<div class="col-sm-4">
 <h5 style="margin-top: 20px; color:#fff;font-size: 25px;line-height:27px;font-weight:bold">Invite or Wait For Up To One <br> or More Players To Continue</h5>
</div>
      <div class="clearfix"></div>
        </div>
        </div>    
    
    </div>

</section>
<section class="content">
	<div class="container">
	<?php
     $user_id = $this->session->userdata('customerid');
     $cat_id= $this->uri->segment(2);  
     $prod_id= $this->uri->segment(3); 
    $game_name = $this->custom_function->get_perticular_field_value('tbl_quiz_topic', 'qtopic_name', " and qtopic_id ='".$cat_id."'"); 
    $game_image = $this->custom_function->get_perticular_field_value('tbl_quiz_topic', 'qtopic_image', " and qtopic_id ='".$cat_id."'"); 
    $qtopic_cat_id = $this->custom_function->get_perticular_field_value('tbl_quiz_topic', 'qtopic_cat_id', " and qtopic_id ='".$cat_id."'");
    $game_cat_name = $this->custom_function->get_perticular_field_value('tbl_quiz_category', 'qcat_name', " and qcat_id ='".$qtopic_cat_id."'");
    
    $prize_name = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_name', " and prod_id ='".$prod_id."'"); 
     $prize_price = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_amount', " and prod_id ='".$prod_id."'"); 
     $prize_img_url = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_image', " and prod_id ='".$prod_id."'"); 
     
     $user_cradit = $this->custom_function->get_perticular_field_value('tbl_customer', 'cradit', " and cust_id ='".$user_id."'"); 
    $multiplaye = $this->config->item('multiplaye');
     $reqire_my_credit = $prize_price/$multiplaye;
     ?>   
	
    <div class="gap">
    	<div class="row">
        	<div class="col-sm-4">
           		<div class="col-sm-4" style="padding:0">
                	<img src="<?php echo base_url().$game_image;?>" class="img-responsive img_catgry img-circle"/>
                </div>
                <div class="col-sm-8">
                <div class="top_1" style="background:#01a2e9;padding:42px 5px;border-radius:10px;text-align:center">
                <p class="hdr_1"><strong><?php echo $game_name; ?>  </strong> </p>
                <p class="hdr_1"><strong> <?php echo $game_cat_name; ?> </strong></p>
                </div>
                </div>
            </div>
             <div class="col-sm-4">
                 <div class="top_1" style="background:#01a2e9;padding:42px 5px;border-radius:10px;text-align:center;">
<p class="hdr_1" style="font-size:18px;font-weight:bold;line-height:20px">My Credit : <b><?php echo $user_cradit;?></b></p>
              <p class="hdr_1" style="font-size:20px;font-weight:bold"> Required : <b><?php echo round($reqire_my_credit);?></b></p>
            
                 </div>
            
            </div>
        <div class="col-sm-4">
     
        
           		
                <div class="col-sm-8">
                <div class="top_1" style="background:#01a2e9;padding:30px 5px;border-radius:10px;text-align:center">
                <p class="hdr_1"><strong> <?php echo $prize_name; ?></strong>
              </p>
                <p class="hdr_1"><strong> <?php echo $prize_price; ?> </strong>  </p>
                
                </div>
                </div>
                <div class="col-sm-4" style="padding:0">
                	<img src="<?php echo base_url().$prize_img_url;?>" class="img-responsive img_catgry img-circle"/>
                </div>
            </div>
        </div>
        
        <?php if($reqire_my_credit >=$user_cradit ){ ?>
         <div class="overlay"></div>
           <div class="opacity-on">
        <p class="text-2">You have not enough credit to play the game.</p>
        <p class="text-2">Please purchase more credit to continue.</p>
        <a href="<?php echo base_url();?>purches" style="text-decoration:none;"><button class="purchase"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
Purchase Now</button></a>
        <a href="<?php echo base_url().'play/'.$this->uri->segment(2).'/'.$this->uri->segment(3);?>" style="text-decoration:none;"> <button class="practice"> <i class="fa fa-gamepad" aria-hidden="true"></i> Practice</button></a>
        <p style="text-align:center;
padding: 10px;text-decoration: underline;"> <a href="<?php echo base_url();?>games" style="color: #000;">Choose another Game</a></p>         
        </div>
        
        <div class="white-bg1 opacity-off" style="min-height:400px;">
        <?php }?>
       
       
       <?php if($reqire_my_credit <=$user_cradit){?>
       <div class="white-bg1">
       <?php }?>
        <div class="row">
        
        <div id ="default_div">
        <?php 
        $last_insert_id = $this->session->userdata('last_insert_id');
	$player_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'player_id', " and id ='".$last_insert_id."'");
       foreach($multi_user as $multi){
        //print_r($multi);
        $user_name = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id ='".$multi->user_id."'");
        $checked_id = $multi->player_id;
        $tbl_multiplayer_id= $multi->id;
         ?>
        <div class="col-sm-3 gap_10">
        	<?php
$multi_image = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_image', " and cust_id ='".$multi->user_id."'"); 
if($multi_image==''){
$avt_image = 'assets/images/user2.png';
}else{
$avt_image = $multi_image;
}
?>
        	<p class="icon-user"><img class="fb-image-profile thumbnail" src="<?php echo base_url().$avt_image; ?>" alt="Upload Image"/></p>
            <p class="usr-name"><?php echo $user_name; ?></p>
              <div class="searchable-container">
                <div class="items ">
             <div class="info-block block-info clearfix">
                        
                        <div data-toggle="buttons" class="btn-group bizmoduleselect text-center">
                        <?php $checked_value=$this->session->userdata('checked');
                        if($checked_value== $checked_id){
                        $chk ='checked';
                        }else{
                        $chk='';
                        }
                         ?>
                         <h5 class="hd_1" >Invite</h5>
                        <input type='checkbox' <?php echo $chk; ?> id="invite" onclick="checked_box('<?php echo $player_id;?>,<?php echo $checked_id;?>,<?php echo $tbl_multiplayer_id;?>');" />
                        
                           <!-- <label class="btn btn-default">
                                <div class="bizcontent">
                                   <h5 class="hd_1">Invite</h5>
                                    <input type="checkbox" name="var_id[]" autocomplete="off" value="">
                                    
                                    
                                    
                                </div>
                            </label> -->
                        </div>
                    </div>
        </div>
        </div>
        </div>
        <?php } 
        
        ?>
       
       </div>
      
       <div id="record_show"></div>
       
        <div class="clearfix"></div>
        </div>
        
        
        
        
        <div class="row">
        	<div class="col-sm-12">
            	<div  style="margin: 0 auto;display: table;">
         <button class="btn-wait highlt" id="continue" onclick="go_continue();"><i class="fa fa-play-circle" aria-hidden="true"></i>
 PLAY NOW</button>
 
 <!--<button class="btn-wait highlt" id="continue" onclick="window.location='<?php echo base_url();?>multiplayers/<?php echo $this->uri->segment(2).'/'.$this->uri->segment(3);?>'"><i class="fa fa-play-circle" aria-hidden="true"></i>
 PLAY NOW</button>-->
                	<a href="<?php echo base_url();?>play/<?php echo $this->uri->segment(2).'/'.$this->uri->segment(3);?>"><button class="btn-wait nt-highlt">PRACTICE</button></a>
                </div>
                
                <div class="alert alert-info alert-dismissible" role="alert" style="width: 30%;float: right;font-size:18px">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Start Your Next Game After The Players Arrive</strong>
</div>
                
            </div>
        
        
        </div>
        </div>
    </div>
    </div>
<div id="loadingProgressG" class="loading" style="display:none;">Loading&#8230;</div>

</section>

<script>
$(document ).ready(function() {
$("#continue").attr("disabled","disabled");
 setInterval(executeQuery,500);

});

function executeQuery() {
 var user_id = '<?php echo $this->session->userdata('customerid') ?>';
 var q_topic_id='<?php echo $this->uri->segment(2); ?>';
 var pro_id='<?php echo $this->uri->segment(3);?>';

$.ajax({
 type:"POST",
 url:"<?php echo base_url();?>multi_user",
data:{user_id:user_id,q_topic_id:q_topic_id,pro_id:pro_id},
success:function(msg){
 //alert(msg);
$("#default_div").hide();
//$("#default_div").show();
$("#record_show").show();
$("#record_show").html(msg);

}

  	       
 });

 }
 
 $(function() {
    $(document).on('keyup','body', function() {
        var pattern = $(this).val();
        $('.searchable-container .items').hide();
        $(document).on('filter','.searchable-container .items',function() {
            return $(this).text().match(new RegExp(pattern, 'i'));
        }).show();
    });
});

 
function checked_box(id){
var data = id.split(',');
var player_id = data[0];
var check_id= data[1];
var multiplayer_id=data[2];
$("#continue").removeAttr('disabled');
 //alert(check_id);

 $.ajax({
 type:"POST",
 url:"<?php echo base_url();?>user_checked",
data:{player_id:player_id,check_id:check_id,multiplayer_id:multiplayer_id},
success:function(msg){
$('#game_status').text(msg);
 }
 
});



}

function checked_box1(id){
var data = id.split(',');
var player_id = data[0];
var check_id= data[1];
var multiplayer_id=data[2];
$("#continue").removeAttr('disabled');
 //alert(check_id);


 $.ajax({
 type:"POST",
 url:"<?php echo base_url();?>gen_game_id",
data:{player_id:player_id,check_id:check_id,multiplayer_id:multiplayer_id},
success:function(msg){
$('#game_status').text(msg);
 }
 
});

}

function go_continue(){
 var my_player_id = $("#my_player_id").val();
 var quiz_topic_id = '<?php echo $this->uri->segment('2');?>';
 var product_id = '<?php echo $this->uri->segment('3');?>';
 var invite_user = '<?php echo $this->session->userdata('checked');?>';
var deducted_credit = '<?=$reqire_my_credit?>';
 //alert(invite_user);
$("#loadingProgressG").show();
  $.ajax({
 type:"POST",
 url:"<?php echo base_url();?>go_continue",
data:{my_player_id:my_player_id,quiz_topic_id:quiz_topic_id,product_id:product_id,deducted_credit :deducted_credit },
success:function(msg){
if(msg=='ok'){
setTimeout(function () {
        $("#loadingProgressG").hide();
        window.location='<?php echo base_url();?>multiplayers/<?php echo $this->uri->segment(2).'/'.$this->uri->segment(3);?>';
    }, 3000);
 }else{
setTimeout(function () {
        $("#loadingProgressG").hide();
    }, 3000);
}
} 	       
 });
}

</script>

<?php echo $this->load->view('footer'); ?>

