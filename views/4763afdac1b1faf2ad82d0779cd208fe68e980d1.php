<?php $__env->startSection('title', 'Anantara:Home'); ?>

<?php $__env->startSection('head'); ?>
    <style type="text/css">
        .collapse_dynamic {
            transition: .5s all;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="content_block form-group">
        <div class="com-block block_header">
            <div class="row">
                <div class="col-sm-12">
                    
                    <h2 class="h2_header"><img src="<?php echo e(url('assets_w/images/table_icon.png')); ?>" class="Table_Image">
                        Select Table For Booking
                    </h2>
                    <div class="card_block">
                        <a class="a_txt" title="Logout" href="<?php echo e(url('wlogout')); ?>"><i class="fa fa-power-off"></i>
                            Logout</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="com-block content-body waiter_list">
            <div class="col-sm-12">
                <?php $__currentLoopData = $tbls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-2 col-xs-4">
                        <div class="divblk"><a href="<?php echo e(url('table').'/'.$tbl->Tid.'/'.$tbl->TblNo); ?>"
                                               class="a_txt"><i
                                        class="fa awesome_style animated-hover faa- faa-fast">
                                    <img src="<?php echo e(url('assets_w/images/table_icon.png')); ?>" alt=""></i>

                                <?php if($tbl->is_booked == 1): ?>
                                    <h4 style="color: red"><?php echo e($tbl->TblNo); ?></h4>
                                <?php else: ?>
                                    <h4><?php echo e($tbl->TblNo); ?></h4>
                                <?php endif; ?>
                            </a></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    

    <script>

        $(document).ready(function () {
            $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
            /********* load Cart product********/
            var id = 1;
            var loadurl = "<?php echo e(url('').'/'); ?>booked_item";
//            alert(editurl);

            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: loadurl,
//                data: '{"data":"' + id + '"}',
                data: {data: id},
                success: function (data) {
                    $("#cart").html(data);
                },
                error: function (xhr, status, error) {
                    $('#err').html(xhr.responseText);
                }
            });
            /********* load Cart product********/
            /*********First Time load all product********/
            $('#accordion').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            var btnId = 0;
            var send_to_url = '<?php echo e(url('/')); ?>' + "/menu/" + btnId + "/filter";
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,

                success: function (data) {
                    $("#accordion" + btnId).html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#accordion" + btnId).html(xhr.responseText);
                }
            });
            /*********First Time load all product********/
        });
        //DynamicClick();
        $('.dynamic_tabs_name').click(function () {
            var btnId = this.id;
            $('#accordion' + btnId).html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
//            alert(btnId);

            var send_to_url = '<?php echo e(url('/')); ?>' + "/menu/" + btnId + "/filter";
//            alert(send_to_url);
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,
                success: function (data) {
                    $("#accordion" + btnId).html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#accordion" + btnId).html(xhr.responseText);
                }
            });
            $('.dynamic_click').click(function () {
                debugger;
                alert();
                $(this).parent().parent().next().addClass('in');
            });
        });
        function DynamicClick(dis) {
            debugger;
            var chk_collapse = $(dis).parent().parent().next().attr('class');
            $('.collapse_dynamic').removeClass('in');
            $('.dynamic_click i').addClass('mdi-plus');
            $('.dynamic_click i').removeClass('mdi-minus');
            if (chk_collapse == "panel-collapse collapse collapse_dynamic") {
                $(dis).find('.mdi').removeClass('mdi-plus');
                $(dis).find('.mdi').addClass('mdi-minus');
                $(dis).parent().parent().next().addClass('in');
            }
        }
        


                    
            
            
            


            
                
                
                

                
                

                    

                
                
                    

                    
                
            
            
             
             
             
        

        $(document).click(function () {
           // $('.menu_basic_popup').addClass('noscale');
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master.waiter_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>