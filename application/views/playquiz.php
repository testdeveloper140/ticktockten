<!DOCTYPE html>
<html>
    <head>
        <title>Trivia Game</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500italic,500,700,300italic,300,400italic,700italic" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/countdown.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.countdown360.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>assets/css/chat-box.css" rel="stylesheet"/> 
		<style>
			.container {
				margin-top: 30px;
			}
		</style>
	</head>
    


<script type="text/javascript">
    
    function progress(timeleft, timetotal, $element) {
        var progressBarWidth = timeleft * $element.width() / timetotal;
        $element.find('div').animate({ width: progressBarWidth }, timeleft == timetotal ? 0 : 900, 'linear');
        if(timeleft > 0) {
            setTimeout(function() {
                progress(timeleft - 1, timetotal, $element);
            }, 900);
        }
    };
    
</script>

<script>


$( document ).ready(function() {
    $('#quizpart1').show();
    progress(10, 10, $('#progressBar'));
    //change(1);    
});

/*function change(i)
{
    alert(i);
    setInterval(function()
    { 
        var timer = $("#countdown").countdown360().getTimeRemaining();
        if(timer == 0)
        {
            quiz(i);
        } 
    }, 1000);
}*/
</script>   
    
	<body style="height:100%;">
	   <section class="gray" style="height:auto">


            <!-- <div id="progressBar">
              <div></div>
            </div> -->
