<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model 
{
    public function __construct() 
    {
        //parent::__construct();
        $this->load->database();
        $this->load->library('session');
       
    }
    
    /* PLAYER PANEL */
    
    public function add_customer()
    {
        $name = $this->input->post('username');
        $email = $this->input->post('useremail');
        $phone = $this->input->post('userphone');
        $password = $this->input->post('userpassword');
        $status = '0';
        $date = date("Y-m-d");
        
        $q = $this->db->query("Insert into tbl_customer(cust_name,cust_email,cust_phone,cust_password,cust_status,cust_add_date) values('$name','$email','$phone','$password','$status','$date')");
        
        $id = $this->db->insert_id();
        
        $link = base_url().'activate_user/'.$id;
        
        $subject = "Account Activation - Tick Tock Ten";
        
        $message = '<table style="border-collapse:separate" align="center" bgcolor="#eeeeee" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
            <td style="background:repeat 0 0;padding-top:0;padding-right:0;padding-bottom:80px;padding-left:0;margin:0" bgcolor="#eeeeee" width="100%">
                <table align="center" border="0" cellpadding="15" cellspacing="0" width="600">
                    <tbody><tr>
                      <td style="padding-top:30px;padding-right:15px;padding-left:15px;color:#ffffff" align="left" width="100%">
                            <a rel="nofollow" href="#" target="_blank">
                                <img alt="TickTockTen" height="50" border="0" width="100" src="">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#373737" width="100%">
                            <table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;margin:0" align="left">
                                        <span style="display:block;font-family:Arial,Helvetica,sans-serif;font-size:18px;color:#ffffff;font-weight:bold; text-align:center">Account Activation</span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <table style="border:1px solid #cccccc" align="center" border="0" cellpadding="15" cellspacing="0" width="600">
                    <tbody><tr>
                        <td style="padding-top:30px;margin:0" align="left" bgcolor="#ffffff">
                            <span style="color:#00afec;font-weight:normal;font-size:18px;font-family:Arial,Helvetica,sans-serif"></span>
                        </td>
                    </tr>
                    <tr><td style="padding-top:0;padding-right:10px;padding-bottom:0;padding-left:0;font-size: 18px;
padding: 5px 14px; background:#fff; margin:0" width="30" > Hello '.$name.',
                                    </td></tr>
                    <tr>
                        <td align="left" bgcolor="#ffffff">
                            <span style="color:#262626;font-weight:normal;font-size:15px;line-height:22px;font-family:Arial,Helvetica,sans-serif">
                                Thank you for registering with TickTockTen.<br/>Click to activate your account.<br/><br/><strong>"<a rel="nofollow" href="'.$link.'" target="_blank">'.$link.'</a>"</strong>...
                                <br/><br/>
                                Thank You. </span></td>
                    </tr>
                    <tr>
                        <td style="margin:0" align="left" bgcolor="#ffffff">
                            <span style="color:#262626;font-weight:normal;font-size:15px;line-height:22px;font-family:Arial,Helvetica,sans-serif"></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="background:#efefef;padding:0;margin:0" align="center" height="1"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:0;padding-right:15px;padding-left:15px" align="left" bgcolor="#ffffff">
                            <span style="color:#555555;font-weight:normal;font-size:15px;font-family:Arial,Helvetica,sans-serif;line-height:22px">
                                Regards,
                                <br>
                                Team TickTockTen.
                            </span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>';
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($email,$subject,$message,$headers);
        
    }
    
    public function check_email()
    {
        $email = $this->input->post('email');
        
        $q = $this->db->query("Select * from tbl_customer where cust_email = '$email'");
        
        if($q->num_rows()>0)
        {
            echo "Email already registered.";
        }
    }
    
    public function activate_user($id)
    {
        $q = $this->db->query("Update tbl_customer set cust_status = 1 where cust_id = '$id'");
        
        $q1 = $this->db->query("Select * from tbl_customer where cust_id = '$id'");
        $res = $q1->row();
        
        $subject = "Account Activated - Tick Tock Ten";
        
        $message = '<table style="border-collapse:separate" align="center" bgcolor="#eeeeee" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
            <td style="background:repeat 0 0;padding-top:0;padding-right:0;padding-bottom:80px;padding-left:0;margin:0" bgcolor="#eeeeee" width="100%">
                <table align="center" border="0" cellpadding="15" cellspacing="0" width="600">
                    <tbody><tr>
                      <td style="padding-top:30px;padding-right:15px;padding-left:15px;color:#ffffff" align="left" width="100%">
                            <a rel="nofollow" href="#" target="_blank">
                                <img alt="TickTockTen" height="50" border="0" width="100" src="">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#373737" width="100%">
                            <table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;margin:0" align="left">
                                        <span style="display:block;font-family:Arial,Helvetica,sans-serif;font-size:18px;color:#ffffff;font-weight:bold; text-align:center">Account Activated</span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <table style="border:1px solid #cccccc" align="center" border="0" cellpadding="15" cellspacing="0" width="600">
                    <tbody><tr>
                        <td style="padding-top:30px;margin:0" align="left" bgcolor="#ffffff">
                            <span style="color:#00afec;font-weight:normal;font-size:18px;font-family:Arial,Helvetica,sans-serif"></span>
                        </td>
                    </tr>
                    <tr><td style="padding-top:0;padding-right:10px;padding-bottom:0;padding-left:0;font-size: 18px;
padding: 5px 14px; background:#fff; margin:0" width="30" > Hello '.$res->cust_name.',
                                    </td></tr>
                    <tr>
                        <td align="left" bgcolor="#ffffff">
                            <span style="color:#262626;font-weight:normal;font-size:15px;line-height:22px;font-family:Arial,Helvetica,sans-serif">
                                You have activated your TickTockTen account.<br/>You can now login with the following details.<br/><br/><strong>EMAIL ID : '.$res->cust_email.'<br/>PASSWORD : '.$res->cust_password.'</strong>
                                <br/><br/>
                                Thank You. </span></td>
                    </tr>
                    <tr>
                        <td style="margin:0" align="left" bgcolor="#ffffff">
                            <span style="color:#262626;font-weight:normal;font-size:15px;line-height:22px;font-family:Arial,Helvetica,sans-serif"></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="background:#efefef;padding:0;margin:0" align="center" height="1"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:0;padding-right:15px;padding-left:15px" align="left" bgcolor="#ffffff">
                            <span style="color:#555555;font-weight:normal;font-size:15px;font-family:Arial,Helvetica,sans-serif;line-height:22px">
                                Regards,
                                <br>
                                Team TickTockTen.
                            </span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>';
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($res->cust_email,$subject,$message,$headers);
    }
    
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $q = $this->db->query("Select * from tbl_customer where cust_email = '$email' and cust_password = '$password' and cust_status = 1");
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
    }
    
    public function forgot_password()
    {
        $email = $this->input->post('email');
        $pwd = rand(10001,99999);
        $q = $this->db->query("Select * from tbl_customer where cust_email = '$email' and cust_status = 1");
        $res = $q->row();
        if($q->num_rows() > 0)
        {
            $q = $this->db->query("Update tbl_customer set cust_password = '$pwd' where cust_email = '$email'");
            
            $subject = "Password Recovery - Tick Tock Ten";
        
        $message = '<table style="border-collapse:separate" align="center" bgcolor="#eeeeee" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
            <td style="background:repeat 0 0;padding-top:0;padding-right:0;padding-bottom:80px;padding-left:0;margin:0" bgcolor="#eeeeee" width="100%">
                <table align="center" border="0" cellpadding="15" cellspacing="0" width="600">
                    <tbody><tr>
                      <td style="padding-top:30px;padding-right:15px;padding-left:15px;color:#ffffff" align="left" width="100%">
                            <a rel="nofollow" href="#" target="_blank">
                                <img alt="TickTockTen" height="50" border="0" width="100" src="">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#373737" width="100%">
                            <table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;margin:0" align="left">
                                        <span style="display:block;font-family:Arial,Helvetica,sans-serif;font-size:18px;color:#ffffff;font-weight:bold; text-align:center">Password Recovery</span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <table style="border:1px solid #cccccc" align="center" border="0" cellpadding="15" cellspacing="0" width="600">
                    <tbody><tr>
                        <td style="padding-top:30px;margin:0" align="left" bgcolor="#ffffff">
                            <span style="color:#00afec;font-weight:normal;font-size:18px;font-family:Arial,Helvetica,sans-serif"></span>
                        </td>
                    </tr>
                    <tr><td style="padding-top:0;padding-right:10px;padding-bottom:0;padding-left:0;font-size: 18px;
padding: 5px 14px; background:#fff; margin:0" width="30" > Hello '.$res->cust_name.',
                                    </td></tr>
                    <tr>
                        <td align="left" bgcolor="#ffffff">
                            <span style="color:#262626;font-weight:normal;font-size:15px;line-height:22px;font-family:Arial,Helvetica,sans-serif">
                                Your password has been changed.<br/>You can now login with the following details.<br/><br/><strong>EMAIL ID : '.$res->cust_email.'<br/>PASSWORD : '.$pwd.'</strong>
                                <br/><br/>
                                Thank You. </span></td>
                    </tr>
                    <tr>
                        <td style="margin:0" align="left" bgcolor="#ffffff">
                            <span style="color:#262626;font-weight:normal;font-size:15px;line-height:22px;font-family:Arial,Helvetica,sans-serif"></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="background:#efefef;padding:0;margin:0" align="center" height="1"></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:0;padding-right:15px;padding-left:15px" align="left" bgcolor="#ffffff">
                            <span style="color:#555555;font-weight:normal;font-size:15px;font-family:Arial,Helvetica,sans-serif;line-height:22px">
                                Regards,
                                <br>
                                Team TickTockTen.
                            </span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>';
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($res->cust_email,$subject,$message,$headers);
        return 'Password Sent To Mail';
        }
        else
        {
            return 'Email Not Registered'; 
        }
    }
    
    public function get_player_byid($id)
    {
        $q = $this->db->query("Select * from tbl_customer where cust_id = '$id'");
        return $q->row();
    }

