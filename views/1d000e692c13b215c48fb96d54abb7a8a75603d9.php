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
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        
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
    </div>
    <script>
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