<table id="dataTable" class="display compact" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">
        <th class="hidden">Id</th>
        <th>Menu Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        
    </tr>
    </thead>
    <tbody>
    <?php $total = 0; ?>
    <?php if(count($orders)>0): ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="hidden"><?php echo e($order->id); ?></td>
                <td><?php echo e($order->m_name); ?></td>
                <td><?php echo e($order->qty); ?></td>
                <td><?php echo e($order->price); ?></td>
                <td><?php echo e($order->total); ?></td>
                
            </tr>
            <?php $total += $order->total; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td>
            <td></td>
            <td>Grand Total</td>
            <td>
                <?php echo e($total); ?>

            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        var table = $('#dataTable').DataTable({
            "columnDefs": [
                {"width": "20px", "targets": 0}
            ]
        });

        $('.datatable-col').on('keyup change', function () {
            table.column($(this).attr('id')).search($(this).val()).draw();
        });
    });
</script>