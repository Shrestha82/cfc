<table id="dataTable" class="display compact" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">
        <th>Id</th>
        <th>Bill No</th>
        <th>Date</th>
        <th>Bill Amount</th>
        <th>Dis.Type</th>
        <th>Dis Amt</th>
        <th>Dis. Reason</th>
        <th>Payment Mode</th>
        <th>Cash</th>
        <th>Card</th>
        
    </tr>
    </thead>
    <tbody>
    <?php $total = 0; ?>
    <?php if(count($orders)>0): ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(url('settle_bill').'/'.$order->id); ?>" target="_blank"
                       class="">
                        <span class="fa fa-wrench"></span> Settle Bill</a></td>
                <td><?php echo e($order->bill_no); ?></td>
                <td><?php echo e($order->bill_date); ?></td>
                <td><?php echo e($order->payable_amt); ?></td>
                <td><?php echo e($order->discount_type); ?></td>
                <td><?php echo e($order->discount_amt); ?></td>
                <td><?php echo e($order->discount_reason); ?></td>
                <td><?php echo e($order->payment_mode); ?></td>
                <td><?php echo e($order->cash_amount); ?></td>
                <td><?php echo e($order->card_amt); ?></td>
                
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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