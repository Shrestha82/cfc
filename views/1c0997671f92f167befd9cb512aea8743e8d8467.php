<style>
    .right_txt {
        text-align: right;
    }
    .txthide{
        display:none ;
    }
    .txtshow{
        display:block ;
    }
</style>
<table id="" class="table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">
        <th class="text-center">S.No</th>
        
        <th class="text-center">Item Name</th>
        <th class="text-center">Tax %</th>
        <th class="text-center">Qty</th>
        <th class="text-center">Rate</th>
        <th class="text-center">Tax Amt</th>
        <th class="text-center">Amount</th>
    </tr>
    </thead>
    <tbody>
    <?php $counter = 1; $net_amount = 0; ?>
    <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $menu = \App\MenuItemModel::find($item->mid); ?>
        <tr class="text-center">
            <td><?php echo e($counter); ?></td>
            
            <td><?php echo e($item->m_name); ?></td>
            <td> <?php if(isset($item->mid)): ?><?php echo e($menu->tax->type." ".$menu->tax->percent); ?><?php endif; ?></td>
            
            <td><?php echo e($item->qty); ?></td>
            <td><?php echo e($item->price); ?></td>
            <td><?php echo e($item->price*$item->qty*$menu->tax->percent/100); ?></td>
            <td><?php echo e($item->total+$item->price*$item->qty*$menu->tax->percent/100); ?></td>
        </tr>
        <?php $counter++; $net_amount += $item->total + $item->price * $item->qty * $menu->tax->percent / 100; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
    
    <td colspan="4"><br></td>
    <tr>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <td class="text-center">Net Amount</td>
        <td class="text-center"><?php echo e($net_amount); ?></td>
    </tr>

    
    
    
    
    
    
    
    
    
    
    
        
        
        
        
            
                
                
                
                
                
            
        
        
        
        
    
    

    
        
        
        
        
        
            
                
                
                
                
                
                
            

        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    </tbody>
</table>
<script>
    function ChangePaymentMode(dis) {

    }
    function ChangeDiscountType(dis) {
        DiscountForpayable($('#discount_txt'));
    }
    function DiscountForpayable(dis) {
        gAmount = 0;
        var discount = Number($(dis).val().trim());
        var gtotal = Number($('#gtotal').val().trim());
        var distype = $('#distype').val().trim();
        if (discount > 0 ) {
            if ( discount < gtotal) {
                if (distype == 'Flat') {
                    gAmount = (parseFloat(gtotal) - parseFloat(discount)).toFixed(2);
                    //alert(gAmount);
                    $('#PayableAmt').html(parseFloat(gAmount));
                } else {
                    gAmount = (parseFloat(gtotal) - (parseFloat(gtotal) * parseFloat(discount) / 100).toFixed(2));
                    $('#PayableAmt').html(parseFloat(gAmount));
                }
            }else {
                $(dis).val(gtotal);
                $('#PayableAmt').html(parseFloat(0));
            }
        }else if(discount <1) {
            $('#PayableAmt').html(parseFloat(gtotal));
        }else {
            $(dis).val();
        }
    }
    /*$(document).on('change keyup blur', '.changesDis', function () {


     //        id_arr = $(this).attr('id');
     gAmount = 0;
     var distype = $('#distype').val;
     var gtotal = $('#gtotal').val;
     var discount = $(this).val;
     if (distype == 'Flat') {
     gAmount += (parseFloat(gtotal) - parseFloat(discount)).toFixed(2);
     alert(gAmount);
     $('#PayableAmt').html(parseFloat(gAmount));
     } else {
     gAmount += (parseFloat(gtotal) - (parseFloat(gAmount) * parseFloat(discount) / 100).toFixed(2);
     $('#PayableAmt').html(parseFloat(gAmount));
     }
     });*/
</script>
