<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Product Category
        <button class="btn btn-labeled btn-info" type="button" style="float: right;" data-toggle="modal" data-target="#addModal">
        <span class="btn-label"><i class="fa fa-plus"></i>
        </span>Add</button>
        </h3>
        <div style="text-align: center;"><span style="text-align: center; color: red;" id="categorymsg"><?php echo $this->session->flashdata('productcategory'); ?></span></div>
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
                                 <th>Category </th>
                                 <th>Description </th>
                                 <th>Added On</th>
                                 <th style="text-align: center;">Edit</th>
                                 <th style="text-align: center;">Status</th>
                                 <th style="text-align: center;">Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            foreach($product_category as $pc)
                            {
                                $id = $pc->pcat_id;
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <a href="#" onclick="editimage(<?php echo $id; ?>)"><img class="img-responsive img-circle" alt="<?php echo $pc->pcat_name; ?>" src="<?php echo base_url().$pc->pcat_image; ?>"/></a>
                                    </div>
                                </td>
                                <td><?php echo $pc->pcat_name; ?></td>
                                <td><?php echo $pc->pcat_desc; ?></td>
                                <td><?php echo date("M d,Y",strtotime($pc->pcat_add_date)); ?></td>
                                <td style="text-align: center;"><a class="fa fa-edit" title="Edit" onclick="editmodal(<?php echo $id; ?>)"></a></td>
                                <?php if($pc->pcat_status == 1){ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_product_category_status/<?php echo $id; ?>/0" class="fa fa-circle" style="color: green;" onclick="return confirm('Do you want to De-Activate the category?')" title="Active"></a></td>
                                <?php } else{ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_product_category_status/<?php echo $id; ?>/1" class="fa fa-circle" style="color: red;" onclick="return confirm('Do you want to Activate the category?')" title="De-Active"></a></td>
                                <?php } ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/delete_product_category/<?php echo $id; ?>" class="fa fa-trash-o" style="color: red;" onclick="return confirm('Do you want to delete the category?')"></a></td>
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
                   <h4 id="myModalLabel" class="modal-title">Edit Product Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_product_category">
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
                   <h4 id="myModalLabel" class="modal-title">Add New Product Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/add_product_category" enctype="multipart/form-data">
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
       <div id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade" >
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                   <h4 id="myModalLabel" class="modal-title">Change Product Category Image</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_product_category_image" enctype="multipart/form-data">
                        <input type="hidden" name="edit_cat_id1" id="edit_cat_id1"  />
                           
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
    		url: "<?php echo base_url(); ?>admin/get_product_category_byid",
    		data:'id='+val,
    		success: function(data){
                var obj = jQuery.parseJSON(data);
                //alert(obj.qcat_name);
                $('#edit_cat_id').val(obj.pcat_id);
                $('#edit_catname').val(obj.pcat_name);
                $('#edit_catdesc').html(obj.pcat_desc);
                $('#editModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}

function editimage(val)
{
    $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>admin/get_product_category_byid",
    		data:'id='+val,
    		success: function(data){
                var obj = jQuery.parseJSON(data);
                //alert(obj.qcat_name);
                $('#edit_cat_id1').val(obj.pcat_id);
                $('#editImageModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}
</script>                 

<?php echo $this->load->view('admin/footer'); ?>