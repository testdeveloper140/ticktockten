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
.chk{    float: right;
    background: #000;
    color: #fff;
    padding: 5px 10px;
    border: 0px;
}
</style>
<body>

 <?php $user_id = $this->session->userdata('customerid');
    $cust_name = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id ='".$user_id."'");
    $cust_phone = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_phone', " and cust_id ='".$user_id."'");
    $cust_email = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_email', " and cust_id ='".$user_id."'");
    $prod_id= $this->uri->segment(3); 
    $pro_name = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_name', " and prod_id ='".$prod_id."'"); 
    $prod_desc = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_desc', " and prod_id ='".$prod_id."'"); 
     $prize_price = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_amount', " and prod_id ='".$prod_id."'"); 
     $prize_img_url = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_image', " and prod_id ='".$prod_id."'"); 
    
 
 if($user_id==''){
 redirect('index');
 }
  ?>





<div class="container">
    <div class="col-sm-12 col-xs-12">
    <h5 class="chkout-header">Check Out</h5> 
    </div>

        <div class="col-sm-12 col-xs-12">
        <div class="top_gap">    	
        <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header bill-header1" role="tab" id="headingOne">
      <h5 class="mb-0 header-link">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Billing Address
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse in gry-color" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
      <div class="col-sm-8">
         <form>
  <div class="form-group col-sm-12">
    <label class="name1">Name</label>
    <input type="text" class="form-control input-frm" name="username" id="username"  value="<?php echo $cust_name;?>" readonly="" >
  </div>
  <div class="form-group col-sm-12">
    <label class="name1">Email:</label>
    <input type="text" class="form-control input-frm" id="eail" value="<?php echo $cust_email; ?>" name="email" readonly="">
  </div>
  <div class="form-group col-sm-12">
    <label class="name1">Phone:</label>
    <input type="text" class="form-control input-frm" id="phone" name="phone" value="<?php echo $cust_phone;?>" readonly="">
  </div>
  
   <div class="form-group col-sm-12">
    <label class="name1">Address:</label>
  <textarea rows="3" cols="6" class="adrs" id="address" name="address"></textarea>
  </div>
  
  <div class="form-group col-sm-12">
    <label class="name1">City/Town</label>
    <input type="text" class="form-control input-frm" id="city" name="city" >
  </div>
  <div class="form-group col-sm-6 ">
    <label class="name1">State</label>
    <input type="text" class="form-control input-frm" id="state" name="state" >
  </div>
  
    <div class="form-group col-sm-6">
    <label class="name1">Pin code</label>
    <input type="text" class="form-control input-frm" id="pin" name="pin" >
  </div>
  <div class="clerafix"></div>
<div class="form-group col-sm-12">
    <label class="name1">Country</label>
    <select class="form-control input-frm" id="country" name="country">
    <option value=''>Select Country</option>
      <?php $type = $this->config->item('countries');
      foreach ($type as $key => $val) {
 if($key == $call_log_detail['status']){

 $selected = 'selected=selected';
 
}else{
 
  $selected = '';
  }
    
 
 echo "<option value='" . $key . "' " . $selected . ">" . $val . "</option>";

}
   ?>
     
    </select>
  </div>

</form>
</div>
<div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bill-header1" role="tab" id="headingTwo">
      
    </div>
    <div id="collapseTwo" class="collapse gry-color" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
           <div class="col-sm-6">
         <form>
  <div class="form-group col-sm-12">
    <label class="name1">Name</label>
    <input type="text" class="form-control input-frm" >
  </div>
  <div class="form-group col-sm-12">
    <label class="name1">Email:</label>
    <input type="text" class="form-control input-frm" >
  </div>
  <div class="form-group col-sm-12">
    <label class="name1">Phone:</label>
    <input type="text" class="form-control input-frm" >
  </div>
  
   <div class="form-group col-sm-12">
    <label class="name1">Address:</label>
  <textarea rows="3" cols="6" class="adrs"></textarea>
  </div>
  
  <div class="form-group col-sm-12">
    <label class="name1">City/Town</label>
    <input type="text" class="form-control input-frm" >
  </div>
  <div class="form-group col-sm-6 ">
    <label class="name1">State</label>
    <input type="text" class="form-control input-frm" >
  </div>
  
    <div class="form-group col-sm-6">
    <label class="name1">Pin code</label>
    <input type="text" class="form-control input-frm" >
  </div>
  <div class="clerafix"></div>
