<?php echo $this->load->view('admin/header') ; ?>
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>Questions - <?php echo $topic->qtopic_name; ?>
        <button class="btn btn-labeled btn-info" type="button" style="float: right;" data-toggle="modal" data-target="#addModal">
        <span class="btn-label"><i class="fa fa-plus"></i>
        </span>Add</button>
        </h3>
        <div style="text-align: center;"><span style="text-align: center; color: red;" id="categorymsg"><?php echo $this->session->flashdata('question'); ?></span></div>
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
                                 <th>Question</th>
                                 <th>Option 1</th>
                                 <th>Option 2</th>
                                 <th>Option 3</th>
                                 <th>Option 4</th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            foreach($questions as $ques)
                            {
                                $id = $ques->q_id;
                            ?>
                            <tr>
                                <td><strong>"<?php echo $ques->question; ?>"</strong></td>
                                <td <?php echo $ques->correct_option=='1' ? "style='color:green'" : ""; ?> ><?php echo $ques->option1; ?></td>
                                <td <?php echo $ques->correct_option=='2' ? "style='color:green'" : ""; ?>><?php echo $ques->option2; ?></td>
                                <td <?php echo $ques->correct_option=='3' ? "style='color:green'" : ""; ?>><?php echo $ques->option3; ?></td>
                                <td <?php echo $ques->correct_option=='4' ? "style='color:green'" : ""; ?>><?php echo $ques->option4; ?></td>
                                <td style="text-align: center;"><a class="fa fa-edit" title="Edit" onclick="editmodal(<?php echo $id; ?>)"></a></td>
                                <?php if($ques->q_status == 1){ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_question_status/<?php echo $id; ?>/0" class="fa fa-circle" style="color: green;" onclick="return confirm('Do you want to De-Activate the question?')" title="Active"></a></td>
                                <?php } else{ ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/change_question_status/<?php echo $id; ?>/1" class="fa fa-circle" style="color: red;" onclick="return confirm('Do you want to Activate the question?')" title="De-Active"></a></td>
                                <?php } ?>
                                <td style="text-align: center;"><a href="<?php echo base_url();?>admin/delete_question/<?php echo $id; ?>" class="fa fa-trash-o" style="color: red;" onclick="return confirm('Do you want to delete the question?')"></a></td>
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
                       <h4 id="myModalLabel" class="modal-title">Edit Question</h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/edit_question">
                    <input type="hidden" name="edit_question_id" id="edit_question_id" />
                        <input type="hidden" name="edit_topic_id" value="<?php echo $topic->qtopic_id; ?>"/>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Question</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Question" class="form-control" id="edit_question" name="edit_question"></textarea>
                              </div>
                           </div>
                           <p class="text-primary" style="text-align: center;">Select the correct option.</p>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 1</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="edit_correct_option" id="edit_correct_option" value="1"/>
                                 </span>
                                 <input type="text" class="form-control" name="edit_option1" id="edit_option1"/>
                              </div>
                            </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 2</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="edit_correct_option" id="edit_correct_option" value="2"/>
                                 </span>
                                 <input type="text" class="form-control" name="edit_option2" id="edit_option2"/>
                              </div>
                           </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 3</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="edit_correct_option" id="edit_correct_option" value="3"/>
                                 </span>
                                 <input type="text" class="form-control" name="edit_option3" id="edit_option3"/>
                              </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 4</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="edit_correct_option" id="edit_correct_option" value="4"/>
                                 </span>
                                 <input type="text" class="form-control" name="edit_option4" id="edit_option4"/>
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

<!-- START modal-->
       <div id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button>
                   <h4 id="myModalLabel" class="modal-title">Add New Question</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/add_question">
                            <input type="hidden" name="topic_id" value="<?php echo $topic->qtopic_id; ?>"/>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Question</label>
                              <div class="col-lg-10">
                                 <textarea placeholder="Question" class="form-control" id="question" name="question"></textarea>
                              </div>
                           </div>
                           <p class="text-primary" style="text-align: center;">Select the correct option.</p>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 1</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="correct_option" id="correct_option" value="1"/>
                                 </span>
                                 <input type="text" class="form-control" name="option1" id="option1"/>
                              </div>
                            </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 2</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="correct_option" id="correct_option" value="2"/>
                                 </span>
                                 <input type="text" class="form-control" name="option2" id="option2"/>
                              </div>
                           </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 3</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="correct_option" id="correct_option" value="3"/>
                                 </span>
                                 <input type="text" class="form-control" name="option3" id="option3"/>
                              </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-2 control-label">Option 4</label>
                              <div class="col-lg-10">
                              <div class="input-group">
                                 <span class="input-group-addon">
                                    <input type="radio" name="correct_option" id="correct_option" value="4"/>
                                 </span>
                                 <input type="text" class="form-control" name="option4" id="option4"/>
                              </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                 <button type="submit" class="btn btn-sm btn-primary">Add Question</button>
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
    		url: "<?php echo base_url(); ?>admin/get_question_byid",
    		data:'id='+val,
    		success: function(data){
                var obj = jQuery.parseJSON(data);
                //alert(obj.qcat_name);
                $('#edit_question_id').val(obj.q_id);
                $('#edit_question').val(obj.question);
                $('#edit_option1').val(obj.option1);
                $('#edit_option2').val(obj.option2);
                $('#edit_option3').val(obj.option3);
                $('#edit_option4').val(obj.option4);
                $("input[name=edit_correct_option][value=" + obj.correct_option + "]").prop('checked', true);
                //$('#edit_correct_option').val(obj.correct_option).prop('checked', true);;
                $('#editModal').modal('show', {backdrop: 'static'});
 	          }
		  });
}

</script>

<?php echo $this->load->view('admin/footer'); ?>