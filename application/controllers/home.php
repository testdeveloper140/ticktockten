<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        //authenticate();
        ob_start();
        $this->load->model('home_model');
        $this->load->library("custom_function");
        
        
    }
     
	public function index()
	{
        $data['prod_category'] = $this->home_model->get_product_category();
        $data['is_home'] = $this->is_home();
		$this->load->view('index',$data);
	}
public function is_home()
{
   $CI =& get_instance();
   return (!$CI->uri->segment(1))? TRUE: FALSE;
}

    
    /* PLAYER PANEL */
    
    public function add_customer()
    {
        $q = $this->home_model->add_customer();
$this->session->set_flashdata('reg-message','Registration successful. An activation link is sent to your email address.'); 
        redirect(base_url());
    }
    
    public function check_email()
    {
        $q = $this->home_model->check_email();
    }
    
    public function activate_user($id)
    {
        $this->home_model->activate_user($id);
        redirect(base_url());
    }
    
    public function login()
    {
        $q = $this->home_model->login();
        if(!$q)
        {
            echo "false";
        }
        else
        {
            $this->session->set_userdata('customerid',$q->cust_id);
            $this->session->set_userdata('customername',$q->cust_name);
            $this->session->set_userdata('customeremail',$q->cust_email);
            echo "true";
        }
    }
    
    public function forgot_password()
    {
        $q = $this->home_model->forgot_password();
        echo $q;
    }
    
    public function dashboard()
    {
        $id = $this->session->userdata('customerid');
        $data['user'] = $this->home_model->get_player_byid($id);
        $data['user_cc'] = $this->home_model->get_player_cc($id);
        $data['games'] = $this->home_model->last_played_game($id);
        $data['products'] = $this->home_model->last_played_products($id);
        $data['total_games'] = $this->home_model->total_games_played($id);
        $data['highest_score'] = $this->home_model->highest_score($id);
$data['is_home'] = $this->is_home();
        $this->load->view('dashboard',$data);
    }
    
    public function edit_player_image()
    {
        $config['file_name'] = $_FILES['myfile']['name'];
        $config['upload_path'] = './upload/player/';
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
        $this->home_model->edit_player_image($data);
        redirect('dashboard');
    }
    
    public function edit_player_detail()
    {
        $this->home_model->edit_player_detail();
        redirect('dashboard');
    }
    public function edit_player_cc()
    {
        $this->home_model->edit_player_cc();
        redirect('dashboard');
    }
    
    public function signout()
    {
    
 /////////// Status Complete when User Waiting as active///////// 
 $user_id = $this->session->userdata('customerid');
 $data_up = array('status'=>'4');
 $this->db->where("user_id",$user_id);
 $this->db->update("tbl_multiplayer",$data_up);
 ///////////////// End ///////////////
 
 
        //$url = $_SERVER['HTTP_REFERER'];
        $url = base_url();
        //$this->session->unset_userdata('customerid');
        //$this->session->unset_userdata('customername');
       //$this->session->unset_userdata('customeremail');
        //$this->session->unset_userdata('last_insert_id');
       // $this->session->unset_userdata('last_trans_id');
       // $this->session->unset_userdata('checked');
        
        $this->session->sess_destroy();
         session_destroy();
        
        redirect($url);
    }
    
    
    /* PRODUCTS PANEL */
    
    public function product_category()
    {
        $data['prod_category'] = $this->home_model->get_product_category();
$data['is_home'] = $this->is_home();
        $this->load->view('product_category',$data);
    }
    
    public function product_subcategory($id)
    {
        $data['prod_subcategory'] = $this->home_model->get_product_subcategory($id);
$data['is_home'] = $this->is_home();
        $this->load->view('product_sub_category',$data);
    }
    
    public function products($id)
    {
        $data['products'] = $this->home_model->get_products_bysub($id);
$data['is_home'] = $this->is_home();
        $this->load->view('products',$data);
    }
    
    /* QUIZ PANEL */
    
    public function quiz_category($pid)
    {
        $data['product_id'] = $pid;
        $data['quiz_category'] = $this->home_model->get_quiz_category();
$data['is_home'] = $this->is_home();
        $this->load->view('quiz_category',$data);
    }
    
    public function topics($id,$pid)
    {
        $data['product_id'] = $pid;
        $data['topics'] = $this->home_model->get_all_topics($id);
$data['is_home'] = $this->is_home();
        $this->load->view('topics',$data);
    }
    
    public function start_quiz($id,$pid)
    {
        $total_count = $this->home_model->get_question_count($id);
    }
    
    public function play($id,$pid)
    {
     
        $cid = $this->session->userdata('customerid');
        $data['user'] = $this->home_model->get_player_byid($cid);
        $data['product_id'] = $pid;
        $data['total_count'] = $this->home_model->get_question_count($id);
        $data['question'] = $this->home_model->get_questions($id);
$data['is_home'] = $this->is_home();
        $this->load->view('playquiz',$data);
    }
    
    public function scoring()
    {
        $id = $this->home_model->save_score();
        //redirect('play/'.$id);
        echo "inserted...";
    }
    
    
    