public function get_player_cc($id)
    {
        $q = $this->db->query("Select * from tbl_customer_cc where user_id = '$id'");
        return $q->row();
    }
    
    public function edit_player_image($data)
    {
        $id = $this->input->post('custid');
        $file = $data['file_name'];
        $image = 'upload/player/'.$file;
        
        $q = $this->db->query("Update tbl_customer set cust_image = '$image' where cust_id = '$id'");
    }
    
    public function edit_player_detail()
    {
        $id = $this->input->post('custid');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $dob = ($this->input->post('date')!='')?date('Y-m-d H:i:s',strtotime($this->input->post('date'))):date('Y-m-d H:i:s',time());
        $country = $this->input->post('country');
        $q = $this->db->query("Update tbl_customer set cust_name = '$name', cust_phone='$phone', cust_address='$country', cust_dob='$dob' where cust_id = '$id'");
    }

public function edit_player_cc()
    {
        $id = $this->input->post('custid');
        $number = $this->input->post('number');
        $name= $this->input->post('name');
        $expiry_date = $this->input->post('expiration-month-and-year');
        $q = $this->db->query("SELECT * from tbl_customer_cc where user_id = '$id'");
if($q->num_rows()>0){
        $this->db->query("Update tbl_customer_cc set card_number = '$number', card_name='$name', expiry_date='$expiry_date' where user_id = '$id'");
}else{
        $this->db->query("Insert into tbl_customer_cc(user_id,card_number,card_name,expiry_date) values('$id','$number','$name','$expiry_date')");
}
    }
    
    public function last_played_game($id)
    {
        $q = $this->db->query("Select * from tbl_quiz_played,tbl_quiz_category,tbl_quiz_topic where tbl_quiz_played.qp_topic_id = tbl_quiz_topic.qtopic_id and tbl_quiz_topic.qtopic_cat_id = tbl_quiz_category.qcat_id and tbl_quiz_played.qp_player_id = '$id' order by tbl_quiz_played.qp_id desc LIMIT 0,4");
        
        return $q->result();
    }
    
    public function last_played_products($id)
    {
        $q = $this->db->query("Select * from tbl_quiz_played,tbl_product_subcategory,tbl_product where tbl_quiz_played.qp_product_id = tbl_product.prod_id and tbl_product.prod_sub_id = tbl_product_subcategory.psub_id and tbl_quiz_played.qp_player_id = '$id' and tbl_quiz_played.qp_status = 'VICTORY' order by tbl_quiz_played.qp_id desc LIMIT 0,4");
        
        return $q->result();
    }
    
    public function total_games_played($id)
    {
        $q = $this->db->query("Select count(*) as total from tbl_quiz_played where qp_player_id = '$id'");
        $res = $q->row();
        return $res->total;
    }
    
    public function highest_score($id)
    {
        $q = $this->db->query("Select max(qp_points) as highest from tbl_quiz_played where qp_player_id = '$id'");
        $res = $q->row();
        return $res->highest;
    }
    
    /* PRODUCTS PANEL */
    
    public function get_product_category()
    {
        $q = $this->db->query("Select * from tbl_product_category where pcat_status = '1'");
        return $q->result();
    }
    
    public function get_product_subcategory($id)
    {
        $q = $this->db->query("Select * from tbl_product_subcategory where psub_status = '1' and p_cat_id = '$id'");
        return $q->result();
    }
    
    public function get_products_bysub($id)
    {
        $q = $this->db->query("Select * from tbl_product,tbl_product_subcategory,tbl_product_category where tbl_product_subcategory.p_cat_id = tbl_product_category.pcat_id and tbl_product.prod_sub_id = tbl_product_subcategory.psub_id and tbl_product.prod_sub_id IN(Select psub_id from tbl_product_subcategory WHERE p_cat_id = '$id') ");
        return $q->result();
    }

    public function get_product_byid($id)
    {
        $q = $this->db->query("Select * from tbl_product p where p.prod_id='$id'");
        return $q->result();
    }
    
 public function get_all_product()
    {
        $q = $this->db->query("Select * from tbl_product,tbl_product_subcategory,tbl_product_category where tbl_product_subcategory.p_cat_id = tbl_product_category.pcat_id and tbl_product.prod_sub_id = tbl_product_subcategory.psub_id");
        return $q->result();
    }   
    
    
    
    /* QUIZ PANEL */
    
    public function get_quiz_category()
    {
        $q = $this->db->query("Select * from tbl_quiz_category where qcat_status = '1'");
        return $q->result();
    }
    
    public function get_all_topics($id)
    {
        $q = $this->db->query("Select * from tbl_quiz_category, tbl_quiz_topic where tbl_quiz_topic.qtopic_cat_id = tbl_quiz_category.qcat_id and tbl_quiz_topic.qtopic_status = '1' and tbl_quiz_topic.qtopic_cat_id = '$id'");
        return $q->result();
    }
    
    public function get_all_games()
    {
        $q =  $this->db->query("Select * from tbl_quiz_category, tbl_quiz_topic where tbl_quiz_topic.qtopic_cat_id = tbl_quiz_category.qcat_id and tbl_quiz_topic.qtopic_status = '1'");
        return $q->result();
    }
    
 
    
    public function get_question_count($id)
    {
        $q = $this->db->query("Select count(*) as total_question from tbl_questions where q_topic_id = '$id' and q_status = 1");
        $res = $q->row();
        return $res->total_question;
    }
    
    public function get_questions($id)
    {
        $q = $this->db->query("Select * from tbl_questions where q_topic_id = '$id' and q_status = 1");
        return $q->result();
    }
    
    public function save_score()
    {
        $topic_id = $this->input->post('topic_id');
        $custid = $this->input->post('custid');
        $prod_id = $this->input->post('prod_id');
        $ques_id = $this->input->post('ques_id');
        $option = $this->input->post('option');
        $status = $this->input->post('status');
        $points = $this->input->post('points');
        $datetime = date("Y-m-d h:i:s");
        
        $q = $this->db->query("Insert into tbl_quiz_played(qp_player_id,qp_product_id,qp_topic_id,qp_status,qp_points,qp_time) values('$custid','$prod_id','$topic_id','$status','$points','$datetime')");
        
        return $topic_id;
    }
    
 function get_multiplayr($user_id,$q_topic_id,$pro_id){
 $q = $this->db->query("Select * from tbl_multiplayer where user_id !='$user_id' and quiz_topic_id ='$q_topic_id' and product_id ='$pro_id' and status != 4 group by user_id");
 return $q->result();
 } 
 
 

/////////////////////////////////End Class///////////////////////////    
}
?>