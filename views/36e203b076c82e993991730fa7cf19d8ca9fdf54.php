<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <ul class="nav navbar-nav">
            <li><a class="top-menu-head" href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-home"
                                                                        aria-hidden="true"></i> Home</a>
            </li>
        </ul>
        <li>
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="false">
        <span style="color:#fff">  Quick Links
        <span class="caret"></span></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(url('Supplier')); ?>"><i class="fa fa-angle-double-right"></i> Supplier </a></li>
                        <li><a href="<?php echo e(url('stock')); ?>"><i class="fa fa-angle-double-right"></i> Stock </a></li>
                        <li><a href="<?php echo e(url('Tbl')); ?>"><i class="fa fa-angle-double-right"></i> Tables </a></li>
                        <li><a href="<?php echo e(url('registration')); ?>"><i class="fa fa-angle-double-right"></i> Registration
                            </a></li>
                        <li><a href="<?php echo e(url('issue')); ?>"><i class="fa fa-angle-double-right"></i> Issue Stock </a></li>
                        <li><a href="<?php echo e(url('request_item')); ?>"><i class="fa fa-angle-double-right"></i> Request Issue
                                Stock </a></li>
                        <li><a href="<?php echo e(url('reports')); ?>"><i class="fa fa-angle-double-right"></i> Reports</a></li>
                        <li><a target="_blank" href="<?php echo e(url('tablelist')); ?>"><i class="fa fa-angle-double-right"></i>
                                Tables</a></li>
                    </ul>
                </li>
            </ul>
        </li>


        <li>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                style="color:#fff"> Hi, <?php echo e($_SESSION['user_master']->name); ?>

                            &nbsp;<b class="fa fa-angle-down"></b></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo e(url('change_password')); ?>"><i class="fa fa-unlock-alt"></i>Change Password</a>
                        </li>
                        
                        
                        
                        
                        
                        
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
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;float:right;"> <i
                            class="fa fa-bars" style="font-size:30px !Important;" aria-hidden="true"> </i> </a></li>
            <li><a href="<?php echo e(url('dashboard')); ?>" title="Home"><i class="fa fa-home"
                                                               aria-hidden="true"></i><span
                            style="margin-left:10px;"> Home</span></a></li>
            <li><a href="<?php echo e(url('Unit')); ?>" title="Units"><i class="fa fa-snowflake-o"
                                                           aria-hidden="true"></i><span
                            style="margin-left:10px;"> Units</span></a></li>
            <li><a href="<?php echo e(url('ItemCat')); ?>" title="Item Category"><i class="fa fa-list-ol"
                                                                      aria-hidden="true"></i><span
                            style="margin-left:10px;"> Item Category</span></a></li>
            <li><a href="<?php echo e(url('Item')); ?>" title="Emp Type"><i class="fa fa-list-ul"
                                                              aria-hidden="true"></i><span
                            style="margin-left:10px;"> Item</span></a></li>
            <li><a href="<?php echo e(url('MCATE')); ?>" title="Menu Category"><i class="fa fa-hospital-o"
                                                                    aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Category</span></a></li>
            <li><a href="<?php echo e(url('subcategory')); ?>" title="Menu Subcategory"><i class="fa fa-th-list"
                                                                             aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Subcategory</span></a></li>
            <li><a href="<?php echo e(url('Menu')); ?>" title="Menus"><i class="fa fa-bars"
                                                           aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menus</span></a></li>

            <li><a href="<?php echo e(url('Ingredient')); ?>" title="Menu Ingredient"><i class="fa fa-list-alt"
                                                                           aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Ingredient</span></a></li>

            <li><a href="<?php echo e(url('EMPTYPE')); ?>" title="Emp Type"><i class="fa fa-user-secret"
                                                                 aria-hidden="true"></i><span
                            style="margin-left:10px;"> Emp Type</span></a></li>

            <li><a href="<?php echo e(url('Employee')); ?>" title="Employee"><i class="fa fa-user"
                                                                  aria-hidden="true"></i><span
                            style="margin-left:10px;"> Employee</span></a></li>
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