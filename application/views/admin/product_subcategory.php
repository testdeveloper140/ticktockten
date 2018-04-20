<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Product Sub-Category
        <button class="btn btn-labeled btn-info" type="button" style="float: right;" data-toggle="modal" data-target="#addModal">
        <span class="btn-label"><i class="fa fa-plus"></i>
        </span>Add</button>
        </h3>
        <div style="text-align: center;"><span style="text-align: center; color: red;" id="categorymsg"><?php echo $this->session->flashdata('productsubcategory'); ?></span></div>
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
                                 <th></th>
                                 <th>Sub-Category</th>
                                 <th>Description</th>
                                 <th>Category</th>
                                 <th>Added On</th>
                                 <th style="text-align: center;">Products</th>
                                 <th style="text-align: center;">Edit</th>
                                 <th style="text-align: center;">Status</th>
                                 <th style="text-align: center;">Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            foreach($product_subcategory as $psub)
                            {
                                $id = $psub->psub_id;
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <a onclick="editimage(<?php echo $id; ?>)" href="javascript:void(0)"><img class="img-responsive img-circle" alt="<?php echo $psub->psub_name	; ?>" src="<?php echo base_url().$psub->psub_image; ?>"/></a>
                                    </div>
                                </td>
                                <td><?php echo $psub->psub_name	; ?></td>
                                <td><?php echo $psub->psub_desc	; ?></td>
                                <td><?php echo $psub->pcat_name; ?></td>
                                <td><?php echo date("M d,Y",strtotime($psub->psub_date)); ?></td>
                                <td style="text-align: center;">
                                <!-- <form method="post" action="<?php //echo base_url();?>admin/questions">
                                <input type="hidden" name="topic_id" value="<?php //echo $id; ?>"/>
                                <input type="submit" class="btn btn-green" title="Questions" value="?" />
                                </form> -->
                                <a class="btn btn-green" title="Questions" href="<?php echo base_url();?>admin/product/<?php echo $id; ?>"><i class="fa fa-plus"></i></a>
                                
                                </td>
                                <td style="text-align: center;"><a class="fa fa-edit" title="Edit" onclick="editmodal(<?php echo $id; ?>)"></a></td>
                                <?php if($psub->psub_status == 1){ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_subcategory_status/<?php echo $id; ?>/0" class="fa fa-circle" style="color: green;" onclick="return confirm('Do you want to De-Activate the sub-category?')" title="Active"></a></td>
                                <?php } else{ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_subcategory_status/<?php echo $id; ?>/1" class="fa fa-circle" style="color: red;" onclick="return confirm('Do you want to Activate the sub-category?')" title="De-Active"></a></td>
                                <?php } ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/delete_subcategory/<?php echo $id; ?>" class="fa fa-trash-o" style="color: red;" onclick="return confirm('Do you want to delete the sub-category?')"></a></td>
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
                   <h4 id="myModalLabel" class="modal-title">Edit Sub-Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_product_subcategory">
                            <input type="hidden" name="edit_sub_id" id="edit_sub_id"/>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Category Name</label>
                              <div class="col-lg-10">
                                 <select class="form-control" id="edit_catid" name="edit_catid" required="required">
                                 <?php
                                 foreach($product_category as $pc)
                                 {
                                 ?>
                                    <option value="<?php echo $pc->pcat_id; ?>"><?php echo $pc->pcat_name; ?></option>
                                 <?php
                                 }
                                 ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Sub-Category Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Sub-Category Name" class="form-control" id="edit_subname" name="edit_subname" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Sub-Category Description</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Sub-Category Description" class="form-control" id="edit_subdesc" name="edit_subdesc"></textarea>
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
                   <h4 id="myModalLabel" class="modal-title">Add New Sub-Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/add_product_subcategory" enctype="multipart/form-data">
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Category Name</label>
                              <div class="col-lg-10">
                                 <select class="form-control" id="catid" name="catid" required="required">
                                    <option value="">Category Name</option>
                                 <?php
                                 foreach($product_category as $pc)
                                 {
                                 ?>
                                    <option value="<?php echo $pc->pcat_id; ?>"><?php echo $pc->pcat_name; ?></option>
                                 <?php
                                 }
                                 ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Sub-Category Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Sub-Category Name" class="form-control" id="subname" name="subname" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Sub-Category Description</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Sub-Category Description" class="form-control" id="subdesc" name="subdesc"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                               <label class="col-lg-2 control-label">Image</label>
                               <div class="col-lg-10">
                                  <input type="file" class="filestyle form-control" name="myfile" onchange="readURL(this);"/>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-10">
                                    <div class="media">
                                        <img class="img-responsive img-circle" id="proimg" src="#" alt=""/>
                                   </div>
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
   
   <!-- START modal-->
       <div id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                   <h4 id="myModalLabel" class="modal-title">Change Sub-Category Image</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_product_subcategory_image" enctype="multipart/form-data">
                            
                           <input type="hidden" name="edit_sub_id1" id="edit_sub_id1"/>
                           
                           <div class="form-group">
                               <label class="col-lg-2 control-label">Image</label>
                               <div class="col-lg-10">
                                  <input type="file" class="filestyle form-control" name="myfile1" onchange="readURL1(this);"/>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-10">
                                    <div class="media">
                                        <img class="img-responsive img-circle" id="proimg1" src="#" alt=""/>
                                   </div>
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
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#proimg1')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
  
<script>
function editmodal(val)
{
    $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>admin/get_product_subcategory_byid",
    		data:'id='+val,
    		success: function(data){
                var obj = jQuery.parseJSON(data);
                //alert(obj.qtopic_name);
                $('#edit_sub_id').val(obj.psub_id);
                $('#edit_catid').val(obj.p_cat_id);
                $('#edit_subname').val(obj.psub_name);
                $('#edit_subdesc').html(obj.psub_desc);
                $('#editModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}


function editimage(val)
{
    $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>admin/get_product_subcategory_byid",
    		data:'id='+val,
    		success: function(data){
                var obj = jQuery.parseJSON(data);
                //alert(obj.qtopic_name);
                $('#edit_sub_id1').val(obj.psub_id);
                $('#editImageModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}
</script>                   

<?php echo $this->load->view('admin/footer'); ?>