<div class="form-group col-sm-12">
    <label class="name1">Country</label>
    <select class="form-control input-frm">
      <option>India</option>
      <option>England</option>
      <option>Usa</option>
     
    </select>
  </div>

</form>
</div>

<div class="col-sm-6">
<button class="accordion btn-alter">Ship to a different address</button>
<div class="panel">
 <form>
  <!--<div class="form-group col-sm-12">
    <label class="name1">Name</label>
    <input type="text" class="form-control input-frm" >
  </div>-->
  <!--<div class="form-group col-sm-12">
    <label class="name1">Email:</label>
    <input type="text" class="form-control input-frm" >
  </div>-->
  <!--<div class="form-group col-sm-12">
    <label class="name1">Phone:</label>
    <input type="text" class="form-control input-frm" >
  </div>-->
  
   <div class="form-group col-sm-12">
    <label class="name1">Address:</label>
  <textarea rows="3" cols="6" class="adrs"></textarea>
  </div>
  
  <div class="form-group col-sm-12">
    <label class="name1">City/Town</label>
    <input type="text" class="form-control input-frm" >
  </div>
  <div class="form-group col-sm-6 ">
    <label class="name1">State</label>
    <input type="text" class="form-control input-frm" >
  </div>
  
    <div class="form-group col-sm-6">
    <label class="name1">Pin code</label>
    <input type="text" class="form-control input-frm" >
  </div>
  <div class="clerafix"></div>
<div class="form-group col-sm-12">
    <label class="name1">Country</label>
    <select class="form-control input-frm">
        
    </select>
  </div>
  <div class="clearfix"></div>

</form>
</div>
  <div class="clearfix"></div>


</div>
<div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bill-header1" role="tab" id="headingThree">
      <h5 class="mb-0  header-link">
        <a class="collapsed " data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Product Details
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse gry-color" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
       <div class="table-responsive">          
  <table class="table product-detl1">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Detail</th>
        <th>Product Price</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><?php echo $pro_name; ?></td>
        <td><img src="<?php echo base_url().$prize_img_url;?>" height="80" weight="80" class="img-responsive img_catgry1"></td>
        <td><?php echo $prod_desc;?></td>
        <td>$ <?php echo $prize_price;?></td>
        
      </tr>
      <tr>
    
      </tr>
    </tbody>
  </table>
  <button class="chk" onclick="order();">Process to Checkout</button>
  </div>
  </div>
  <div class="clearfix"></div>
      </div>
    </div>
  </div>
  
    <div class="card">
   
    <div id="collapseFour" class="collapse gry-color" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block">
      <div class="col-sm-1"></div>
      <div class="col-sm-11">

</div>
<div class="clearfix"></div>
</div>
</div>
  
  
</div> 
</div>  
    </div>
    
    </div>
    </div>
    
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}

 function order(){
 var user_id='<?php echo $this->session->userdata('customerid'); ?>';
 var quiz_topic_id = '<?php echo $this->uri->segment(2);?>';
 var pro_id= '<?php echo $this->uri->segment(3);?>';
 var address=$("#address").val();
 var city=$("#city").val();
 var state=$("#state").val();
 var pin=$("#pin").val();
 var country=$("#country").val();
 $.ajax({
 type:"POST",
 url:"<?php echo base_url();?>order",
data:{user_id:user_id,address:address,city:city,state:state,pin:pin,country:country,quiz_topic_id:quiz_topic_id,pro_id:pro_id},
success:function(msg){
//alert(msg);
window.location ='<?php echo base_url();?>thankyou';
 
}

 });
 
 }
 
</script>
<?php echo $this->load->view('footer'); ?>