function winner(){
$cid = $this->session->userdata('customerid');
$user_cradit = $this->custom_function->get_perticular_field_value('tbl_customer', 'cradit', " and cust_id ='".$cid."'"); 

$topic_id = $this->input->post('topic_id');
$prod_id = $this->input->post('prod_id');
$ques_id = $this->input->post('ques_id');
$option = $this->input->post('option');
$status = $this->input->post('status');
$player1points = $this->input->post('player1points');
$datetime = date("Y-m-d h:i:s");
$player_id = $this->input->post('player_id');
$tbl_multiplayers = $this->input->post('tbl_multiplayers');

$tbl_multiplayers1 = $this->custom_function->get_perticular_field_value('tbl_multiplayer_game', 'players_id', " and id ='".$tbl_multiplayers."'");
$player  = explode(',',$tbl_multiplayers1);
$final_score1 = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'final_score', " and player_id ='".trim($player[0])."'");
$final_score2 = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'final_score', " and player_id ='".trim($player[1])."'");
$my_score = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'final_score', " and player_id ='".trim($player_id)."'");
if($final_score1!='' && $final_score2!=''){
if($final_score1>$final_score2){
$winner = $player[0];
}else{
$winner = $player[1];
}
}else{
$winner = '';
}
$data_up_final = array("winner"=>$winner);

$this->db->where("id",$tbl_multiplayers);
 $this->db->update("tbl_multiplayer_game",$data_up_final);
$winner = $this->custom_function->get_perticular_field_value('tbl_multiplayer_game', 'winner', " and id ='".$tbl_multiplayers."'");



if($winner==''){
echo '1';
 }else if($winner==trim($player_id)){?>
 <div style="text-align: center;">
                            <h1>GREAT YOU WIN !!!</h1>
                            <h3>Your Score : <span id="tot_score"><?=$my_score?></span></h3>
                            <p>Your credit has been deducted successfully. Your current credit is <?=$user_cradit?>. You can purchase more credit if needed from your profile page.</p>
                            <button class="purchase" style="background:#000;" onclick="window.location='<?php echo base_url(); ?>checkout/<?php echo $topic_id;?>/<?php echo $prod_id; ?>'"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
CHECKOUT NOW</button></button>
                            
                        </div>
 
 <?php }else{?>
 
 <div style="text-align: center;">
                            <h1>SORRY YOU LOSE !!!</h1>
                            <h3>Your Score : <span id="tot_score"><?=$my_score?></span></h3>
<p>Your credit has been deducted successfully. Your current credit is <?=$user_cradit?>. You can purchase more credit if needed from your profile page.</p>
                            <button class="btn" style="background:#000;" onclick="window.location='<?php echo base_url(); ?>quiz_category/<?php echo $prod_id; ?>'">Choose another game</button>
                            
                        </div>
 <?php }

  
  }  
    
    
    
    
    
    
    
    
    
    
    /* ALL GAMES */
    
    public function games()
    {
        $data['allgames'] = $this->home_model->get_all_games();
$data['is_home'] = $this->is_home();
        $this->load->view('allgames',$data);
    }
    
    
 function all_product(){
 $data['all_product']= $this->home_model->get_all_product();
 $data['is_home'] = $this->is_home();
 $this->load->view('all_products',$data);
 }  
    
    /* ABOUT & CONTACT */
    
    public function about()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('about',$data);
    }
    
    public function contact()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('contact',$data);
    }
    
    public function sports()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('sports',$data);
    }
    
    public function promotions()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('promotions',$data);
    }
    
    public function howtoplay()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('howtoplay',$data);
    }
    
    public function termsnconditions()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('termsnconditions',$data);
    }
    
    public function cookiepolicy()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('cookieploicy',$data);
    }
    
    public function gamerules()
    {
$data['is_home'] = $this->is_home();
        $this->load->view('gamerules',$data);
    }
    
    public function investors()
    {
$data['is_home'] = $this->is_home();
$this->load->view('investors',$data);
    }
