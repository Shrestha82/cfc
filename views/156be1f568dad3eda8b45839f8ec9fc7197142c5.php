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
        <a href="<?php echo e(url('Unit')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon"><i class="fa fa-snowflake-o"></i></div>
                <div class="dash_brics_txt">Units</div>
                <div class="border_gardian" style="background: -webkit-linear-gradient(#fd6562,#324a82);"></div>
            </div>
        </a>
        <a href="<?php echo e(url('Item')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="dash_brics_txt">
                    Item
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#7362fd,#57595f);
"></div>
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
        <a class="dash_brics_block" href="<?php echo e(url('Supplier')); ?>">
            <div class="dash_brics_icon"><i class="fa fa-users"></i>
            </div>
            <div class="dash_brics_txt">
                Supplier
            </div>
            <div class="border_gardian"></div>
        </a>
        <a href="<?php echo e(url('stock')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-info-circle"></i>
                </div>
                <div class="dash_brics_txt">
                   Create Stock
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#00000094,#adadad);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('issue')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
                <div class="dash_brics_txt">
                  Issue Stock
                </div>
                <div class="border_gardian" ></div>
            </div>
        </a>

        <a href="<?php echo e(url('request_item')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <div class="dash_brics_txt">
                    Request Items
                </div>
                <div class="border_gardian" style="background: -webkit-linear-gradient(#6c3483 ,#b87ad2);"></div>
            </div>
        </a>
        <a href="<?php echo e(url('stocklist')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-area-chart"></i>
                </div>
                <div class="dash_brics_txt">
                    Stock Reports
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#1e3c72 ,#2a5298);
"></div>
            </div>
        </a>
    </div>

    <div class="container" style="display: none;">
        
        <div class="pull-right  badge_capacity">Last
            Login: <?php echo e(date_format(date_create($user_master->last_login), "d-M-Y h:i A")); ?></div>
        <p class="clearfix"></p>
        <h2 class="text-center"
            style=" text-shadow: 1px 1px 0px black, 0 0 2px #ccc, 0 0 5px darkblue;
    ">Welcome to Anantara</h2>
        <hr/>
        <div class="col-md-12 seperate ">
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <table width="100%" border="0" align="left">
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="16%" align="center"><a href="<?php echo e(url('Unit')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-address-book"></i><br>
                            <h4>Units</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('ItemCat')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-reply-all"></i> <br>
                            <h4>Item Category</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('Item')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-info-circle"></i><br>
                            <h4>Item</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('Supplier')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-id-card-o"></i><br>
                            <h4>Supplier</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('stock')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-strikethrough"></i><br>
                            <h4>Create Stock</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('issue')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-industry"></i><br>
                            <h4>Issue Stock</h4></a></td>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>


                    <td width="19%" align="center"><a href="<?php echo e(url('request_item')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-reply"></i><br>
                            <h4>Requests</h4></a></td>
                    <td width="16%" align="center"><a href="<?php echo e(url('stocklist')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-stack-overflow"></i><br>
                            <h4>Stock Report</h4></a></td>
                    
                                    
                            
                    
                </tr>
                <tr>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                </tbody>
            </table>


        </div>
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