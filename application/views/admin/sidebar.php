<!--<script>
         $('.nav li').click(function(e) {
            e.preventDefault();
            $('.nav li').removeClass('active');
            $(this).addClass('active');
        });
      </script>-->

<!-- START aside-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <nav class="sidebar">
            <!-- START user info-->
            <div class="item user-block">
               <!-- User picture-->
               <div class="user-block-picture">
                  <div class="user-block-status">
                     <img src="<?php echo base_url(); ?>/assets/app/img/user/02.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                     <div class="circle circle-success circle-lg"></div>
                  </div>
                  <!-- Status when collapsed-->
               </div>
               <!-- Name and Role-->
               <div class="user-block-info">
                  <span class="user-block-name item-text">Welcome User</span>
                  <span class="user-block-role">UX-Dev</span>
               </div>
            </div>
            <!-- END user info-->
            <ul class="nav">
               <!-- START Menu-->
               <li class="nav-heading"><h4><strong>Main navigation</strong></h4></li>
               <li class="active">
                  <a href="<?php echo base_url();?>admin/dashboard" title="Dashboard" data-toggle="" class="no-submenu">
                     <em class="fa fa-dot-circle-o"></em>
                     <span class="item-text">Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admin/users" title="Users" data-toggle="" class="no-submenu">
                     <em class="fa fa-users"></em>
                     <span class="item-text">Users</span>
                  </a>
               </li>
               
               <li>
                  <a href="<?php echo base_url();?>admin/transaction" title="Transaction" data-toggle="" class="no-submenu">
                     <em class="fa fa-users"></em>
                     <span class="item-text">Transaction</span>
                  </a>
               </li>
               
               <li>
                  <a href="<?php echo base_url();?>admin/singal_player" title="Game" data-toggle="" class="no-submenu">
                     <em class="fa fa-users"></em>
                     <span class="item-text">Singal Player Game</span>
                  </a>
               </li>
               
               <li>
                  <a href="<?php echo base_url();?>admin/multi_player" title="Game" data-toggle="" class="no-submenu">
                     <em class="fa fa-users"></em>
                     <span class="item-text">Multi Player Game</span>
                  </a>
               </li>
               
               <li>
                  <a href="<?php echo base_url();?>admin/quiz_category" title="Quiz Category" data-toggle="" class="no-submenu">
                     <em class="fa fa-question-circle"></em>
                     <span class="item-text">Quiz Category</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admin/quiz_topic" title="Quiz Topic" data-toggle="" class="no-submenu">
                     <em class="fa fa-question"></em>
                     <span class="item-text">Quiz Topic</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admin/product_category" title="Product Category" data-toggle="" class="no-submenu">
                     <em class="fa fa-th"></em>
                     <span class="item-text">Product Category</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admin/product_subcategory" title="Product Sub-Category" data-toggle="" class="no-submenu">
                     <em class="fa fa-th-list"></em>
                     <span class="item-text">Product Sub-Category</span>
                  </a>
               </li>
               <!-- <li>
                  <a href="#" title="Elements" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-flask"></em>
                     <span class="item-text">Elements</span>
                  </a>
                  <!-- START SubMenu item-->
                  <!--<ul class="nav collapse ">
                     <li>
                        <a href="button.html" title="Buttons" data-toggle="" class="no-submenu">
                           <span class="item-text">Buttons</span>
                        </a>
                     </li>
                     <li>
                        <a href="notifications.html" title="Notifications" data-toggle="" class="no-submenu">
                           <span class="item-text">Notifications</span>
                        </a>
                     </li>
  
                    
                  </ul>
                  <!-- END SubMenu item-->
               <!--</li> -->
               <!-- END Menu-->
            </ul>
         </nav>
         <!-- END Sidebar (left)-->
         
      </aside>
      <!-- End aside-->
      
      