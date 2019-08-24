<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        
            
                
                    
                       
        
        
                    
                        
                        
                        
                        
                    
                
            
        
        <ul class="nav navbar-nav">
            <li><a class="top-menu-head" href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"
                                                                        aria-hidden="true"></i> Home</a>
            </li>
        </ul>
        <li>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                style="color:#fff"> Hi, <?php echo e($_SESSION['user_master']->name); ?>

                            &nbsp;<b class="fa fa-angle-down"></b></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo e(url('change_password')); ?>"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                        
                        
                        
                        
                        
                        
                        
                        <li><a href="<?php echo e(url('logout')); ?>"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
            <div class="simple_logoimg">
                <a href="<?php echo e(url('dashboard')); ?>"><img src="<?php echo e(url('assets/img/Retinodes_logo.png')); ?>"/></a>
            </div>
        <ul class="sidebar-nav" style="margin-left:0;">
            <li class="sidebar-brand"><a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;float:right;"> <i
                            class="fa fa-bars" style="font-size:30px !Important;" aria-hidden="true"
                            aria-hidden="true"> </i> </a></li>
            
                                                               
                            

            
            
            

            <li><a href="<?php echo e(url('request_item')); ?>" title="request_item"><i class="fa fa-cart-plus"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Request Item</span></a></li>

            <li><a href="<?php echo e(url('issue')); ?>" title="issue"><i class="fa fa-exclamation-circle"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Issue</span></a></li>
            <li><a href="<?php echo e(url('ItemCat')); ?>" title="Item Category"><i class="fa fa-list-ol"
                                                           aria-hidden="true"></i><span
                            style="margin-left:10px;"> Item Category</span></a></li>
            <li><a href="<?php echo e(url('Item')); ?>" title="Items"><i class="fa fa-list-ul"
                                                                          aria-hidden="true"></i><span
                            style="margin-left:10px;"> Items</span></a></li>
            <li><a href="<?php echo e(url('ingredient')); ?>" title="Menu Ingredient"><i class="fa fa-list-alt"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Ingredient</span></a></li>
            <li><a href="<?php echo e(url('MCATE')); ?>" title="Menu Category"><i class="fa fa-hospital-o"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Category</span></a></li>
            <li><a href="<?php echo e(url('Menu')); ?>" title="Menus"><i class="fa fa-bars"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menus</span></a></li>
            <li><a href="<?php echo e(url('order')); ?>" title="Order"><i class="fa fa-pencil-square-o"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Order</span></a></li>
            <li><a href="<?php echo e(url('getbill')); ?>" title="Order"><i class="fa fa-pencil-square"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Billing</span></a></li>
            <li><a href="<?php echo e(url('bill_list')); ?>" title="Bill List"><i class="fa fa-file-text"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Bill List</span></a></li>
            <li><a href="<?php echo e(url('logout')); ?>" title="Logout"><i class="fa fa-power-off" aria-hidden="true"> </i> <span
                            style="margin-left:10px;">Log Out </span> </a></li>

        </ul>
    </div>
</div>
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>