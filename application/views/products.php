<?php echo $this->load->view('header') ; ?>
<style>
.circleDiv{
border-radius: 50%;
behavior: url(PIE.htc);
width: 260px;
    height: 260px;
    background: #1a95e6;
    margin:16px;
    //border: 3px solid red;
}
.btn-cata {
    margin-bottom: 20px;
    margin-top: 46%;
    min-width: 188px;
    text-align: center;
    font-size:30px;
}
</style>
<!-- <div>
    <h3 class="white-text">CHOOSE THE PRODUCT YOU WANT TO PLAY FOR</h3>
    <?php
        //foreach($products as $prod)
        //{ 
            //$id = $prod->prod_id;
    ?>
            <div class="single-product">
                <img src="<?php //echo base_url().$prod->prod_image; ?>" alt="<?php //echo $prod->prod_name; ?>" class="img-responsive" style="height: 170px;"/>
                <a href="<?php //echo base_url(); ?>quiz_category" class="product-title"><?php //echo $prod->prod_name; ?> - <?php //echo $prod->psub_name; ?></a>
                <p><span class=""><?php //echo $prod->pcat_name; ?></span></p>
                <span class="price">PRICE : <?php //echo number_format($prod->prod_amount); ?></span>
                <a class="btn btn-info-dark" href="<?php //echo base_url(); ?>quiz_category">PLAY NOW</a>
            </div>
    <?php
        //}
    ?>      
</div> -->

<!-- html code --->
<div class="container">
<div class="row">
<div class="col-sm-12">
 <h3 class="white-text text-center catagory-title">CHOOSE THE PRODUCT YOU WANT TO PLAY FOR</h3>
 </div>
 </div>
    <div class="row">
        <?php
if(!empty($products)){
        foreach($products as $prod)
        { 
            $id = $prod->prod_id;
        ?>   
            <div class="col-sm-3">
                <div class="catagory  topics">
                    <div class="media" >
                    <a href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>"><img src="<?php echo base_url().$prod->prod_image; ?>" alt="<?php echo $prod->prod_name; ?>" class="img-responsive img-circle"/></a>
                    </div>
                    <a style="top:23%;" href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>" class="product-title"><?php echo $prod->prod_name; ?> - <?php echo $prod->psub_name; ?><br><p><?php echo $prod->pcat_name; ?></p></a>
                    
 <p class="price">PRICE : $ <?php echo number_format($prod->prod_amount); ?></p>
 
<a href="" data-toggle="dropdown" class="btn btn-info-dark" style="text-decoration: none;">PLAY NOW</a>
   <ul id="login-dp" class="dropdown-menu reg" style="position: absolute;top: 90px;left: 20%;">
    <li>
       <a href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>" class="btn-create-account">2 Players</a>
    </li>
    <li>
       <a href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>" class="btn-create-account">4 Players</a>
    </li>

  <li>
       <a href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>" class="btn-create-account">6 Players</a>
    </li>

<li>
       <a href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>" class="btn-create-account">8 Players</a>
    </li>

<li>
       <a href="<?php echo base_url(); ?>quiz_category/<?php echo $id; ?>" class="btn-create-account">10 Players</a>
    </li>

   </ul>
    



                </div>
            </div>
          <?php
            }}else{
          ?> 
<div class="col-sm-12">
                <div class=" catagory col-sm-12">
                    <p class="text-center white">No product found withing this category. Please choose any other categories.</p>
                </div>
            </div>
<div class="text-center mar-top-2">              
      <div class="container-fluid">        
        <div class="row"><a style="background:#2686c5" class="btn btn-info-dark" href="<?php echo base_url(); ?>product_category">View all categories</a></div>
    </div>
    </div>
<div class="col-sm-12" style="height:150px;">
                <div class=" catagory col-sm-12">
                    <p class="text-center white"></p>
                </div>
            </div>
<?php }?>
          <div class="clearfix"></div>  
    </div>
</div>

<?php echo $this->load->view('footer'); ?>