function waiting_room(){
$this->session->unset_userdata('checked');
 $user_id = $this->session->userdata('customerid');
 $game_id=$this->custom_function->randomNassword();
 $q_topic_id = $this->uri->segment(2);
 $pro_id= $this->uri->segment(3);
 $ipaddress =$_SERVER['REMOTE_ADDR'];
 
 /////////// Privious Value Update///////// 
 $data_up = array('status'=>'4');
 $this->db->where("user_id",$user_id);
 $this->db->where("quiz_topic_id",$q_topic_id);
 $this->db->where("product_id",$pro_id);
 $this->db->update("tbl_multiplayer",$data_up);
 ///////////////// End ///////////////
 
 $data=array(
 "ipaddress"=>$ipaddress,
 "user_id"=>$user_id,
 "player_id"=>$game_id,
 "quiz_topic_id"=>$q_topic_id,
 "product_id"=>$pro_id,
 "status"=>"0",
 "start_time"=>date('Y-m-d h:i:s'),
 "end_time"=>""
);
if($user_id>0){
$this->db->insert("tbl_multiplayer",$data);
$last_insert_id = $this->db->insert_id();
$data1=array('last_insert_id'=>$last_insert_id);
$this->session->set_userdata($data1);
}
$data['multi_user'] =$this->home_model->get_multiplayr($user_id,$q_topic_id,$pro_id); 
//print_r($data['multi_user']);
$data['is_home'] = $this->is_home();
$this->load->view('waiting_room',$data);

 }
 
function multi_user(){
$user_id = $this->input->post('user_id');
$q_topic_id = $this->input->post('q_topic_id');
$pro_id = $this->input->post('pro_id');
$last_insert_id = $this->session->userdata('last_insert_id');
$player_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'player_id', " and id ='".$last_insert_id."'");
$data_mul =$this->home_model->get_multiplayr($user_id,$q_topic_id,$pro_id); 
//print_r($data_mul); exit();
 foreach($data_mul as $multi){
       //print_r($multi); 
        $user_name = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id ='".$multi->user_id."'");
       $checked_id = $multi->player_id;
       $tbl_multiplayer_id= $multi->id;
         ?>
        <div class="col-sm-3 gap_10">
<?php
$multi_image = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_image', " and cust_id ='".$multi->user_id."'"); 
if($multi_image==''){
$avt_image = 'assets/images/user2.png';
}else{
$avt_image = $multi_image;
$game_status = 'Invite';
$invited = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'invited', " and player_id ='".$player_id."' AND status=1");
if($invited!='')$game_status = 'Invited';
$accepted= $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'invited', " and invited = '".$player_id."' AND status=1");
if($accepted!='')$game_status = 'Accept';
$accepted_id= $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'accepted', " and player_id = '".$player_id."' AND status=3");
if($accepted_id!='')$game_status = 'Accepted';
}
?>
        	<p class="icon-user"><img class="fb-image-profile thumbnail" src="<?php echo base_url().$avt_image; ?>" alt="Upload Image"/></p>
            <p class="usr-name"><?php echo $user_name; ?></p>
             
              <div class="searchable-container">
             
                <div class="items ">
             <div class="info-block block-info clearfix">
                        
                        <div data-toggle="buttons" class="btn-group bizmoduleselect text-center">
                        <?php $checked_value=$this->session->userdata('checked');
                        if($checked_value== $checked_id){
                        $chk ='checked';
                        }else{
                        $chk='';
                        }
                         ?>
