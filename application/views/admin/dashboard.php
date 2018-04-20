<?php echo $this->load->view('admin/header') ; ?>


<!-- START Main section-->
<section>
<!-- START Page content-->
    <div class="content-wrapper">
        <h3>
        Dashboard
        <small>Hi, <?php echo $this->session->userdata('admin_name'); ?>.  Welcome back!</small>
        </h3>
        
        <div class="row">
        <!-- START dashboard main content-->
            <section class="col-md-12">
            <!-- START chart-->
                <div class="row">
                    <div class="col-lg-12">
                    <!-- START widget-->
                                            
                    <!-- END widget-->
                    </div>
                </div>
            <!-- END chart-->
                              
            <!-- START messages and activity-->
                              
            <!-- END messages and activity-->
            </section>
        <!-- END dashboard main content-->
        <!-- START dashboard sidebar-->
                       
        <!-- END dashboard sidebar-->
        </div>
    </div>
<!-- END Page content-->
</section>
<!-- END Main section-->

<?php echo $this->load->view('admin/footer'); ?>