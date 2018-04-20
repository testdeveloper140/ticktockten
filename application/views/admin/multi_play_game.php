<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Multi Player Game</h3>
        
        <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-default">
                     <!-- <div class="panel-heading">
                        Data Tables |
                        <small>Zero Configuration</small>
                     </div> -->
                     <div class="panel-body">
                        <table id="datatable1" class="table table-striped table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Game Id</th>
                                 <th>Product Name</th>
                                  <th>Topic Name</th>
                                  <th>Players</th>
                                 <th>Winner</th>
                                 
                                 <th>Start Date & Time</th>
                                
                                
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            //print_r($muti_player_game);
                            foreach($muti_player_game as $u)
                            {
                           //print_r($u);
                                $id = $u->id;
                            ?>
                            <tr>
                                <td><?php 
                                
                               echo $u->game_id;
                             // echo $c = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id='".$user_id."'"); 
                    
                                ?></td>
                                <td><?php $pro_id= $u->product_id;
                echo $c = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_name', " and prod_id='".$pro_id."'");  
                   ?></td>
               <td><?php $topic_id= $u->quiz_topic_id;
                 echo $d = $this->custom_function->get_perticular_field_value('tbl_quiz_topic', 'qtopic_name', " and qtopic_id='".$topic_id."'");                
                                 ?></td>
                                 <td>
                                 <?php $players_id = $u->players_id;
                                $play = explode(',',$players_id); 
                               $player1 = $play[0];
                               $player2 = $play[1];
     $player1_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'user_id', " and player_id='".$player1."'");       
     $player2_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'user_id', " and player_id='".$player2."'");       
                                  ?>
    <span id="winner" onclick="editmodal('<?php echo $player1_id; ?>')"><?php echo $player1;?></span>,
    <span id="winner" onclick="editmodal('<?php echo $player2_id; ?>')"><?php echo $player2;?></span>
    </td>
                                 
                                 </td>
                                 
                                <td><?php
                              $user_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'user_id', " and player_id='".$u->winner."'");   
                               ?>
                                 <span id="winner" onclick="editmodal('<?php echo $user_id; ?>')"><?php echo $u->winner;?></span></td>
                                
                                 <td><?php echo $u->date; ?></td>
                               
                            </tr>
                            <?php
                            }
                            ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
    </div>
<!-- END Page content-->
</section>
<!-- END Main section-->

<!-- START modal-->
       <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                   <h4 id="myModalLabel" class="modal-title">User Deails</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="">
                    <input type="hidden" name="edit_cat_id" id="edit_cat_id" />
                    <div class="form-group">
                    <div class="col-lg-10">
                                    <div class="media">
                                        <img class="img-responsive" id="proimg1" src="#" height="60" width="60" alt=""/>
                                   </div>
                               </div>
                            </div>
                               
                           <div class="form-group">
                              <label class="col-lg-2 control-label">User Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Category Name" class="form-control" id="edit_catname" readonly="" name="edit_catname" />
                              </div>
                           </div>
                          
                          <div class="form-group">
                              <label class="col-lg-2 control-label">User Email</label>
                              <div class="col-lg-10">
                                
                                 <input type="text" placeholder="User Email" class="form-control" id="edit_user_email" readonly="" name ="edit_user_email" />
                              </div>
                           </div>
                          
                           <div class="form-group">
                              <label class="col-lg-2 control-label">User Phone</label>
                              <div class="col-lg-10">
                                
                                 <input type="text" placeholder="User Phone" class="form-control" id="edit_user_phone" name ="edit_user_phone" />
                              </div>
                           </div>
                           
                            <div class="form-group">
                              <label class="col-lg-2 control-label">User Credit</label>
                              <div class="col-lg-10">
                                
                                 <input type="text" placeholder="User Phone" class="form-control" id="usercredit" name ="usercredit" />
                              </div>
                           </div>
                            
                          
                               
                           <!--<div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                 <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                              </div>
                           </div>-->
                        </form>
                </div>
             </div>
          </div>
       </div>
   <!-- END modal-->
   
   <script>
function editmodal(val)
{
 //alert(val);
    $.ajax({
    		type: "POST",
    		//url: "<?php echo base_url(); ?>admin/get_quiz_category_byid",
    		url: "<?php echo base_url(); ?>admin/get_userby_id",
    		data:'id='+val,
    		success: function(data){
    		//alert(data);
                var obj = jQuery.parseJSON(data);
                //alert(obj.qcat_name);
               //alert(obj.cust_image);
                
                $('#edit_cat_id').val(obj.cust_id);
                $('#edit_catname').val(obj.cust_name);
                $('#edit_user_email').val(obj.cust_email);
                $('#edit_user_phone').val(obj.cust_phone);
                $('#usercredit').val(obj.cradit);
                $('#proimg1').attr('src','<?php echo base_url();?>'+(obj.cust_image));
                
                $('#editModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}

</script>

<?php echo $this->load->view('admin/footer'); ?>