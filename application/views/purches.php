<?php echo $this->load->view('header') ; ?>
<style>
.chkout-header{font-family: 'Lato', sans-serif;
font-size: 25px;
line-height: 32px;
color: #000; 
}
.chkout-header:after{position: absolute;
width: 84px;
height: 3px;
background: #000;
content: '';
top: 79%;
left: 3%;
z-index: 0;
padding: 0px;}


.top_gap{margin-top:20px;}

.bill-header1{background: #2A77CE;
color: #fff;
padding: 1px 14px;}

.header-link a{color: #fff;
font-family: 'Lato', sans-serif;
font-size: 18px;
text-decoration: none;
line-height: 24px;}
.bill-header1{border-bottom:1px solid #eee;}
.gry-color{    background: #eee;
  padding: 13px 1px;
}
.name1{font-family: 'Lato', sans-serif; color:#2e2e2e; font-size:14px; font-weight:400;}
.input-frm{width: 100%;
background: #fff;
border: 1px solid #d4d4d4;
border-radius: 0px;}
.adrs{width: 100%;
background: #fff;
border: 1px solid #d4d4d4;
border-radius: 0px;}

.btn-alter.accordion {
    background: #3588e6;
color: #FFF;
cursor: pointer;
padding: 16px;
width: 100%;
border: none;
text-align: left;
outline: none;
font-size: 16px;
transition: 0.4s
}

button.accordion.active, button.accordion:hover {
    background-color:  #3588e6; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}

div.panel.show {
    display: block;
}

.product-detl1 {border: 1px solid #ccc;}
.product-detl1 th{font-family: 'Lato', sans-serif;
padding: 5px !important;
border: 1px solid #b3b1b1;
text-align: center;}
.product-detl1 td{font-family: 'Lato', sans-serif;
padding: 5px !important;
border: 1px solid #b3b1b1;
text-align: center;width: 35%;}
.img_catgry1{width:100px; margin:0 auto; display:table;}
.chk1{ 
    float: right;
    background:#74c3f8;
    color:white;
    padding: 9px 30px;
    border: 2px solid;
    margin-bottom: 20px;
}

.chk2{ 
    float: right;
    background: #000;
    color: #fff;
    padding: 9px 30px;
    border: 2px solid;
    margin-bottom: 20px;
}
.name2{font-family: 'Lato', sans-serif;
color: #1087d2;
font-size: 22px;}
.radio1{height: 28px;
width: 18px;}

.gray-box{background: #eee;
padding: 20px;
border: 1px solid #dddbdb;margin-bottom: 20px;}
.input_gvn{background: #fff;
padding: 9px;
border: 1px solid #dedede;
font-size: 17px;}
.no-padding{padding:0px;}
.numbr{min-height: 40px;
padding: 5px;font-family: 'Lato', sans-serif;}
.card1{font-family: 'Lato', sans-serif;
font-size: 25px;
line-height: 32px;
color: #000;
text-align: center;}
.card1:after{position: absolute;
width: 33px;
height: 3px;
background: #000;
content: '';
top: 77%;
left: 48%;
z-index: 0;
padding: 0px;}

.input_gvn1
{background: transparent;
color: #201A1A;
border: 0px;
font-size: 18px;font-family: 'Lato', sans-serif;}
.numbr i{font-size: 28px;}
</style>
<body>


<?php $user_id = $this->session->userdata('customerid');
  $user_name= $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id ='".$user_id."'");
 
 $card_holder_name = $this->custom_function->get_perticular_field_value('tbl_customer_cc', 'card_name', " and user_id ='".$user_id."'");
 $user = $this->custom_function->get_perticular_field_value('tbl_customer_cc', 'user_id', " and user_id='".$user_id."'");
 $user_cards = $this->custom_function->get_multiple_data("tbl_customer_cc", $where = array("user_id" =>$user));
 
 $url= base_url();

if($user_id==''){
 redirect($url);
 }
 
 
 ?>


   <div class="container">
    <div class="col-sm-12 col-xs-12">
    <h5 class="chkout-header card1">Purchase Credit</h5> 
    </div>
    
    
  <div class="col-sm-offset-4 col-sm-4">  
 
  <?php if($user!=''){ 
  ?>  
    <form>

<?php  }
if($user!=''){

 foreach($user_cards as $row){
//print_r($row);
$card_number = $this->custom_function->get_perticular_field_value('tbl_customer_cc', 'card_number', " and id ='".$row['ID']."'");

 $expire_date = $this->custom_function->get_perticular_field_value('tbl_customer_cc', 'expiry_date', " and id ='".$row['ID']."'");
  $test = explode('/',$expire_date);
 $month = trim($test[0]);
  $year= $test[1];
 $first_for = substr($card_number,0,4);
 $last_for = substr($card_number,-4);
 $months = $this->config->item('month');

//echo  $month[$month];
  ?>
<div class="radio">
<label class="name1 name2">
<input name="optradio" checked="checked" class="radio1" value="0" type="radio" style="margin: 36px 0px 0px -47px;"> 
 Saved Credit Card</label>
</div>

<div class="gray-box"  id="card0">

<p class="input_gvn1 numbr"> <i class="fa fa-cc-visa" aria-hidden="true"></i>
<?php echo $first_for; ?>-xxxx-xxxx-<?php echo $last_for; ?></p>
      
  
      

    
        <div class="clearfix"></div>
        <div class="col-sm-6 no-padding">
 		<p class="input_gvn1 numbr"><?php echo substr($months[$month],0,3).' '.$year;?> </p>
        </div>
         
    <input class="form-control input-frm" id="cardno" type="hidden" placehoder="" value="<?=$card_number?>">
    <input class="form-control input-frm" id="card_holder_name" type="hidden" value="<?=$card_holder_name?>">
    <input class="form-control input-frm" id="month" type="hidden" value="<?=$month?>">
    <input class="form-control input-frm" id="year" type="hidden" value="<?=$year?>">
        <div class="col-sm-2 no-padding"></div>
<div class="col-sm-3 no-padding">
 		<input class="form-control input-frm " placeholder="CVV" name="cvv" id="cvv" type="text">
        </div>
        <div class="clearfix"></div>
</div>
 <?php }
  } ?>
 
    	<div class="radio">
 <label class="name1 name2"><input <?=empty($user_cards)?'checked="checked"':''?> value="1" name="optradio" class="radio1" type="radio" style="margin: 36px 0px 0px -47px;">New Credit Card</label>
</div>
	<div class="gray-box" id="card1">
   
   <div class="form-group">
  <label class="name1">Credit Card Number</label>
 	<input class="form-control input-frm" id="cardno" type="text" placehoder="">
    </div>
    
     	<div class="form-group">
  <label class="name1">Card Holder Name</label>
 	<input class="form-control input-frm" id="card_holder_name" type="text">
    </div>
    <div class="form-group">
    <p style="margin-bottom:0px"> <label class="name1">Expiry Date</label></p>
     <div class="col-sm-4 no-padding">
    <select class="form-control input-frm " id="month">
      <option>Month</option>
      <option value="01">January</option>
      <option  value="02">Fabruary</option>
      <option value="03">March</option>
      <option value="04">April</option>
      <option value="05">May</option>
      <option value="06">June</option>
      <option value="07">July</option>
       <option value="08">August</option>
       <option value="09">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
       <option value="12">December</option>
      </select>
    </div>
     <div class="col-sm-4 no-padding">
    <select class="form-control input-frm style="width:82px;" id="year">
      <option>Year</option>
 <?php $starting_year  =date('Y');
 $ending_year = date('Y', strtotime('+20 year'));
 for($starting_year; $starting_year <= $ending_year; $starting_year++) {
     echo '<option value="'.$starting_year.'"';
     
     echo ' >'.$starting_year.'</option>';
 }  ?>
 
    </select>
    </div>

  <div class="col-sm-4">
 	<input class="form-control input-frm " type="text" placeholder="CVV" id="cvv">
   
</div>
    <div class="clearfix"></div>
    </div>
    

<div class="clearfix"></div>

  </div> 
  
  <div class="gray-box">
   <div class="form-group">
      <label class="control-label col-sm-3 name1 no-padding"  style="font-size:16px;">Amount ($)</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control input-frm" id="amount">
      </div>
    </div>
    <div class="clearfix"></div>
  </div> 

 
 <button type="submit" class="chk1" id="submit" onclick="update_credit();return false; ">Submit</button>

  <button type="submit" class="chk2">Cancel</button>

   </form>
   </div> 
    </div>


<?php echo $this->load->view('footer'); ?>
<script>

 
 function update_credit(){
 var checked = $("input[name=optradio]:checked").val();
 var div = "div#card"+checked;
 
 var cardno = $(div+" #cardno").val();
 var card_holder_name=$(div+" #card_holder_name").val();
 var month=$(div+" #month").val();
 var year=$(div+" #year").val();
 var cvv=$(div+" #cvv").val();
 
 var amount= $("#amount").val();
 
 if(cardno ==''){
 alert('Please enter card number');
 }else if(card_holder_name==''){
 alert('Please enter card holder name');
 }else if(month==''){
 alert('Please select month');
 }else if(year==''){
 alert('Please select year');
 }else if(cvv==''){
 alert('Please enter cvv number');
 }else if(amount==''){
 alert('Please enter amount');
 return false;
 }else{
 
 var form_data = { /////  PASS THE ARRAY
cardno:cardno,
card_holder_name:card_holder_name,
month:month,
year:year,
amount:amount,
 };
    
$.ajax({
type:"POST",
url:"<?php echo base_url()?>update_credit",
data:form_data,
//alert(data);
success:function(msg){

window.location ='<?php echo base_url();?>success/';
	
	}
  	       
  	}); 
  	}  
  	
 
 }


</script>
