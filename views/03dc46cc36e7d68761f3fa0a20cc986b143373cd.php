<style>
    /* .card_spinner_btn{
         float: right;
     }
     .plus_cardbtn
     {
         padding: 3px 5px;
     }
     .card_qty_txt
     {
         height: 25px;
         padding: 2px 5px;
     }*/
</style>
<div class="panel panel-default">
    <?php $count = 1; ?>
    <?php $__currentLoopData = $menusubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menusub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="panel-heading">
            <h4 class="panel-title">
                <div class="tootgle_btn dynamic_click" onclick="DynamicClick(this)" ><i class="mdi mdi-plus"></i></div>
                <div class="toggle_item_name"><?php echo e($menusub->CategoryName); ?></div>
            </h4>
        </div>
        <div id="collapse<?php echo e($count); ?>" class="panel-collapse collapse collapse_dynamic" aria-expanded="true">
            <div class="panel-body">
                <div class="list_item_toggle">
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($menu->MCID == $menusub->McatID): ?>
                            <div class="list_item_images">
                                <img src="<?php echo e(url('').'/'.$menu->menu_img); ?>"/> 
                            </div>
                            <div class="list_item_details">
                                <div class="list_item_namewithprise">
                                    <span class="item_name"><?php echo e($menu->M_Name); ?></span> 
                                    <div class="col-sm-3 pull-right">
                                        <div class="input-group number-spinner">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default addToCart"
                                                onclick="minusqty1(this,'<?php echo e($menu->MID); ?>')"
                                                id="<?php echo e($menu->MID); ?>"
                                                data-dir="dwn">
                                          <span
                                                  class="glyphicon glyphicon-minus"></span>
                                        </button> 
                                      </span>
                                            <input type="text" class="form-control text-center"
                                                   value="0"
                                                   id="menu<?php echo e($menu->MID); ?>">
                                            
                                            <span class="input-group-btn">
                                          <button class="btn btn-default addToCart"
                                                  onclick="plusqty1(this,'<?php echo e($menu->MID); ?>')"
                                                  id="<?php echo e($menu->MID); ?>" data-dir="up">
                                            <span
                                                    class="glyphicon glyphicon-plus"></span>
                                          </button> 
                                        </span>
                                        </div>
                                    </div>


                                    <span class="item_prise"><i
                                                class="mdi mdi-currency-inr"></i><?php echo e($menu->Sale_Price); ?></span> 
                                </div>

                                
                                
                                
                                
                                
                                
                                
                                <div class="item_description">  
                                    <?php echo e($menu->Descriptions); ?>

                                </div>
                                <div>
                                    <input type="text" class="form-control" placeholder="Enter Remark" name="rmk " id="rmk<?php echo e($menu->MID); ?>"/>
                                </div>
                                <div class="item_qty">
                                    
                                    
                                    
                                    
                                    

                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </div>
        <?php $count++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<script>
    function plusqty1(dis, rowid) {
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var rmk = $('#rmk' + id).val();
        var editurl = "<?php echo e(url('').'/'); ?>menu/" + id + "/qty/" + 1;
//        alert(rmk);
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
//                data: '{"data":"' + id + '"}',
            data: {data: id, tid: tid, rmk: rmk},
            success: function (data) {
//                    console.log(data);
                $("#cart").html(data);
//                    alert('Item has been added to cart');
            },
            error: function (xhr, status, error) {
                $('#err').html(xhr.responseText);
//                    alert('Error');
            }
        });
    }
    function minusqty1(dis, rowid) {
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var qty = parseFloat(rateid) - (parseFloat(1));
        var rmk = $('#rmk' + id).val();
        var editurl = "<?php echo e(url('').'/'); ?>menuupdate/" + id + "/qty/" + qty;
        if (qty >= 0) {
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
//                data: '{"data":"' + id + '"}',
                data: {data: rowid, tid: tid, rmk: rmk},
                success: function (data) {
                    console.log(data);
                    $("#cart").html(data);
//                    showMenu();
//                    alert('Item has been added to cart');
                },
                error: function (xhr, status, error) {
                    $('#err').html(xhr.responseText);
//                    alert('Error');
                }
            });
        }
        //return false;
        // showMenu();
    }
</script>