<h5 class="hd_1" id="game_status"><?=$game_status?></h5>
                        <input type='checkbox' <?php echo $chk; ?> id="invite" onclick="<?php if($game_status == 'Invited' || $game_status == 'Invite'){?>checked_box('<?php echo $player_id;?>,<?php echo $checked_id;?>,<?php echo $tbl_multiplayer_id;?>');<?php }else{?>checked_box1('<?php echo $player_id;?>,<?php echo $checked_id;?>,<?php echo $tbl_multiplayer_id;?>');<?php }?>" />    
                        
                            <!--<label class="btn btn-default">
                           
                                <div class="bizcontent">
                                    <type="checkbox" name="var_id[]" autocomplete="off" value="">
                                  
                                    <h5 class="hd_1">Invite</h5>
                                    
                                </div>
                            </label> -->
                            
                           
                        </div>
                    </div>
        </div>
        </div>
        </div>
        <?php } 

}
 

function user_checked(){
$player_id= $this->input->post('player_id');
$checked_id= $this->input->post('check_id');
$multiplayer_id = $this->input->post('multiplayer_id');

$user_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'user_id', " and player_id ='".$player_id."'");
$q_topic_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'quiz_topic_id', " and player_id ='".$player_id."'");
$pro_id= $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'product_id', " and player_id ='".$player_id."'");
///////////// invite/////////
 $invite = array("invited"=>$checked_id,"status"=>"1");
 //print_r($invite); exit();
 $this->db->where("user_id",$user_id);
 $this->db->where("quiz_topic_id",$q_topic_id);
 $this->db->where("product_id",$pro_id);
 $this->db->where("status","0");
 $this->db->update("tbl_multiplayer",$invite);
////////////////// End //////////////

/////////////////Whoes Invite///////

$user_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'user_id', " and id ='".$multiplayer_id."'");
$q_topic_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'quiz_topic_id', " and id ='".$multiplayer_id."'");
$pro_id= $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'product_id', " and id ='".$multiplayer_id."'");

 $invite1 = array("invited"=>$player_id,"status"=>"1");
 //print_r($invite); exit();
 $this->db->where("user_id",$user_id);
 $this->db->where("quiz_topic_id",$q_topic_id);
 $this->db->where("product_id",$pro_id);
 $this->db->where("status","0");
 //$this->db->update("tbl_multiplayer",$invite1);
 //////End/////////////
 
//////////// Checked Box checked in session//////
$checked = array('checked'=>$checked_id);
$this->session->set_userdata($checked);
////////////////////// End ///////////////

if($user_id==$this->session->userdata('customerid')){
echo 'Invited';
}else{
echo 'Accept';
}


} 
 
function purches(){
$data['is_home'] = $this->is_home();
 $this->load->view('purches',$data);
 }
 
