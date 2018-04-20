<?php echo $this->load->view('header') ; ?>

<!--<div>
    <h3 class="white-text">Product Categories</h3>
    <?php
        //foreach($prod_category as $cat)
        //{ 
           // $id = $cat->pcat_id;
    ?>
            <div class="single-product">
                <img src="<?php //echo base_url(); ?>assets/images/product/1.png" alt="<?php //echo $cat->pcat_name; ?>" class="img-responsive" />
                <a href="<?php //echo base_url(); ?>product_subcategory/<?php //echo $id; ?>" class="product-title"><?php //echo $cat->pcat_name; ?></a>
                <a class="btn btn-info-dark" href="<?php //echo base_url(); ?>product_subcategory/<?php //echo $id; ?>">See All</a>
            </div>
    <?php
        //}
    ?>      
</div>-->

<div>
    <div class="container">
    <div class="col-sm-12">
        <h3 class="white-text text-center catagory-title">PRODUCT CATEGORIES</h3>
    </div>
    <div class="row">
    <?php
        foreach($prod_category as $cat)
        { 
            $id = $cat->pcat_id;
    ?>
        
            <div class="col-sm-4 ">
                <div class="single-product catagory">
                       <a href="<?php echo base_url(); ?>products/<?php echo $id; ?>" class="product-title"><img src="<?php echo base_url().$cat->pcat_image	; ?>" alt="<?php echo $cat->pcat_name; ?>" class="img-responsive" /></a>
                       <p class="text-center" style="height:60px"> <a href="<?php echo base_url(); ?>products/<?php echo $id; ?>" class="product-title"><?php echo $cat->pcat_name; ?></a> </p>
                      <p class="text-center"> <a class="btn btn-info-dark" href="<?php echo base_url(); ?>products/<?php echo $id; ?>">See All</a></p>
                </div>
            </div>
    <?php
        }
    ?> 
    <div class="clearfix"></div>  
    </div>
    </div>     
</div>
<?php echo $this->load->view('footer'); ?>