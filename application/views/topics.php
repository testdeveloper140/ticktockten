<?php echo $this->load->view('header') ; ?>

<!-- <div>
    <h3 class="white-text">CHOSSE YOUR TOPIC</h3>
    <?php
        foreach($topics as $top)
        { 
            $id = $top->qtopic_id;
    ?>
    <div>
           <a class="btn btn-primary" href="<?php echo base_url(); ?>play/<?php echo $id; ?>"><?php echo $top->qtopic_name; ?></a>
    </div>
    <?php
        }
    ?>      
</div> -->

<!-- html code --->
<div class="container">
    <div class="row">
    <div class="col-sm-12">
     <h3 class="white-text text-center catagory-title">CHOOSE YOUR TOPIC</h3>
     </div>
        <?php
        foreach($topics as $top)
        { 
            $id = $top->qtopic_id;
        ?>
            <div class="col-sm-4 col-md-3 col-xs-6">
             <div class="topics catagory">
<?php 
                    if($this->session->userdata('customerid') != "")
                    {
                ?>
                <div class="media" >
                    <a href="<?php echo base_url(); ?>waiting_room/<?php echo $id; ?>/<?php echo $product_id; ?>"><img class="img-responsive img-circle" id="proimg1" src="<?php echo base_url().$top->qtopic_image; ?>" alt=""/></a>
                </div>
                <a class="product-title" href="<?php echo base_url(); ?>waiting_room/<?php echo $id; ?>/<?php echo $product_id; ?>"><?php echo $top->qtopic_name; ?><br><p><?php echo $top->qcat_name; ?></p></a>
<?php
                    } else {
                ?>
<div class="media" >
                    <a href="#" class="text-muted forget_2" style="text-align: right;text-decoration:none;color:#1a95e6;" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">
                    <img class="img-responsive img-circle" id="proimg1" src="<?php echo base_url().$top->qtopic_image; ?>" alt=""/></a>
                </div>
                <a class="product-title" href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">
                <?php echo $top->qtopic_name; ?><br><p><?php echo $top->qcat_name; ?></p></a>
                
                <?php
                    }
                ?>
            </div>
            </div>
        <?php
        }
        ?>
        <div class="clearfix"></div> 
    </div>



</div>

<?php echo $this->load->view('footer'); ?>