<?php 
if($user->cust_image==''){
$avt_image = 'assets/images/user2.png';
}else{
$avt_image = $user->cust_image;
}
?>
<style>
.home-btn{background: #0F3B60;
padding: 10px 21px;

color: #fff;
font-size: 19px;
box-shadow: 1px 3px 2px #454545;
border: 1px solid #fff;}
.home-btn1{
float:right;
background: #0F3B60;
padding: 10px 21px;

color: #fff;
font-size: 19px;
box-shadow: 1px 3px 2px #454545;
border: 1px solid #fff;}
.cont1{width:100%;margin-top:0px;padding: 0px;}
.no-padding{padding:0px;}


</style>
<div class="container cont1">
<div class="col-sm-6 no-padding">
    	<a href="<?php echo base_url();?>"><button class="home-btn"> <i class="fa fa-home" aria-hidden="true"></i>
Home</button></a>
    		</div>
    		
    		<div class="col-sm-6 no-padding">
    		<a href="<?php echo base_url();?>contact"><button class="home-btn1"> <i class="fa fa-cog" aria-hidden="true"></i>
Support</button></a>
    		</div>
    		<div class="clearfix"></div>





</div>

    		<div class="container">
    		
        		<div class="col-sm-3">
                    <div class="col-sm-6">
                    	<img src="<?php echo base_url().$avt_image; ?>" class="img-1" alt=""/>
                    </div> 
                    <div class="col-sm-6 no-padding">   
                        <p class="name"><?php echo $user->cust_name; ?></p>
                        <span class="score" id="play1score">0</span>
                    </div>
                <div class="clearfix"></div>
                </div>
                <div class="col-sm-6">
                    <div id="timer">
                    <p style="text-align:center"> 
                        <p class="quz">TIME LEFT</p>
                       <!-- <div id="timer" align="center">
                            <script type="application/javascript">
                                var myCountdownTest = new Countdown({ time: 10, width:200, height:80, rangeHi:"minute" });
                           </script> 
                        </div> -->
                        <div id="countdown" align="center"></div>
                    </p>
                    <p class="quz"> <span id="q_no">1</span> of <?php echo $total_count; ?></p>
                    </div>
                    <div id="game_end" style="display: none;">
                        <div style="text-align: center;">
                            <h1>GAME OVER!!!</h1>
                            <h3>Your Score : <span id="tot_score"></span></h3>
                            <button class="btn" style="background:#000;" onclick="window.location='<?php echo base_url(); ?>quiz_category/<?php echo $product_id; ?>'">Choose another game</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-6">
                    	<img src="<?php echo base_url(); ?>assets/images/computer.png" class="img-1"/>
                    </div> 
                    <div class="col-sm-6 no-padding">   
                        <p class="name">COMPUTER </p>
                        <span class="score">0</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <input type="hidden" name="total_count" id="total_count" value="<?php echo $total_count; ?>"/>
            
            <div class="container">
        	<div class="row">
                <div class="col-sm-2"></div>
   				<div class="col-sm-8">
                <?php 
                    $i = 1;
                    foreach($question as $ques)
                    {
                        $id = $ques->q_id;
                ?>
                    <div class="ans-sec" id="quizpart<?php echo $i; ?>" style="display: none;">
                    	<p class="quz"> <?php echo ucwords($ques->question); ?> </p>
                        <div>
                        <div class="funkyradio">
                            <div class="funkyradio-default col-sm-6" >
                                <input type="radio" name="radio<?php echo $i; ?>" id="radio1<?php echo $i; ?>" onclick="quiz(<?php echo $i; ?>)" value="1"/>
                                <label for="radio1<?php echo $i; ?>" id="ans1<?php echo $i; ?>"><?php echo strtoupper($ques->option1); ?></label>
                            </div>
                            <div class="funkyradio-default col-sm-6" >
                                <input type="radio" name="radio<?php echo $i; ?>" id="radio2<?php echo $i; ?>" onclick="quiz(<?php echo $i; ?>)" value="2"/>
                                <label for="radio2<?php echo $i; ?>" id="ans2<?php echo $i; ?>"><?php echo strtoupper($ques->option2); ?></label>
                            </div>
                            <div class="funkyradio-default col-sm-6" >
                                <input type="radio" name="radio<?php echo $i; ?>" id="radio3<?php echo $i; ?>" onclick="quiz(<?php echo $i; ?>)" value="3"/>
                                <label for="radio3<?php echo $i; ?>" id="ans3<?php echo $i; ?>"><?php echo strtoupper($ques->option3); ?></label>
                            </div>
                            <div class="funkyradio-default col-sm-6" >
                                <input type="radio" name="radio<?php echo $i; ?>" id="radio4<?php echo $i; ?>" onclick="quiz(<?php echo $i; ?>)" value="4"/>
                                <label for="radio4<?php echo $i; ?>" id="ans4<?php echo $i; ?>"><?php echo strtoupper($ques->option4); ?></label>
                            </div>
                        </div>
                        <input type="hidden" name="customer_id" id="customer_id<?php echo $i; ?>" value="<?php echo $this->session->userdata('customerid'); ?>"/>
                        <input type="hidden" name="question_id" id="question_id<?php echo $i; ?>" value="<?php echo $ques->q_id; ?>"/>
                        <input type="hidden" name="correct_option" id="correct_option<?php echo $i; ?>" value="<?php echo $ques->correct_option; ?>"/>
                        <input type="hidden" name="topic_id" id="topic_id<?php echo $i; ?>" value="<?php echo $ques->q_topic_id; ?>"/>
                        <input type="hidden" name="product_id" id="product_id<?php echo $i; ?>" value="<?php echo $product_id; ?>"/>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php
                        $i++; 
                    }
                    ?>
                    
                </div>         
            </div>
       </div>
    </section>
    
   
   
   
    
    
    
    <div class="container text-center">
	<div class="row">
		
        <div class="round hollow text-center">
        <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Open in chat </a>
        </div>
        
        <hr>
        
        MORE :
        <a target="_blank" href="http://bootsnipp.com/snippets/33ejn">Whatsapp Chat Box POPUP</a>,
         <a target="_blank" href="http://bootsnipp.com/snippets/z4P39"> Creative User Profile  </a>
         
	</div>
</div>


<div class="popup-box chat-popup" id="qnimate">
    		  <div class="popup-head">
				<div class="popup-head-left pull-left"><img src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" alt="iamgurdeeposahan"> Gurdeep Osahan</div>
					  <div class="popup-head-right pull-right">
						<div class="btn-group">
    								  <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
									   <i class="glyphicon glyphicon-cog"></i> </button>
									  <ul role="menu" class="dropdown-menu pull-right">
										<li><a href="#">Media</a></li>
										<li><a href="#">Block</a></li>
										<li><a href="#">Clear Chat</a></li>
										<li><a href="#">Email Chat</a></li>
									  </ul>
						</div>
						
						<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
                      </div>
			  </div>
			<div class="popup-messages">
    		
			
			
			
			<div class="direct-chat-messages">
                    
					
					<div class="chat-box-single-line">
								<abbr class="timestamp">October 8th, 2015</abbr>
					</div>
					
					
					<!-- Message. Default to the left -->
                    <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img alt="message user image" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                      </div>
					  <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                      </div>
						<div class="direct-chat-info clearfix">
						<span class="direct-chat-img-reply-small pull-left">
							
						</span>
						<span class="direct-chat-reply-name">Singh</span>
						</div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
					
					
					<div class="chat-box-single-line">
						<abbr class="timestamp">October 9th, 2015</abbr>
					</div>
			
					
					
					<!-- Message. Default to the left -->
                    <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                      </div>
					  <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                      </div>
						<div class="direct-chat-info clearfix">
						  <img alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img big-round">
						<span class="direct-chat-reply-name">Singh</span>
						</div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
					
					
                    

                    

                  </div>
			
			
			
			
			
			
			
			
			
			</div>
			<div class="popup-messages-footer">
			<textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
			<div class="btn-footer">
			<button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
			<button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
            <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
			<button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>
			</div>
			</div>
	  </div>
   <script>
     $(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })
   
   
   
   
   </script> 
    
    
    
    
    
    
    
    
    
    
    
    
<script type="text/javascript" charset="utf-8">
    //var cnt = $('#q_no').html(j);
    var countercal = 1;
    
    $("#countdown").countdown360({
    radius      : 60,
    seconds     : 10,
    fontColor   : '#FFFFFF',
    autostart   : false,
    onComplete: function () {
        var cnt =  parseInt(document.getElementById('q_no').innerHTML);
        var total_count = parseInt(document.getElementById('total_count').value);
        
        if(countercal <= total_count)
        {
            //alert(countercal);
            quiz(cnt);
        }
        return false;
        }
    }).start()


    function quiz(i)
    {
        var total_count = $('#total_count').val();
        var correct = $('#correct_option'+i).val();
        var topic_id = $('#topic_id'+i).val();
        var option = $('input[name="radio'+i+'"]:checked').val();
        //var second = $('#textbox_jbeeb_10').html();
        var second = $("#countdown").countdown360().getTimeRemaining();
        var ques_id = $('#question_id'+i).val();
        var cust_id = $('#customer_id'+i).val();
        var prod_id = $('#product_id'+i).val();
        var points = $('#play1score').html();
        var status = 'VICTORY';
        if(option == correct)
        {
            $('#ans'+option+i).css({"background-color": "green", "color": "white"});
            points = parseInt(points)+parseInt(second);
        }
        else
        {
            $('#ans'+option+i).css({"background-color": "red", "color": "white"});
        }
        
        /*$.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>scoring",
    		data:'custid='+cust_id+'&prod_id='+prod_id+'&ques_id='+ques_id+'&option='+option+'&status='+status+'&points='+points+'&topic_id='+topic_id,
    		success: function(data){
                 alert(data);
 	          }
        });*/
        $('#play1score').html(points);
        //alert("Points Earned : "+points);
        if(total_count != i)
        {
            var j = i+1;
            $('#quizpart'+i).hide("slow", function(){
                //alert("Round : "+j); 
            });
            //change(j);
            $('#q_no').html(j);
            $('#quizpart'+j).show(500);
            $("#countdown").countdown360({onComplete: function () {
                alert('HI');
                return false;
            }}).start();
            //change(j); 
            countercal = countercal+1;
        }
        else
        { 
            $('#quizpart'+i).fadeOut(500);
            $('#timer').hide(500);
            $('#tot_score').html(points);
            $('#game_end').fadeIn(500);
            $('.gray').css('height','100%');
            $.ajax({
    		type: "POST",
    		url: "<?php echo base_url(); ?>scoring",
    		data:'custid='+cust_id+'&prod_id='+prod_id+'&ques_id='+ques_id+'&option='+option+'&status='+status+'&points='+points+'&topic_id='+topic_id,
    		success: function(data){
                 console.log(data);
 	          }
            });
            countercal = countercal+1;
            return false;
            /*setTimeout(function() {
                alert("Redirecting...")
                window.location.href = "<?php echo base_url(); ?>"
            }, 3000);*/
        }
    }
</script>

	
       
	
	</body>
</html>