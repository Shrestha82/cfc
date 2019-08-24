<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(url('assets/css/font-awesome-animation.min.css')); ?>" rel="stylesheet"/>
    
    <style>
        .time {
            padding-right: 10px
        }

        .badge_capacity {
            display: inline-block;
            min-width: 10px;
            /*padding: 3px 7px;*/
            padding: 6px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            background-color: #a94442;
            border-radius: 10px;
        }

        .a_txt {
            text-decoration: none;
        !important;
        }

        .awesome_style {
            font-size: 100px;
            text-decoration: none;
        }
        .main_containner
        {
            background: transparent;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dash_head">
        <div class="dash_txt">Welcome to Anantara</div>
        <div class="dash_time">
            Last Login : <?php echo e(date_format(date_create($user_master->last_login), "d-M-Y h:i A")); ?>

        </div>
    </div>
    <div class="brics_mainblock">
        <a class="dash_brics_block" href="<?php echo e(url('request_item')); ?>">
            <div class="dash_brics_icon"><i class="fa fa-cart-plus"></i>
            </div>
            <div class="dash_brics_txt">
               Requests
            </div>
            <div class="border_gardian"></div>
        </a>
        <a href="<?php echo e(url('issue')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon"><i class="fa fa-exclamation-circle"></i></div>
                <div class="dash_brics_txt">Stock Issue</div>
                <div class="border_gardian" style="background: -webkit-linear-gradient(#fd6562,#324a82);"></div>
            </div>
        </a>
        <a href="<?php echo e(url('ItemCat')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ol"></i>
                </div>
                <div class="dash_brics_txt">
                    Item Category
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#2bf38d,#798cb9);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('Item')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="dash_brics_txt">
                    Item
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#7362fd,#57595f);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('Ingredient')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-alt"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu Ingredients
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ffed0f,#615f25);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('MCATE')); ?>">
            <div class="dash_brics_block">

                <div class="dash_brics_icon">
                    <i class="fa fa-hospital-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu Category
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ecd2d4,#000000);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('subcategory')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu SubCategory
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#4adeff,#01455a);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('Menu')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="dash_brics_txt">
                    Menus
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ff758c ,#ff7eb3);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('order')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <div class="dash_brics_txt">
                    Order
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ffa8a7,#ff0d15);
"></div>
            </div>
        </a>
    </div>
        <div class="col-md-12 seperate " style="display: none">
            <table width="100%" border="0" align="left">
                <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="19%" align="center"><a href="<?php echo e(url('request_item')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-reply"></i><br>
                            <h4>Requests</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('issue')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-industry"></i><br>
                            <h4>Issue Stock</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('ItemCat')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-reply-all"></i> <br>
                            <h4>Item Category</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('Item')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-info-circle"></i><br>
                            <h4>Item</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('Ingredient')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-align-center"></i><br>
                            <h4>Menu Ingredients</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('MCATE')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-area-chart"></i><br>
                            <h4>Menu Category</h4></a></td>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    
                </tr>
                <tr>

                    <td width="16%" align="center"><a href="<?php echo e(url('subcategory')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-align-right"></i><br>
                            <h4>Menu SubCategory</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('Menu')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-bar-chart"></i><br>
                            <h4>Menus</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('order')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-clock-o"></i><br>
                            <h4>Order</h4></a></td>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                </tbody>
            </table>
        </div>
    <script type="text/javascript">
        var start = new Date;
        start.setSeconds(start.getSeconds());
        $('.time').text('Date & Time: ' + set_format(start));
        setInterval(function () {
            start.setSeconds(start.getSeconds() + 1);
            $('.time').text('Date & Time: ' + set_format(start));
        }, 1000);

        function set_format(d) {
            var dd = appendZ(d.getDate());
            var MM = appendZ(d.getMonth() + 1);
            var yyyy = d.getFullYear();
            var h = appendZ(d.getHours());
            var m = appendZ(d.getMinutes());
            var s = appendZ(d.getSeconds());
            var temp = (h < 12) ? ' AM' : ' PM';

            return dd + '-' + MM + '-' + yyyy + ' ' + hours12(h) + ':' + m + ':' + s + temp;
        }

        function appendZ(d) {
            if (d < 10) {
                d = '0' + d;
            }
            return d;
        }

        function hours12(h) {
            return (h + 24) % 12 || 12;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>