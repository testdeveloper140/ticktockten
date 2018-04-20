<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct(); 
        $this->load->model('admin/admin_model');
        $this->load->library("custom_function");
        //session_start();
    }
    
    /* ADMIN LOGIN */

	public function index()
	{
        if($this->session->userdata('admin_name') != "")
        {
            redirect('admin/dashboard');
        }
        else
        {
		  $this->load->view('admin_login');
        }
	}
    
    public function login()
    {
        $q = $this->admin_model->login();
        if($q)
        {
            $this->session->set_userdata('admin_name',$q->user_name);
            $this->session->set_userdata('admin_email',$q->user_email);
            redirect('admin/dashboard');
        }
        else
        {
            $this->session->set_flashdata('loginerror', 'Invalid Email or Password');
            redirect('admin');
        } 
    }
    
    public function signout()
    {
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_email');
        redirect('admin');
    }
    
    /* ADMIN DASHBOARD */
    
    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }
    
    /* ADMIN USERS PANEL */
    
    public function users()
    {
        $data['users'] = $this->admin_model->get_allusers();
        $this->load->view('admin/user_list',$data);
    }
    
    public function change_user_status($id,$status)
    {
        $this->admin_model->change_user_status($id,$status);
        redirect('admin/users');
    }
    
    public function delete_user($id)
    {
        $this->admin_model->delete_user($id);
        redirect('admin/users');
    }
    
    /* ADMIN QUIZ PANEL */
    
    /* Category */
    
    public function quiz_category()
    {
        $data['quiz_category'] = $this->admin_model->get_quiz_category();
        $this->load->view('admin/quiz_category',$data);
    }
    
    public function add_quiz_category()
    {
        $q = $this->admin_model->add_quiz_category();
        $this->session->set_flashdata('quizcategory', 'New Quiz Category Added!');
        redirect('admin/quiz_category');
    }
    
    public function get_quiz_category_byid()
    {
        $q = $this->admin_model->get_quiz_category_byid();
        //print_r($q);
        echo json_encode($q);
    }
    
    public function get_userby_id(){
    $q1 = $this->admin_model->get_userby_id();
      //print_r($q);
     echo json_encode($q1);
    }
    
    public function edit_quiz_category()
    {
        $this->admin_model->edit_quiz_category();
        redirect('admin/quiz_category');
    }
    
    public function change_category_status($id,$status)
    {
        $this->admin_model->change_category_status($id,$status);
        redirect('admin/quiz_category');
    }
    
    public function delete_category($id)
    {
        $this->admin_model->delete_category($id);
        redirect('admin/quiz_category');
    }
    
    /* Topic */
    
    public function quiz_topic()
    {
        $data['quiz_category'] = $this->admin_model->get_quiz_category_active();
        $data['quiz_topic'] = $this->admin_model->get_quiz_topic();
        $this->load->view('admin/quiz_topic',$data);
    }
    
    public function add_quiz_topic()
    {
        $config['file_name'] = $_FILES['myfile']['name'];
        $config['upload_path'] = './upload/question/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $q = $this->admin_model->add_quiz_topic($data);
        $this->session->set_flashdata('quiztopic', 'New Quiz Topic Added!');
        redirect('admin/quiz_topic');
    }
    
    public function get_quiz_topic_byid()
    {
        $id = $this->input->post('id');
        $q = $this->admin_model->get_topic_byid($id);
        echo json_encode($q);
    }
    
    public function edit_quiz_topic()
    {
        $this->admin_model->edit_quiz_topic();
        redirect('admin/quiz_topic');
    }
    
    public function edit_quiz_topic_image()
    {
        $config['file_name'] = $_FILES['myfile1']['name'];
        $config['upload_path'] = './upload/question/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile1'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $q = $this->admin_model->edit_quiz_topic_image($data);
        redirect('admin/quiz_topic');
    }
    
    public function change_topic_status($id,$status)
    {
        $this->admin_model->change_topic_status($id,$status);
        redirect('admin/quiz_topic');
    }
    
    public function delete_topic($id)
    {
        $this->admin_model->delete_topic($id);
        redirect('admin/quiz_topic');
    }
    
    /* Question */
    
    public function questions($id)
    {
        //$id = $this->input->post('topic_id');
        $data['topic'] = $this->admin_model->get_topic_byid($id);
        $data['questions'] = $this->admin_model->get_question_bytopic($id);
        $this->load->view('admin/add_quiz_question',$data);
    }
    
    public function add_question()
    {
        $topic_id = $this->admin_model->add_question();
        $this->session->set_flashdata('question', 'New Qusetion Added!');
        redirect('admin/questions/'.$topic_id);
    }
    
    public function get_question_byid()
    {
        $q = $this->admin_model->get_question_byid();
        echo json_encode($q);
    }
    
    public function edit_question()
    {
        $topic_id = $this->admin_model->edit_question();
        redirect('admin/questions/'.$topic_id);
    }
    
    public function change_question_status($id,$status)
    {
        $topic_id = $this->admin_model->change_question_status($id,$status);
        redirect('admin/questions/'.$topic_id);
    }
    
    public function delete_question($id)
    {
        $topic_id = $this->admin_model->delete_question($id);
        $this->session->set_flashdata('question', 'Qusetion Deleted!');
        redirect('admin/questions/'.$topic_id);
    }
    
    /* ADMIN PRODUCT PANEL */
        /* Product Category */
    public function product_category()
    {
        $data['product_category'] = $this->admin_model->get_product_category();
        $this->load->view('admin/product_category',$data);
    }
    
    public function add_product_category()
    {
        $config['file_name'] = $_FILES['myfile']['name'];
        $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $q = $this->admin_model->add_product_category($data);
        $this->session->set_flashdata('productcategory', 'New Product Category Added!');
        redirect('admin/product_category');
    }
    
    public function get_product_category_byid()
    {
        $q = $this->admin_model->get_product_category_byid();
        //print_r($q);
        echo json_encode($q);
    }
    
    public function edit_product_category()
    {
        $this->admin_model->edit_product_category();
        redirect('admin/product_category');
    }
    
    public function edit_product_category_image()
    {
        $config['file_name'] = $_FILES['myfile1']['name'];
        $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile1'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $q = $this->admin_model->edit_product_category_image($data);
        redirect('admin/product_category');
    }
    
    public function change_product_category_status($id,$status)
    {
        $this->admin_model->change_product_category_status($id,$status);
        redirect('admin/product_category');
    }
    
    public function delete_product_category($id)
    {
        $this->admin_model->delete_product_category($id);
        redirect('admin/product_category');
    }
    
    /* Product Sub-Category */
    
    public function product_subcategory()
    {
        $data['product_category'] = $this->admin_model->get_product_category_active();
        $data['product_subcategory'] = $this->admin_model->get_product_subcategory();
        $this->load->view('admin/product_subcategory',$data);
    }
    
    public function add_product_subcategory()
    {
        $config['file_name'] = $_FILES['myfile']['name'];
        $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $q = $this->admin_model->add_product_subcategory($data);
        $this->session->set_flashdata('productsubcategory', 'New Product Sub-Category Added!');
        redirect('admin/product_subcategory');
    }
    
    public function get_product_subcategory_byid()
    {
        $id = $this->input->post('id');
        $q = $this->admin_model->get_subcategory_byid($id);
        echo json_encode($q);
    }
    
    public function edit_product_subcategory()
    {
        $this->admin_model->edit_product_subcategory();
        redirect('admin/product_subcategory');
    }
    
    public function edit_product_subcategory_image()
    {
        $config['file_name'] = $_FILES['myfile1']['name'];
        $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile1'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $this->admin_model->edit_product_subcategory_image($data);
        redirect('admin/product_subcategory');
    }
    
    public function change_subcategory_status($id,$status)
    {
        $this->admin_model->change_subcategory_status($id,$status);
        redirect('admin/product_subcategory');
    }
    
    public function delete_subcategory($id)
    {
        $this->admin_model->delete_subcategory($id);
        redirect('admin/product_subcategory');
    }
    
    /* Product */
    
    public function product($id)
    {
        //$id = $this->input->post('topic_id');
        $data['subcategory'] = $this->admin_model->get_subcategory_byid($id);
        $data['product'] = $this->admin_model->get_product_bysub($id);
        $this->load->view('admin/product',$data);
    }
    
    public function add_product()
    {
        $config['file_name'] = $_FILES['myfile']['name'];
        $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $sub_id = $this->admin_model->add_product($data);
        $this->session->set_flashdata('product', 'New Product Added!');
        redirect('admin/product/'.$sub_id);
    }
    
    public function get_product_byid()
    {
        $q = $this->admin_model->get_product_byid();
        echo json_encode($q);
    }
    
    public function edit_product()
    {
        $sub_id = $this->admin_model->edit_product();
        redirect('admin/product/'.$sub_id);
    }
    
    public function edit_product_image()
    {
        $config['file_name'] = $_FILES['myfile1']['name'];
        $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000000';
        
		$this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('myfile1'))
		{
		  echo $this->upload->display_errors();
		}
        else
        {
            $data = $this->upload->data();
        }
        $sub_id = $this->admin_model->edit_product_image($data);
        redirect('admin/product/'.$sub_id);
    }
    
    public function change_product_status($id,$status)
    {
        $sub_id = $this->admin_model->change_product_status($id,$status);
        redirect('admin/product/'.$sub_id);
    }
    
    public function delete_product($id)
    {
        $sub_id = $this->admin_model->delete_product($id);
        $this->session->set_flashdata('product', 'Product Deleted!');
        redirect('admin/product/'.$sub_id);
    }
    
 public function transaction(){
 $data['trans'] = $this->admin_model->get_transation();
 $this->load->view('admin/transaction',$data);
 }
 
 public function singal_player(){
  $data['singal_game'] = $this->admin_model->get_singal_player();
 $this->load->view('admin/singal_play_game',$data);
 }
 
public function multi_player(){
 $data['muti_player_game'] = $this->admin_model->get_multi_player();
 $this->load->view('admin/multi_play_game',$data);

}

 function edit_user(){
  $id = $this->input->post('edit_cat_id');
  $phone = $this->input->post('edit_user_phone');
  $user_credit = $this->input->post('edit_user_credit');
  $data = array("cust_phone"=>$phone,"cradit"=>$user_credit);
  $this->db->where("cust_id",$id);
  $this->db->update("tbl_customer",$data);
 redirect('admin/users');
 }
    
}
?>