<?php echo $this->load->view('header') ; ?>

<!-- <div>
    <h3 class="white-text">Product Sub - Categories</h3>
    <?php
        //foreach($prod_subcategory as $sub)
        //{ 
            //$id = $sub->psub_id;
    ?>
            <div class="single-product">
                <img src="<?php //echo base_url(); ?>assets/images/product/1.png" alt="<?php //echo $sub->psub_name; ?>" class="img-responsive" />
                <p  class="product-title"><?php //echo $sub->psub_name; ?></p>
                <?php 
                    //if($this->session->userdata('customerid') != "")
                    //{
                ?>
                <a class="btn btn-info-dark" href="<?php //echo base_url(); ?>products/<?php //echo $id; ?>">See Products</a>
                <?php
                    //} else {
                ?>
                <button class="btn btn-info-dark" onclick="message();" >See Products</button>
                <?php
                    //}
                ?>
            </div>
    <?php
        //}
    ?>      
</div> --> 
<!-- html code --->
<div class="container">
<div class="row">
<div class="col-sm-12">
 <h3 class="white-text text-center catagory-title">PRODUCT SUB CATEGORIES</h3>
 </div>
 </div>
    <div class="row">
        <?php
        if(!empty($prod_subcategory)){
        foreach($prod_subcategory as $sub)
        { 
            $id = $sub->psub_id;
        ?>
            <div class="col-sm-3">
            <div class="single-product catagory">
                <a href="<?php echo base_url(); ?>products/<?php echo $id; ?>"><img src="<?php echo base_url().$sub->psub_image; ?>" alt="<?php echo $sub->psub_name; ?>" class="img-responsive" /></a>
                <a  class="product-title" href="<?php echo base_url(); ?>products/<?php echo $id; ?>"><?php echo $sub->psub_name; ?></a>
                
                <a class="btn btn-info-dark" href="<?php echo base_url(); ?>products/<?php echo $id; ?>">See Products</a>
                
            </div>
            </div>
        <?php
            }}else{
          ?> 
<div class="col-sm-12">
                <div class=" catagory col-sm-12">
                    <p class="text-center white">No subcategory found withing this category. Please choose any other categories.</p>
                </div>
            </div>
<div class="text-center mar-top-2">              
      <div class="container-fluid">        
        <div class="row"><a class="btn btn-info-dark" href="<?php echo base_url(); ?>product_category">View all categories</a></div>
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

<script>
    function message()
    {
        alert("You need to login!")
    }
</script>

<?php echo $this->load->view('footer'); ?>