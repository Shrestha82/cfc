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
    ">Welcome to MN Finance </h2>
        <hr/>
        <div class="col-md-12 seperate ">
            <table width="100%" border="0" align="left">
                <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
                <tr>
                    <td width="19%" align="center"><a href="<?php echo e(url('user_master')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-users"></i><br>
                            <h4>Users</h4></a></td>
                    <td width="19%" align="center"><a href="<?php echo e(url('enquiry')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-address-book"></i><br>
                            <h4>Enquiries</h4></a></td>
                    <td width="19%" align="center"><a href="<?php echo e(url('lead')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-reply-all"></i> <br>
                            <h4>Leads</h4></a></td>
                    <td align="center"><a href="<?php echo e(url('category')); ?>" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-calendar-check-o"></i><br>
                            <h4>Category</h4></a></td>
                    <td width="19%" align="center"><a href="<?php echo e(url('leadbyuser')); ?>" class="a_txt"><i
                    class="fa awesome_style animated-hover faa-tada faa-fast fa-location-arrow"></i><br>
                    <h4>Lead By User</h4></a></td>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
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