<?php echo $this->load->view('header') ; ?>

<!-- <div>
    <h3 class="white-text">CHOSSE YOUR TOPIC</h3>
    <?php
        foreach($topics as $top)
        { 
            $id = $top->qtopic_id;
    ?>
    <div>
           <a class="btn btn-primary" href="<?php echo base_url(); ?>home/play/<?php echo $id; ?>"><?php echo $top->qtopic_name; ?></a>
    </div>
    <?php
        }
    ?>      
</div> -->

<!-- html code --->
<div class="container">
    <div class="row">
    <div class="col-sm-12">
     <h3 class="white-text text-center catagory-title">ALL GAMES</h3>
     </div>
        <?php
        foreach($allgames as $all)
        { 
            $id = $all->qtopic_id;
        ?>
            <div class="col-sm-4 col-md-3 col-xs-6">
             <div class="topics catagory">

<div class="media" >
                    <a href="<?php echo base_url();?>all_product/<?php echo $id; ?>"><img class="img-responsive img-circle" id="proimg1" src="<?php echo base_url().$all->qtopic_image; ?>" alt=""/></a>
                </div>
                <a class="product-title" href="<?php echo base_url();?>all_product/<?php echo $id; ?>"><?php echo $all->qtopic_name; ?><br><p><?php echo $all->qcat_name; ?></p></a>
                
                
            </div>
            </div>
        <?php
        }
        ?>
        <div class="clearfix"></div> 
    </div>
</div>

<?php echo $this->load->view('footer'); ?>