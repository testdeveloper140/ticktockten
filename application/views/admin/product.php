<?php echo $this->load->view('admin/header') ; ?>
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Products - <?php echo $subcategory->psub_name; ?>
        <button class="btn btn-labeled btn-info" type="button" style="float: right;" data-toggle="modal" data-target="#addModal">
        <span class="btn-label"><i class="fa fa-plus"></i>
        </span>Add</button>
        </h3>
        <div style="text-align: center;"><span style="text-align: center; color: red;" id="categorymsg"><?php echo $this->session->flashdata('product'); ?></span></div>
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
                                 <th>Model No.</th>
                                 <th>Product</th>
                                 <th>Description</th>
                                 <th>Quantity</th>
                                 <th>Amount</th>
                                 <th>Availability</th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            foreach($product as $prod)
                            {
                                $id = $prod->prod_id;
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <a onclick="editimage(<?php echo $id; ?>)"><img class="img-responsive img-circle" alt="Image" src="<?php echo base_url().$prod->prod_image; ?>"/></a>
                                    </div>
                                </td>
                                <td><strong>"<?php echo $prod->prod_model_no; ?>"</strong></td>
                                <td><?php echo $prod->prod_name; ?></td>
                                <td><?php echo $prod->prod_desc; ?></td>
                                <td><?php echo $prod->prod_quantity; ?></td>
                                <td>$ <?php echo $prod->prod_amount; ?></td>
                                <td><?php echo $prod->prod_availability; ?></td>
                                <td style="text-align: center;"><a class="fa fa-edit" title="Edit" onclick="editmodal(<?php echo $id; ?>)"></a></td>
                                <?php if($prod->prod_status == 1){ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_product_status/<?php echo $id; ?>/0" class="fa fa-circle" style="color: green;" onclick="return confirm('Do you want to De-Activate the product?')" title="Active"></a></td>
                                <?php } else{ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_product_status/<?php echo $id; ?>/1" class="fa fa-circle" style="color: red;" onclick="return confirm('Do you want to Activate the product?')" title="De-Active"></a></td>
                                <?php } ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/delete_product/<?php echo $id; ?>" class="fa fa-trash-o" style="color: red;" onclick="return confirm('Do you want to delete the product?')"></a></td>
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

    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
              <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                       <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                       <h4 id="myModalLabel" class="modal-title">Edit Product</h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_product">
                    <input type="hidden" name="edit_product_id" id="edit_product_id" />
                        <input type="hidden" name="edit_sub_id" value="<?php echo $subcategory->psub_id; ?>"/>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Model No.</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Model No." class="form-control" id="edit_modelno" name="edit_modelno" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Product Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Product Name" class="form-control" id="edit_prod_name" name="edit_prod_name" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Description</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Description" class="form-control" id="edit_prod_desc" name="edit_prod_desc"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Amount</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Amount" class="form-control" id="edit_prod_amount" name="edit_prod_amount" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Quantity</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Quantity" class="form-control" id="edit_prod_quantity" name="edit_prod_quantity" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Availability</label>
                              <div class="col-lg-10">
                                 <select class="form-control" id="edit_prod_availability" name="edit_prod_availability" required="required">
                                    <option value="">Availability</option>
                                    <option value="In Stock">In Stock</option>
                                    <option value="Out of Stock">Out of Stock</option>
                                    <option value="Discontinued">Discontinued</option>
                                 </select>
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

<!-- START modal-->
       <div id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                   <h4 id="myModalLabel" class="modal-title">Add New Product</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/add_product" enctype="multipart/form-data">
                    
                        <input type="hidden" name="sub_id" value="<?php echo $subcategory->psub_id; ?>"/>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Model No.</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Model No." class="form-control" id="modelno" name="modelno" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Product Name</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Product Name" class="form-control" id="prod_name" name="prod_name" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Description</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Description" class="form-control" id="prod_desc" name="prod_desc"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Amount</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Amount" class="form-control" id="prod_amount" name="prod_amount" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Quantity</label>
                              <div class="col-lg-10">
                                 <input type="text" placeholder="Quantity" class="form-control" id="prod_quantity" name="prod_quantity" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Availability</label>
                              <div class="col-lg-10">
                                 <select class="form-control" id="prod_availability" name="prod_availability" required="required">
                                    <option value="">Availability</option>
                                    <option value="In Stock">In Stock</option>
                                    <option value="Out of Stock">Out of Stock</option>
                                    <option value="Discontinued">Discontinued</option>
                                 </select>
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
                                 <button type="submit" class="btn btn-sm btn-primary">Add Product</button>
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
                   <h4 id="myModalLabel" class="modal-title">Change Product Image</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_product_image" enctype="multipart/form-data">
                    
                        <input type="hidden" name="edit_product_id1" id="edit_product_id1" />
                        <input type="hidden" name="edit_sub_id1" value="<?php echo $subcategory->psub_id; ?>"/>

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
                                 <button type="submit" class="btn btn-sm btn-primary">Add Product</button>
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
        		url: "<?php echo base_url(); ?>admin/get_product_byid",
        		data:'id='+val,
        		success: function(data){
                    var obj = jQuery.parseJSON(data);
                    //alert(obj.qcat_name);
                    $('#edit_product_id').val(obj.prod_id);
                    $('#edit_modelno').val(obj.prod_model_no);
                    $('#edit_prod_name').val(obj.prod_name);
                    $('#edit_prod_desc').val(obj.prod_desc);
                    $('#edit_prod_amount').val(obj.prod_amount);
                    $('#edit_prod_quantity').val(obj.prod_quantity);
                    $('#edit_prod_availability').val(obj.prod_availability);
                    $('#editModal').modal('show', {backdrop: 'static'});
     	          }
    		  });
    }
    
    function editimage(val)
    {
        $.ajax({
        		type: "POST",
        		url: "<?php echo base_url(); ?>admin/get_product_byid",
        		data:'id='+val,
        		success: function(data){
                    var obj = jQuery.parseJSON(data);
                    //alert(obj.qcat_name);
                    $('#edit_product_id1').val(obj.prod_id);
                    
                    $('#editImageModal').modal('show', {backdrop: 'static'});
     	          }
    		  });
    }

</script>

<?php echo $this->load->view('admin/footer'); ?>