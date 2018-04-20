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
    <h3 class="white-text">CHOOSE YOUR QUIZ CATEGORY</h3>
    <?php
        //foreach($quiz_category as $cat)
        //{ 
            //$id = $cat->qcat_id;
    ?>
    <div>
           <a class="btn btn-primary" href="<?php //echo base_url(); ?>home/topics/<?php //echo $id; ?>"><?php //echo $cat->qcat_name; ?></a>
    </div>
    <?php
        //}
    ?>      
</div> -->
<!-- html code --->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="white-text text-center catagory-title">CHOOSE YOUR QUIZ CATEGORY</h3>
        </div>
        
        <?php
        foreach($quiz_category as $cat)
        { 
            $id = $cat->qcat_id;
        ?>
        <div class="col-sm-3 circleDiv text-center" onclick="window.location='<?php echo base_url(); ?>topics/<?php echo $id; ?>/<?php echo $product_id; ?>'">
            <a class="btn btn-cata" ><?php echo $cat->qcat_name; ?></a>
        </div>
        <?php
        }
        ?> 
        <div class="clearfix"></div>
    </div>
</div>




<?php echo $this->load->view('footer'); ?>