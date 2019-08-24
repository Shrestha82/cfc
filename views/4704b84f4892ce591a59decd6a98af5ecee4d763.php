<div>
    <?php if(count($menuings)>0): ?>
        <table id="dtTable" class="table table-bordered table-condensed">
            <thead>
            <tr class="bg-info text-center">
                <th width="5%">S.No</th>
                <th>Item</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Yield Rate</th>
                <th>Rate</th>
                <th>Purchase Amt</th>
                <th>Total Amt</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            <?php $__currentLoopData = $menuings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i); ?></td>
                    
                    <td><?php echo e($menu->itemName->ItemName); ?></td>
                    <td><?php echo e($menu->itemName->menuUnit->UnitName); ?></td>
                    
                    <td><?php echo e($menu->Qty); ?></td>
                    <td><?php echo e($menu->yield_rate); ?></td>
                    <td><?php echo e($menu->rate); ?></td>
                    <td><?php echo e($menu->purchase_amount); ?></td>
                    <td><?php echo e($menu->amount); ?></td>
                </tr>
                <?php $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No Record Available</p>
    <?php endif; ?>
</div>