function update_credit(){
 $user_id = $this->session->userdata('customerid');
 $user_exits = $this->custom_function->get_perticular_field_value('tbl_customer_cc', 'user_id', " and user_id ='".$user_id."'");
$user_credit = $this->custom_function->get_perticular_field_value('tbl_customer', 'cradit', " and cust_id ='".$user_id."'");
 $cardno= $this->input->post('cardno');
 $card_holder_name = $this->input->post('card_holder_name');
 $month= $this->input->post('month');
 $year= $this->input->post('year');
 $year= $this->input->post('year');
 $year1= $this->input->post('year');
 $year= substr($year1,-2);
 $amount = $this->input->post('amount');
 $data= array(
 "user_id"=> $user_id,
 "card_number"=>$cardno,
 "card_name"=> $card_holder_name,
 "expiry_date"=>$month.'/'.$year
 );
 if($user_exits==''){
  $this->db->insert("tbl_customer_cc",$data);
 }else{

 $this->db->where("user_id",$user_id);
 $this->db->update("tbl_customer_cc",$data);
 
 
 }
 
//////////// Insert Transation ///////////////////
$trasation_id = $this->custom_function->randomNassword();
$previous_credit = $user_credit;
$current_credit = $total_credit = $user_credit + $amount;
$tran= array(
"transaction"=>$trasation_id,
"previous_credit"=>$previous_credit,
"current_credit"=>$current_credit,
"amount"=>$amount,
"user_id"=>$user_id,
"date"=>date('Y-m-d'),
"status"=>1
);

 $this->db->insert("tbl_transaction",$tran);
 $last_trans_id = $this->db->insert_id();
$data2=array('last_trans_id'=>$last_trans_id);
$this->session->set_userdata($data2);
/////////// End ////////////////

 //////////// Credit update for coustomer table/////

 
 
 $data_cre= array("cradit"=>$total_credit);
 //print_r($data_cre); exit();
 $this->db->where("cust_id",$user_id);
 $this->db->update("tbl_customer",$data_cre);
 //////////// End /////////////////
 

 
 }
 
 function success(){
 $data['is_home'] = $this->is_home();
 $this->load->view('success',$data);
 }
 

 function gen_game_id(){
 $player_id = $this->input->post("player_id");
 $check_id = $this->input->post("check_id");
 //$invited = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'invited', " and player_id ='".trim($check_id)."'");
 //echo $check_id;
echo $check_id;
 //if($invited==$check_id){
 $acc =array('status'=>'3','accepted' => $check_id,'invited' => $check_id);
 $this->db->where("player_id",$player_id);
 $this->db->update('tbl_multiplayer',$acc);

$acc1 =array('status'=>'3','accepted' => $player_id);
 $this->db->where("player_id",$check_id);
 $this->db->update('tbl_multiplayer',$acc1);
 //}
$checked = array('checked'=>$check_id);
$this->session->set_userdata($checked);
 
 } 
function multiplayers($id,$pid){
$this->session->unset_userdata('checked');
$cid = $this->session->userdata('customerid');
$game_id = $this->session->userdata('last_tbl_multi_id');

$q1 = $this->db->query("SELECT * FROM tbl_multiplayer_game mp WHERE mp.id='$game_id'");
$res = $q1->row();

$q2= $this->db->query("SELECT * FROM tbl_multiplayer m WHERE m.user_id='$cid' AND m.player_id IN ('".str_replace(',',"','",$res->players_id)."')");
$res2 = $q2->row();
$player1_id = $res2->player_id ;

$muti_playrs_id = $this->session->userdata('last_tbl_multi_id');
$players_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer_game', 'players_id', " and id ='".$muti_playrs_id."'");

foreach(explode(',',$players_id) as $value){
if(trim($value)!=trim($player1_id))$player2_id = $value;
}
//echo $player1_id.$player2_id;die;

$user2_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'user_id', " and player_id ='".trim($player2_id)."'");


$data['user'] = $this->home_model->get_player_byid($cid);
$data['product_id'] = $pid;

$data['player1_id'] = $player1_id;
$data['player1_name'] = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id ='".$cid."'");;
$data['player1_image'] = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_image', " and cust_id ='".$cid."'");
$data['player1_score'] = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'score', " and player_id ='".trim($player1_id)."'");

$data['player2_id'] = $player2_id;
$data['player2_name'] = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_name', " and cust_id ='".$user2_id."'");
$data['player2_image'] = $this->custom_function->get_perticular_field_value('tbl_customer', 'cust_image', " and cust_id ='".$user2_id."'");

$data['game_id'] = $this->custom_function->get_perticular_field_value('tbl_multiplayer_game', 'game_id', " and id ='".$muti_playrs_id."'");

$data['total_count'] = $this->home_model->get_question_count($id);
$data['question'] = $this->home_model->get_questions($id);
$data['is_home'] = $this->is_home();
$this->load->view('multiplayers',$data);

}


