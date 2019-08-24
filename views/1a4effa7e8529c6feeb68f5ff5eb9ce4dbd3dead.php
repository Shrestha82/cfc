<?php $__env->startSection('title','Bill List'); ?>

<?php $__env->startSection('content'); ?>
    
    

    <h3 class="heading bg-success">List of Bills</h3>
    <hr/>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>
    <div class="row fa-border">
        <div class="container-fluid">
            <table id="dataTable" class="display compact" cellspacing="0" width="100%">
                <thead>
                <tr class="bg-info">
                    <th class="text-center">Option</th>
                    <th class="text-center">Bill Status</th>
                    <th class="text-center">Bill Date</th>
                    <th class="text-center">Bill No</th>
                    <th class="text-center">Bill Amt</th>
                    <th class="text-center">Stevard</th>
                    <th class="text-center">Table No</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">Chargeable</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($bills)>0): ?>
                    <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($bill->id); ?></td>
                            <td id="<?php echo e($bill->id); ?>">
                                <div class="btn-group action">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Options
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul id="<?php echo e($bill->id); ?>" class="dropdown-menu">
                                        <li><a href="<?php echo e(url('bill').'/'.$bill->id.'/print'); ?>" target="_blank"
                                               class="">
                                                <span class="fa fa-print"></span> Print Bill</a>
                                        </li>
                                        <?php if($bill->is_settle == 1): ?>
                                            <li>
                                                <p class="bg-success">Settled</p>
                                            </li>
                                        <?php else: ?>
                                            <li><a href="<?php echo e(url('settle_bill').'/'.$bill->id); ?>" target="_blank"
                                                   class="">
                                                    <span class="fa fa-wrench"></span> Settle Bill</a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        
                                        
                                        
                                    </ul>
                                </div>
                            </td>
                            <td> <?php if($bill->is_settle == 1): ?>

                                    <p class="bg-success">Settled</p>


                                <?php else: ?>
                                    <a href="<?php echo e(url('settle_bill').'/'.$bill->id); ?>" target="_blank"
                                       class="">
                                        <span class="bg-danger"></span>Unsettle Bill</a>


                                <?php endif; ?>
                                
                                
                                
                            </td>
                            <td><?php echo e(date_format(date_create($bill->bill_date), "d-M-Y h:i A")); ?></td>
                            <td><?php echo e($bill->bill_no); ?></td>
                            <td><?php echo e($bill->total_amt); ?></td>
                            <td><?php echo e($bill->stevard); ?></td>
                            <td><?php echo e($bill->table_no); ?></td>
                            <td><?php echo e($bill->payment_mode == null ? "-":$bill->payment_mode); ?></td>
                            <td><?php echo e($bill->is_free == 0 ? "Payable":"Free"); ?></td>
                            
                            
                            
                            
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <script>
        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Deletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this bill<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('bill')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>