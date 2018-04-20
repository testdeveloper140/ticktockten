<?php echo $this->load->view('header') ; ?>
<link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>  
<style>
.mycrl1{background: #f3f3f3 !important;}

.circleDiv{
border-radius: 50%;
behavior: url(PIE.htc);
width: 160px;
    height: 110px;
    background: #1a95e6;
   
position:relative;
    //border: 3px solid red;
}
.circleDiv a {
    
    margin-top: 24%;
    
    text-align: center;
    font-size:16px;
    color:#fff;
position:absolute;
padding:0 10px;
}.circleDiv a span{color:#fff!important;}
</style>
<!--Sec Product--> 
<section class="product-sec"> 
      <!-- Swiper -->
    <div class="swiper-container common-sec text-center">
        <h3 class="white-text">Products</h3>
        <div class="swiper-wrapper mar-top-2">
        <?php
            foreach($prod_category as $pcat)
            {            
                $pcat_id = $pcat->pcat_id; 
                $products = $this->home_model->get_products_bysub($pcat_id);
                $rand_pro = array();
                foreach($products as $product){
                $rand_pro[] = $product->prod_id;
                }
                $rand_id = array_rand($rand_pro);
                $rand_product = $this->home_model->get_product_byid($rand_pro[$rand_id]);
        ?>
            <div class="swiper-slide">
                <!--single product-->
                <div class="single-product">
                    <a href="<?php echo base_url(); ?>products/<?php echo $pcat_id; ?>">
                     <div class="hovr" style="background:rgba(42, 120, 173, 0.9);padding:12px!important;">
                         <p><?php echo $rand_product[0]->prod_name; ?></p>
                         <p style="font-size:35px;text-decoration: line-through;line-height:38px">$ <?php echo number_format($rand_product[0]->prod_amount); ?></p>
                         <p style="font-size: 35px;margin: 15px;">PLAY NOW</p>
                         <p>OWN IT NOW</p>
                         <p>STARTING AT</p>
                         <p style="font-size: 30px;margin: 15px;font-weight:bold">$ <?php echo number_format(($rand_product[0]->prod_amount/10)); ?></p>
                         
                     
                    </div></a>
                    <img src="<?php echo base_url().$pcat->pcat_image; ?>" alt="" class="img-responsive"/>
                    <a href="<?php echo base_url(); ?>products/<?php echo $pcat_id; ?>" class="product-title"> <?php echo $pcat->pcat_name; ?></a> 
                </div>
                <!--single product//-->
            </div>
        <?php
            }
        ?>
            
        </div>
        <!-- Add Pagination -->
<!--        <div class="swiper-pagination"></div>-->
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
      
      <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        paginationClickable: true,
        slidesPerView: 3,
        spaceBetween: 50,
        autoplay: 3000,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
    </script>
      
    <div class="text-center mar-top-2">              
      <div class="container-fluid">        
        <div class="row"><a class="btn btn-info-dark" href="<?php echo base_url(); ?>product_category">VIEW ALL </a></div>
    </div>
    </div>
</section>
<!--Sec product-->      
      
    <section class="common-sec game text-center">
      <h3 class="white-text">Games</h3> 
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="<?php echo base_url(); ?>assets/images/slide-2.png" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url(); ?>assets/images/slide-2.png" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
      </div>
    
      <div class="item">
        <img src="<?php echo base_url(); ?>assets/images/slide-2.png" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>-->
        </div>
      </div>

      <div class="item">
        <img src="<?php echo base_url(); ?>assets/images/slide-2.png" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <!--<h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>-->
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control mycrl1" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control mycrl1" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
                </div>
                <div class="col-sm-6">
                    <div class="row games-row">
                        <div class="col-sm-6">
                            <figure class="imghvr-fold-up"><img src="http://renaissancelivedemo.in/ticktockten/upload/product/1.png" alt="example-image" class="img-responsive">
                            <figcaption>
                                <div class="playtrigger">
                                  <h3>Lorem Ipsum</h3>
                                  <p><i class="fa fa-play-circle"></i></p>
                                </div>
                            </figcaption><a href="javascript:;"></a>
                          </figure>
                        </div>
                        <div class="col-sm-6">
                            <figure class="imghvr-fold-up"><img src="http://renaissancelivedemo.in/ticktockten/upload/product/21.png" alt="example-image" class="img-responsive">
                            <figcaption>
                              <div class="playtrigger">
                                  <h3>Lorem Ipsum</h3>
                                  <p><i class="fa fa-play-circle"></i></p>
                                </div>
                            </figcaption><a href="javascript:;"></a>
                          </figure>
                        </div>
                    </div>
                    <div class="row games-row mar-top-05">
                       <div class="col-sm-6">
                        <figure class="imghvr-fold-up"><img src="http://renaissancelivedemo.in/ticktockten/upload/product/21.png" alt="example-image" class="img-responsive">
                            <figcaption>
                              <div class="playtrigger">
                                  <h3>Lorem Ipsum</h3>
                                  <p><i class="fa fa-play-circle"></i></p>
                                </div>
                            </figcaption><a href="javascript:;"></a>
                          </figure>
                        </div>
                        <div class="col-sm-6">
                            <figure class="imghvr-fold-up"><img src="http://renaissancelivedemo.in/ticktockten/upload/product/3.png" alt="example-image" class="img-responsive">
                            <figcaption>
                              <div class="playtrigger">
                                  <h3>Lorem Ipsum</h3>
                                  <p><i class="fa fa-play-circle"></i></p>
                                </div>
                            </figcaption><a href="javascript:;"></a>
                          </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row games-row mar-top-05">
                <div class="col-sm-2">
                    <figure class="imghvr-fold-up"><img src="<?php //echo base_url(); ?>assets/images/game/1.jpg" alt="example-image" class="img-responsive">
                        <figcaption>
                            <div class="playtrigger">
                                <h3>Lorem Ipsum</h3>
                                <p><i class="fa fa-play-circle"></i></p>
                            </div>
                        </figcaption><a href="javascript:;"></a>
                      </figure>
                </div>
                <div class="col-sm-2">
                    <figure class="imghvr-fold-up"><img src="<?php //echo base_url(); ?>assets/images/game/1.jpg" alt="example-image" class="img-responsive">
                        <figcaption>
                          <div class="playtrigger">
                            <h3>Lorem Ipsum</h3>
                            <p><i class="fa fa-play-circle"></i></p>
                            </div>
                        </figcaption><a href="javascript:;"></a>
                    </figure>
                </div>
                <div class="col-sm-2">
                    <figure class="imghvr-fold-up"><img src="<?php //echo base_url(); ?>assets/images/game/1.jpg" alt="example-image" class="img-responsive">
                        <figcaption>
                          <div class="playtrigger">
                            <h3>Lorem Ipsum</h3>
                            <p><i class="fa fa-play-circle"></i></p>
                            </div>
                        </figcaption><a href="javascript:;"></a>
                    </figure>
                </div>
                <div class="col-sm-2">
                    <figure class="imghvr-fold-up"><img src="<?php //echo base_url(); ?>assets/images/game/1.jpg" alt="example-image" class="img-responsive">
                        <figcaption>
                          <div class="playtrigger">
                            <h3>Lorem Ipsum</h3>
                            <p><i class="fa fa-play-circle"></i></p>
                            </div>
                        </figcaption><a href="javascript:;"></a>
                    </figure>
                </div>
                <div class="col-sm-2">
                    <figure class="imghvr-fold-up"><img src="<?php //echo base_url(); ?>assets/images/game/1.jpg" alt="example-image" class="img-responsive">
                        <figcaption>
                          <div class="playtrigger">
                            <h3>Lorem Ipsum</h3>
                            <p><i class="fa fa-play-circle"></i></p>
                            </div>
                        </figcaption><a href="javascript:;"></a>
                    </figure>
                </div>
                <div class="col-sm-2">
                    <figure class="imghvr-fold-up"><img src="<?php //echo base_url(); ?>assets/images/game/1.jpg" alt="example-image" class="img-responsive">
                        <figcaption>
                          <div class="playtrigger">
                            <h3>Lorem Ipsum</h3>
                            <p><i class="fa fa-play-circle"></i></p>
                        </div>
                        </figcaption><a href="javascript:;"></a>
                    </figure>
                </div>
            </div> -->
            <div class="row mar-top-4"><a class="btn btn-info" href="">VIEW ALL</a></div>
            
            
            <div class="row games-row mar-top-05">
                <div class="col-sm-12">
                    <div id="owl-demo" class="owl-carousel"> 
<?php
$prize_won = array(
'<strong>Jhon</strong> has just won a <span>iphone5</span>',
'<strong>Bob</strong> is playing <span>Tiriva1</span></p>',
'<strong>Mycroft</strong> has just won a <span>iphone5</span>',
'<strong>Kealy</strong> is playing <span>Tiriva1</span>',
'<strong>Jill</strong> has just won a <span>iphone5</span>',
'<strong>Bob</strong> is playing <span>Tiriva1</span>',
'<strong>Jack</strong> is playing <span>Tiriva10</span>',
'<strong>Bill</strong> is playing <span>Tiriva6</span>',
'<strong>Marteen</strong> has just won a <span>iphone5</span>',
'<strong>Sherlock</strong> is playing <span>Tiriva6</span>',
'<strong>Bill</strong> is playing <span>Tiriva3</span>',
'<strong>Mike</strong> is playing <span>Tiriva6</span>',
'<strong>Kate</strong> has just won a <span>iphone5</span>',
'<strong>Jack</strong> is playing <span>Tiriva10</span>',
'<strong>Mycroft</strong> has just won a <span>iphone5</span>',
'<strong>James</strong> is playing <span>Tiriva2</span>'
);
foreach($prize_won as $value){
?>               
                        <div class="item"><p class="circleDiv"><a><?=$value?></a></p></div>
                        
<?php }?>
                    </div>
                </div>                

            </div>
            
            
            
        </div>
    </section>
    
<?php echo $this->load->view('footer'); ?>