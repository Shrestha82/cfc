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
                        <li><a href="<?php echo e(url('change_password')); ?>">Change Password</a></li>
                        <li class="divider"></li>
                        
                        
                        
                        
                        
                        
                        <li><a href="<?php echo e(url('logout')); ?>"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav" style="margin-left:0;">
            <li class="sidebar-brand"><a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;float:right;"> <i
                            class="fa fa-bars" style="font-size:30px !Important;" aria-hidden="true"
                            aria-hidden="true"> </i> </a></li>
            
            
            

            
            
            
            <li><a href="<?php echo e(url('logout')); ?>" title="Logout"><i class="fa fa-lock" aria-hidden="true"> </i> <span
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