function checkout($q_id,$id){
$data['is_home'] = $this->is_home();
$this->load->view('checkout',$data);


}

function order(){
$last_mul_id = $this->session->userdata('last_tbl_multi_id');
$order_id = $this->custom_function->randomNassword();
$game_id = $this->custom_function->get_perticular_field_value('tbl_multiplayer_game', 'game_id', " and id ='".$last_mul_id."'");
$user_id = $this->input->post('user_id');
$address = $this->input->post('address');
$city = $this->input->post('city');
$state = $this->input->post('state');
$pin= $this->input->post('pin');
$country = $this->input->post('country');
$quiz_topic_id = $this->input->post('quiz_topic_id');
$pro_id = $this->input->post('pro_id');

 $data_order = array("game_id"=>$game_id,
 "transation_id"=>$order_id,
 "user_id"=>$user_id,
 "product_id"=>$pro_id,
 "quiz_topic_id"=>$quiz_topic_id,
 "address"=>$address,
 "city"=>$city,
 "state"=>$state,
 "pin"=>$pin,
"country"=>$country
);
//print_r($data_order);
$this->db->insert('tbl_order',$data_order);
$last_order_id=$this->db->insert_id();
$data4=array('last_order_id'=>$last_order_id);
$this->session->set_userdata($data4);


 

}

function thankyou(){
$data['is_home'] = $this->is_home();
$this->load->view('thankyou',$data);
}


function update_scoring(){
$points = $this->input->post('points');
$player_id = $this->input->post('player_id');

 $data_up_sc = array("score"=>$points);
 //print_r($data_up_sc);
 $this->db->where("player_id",trim($player_id));
 $this->db->update("tbl_multiplayer",$data_up_sc);

}

function update_final_score(){
$points = $this->input->post('player1points');
$player_id = $this->input->post('player_id');
$data_up_final = array("final_score"=>$points);

$this->db->where("player_id",trim($player_id));
 $this->db->update("tbl_multiplayer",$data_up_final);
 }

function update_player2_score(){
$player2_id = $this->input->post('player2_id');
echo $accepted = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'score', " and player_id ='".trim($player2_id)."'");
}


 function go_continue(){
 $current_user = $this->input->post('my_player_id');
$quiz_topic_id =  $this->input->post('quiz_topic_id');
$product_id =  $this->input->post('product_id');
$prize_cost  = $this->custom_function->get_perticular_field_value('tbl_product', 'prod_amount', " and prod_id ='".$product_id ."'"); 
 $accepted = $this->custom_function->get_perticular_field_value('tbl_multiplayer', 'accepted', " and player_id ='".$current_user."'");


$cust_id = $this->session->userdata('customerid');
$user_cradit = $this->custom_function->get_perticular_field_value('tbl_customer', 'cradit', " and cust_id ='".$cust_id."'");
$deducted_credit = $this->input->post('deducted_credit');
$data_up_final = array("cradit"=>($user_cradit-$deducted_credit));

$this->db->where("cust_id",$cust_id);
 $this->db->update("tbl_customer",$data_up_final);

$game_id = $current_user.'-'.$accepted;
$game_id1 = $accepted.'-'.$current_user;
$data_order = array("game_id"=>$game_id,
 "players_id"=>$current_user.','.$accepted,
'quiz_topic_id' => $quiz_topic_id,
 "prize_cost"=>$prize_cost,
"winner"=>'',
'product_id' => $product_id,
"date"=>date('Y-m-d H:i:s')
);


if($accepted!= ''){
$game_id3  = $this->custom_function->get_perticular_field_value('tbl_multiplayer_game', 'id', " and (game_id ='".$game_id ."' OR game_id ='".$game_id1 ."')"); 
 
if($game_id3==''){
$this->db->insert('tbl_multiplayer_game',$data_order);
$last_game_id=$this->db->insert_id();
}else{
$last_game_id=$game_id3;
}
$last_game_id;
$data4=array('last_tbl_multi_id'=>$last_game_id);
$this->session->set_userdata($data4);
echo 'ok';
}
 }
/////////////////////////////////////////////End Class/////////////////////////////
}


?>