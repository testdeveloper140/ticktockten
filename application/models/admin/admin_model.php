<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model 
{
    public function __construct() 
    {
        //parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    /* ADMIN LOGIN */
    
    public function login()
    {
        $user = $this->input->post('email');
        $password = $this->input->post('password'); 
        $q = $this->db->query("SELECT * FROM `tbl_user` WHERE (user_name = '$user' OR user_email = '$user') AND user_password = '$password' AND user_privilege = 'admin' AND user_status = 1");
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
    }
    
    /* ADMIN USERS PANEL */
    
    public function get_allusers()
    {
     $q = $this->db->query("Select * from tbl_customer order by cust_id desc");
     return $q->result();
    }
    
    public function get_userby_id(){
    $id = $this->input->post('id');
    $q = $this->db->query("Select * from tbl_customer where cust_id ='$id'");
   //echo $this->db->last_query();
     return $q->row();
    }
    public function change_user_status($id,$status)
    {
        $q = $this->db->query("Update tbl_customer set cust_status = '$status' where cust_id = '$id'");
    }
    
    public function delete_user($id)
    {
        $q = $this->db->query("Delete from tbl_customer where cust_id = '$id'");
    }
    
    /* ADMIN QUIZ PANEL */
    
    /* Category */
    public function get_quiz_category()
    {
        $q = $this->db->query("Select * from tbl_quiz_category order by qcat_id desc");
        return $q->result();
    }
    
    public function get_quiz_category_active()
    {
        $q = $this->db->query("Select * from tbl_quiz_category where qcat_status = '1' order by qcat_id desc");
        return $q->result();
    }
    
    public function add_quiz_category()
    {
        $name = $this->input->post('catname');
        $desc = $this->input->post('catdesc');
        $status = 1;
        $date = date("Y-m-d");
        $q = $this->db->query("Insert into tbl_quiz_category(qcat_name,qcat_desc,qcat_status,qcat_add_date) values ('$name','$desc','$status','$date')");
    }
    
    public function get_quiz_category_byid()
    {
        $id = $this->input->post('id');
        $q = $this->db->query("Select * from tbl_quiz_category where qcat_id = '$id'");
        return $q->row();
    }
    
    public function edit_quiz_category()
    {
        $id = $this->input->post('edit_cat_id');
        $name = $this->input->post('edit_catname');
        $desc = $this->input->post('edit_catdesc');
        
        $q = $this->db->query("Update tbl_quiz_category set qcat_name = '$name', qcat_desc = '$desc' where qcat_id = '$id'");
    }
    
    public function change_category_status($id,$status)
    {
        $q = $this->db->query("Update tbl_quiz_category set qcat_status = '$status' where qcat_id = '$id'");
    }
    
    public function delete_category($id)
    {
        $q = $this->db->query("Delete from tbl_quiz_category where qcat_id = '$id'");
    }
    
    /* Topic */
    
    public function get_quiz_topic()
    {
        $q = $this->db->query("Select * from tbl_quiz_topic, tbl_quiz_category where tbl_quiz_topic.qtopic_cat_id = tbl_quiz_category.qcat_id and tbl_quiz_category.qcat_status = '1' order by qtopic_id desc");
        return $q->result();
    }
    
    public function get_topic_byid($id)
    {
        $q = $this->db->query("Select * from tbl_quiz_topic where qtopic_id = '$id'");
        return $q->row();
    }
    
    public function add_quiz_topic($data)
    {
        $catid = $this->input->post('catid');
        $name = $this->input->post('topicname');
        $desc = $this->input->post('topicdesc');
        $status = 1;
        $date = date("Y-m-d");
        $file = $data['file_name'];
        $image = 'upload/question/'.$file;
        $q = $this->db->query("Insert into tbl_quiz_topic(qtopic_cat_id,qtopic_name,qtopic_desc,qtopic_image,qtopic_status,qtopic_add_date) values ('$catid','$name','$desc','$image','$status','$date')");
    }
    
    public function edit_quiz_topic()
    {
        $id = $this->input->post('edit_topic_id');
        $catid = $this->input->post('edit_catid');
        $name = $this->input->post('edit_topicname');
        $desc = $this->input->post('edit_topicdesc'); 
        //exit();
        $q = $this->db->query("Update tbl_quiz_topic set qtopic_cat_id = '$catid', qtopic_name = '$name', qtopic_desc = '$desc' where qtopic_id = '$id'");
    }
    
    public function edit_quiz_topic_image($data)
    {
        $id = $this->input->post('edit_topic_id1');
        $file = $data['file_name'];
        $image = 'upload/question/'.$file;
        $q = $this->db->query("Update tbl_quiz_topic set qtopic_image = '$image' where qtopic_id = '$id'");
    }
    
    public function change_topic_status($id,$status)
    {
        $q = $this->db->query("Update tbl_quiz_topic set qtopic_status = '$status' where qtopic_id = '$id'");
    }
    
    public function delete_topic($id)
    {
        $q = $this->db->query("Delete from tbl_quiz_topic where qtopic_id = '$id'");
    }
    
    /* Question */
    
    public function get_question_bytopic($id)
    {
        $q = $this->db->query("Select * from tbl_questions where q_topic_id = '$id'");
        return $q->result();
    }
    
    public function add_question()
    {
        $topic_id = mysql_real_escape_string($this->input->post('topic_id'));
        $question = mysql_real_escape_string($this->input->post('question'));
        $option1 = mysql_real_escape_string($this->input->post('option1'));
        $option2 = mysql_real_escape_string($this->input->post('option2'));
        $option3 = mysql_real_escape_string($this->input->post('option3'));
        $option4 = mysql_real_escape_string($this->input->post('option4'));
        $correct_option = $this->input->post('correct_option');
        $status = 1;
        $date = date("Y-m-d");
        
        $q = $this->db->query("Insert into tbl_questions(q_topic_id,question,option1,option2,option3,option4,correct_option,q_status,q_add_date) values('$topic_id','$question','$option1','$option2','$option3','$option4','$correct_option','$status','$date')");
        
        return $topic_id;
    }
    
    public function get_question_byid()
    {
        $id = $this->input->post('id');
        $q = $this->db->query("Select * from tbl_questions where q_id = '$id'");
        return $q->row();
    }
    
    public function edit_question()
    {
        $id = $this->input->post('edit_question_id');
        $topic_id = $this->input->post('edit_topic_id');
        $question = mysql_real_escape_string($this->input->post('edit_question'));
        $option1 = mysql_real_escape_string($this->input->post('edit_option1'));
        $option2 = mysql_real_escape_string($this->input->post('edit_option2'));
        $option3 = mysql_real_escape_string($this->input->post('edit_option3'));
        $option4 = mysql_real_escape_string($this->input->post('edit_option4'));
        $correct_option = $this->input->post('edit_correct_option');
        
        $q = $this->db->query("Update tbl_questions set question = '$question', option1 = '$option1', option2 = '$option2', option3 = '$option3', option4 = '$option4', correct_option = '$correct_option' where q_id = '$id'");
        
        return $topic_id;
    }
    
    public function change_question_status($id,$status)
    {
        $q = $this->db->query("Update tbl_questions set q_status = '$status' where q_id = '$id'");
        $q1 = $this->db->query("Select q_topic_id from tbl_questions where q_id = '$id'");
        $res = $q1->row();
        return $res->q_topic_id;
    }
    
    public function delete_question($id)
    {
        $q1 = $this->db->query("Select q_topic_id from tbl_questions where q_id = '$id'");
        $res = $q1->row();
        $q = $this->db->query("Delete from tbl_questions where q_id = '$id'");
        return $res->q_topic_id;
    }
    
    /* ADMIN PRODUCT PANEL */
        /* Product Category */
    
    public function get_product_category()
    {
        $q = $this->db->query("Select * from tbl_product_category order by pcat_id desc");
        return $q->result();
    }
    
    public function get_product_category_active()
    {
        $q = $this->db->query("Select * from tbl_product_category where pcat_status = '1' order by pcat_id desc");
        return $q->result();
    }
    
    public function add_product_category($data)
    {
        $name = $this->input->post('catname');
        $desc = $this->input->post('catdesc');
        $status = 1;
        $date = date("Y-m-d");
        $file = $data['file_name'];
        $image = 'upload/product/'.$file;
        $q = $this->db->query("Insert into tbl_product_category(pcat_name,pcat_desc,pcat_image,pcat_status,pcat_add_date) values ('$name','$desc','$image','$status','$date')");
    }
    
    public function get_product_category_byid()
    {
        $id = $this->input->post('id');
        $q = $this->db->query("Select * from tbl_product_category where pcat_id = '$id'");
        return $q->row();
    }
    
    public function edit_product_category()
    {
        $id = $this->input->post('edit_cat_id');
        $name = $this->input->post('edit_catname');
        $desc = $this->input->post('edit_catdesc');
        
        $q = $this->db->query("Update tbl_product_category set pcat_name = '$name', pcat_desc = '$desc' where pcat_id = '$id'");
    }
    
    public function edit_product_category_image($data)
    {
        $id = $this->input->post('edit_cat_id1');
        $file = $data['file_name'];
        $image = 'upload/product/'.$file;
        
        $q = $this->db->query("Update tbl_product_category set pcat_image = '$image' where pcat_id = '$id'");
    }
    
    public function change_product_category_status($id,$status)
    {
        $q = $this->db->query("Update tbl_product_category set pcat_status = '$status' where pcat_id = '$id'");
    }
    
    public function delete_product_category($id)
    {
        $q = $this->db->query("Delete from tbl_product_category where pcat_id = '$id'");
    }
    
    /* Sub-Category */
    
    public function get_product_subcategory()
    {
        $q = $this->db->query("Select * from tbl_product_subcategory, tbl_product_category where tbl_product_subcategory.p_cat_id = tbl_product_category.pcat_id and tbl_product_category.pcat_status = '1' order by psub_id desc");
        return $q->result();
    }
    
    public function get_subcategory_byid($id)
    {
        $q = $this->db->query("Select * from tbl_product_subcategory where psub_id = '$id'");
        return $q->row();
    }
    
    public function add_product_subcategory($data)
    {
        $catid = $this->input->post('catid');
        $name = $this->input->post('subname');
        $desc = $this->input->post('subdesc');
        $status = 1;
        $date = date("Y-m-d");
        $file = $data['file_name'];
        $image = 'upload/product/'.$file;
        $q = $this->db->query("Insert into tbl_product_subcategory(p_cat_id,psub_name,psub_desc,psub_image,psub_status,psub_date) values ('$catid','$name','$desc','$image','$status','$date')");
    }
    
    public function edit_product_subcategory()
    {
        $id = $this->input->post('edit_sub_id');
        $catid = $this->input->post('edit_catid');
        $name = $this->input->post('edit_subname');
        $desc = $this->input->post('edit_subdesc');
        
        $q = $this->db->query("Update tbl_product_subcategory set p_cat_id = '$catid', psub_name = '$name', psub_desc = '$desc' where psub_id = '$id'");
    }
    
    public function edit_product_subcategory_image($data)
    {
        $id = $this->input->post('edit_sub_id1');
        $file = $data['file_name'];
        $image = 'upload/product/'.$file;
        $q = $this->db->query("Update tbl_product_subcategory set psub_image = '$image' where psub_id = '$id'");
    }
    
    public function change_subcategory_status($id,$status)
    {
        $q = $this->db->query("Update tbl_product_subcategory set psub_status = '$status' where psub_id = '$id'");
    }
    
    public function delete_subcategory($id)
    {
        $q = $this->db->query("Delete from tbl_product_subcategory where psub_id = '$id'");
    }
    
    /* Product */
    public function get_product_bysub($id)
    {
        $q = $this->db->query("Select * from tbl_product where prod_sub_id = '$id'");
        return $q->result();
    }
    
    public function add_product($data)
    {
        $sub_id = $this->input->post('sub_id');
        $modelno = $this->input->post('modelno');
        $prod_name = $this->input->post('prod_name');
        $prod_desc = $this->input->post('prod_desc');
        $prod_amount = $this->input->post('prod_amount');
        $prod_quantity = $this->input->post('prod_quantity');
        $prod_availability = $this->input->post('prod_availability');
        $prod_status = 1;
        $date = date("Y-m-d");
        $file = $data['file_name'];
        $prod_image = 'upload/product/'.$file;
        
        $q = $this->db->query("Insert into tbl_product(prod_sub_id,prod_model_no,prod_name,prod_desc,prod_quantity,prod_amount,prod_availability,prod_image,prod_status,prod_add_date) values('$sub_id','$modelno','$prod_name','$prod_desc','$prod_quantity','$prod_amount','$prod_availability','$prod_image','$prod_status','$date')");
        
        return $sub_id;
    }
    
    public function get_product_byid()
    {
        $id = $this->input->post('id');
        $q = $this->db->query("Select * from tbl_product where prod_id = '$id'");
        return $q->row();
    }
    
    public function edit_product()
    {
        $id = $this->input->post('edit_product_id');
        $sub_id = $this->input->post('edit_sub_id');
        $modelno = $this->input->post('edit_modelno');
        $prod_name = $this->input->post('edit_prod_name');
        $prod_desc = $this->input->post('edit_prod_desc');
        $prod_amount = $this->input->post('edit_prod_amount');
        $prod_quantity = $this->input->post('edit_prod_quantity');
        $prod_availability = $this->input->post('edit_prod_availability');
        
        $q = $this->db->query("Update tbl_product set prod_model_no = '$modelno', prod_name = '$prod_name', prod_desc = '$prod_desc', prod_quantity = '$prod_quantity', prod_amount = '$prod_amount', prod_availability = '$prod_availability' where prod_id = '$id'");
        
        return $sub_id;
    }
    
    public function edit_product_image($data)
    {
        $id = $this->input->post('edit_product_id1');
        $sub_id = $this->input->post('edit_sub_id1');
        $file = $data['file_name'];
        $prod_image = 'upload/product/'.$file;
        
        $q = $this->db->query("Update tbl_product set prod_image = '$prod_image' where prod_id = '$id'");
        
        return $sub_id;
    }
    
    public function change_product_status($id,$status)
    {
        $q = $this->db->query("Update tbl_product set prod_status = '$status' where prod_id = '$id'");
        $q1 = $this->db->query("Select prod_sub_id from tbl_product where prod_id = '$id'");
        $res = $q1->row();
        return $res->prod_sub_id;
    }
    
    public function delete_product($id)
    {
        $q1 = $this->db->query("Select prod_sub_id from tbl_product where prod_id = '$id'");
        $res = $q1->row();
        $q = $this->db->query("Delete from tbl_product where prod_id = '$id'");
        return $res->prod_sub_id;
    }
    
 public function get_transation(){
 $q = $this->db->query("Select * from tbl_transaction order by id desc");
  return $q->result();
 }
 
 public function get_singal_player(){
 $q = $this->db->query("Select * from tbl_quiz_played order by qp_id desc");
  return $q->result();
 
 } 
 
 
public function get_multi_player(){
 $q = $this->db->query("Select * from tbl_multiplayer_game order by id desc");
  return $q->result();

}
 
 
}
?>