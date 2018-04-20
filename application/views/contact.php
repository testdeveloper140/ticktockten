<?php echo $this->load->view('header') ; ?>
<style>
.lead a{color:#fff;}
.lead {color:#fff;}

</style>
<div class="container">
    <div class="row text-justify">
        <div class="col-sm-12">
         <h3 class="white-text text-center catagory-title">CONTACT US</h3>
         
        </div>
        
        
        <div class="clearfix"></div> 
    </div>
</div>

<div class="container" style="margin-top: 20px;margin-bottom:20px">
<div class="row">
  <form role="form" action="" method="post" class="contact-form">
    <div class="col-sm-8">
        <div class="gray-contact">
      <h3 style="background:#1a95e6;padding:35px;">Drop Us A Line <img width="80" class="img-responsive pull-right" src="<?=base_url().'assets/images/mail_icon.png'?>"></h3>
      <p>Call us on XXX-XXX-MX or email us Support@5ckTock10.com</p> 
      <p><i class="fa fa-comments"></i> Want us to get back to you? </p>
            <div class="row">
<div class="col-md-6">
      <div class="form-group">
        
        <div class="input-group">
          <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Your Name" required>
          </div>
      </div>
      <div class="form-group">
        
        <div class="input-group">
          <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email" required  >
          </div>
      </div>
      <div class="form-group">
        
        <div class="input-group">
          <input type="email" class="form-control" id="InputPhone" name="InputPhone" placeholder="Phone Number" required  >
          </div>
      </div>
</div>
<div class="col-md-6">
      <div class="form-group">
        
        <div class="input-group"
>
          <textarea name="InputMessage" placeholder="Your Enquiry" id="InputMessage" class="form-control" rows="6" required></textarea>
         </div>
      </div>
</div>
                </div>
      <!-- <div class="form-group">
        <label for="InputReal">What is 4+3? (Simple Spam Checker)</label>
        <div class="input-group">
          <input type="text" class="form-control" name="InputReal" id="InputReal" required>
          </div>
      </div> -->
      <input style="background:#2686c5" type="submit" name="submit" id="submit" value="Submit" class="btn btn-submit pull-right">
        </div>
    </div>
  </form>
  <hr class="featurette-divider hidden-lg">
  <div class="col-sm-4">
    <address>
    <h4><strong>Office Location</strong></h4>
    <p class="lead" style="color:#000"><a style="color:#000" href="https://www.google.com/maps/preview?ie=UTF-8&q=The+Pentagon&fb=1&gl=us&hq=1400+Defense+Pentagon+Washington,+DC+20301-1400&cid=12647181945379443503&ei=qmYfU4H8LoL2oATa0IHIBg&ved=0CKwBEPwSMAo&safe=on">The Pentagon<br>
Washington, DC 20301</a><br>
      <strong >Phone:</strong> XXX-XXX-XXXX<br>
      <strong>Fax:</strong> XXX-XXX-YYYY</p>
    </address>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3106.2790578674367!2d-77.05845558465042!3d38.87185677957455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaf83d0f8c013532f!2sThe+Pentagon!5e0!3m2!1sen!2sus!4v1475745380688" width="100%" height="190" frameborder="0" style="border:0" allowfullscreen></iframe>
    <h4><strong>Let's get social!</strong></h4>
<div class="addthis_inline_share_toolbox"></div>
  </div>

</div>
</div>

<?php echo $this->load->view('footer'); ?>