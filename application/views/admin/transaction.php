<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Transaction Details</h3>
        
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
                                 <th>User Name</th>
                                 <th>Transaction Id </th>
                                 <th>Previous Credit</th>
                                  <th>Amount</th>
                                 <th>Current Credit</th>
                                 <th>Date</th>
                                
                                
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            // print_r($trans);
                            foreach($trans as $u)
                            {
                            //print_r($u);
                                $id = $u->id;
                            ?>
                            <tr>
                                <td><?php 
                                
                               $user_id = $u->user_id;
                              echo $c = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id='".$user_id."'");  ?> </td>
                    
                                <td><?php echo $u->transaction; ?></td>
                               
                                <td><?php echo $u->previous_credit; ?></td>
                                 <td><?php echo $u->amount; ?></td>
                                <td><?php echo $u->current_credit; ?></td>
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
                   <h4 id="myModalLabel" class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_user">
                    <input type="hidden" name="edit_cat_id" id="edit_cat_id" />
                           <div class="form-group">
                              <label class="col-lg-2 control-label">User Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Category Name" class="form-control" id="edit_catname" name="edit_catname" />
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Category Description</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Category Description" class="form-control" id="edit_catdesc" name="edit_catdesc"></textarea>
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
 alert(val);
    $.ajax({
    		type: "POST",
    		//url: "<?php echo base_url(); ?>admin/get_quiz_category_byid",
    		url: "<?php echo base_url(); ?>admin/get_userby_id",
    		data:'id='+val,
    		success: function(data){
    		//alert(data);
                var obj = jQuery.parseJSON(data);
                //alert(obj.qcat_name);
                alert(obj.cust_id);
                $('#edit_cat_id').val(obj.cust_id);
                $('#edit_catname').val(obj.cust_name);
                //$('#edit_catdesc').html(obj.qcat_desc);
                $('#editModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}

</script>

<?php echo $this->load->view('admin/footer'); ?>