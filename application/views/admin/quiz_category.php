<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Quiz Category
        <button class="btn btn-labeled btn-info" type="button" style="float: right;" data-toggle="modal" data-target="#addModal">
        <span class="btn-label"><i class="fa fa-plus"></i>
        </span>Add</button>
        </h3>
        <div style="text-align: center;"><span style="text-align: center; color: red;" id="categorymsg"><?php echo $this->session->flashdata('quizcategory'); ?></span></div>
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
                                 <th>Category </th>
                                 <th>Added On</th>
                                 <th style="text-align: center;">Edit</th>
                                 <th style="text-align: center;">Status</th>
                                 <th style="text-align: center;">Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            foreach($quiz_category as $qc)
                            {
                                $id = $qc->qcat_id;
                            ?>
                            <tr>
                                <td><?php echo $qc->qcat_name; ?></td>
                                <td><?php echo date("M d,Y",strtotime($qc->qcat_add_date)); ?></td>
                                <td style="text-align: center;"><a class="fa fa-edit" title="Edit" onclick="editmodal(<?php echo $id; ?>)"></a></td>
                                <?php if($qc->qcat_status == 1){ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_category_status/<?php echo $id; ?>/0" class="fa fa-circle" style="color: green;" onclick="return confirm('Do you want to De-Activate the category?')" title="Active"></a></td>
                                <?php } else{ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_category_status/<?php echo $id; ?>/1" class="fa fa-circle" style="color: red;" onclick="return confirm('Do you want to Activate the category?')" title="De-Active"></a></td>
                                <?php } ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/delete_category/<?php echo $id; ?>" class="fa fa-trash-o" style="color: red;" onclick="return confirm('Do you want to delete the category?')"></a></td>
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
                   <h4 id="myModalLabel" class="modal-title">Edit Quiz Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_quiz_category">
                    <input type="hidden" name="edit_cat_id" id="edit_cat_id" />
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Category Name</label>
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
   
   <!-- START modal-->
       <div id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                   <h4 id="myModalLabel" class="modal-title">Add New Quiz Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/add_quiz_category">
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Category Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Category Name" class="form-control" id="catname" name="catname" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Category Description</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Category Description" class="form-control" id="catdesc" name="catdesc"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                 <button type="submit" class="btn btn-sm btn-primary">ADD</button>
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
    		url: "<?php echo base_url(); ?>admin/get_quiz_category_byid",
    		data:'id='+val,
    		success: function(data){
                var obj = jQuery.parseJSON(data);
                //alert(data);
                $('#edit_cat_id').val(obj.qcat_id);
                $('#edit_catname').val(obj.qcat_name);
                $('#edit_catdesc').html(obj.qcat_desc);
                $('#editModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}

</script>                 

<?php echo $this->load->view('admin/footer'); ?>