<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Users</h3>
        
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
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Credit</th>
                                 <th>Registered On</th>
                                 <th>Edit</th>
                                 <th></th>
                                 <th></td>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            foreach($users as $u)
                            {
                                $id = $u->cust_id;
                            ?>
                            <tr>
                                <td><?php echo $u->cust_name; ?></td>
                                <td><?php echo $u->cust_email; ?></td>
                                <td><?php echo $u->cust_phone; ?></td>
                                <td><?php echo $u->cradit; ?></td>
                                <td><?php echo date("M d,Y",strtotime($u->cust_add_date)); ?></td>
                                <td style="text-align: center;"><a class="fa fa-edit" title="Edit" onclick="editmodal(<?php echo $id; ?>)"></a></td>
                                <?php if($u->cust_status == 1){ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_user_status/<?php echo $id; ?>/0" class="fa fa-circle" style="color: green;" onclick="return confirm('Do you want to De-Activate the user?')" title="Active"></a></td>
                                <?php } else{ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_user_status/<?php echo $id; ?>/1" class="fa fa-circle" style="color: red;" onclick="return confirm('Do you want to Activate the user?')" title="De-Active"></a></td>
                                <?php } ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/delete_user/<?php echo $id; ?>" class="fa fa-trash-o" style="color: red;" onclick="return confirm('Do you want to delete the user?')"></a></td>
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
                   <h4 id="myModalLabel" class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_user">
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
                                 <input type="text" placeholder="Category Name" class="form-control" id="edit_catname" name="edit_catname" readonly="" />
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
                                
                                 <input type="text" placeholder="User Credit" class="form-control" id="edit_user_credit" name ="edit_user_credit" />
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                 <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                              </div>
                           </div>
                        </form>
                </div>
             </div>
          </div>
       </div>
   <!-- END modal-->
   
   <script>
function editmodal(val)
{
 
    $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>admin/get_userby_id",
    		data:'id='+val,
    		success: function(data){
    		//alert(data);
                var obj = jQuery.parseJSON(data);
                //alert(obj);
                //alert(obj.cust_name);
                
                $('#edit_cat_id').val(obj.cust_id);
                $('#edit_catname').val(obj.cust_name);
                $('#edit_user_email').val(obj.cust_email);
                $('#edit_user_phone').val(obj.cust_phone);
                $('#edit_user_credit').val(obj.cradit);
                $('#proimg1').attr('src','<?php echo base_url();?>'+(obj.cust_image));
                $('#editModal').modal('show', {backdrop: 'static'});
                
 	          }
		  });
}

</script>

<?php echo $this->load->view('admin/footer'); ?>