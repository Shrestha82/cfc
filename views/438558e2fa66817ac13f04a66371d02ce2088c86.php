<?php $__env->startSection('title', 'CFC:Home'); ?>

<?php $__env->startSection('head'); ?>
    <style type="text/css">
        .collapse_dynamic {
            transition: .5s all;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="com-block block_header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-7">
                            <h2 class="h2_header"><img src="<?php echo e(url('assets_w/images/table_icon.png')); ?>" class="Table_Image">
                                Booking For Table <b><?php echo e($tbl->TblNo); ?></b>
                                <button type="button" id="<?php echo e($tbl->Tid); ?>"
                                        class="btn btn-sm btn-success btnView" title="View Items"><span
                                            class="fa fa-eye" aria-hidden="true"></span> View Booked Items
                                </button>
                                <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-primary btn-sm">Home</a>
                            </h2>

                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="main_filter_search form-control" id="Search"
                                   placeholder="Search Item"/>
                            <input type="hidden" value="<?php echo e($tbl->Tid); ?>" class="tableid">
                        </div>
                        <div class="col-sm-2">
                            <div id="cart" class="card_block">
                                <p id="err"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu dynamic_tabs">
                <div class="list-group">
                    
                    
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a id="<?php echo e($category->McatID); ?>" href="#" class="list-group-item text-center dynamic_tabs_name">
                            <h4 class="mdi mdi-food dynamic_tabs_icon"></h4><?php echo e($category->CategoryName); ?></a>
                        
                        
                        
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($errors->any()): ?>
                    <div role='alert' id='alert' class='alert alert-danger text-center'><?php echo e($errors->first()); ?></div>
                <?php endif; ?>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bhoechie-tab-content active" id="data<?php echo e($category->McatID); ?>">
                        <div class="bs-example">
                            <div class="panel-group" id="accordion<?php echo e($category->McatID); ?>">


                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('#Search').keyup(function(){

                // Search text
                var text = $(this).val();

                // Hide all content class element
                $('.bhoechie-tab').hide();

                // Search and show
//                $('.search_item:contains("'+text+'")').show();
                $('.bhoechie-tab .bhoechie-tab-content .bs-example .panel-group .search_item .panel-heading .panel-title .toggle_item_name:contains("'+text+'")').closest('.bhoechie-tab').show();
//                $('.search_item:contains("'+text+'")').closest('.search_item').show();

            });
        });
//        function getBuyItem() {
//            var input = document.getElementById("Search");
//            var filter = input.value.toLowerCase();
//            var nodes = document.getElementsByClassName('list_item_toggle');
//            for (i = 0; i < nodes.length; i++) {
//                if (nodes[i].innerText.toLowerCase().includes(filter)) {
//                    nodes[i].style.display = "block";
//                } else {
//                    nodes[i].style.display = "none";
//                }
//            }
//        }
        $(".btnView").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Ordered Item List');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/userorder/" + id + "/item";
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        });


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
            var id = $('.tableid').val();
            var loadurl = "<?php echo e(url('').'/'); ?>booked_item";
//            alert(editurl);
//            alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: loadurl,
//                data: '{"data":"' + id + '"}',
                data: {tid: id},
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
                // debugger;
//                alert();
                $(this).parent().parent().next().addClass('in');
            });
        });
        function DynamicClick(dis) {
            //debugger;
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
        
            
            
            
            
            
                
                
                
                
                

                    

                
                
                    

                
            

        

        $(document).click(function (e) {
//            e.stopPropagation();
            $('.menu_basic_popup').addClass('noscale');
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master.waiter_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>