<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(url('assets/css/font-awesome-animation.min.css')); ?>" rel="stylesheet"/>
    
    <style type="text/css">
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

        .content {
            background-color: transparent;
        }
        .chart_block
        {
            position: absolute;
            z-index: 11;
            bottom: 45px;
            left: 0px;
            width: 100%;
            padding: 0px 15px;
        }
        .brics_overlay
        {
            position:absolute;
            width: 100%;
            height: 100%;
            top:0px;
            left:0px;
            z-index: 15;

        }
        .overview-chart {
            height: 60px;
            position: relative;
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        .overview-chart canvas {
            width: 100%;
        }
        .main_containner
        {
            background: transparent;
        }
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes  chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
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
            <div class="dash_brics_icon">            <i class="fa fa-cart-plus"></i>
            </div>
            <div class="dash_brics_txt">
                Requests
            </div>
            <div class="border_gardian"></div>
            <div class="brics_overlay"></div>
            
        </a>
        <a href="<?php echo e(url('issue')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon"><i class="fa fa-exclamation-circle"></i></div>
                <div class="dash_brics_txt">Issue Stock</div>
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
                <div class="brics_overlay"></div>
                <div class="chart_block">
                    <div class="overview-chart">
                        <canvas class="widgetChart1"></canvas>
                    </div>
                </div>
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
                <div class="brics_overlay"></div>
                <div class="chart_block">
                    <div class="overview-chart">
                        <canvas class="widgetChart3"></canvas>
                    </div>
                </div>
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
        <a href="<?php echo e(url('Menu')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-pencil-square-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Menus
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ff758c ,#ff7eb3);
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
                    <i class="fa fa-list-ol"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu SubCategory
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#4adeff,#01455a);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('order')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-info"></i>
                </div>
                <div class="dash_brics_txt">
                    Order
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#00000094,#adadad);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('getorder')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-align-center"></i>
                </div>
                <div class="dash_brics_txt">
                    Kot
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ffa8a7,#ff0d15);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('finalbill')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class=" fa fa-file-text"></i>
                </div>
                <div class="dash_brics_txt">
                    Print Bill
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#c5c5c5,#324a82);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('bill_list')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Bill List
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#d800ff,#1f459e);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('table_settle')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-bus"></i>
                </div>
                <div class="dash_brics_txt">
                    Table Settlement
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#535454,#1f6f88);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('shift')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-info"></i>
                </div>
                <div class="dash_brics_txt">
                    Shift Settlement
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ee9ca7 ,#ffdde1);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('http://192.168.1.3:93/dashboard.aspx')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-align-center"></i>
                </div>
                <div class="dash_brics_txt">
                    Reports
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#1e3c72 ,#2a5298);
"></div>
            </div>
        </a>
        <a href="<?php echo e(url('billst')); ?>">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class=" fa fa-calendar-check-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Sattled Bill
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#c79081 ,#dfa579);
"></div>
            </div>
        </a>
    </div>
    <table width="100%" border="0" align="left" style="display: none">
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
            <td width="16%" align="center"><a href="<?php echo e(url('getorder')); ?>" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-clock-o"></i><br>
                    <h4>KOT</h4></a></td>

            
            
            

            <td width="16%" align="center"><a href="<?php echo e(url('finalbill')); ?>" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-building-o"></i><br>
                    <h4>Print Bill</h4></a></td>
            <td width="16%" align="center"><a href="<?php echo e(url('bill_list')); ?>" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-building-o"></i><br>
                    <h4>Bill List</h4></a></td>


            
            
            
            
            
            
            
            
            
            
            
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="16%" align="center"><a href="<?php echo e(url('table_settle')); ?>" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-table"></i><br>
                    <h4>Table Settlement</h4></a></td>
            <td width="16%" align="center"><a href="<?php echo e(url('shift')); ?>" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-shirtsinbulk"></i><br>
                    <h4>Shift Settlement</h4></a></td>

            <td width="16%" align="center"><a target="_blank" href="<?php echo e(url('http://192.168.1.3:93/dashboard.aspx')); ?>"
                                              class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-registered"></i><br>
                    <h4>Reports</h4></a></td>
            <td width="16%" align="center"><a href="<?php echo e(url('billst')); ?>" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-edit"></i><br>
                    <h4>Sattled Bill</h4></a></td>
            
            
            
            
            
            
            
            
            
            
            
            
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </tbody>
    </table>
    <div class="col-md-12 seperate ">
        
        
        
        
        
        
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