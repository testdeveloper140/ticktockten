<?php echo $this->load->view('header') ; ?>
<style>
.table-1 {width: 100%;border: 1px solid #d0cccc;padding:5px;margin-top: 36px;}
.table-1 tr{padding: 5px;}
.table-1  td{padding: 12px 14px;border: 1px solid #d0cccc;font-size: 18px;
    }
</style>

<?php
 
$last_trans_id = $this->session->userdata('last_trans_id');
 $tra_no= $this->custom_function->get_perticular_field_value('tbl_transaction', 'transaction', " and id ='".$last_trans_id."'");
 $amount= $this->custom_function->get_perticular_field_value('tbl_transaction', 'amount', " and id ='".$last_trans_id."'");
 $user_id = $this->custom_function->get_perticular_field_value('tbl_transaction', 'user_id', " and id ='".$last_trans_id."'");
 $date= $this->custom_function->get_perticular_field_value('tbl_transaction', 'date', " and id ='".$last_trans_id."'");
 
if($last_trans_id==''){
 redirect($url);
 }
?>
<div class="container">
<div class="row">
 <center><h2>Thank You</h2></center> <br>
 <center><h3>Your purchase has been processed sucessfully.<h3></center>
 <center><h3>Your order detail</center>
 <div class="col-sm-3"> </div>
 <div class="col-sm-6">
<table class="table-1" style="margin-bottom:50px;">
<tr>
<td>Your transaction ID : </td>
<td> <?php echo $tra_no;?></td>
</tr>
<tr>
<td>Paid credit : </td>
<td><?php echo '$ '.$amount; ?></td>
</tr>
<td>Credit date : </td>
<td><?php echo $date; ?></td>
</tr>

</table>
<div class="col-sm-12 text-center" style="padding:10px;margin-bottom:20px;text-decoration:underline;"><a  class="" href="<?php echo base_url(); ?>games">Return to game page</a></div>
<div class="claerfix"></div>
</div>
<div class="claerfix"></div>


</div>
</div>

<?php echo $this->load->view('footer'); ?>