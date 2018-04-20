<?php echo $this->load->view('header') ; ?>
<style>
.table-1 {width: 100%;border: 1px solid #d0cccc;padding:5px;margin-top: 36px;}
.table-1 tr{padding: 5px;}
.table-1  td{padding: 12px 14px;border: 1px solid #d0cccc;font-size: 18px;
    }
</style>

<?php
 
$last_order_id = $this->session->userdata('last_order_id');
$trans_no= $this->custom_function->get_perticular_field_value('tbl_order', 'transation_id', " and id ='".$last_order_id."'");
 $pro_id = $this->custom_function->get_perticular_field_value('tbl_order', 'product_id', " and id ='".$last_order_id."'");
 $pro_name = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_name', " and prod_id ='".$pro_id."'");
 $prod_amount = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_amount', " and prod_id ='".$pro_id."'");
 $quiz_topic_id = $this->custom_function->get_perticular_field_value('tbl_order', 'quiz_topic_id', " and id ='".$last_order_id."'");
 $game_name = $this->custom_function->get_perticular_field_value('tbl_quiz_topic', 'qtopic_name', " and qtopic_id='".$quiz_topic_id."'");
 $address = $this->custom_function->get_perticular_field_value('tbl_order', 'address', " and id ='".$last_order_id."'");
$city = $this->custom_function->get_perticular_field_value('tbl_order', 'city', " and id ='".$last_order_id."'");
$state = $this->custom_function->get_perticular_field_value('tbl_order', 'state', " and id ='".$last_order_id."'");
$pincode = $this->custom_function->get_perticular_field_value('tbl_order', 'pin', " and id ='".$last_order_id."'");
$country= $this->custom_function->get_perticular_field_value('tbl_order', 'country', " and id ='".$last_order_id."'"); 

 $game_id = $this->custom_function->get_perticular_field_value('tbl_order', 'game_id', " and id ='".$last_order_id."'"); 
// $city = $this->custom_function->get_perticular_field_value('tbl_order', 'city/town', " and id ='".$last_order_id."'");
 $state = $this->custom_function->get_perticular_field_value('tbl_order', 'state', " and id ='".$last_order_id."'");
 $pin = $this->custom_function->get_perticular_field_value('tbl_order', 'pin', " and id ='".$last_order_id."'");
 $country = $this->custom_function->get_perticular_field_value('tbl_order', 'country', " and id ='".$last_order_id."'");
if($last_order_id==''){
 //redirect($url);
 }
?>
<div class="container">
<div class="row">

 <center><h3>Your order detail</center>
 <div class="col-sm-3"> </div>
 <div class="col-sm-6">
<table class="table-1" style="margin-bottom:50px;">
<tr>
<td>Your transaction ID : </td>
<td> <?php echo $trans_no;?></td>
</tr>
<tr>
<td>Your game ID : </td>
<td> <?php echo $game_id;?></td>
</tr>
<tr>
<td>Game name : </td>
<td><?php echo $game_name; ?></td>
</tr>
<tr>
<td>Product name : </td>
<td><?php echo $pro_name; ?></td>
</tr>
<tr>
<td>Product Amount: </td>
<td><?php echo '$ '.$prod_amount; ?></td>
</tr>
<td>Your address : </td>
<td><?php echo $address.', '.$city.', '.$state.' - '.$pincode.', '.$country; ?></td>
</tr>

</table>
</div>
<div class="claerfix"></div>
</div>
</div>

<?php echo $this->load->view('footer'); ?>