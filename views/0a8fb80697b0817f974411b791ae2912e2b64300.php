<?php $__env->startSection('title','List of Orders'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <h3 class="heading">List of Orders</h3>
    <hr/>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <div class="row fa-border">
        <div class="container-fluid">
            <table id="dataTable" class="display compact" cellspacing="0" width="100%">
                <thead>
                <tr class="bg-info">
                    <th class="hidden">Id</th>
                    <th class="options">Options</th>
                    <th>Menu Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($orders)>0): ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($order->id); ?></td>
                            <td id="<?php echo e($order->id); ?>">
                                <div class="btn-group action">
                                    <?php if($order->is_ready == 0): ?>
                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">Options
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul id="<?php echo e($order->id); ?>" class="dropdown-menu">
                                            <li><a href="#" id="<?php echo e($order->id); ?>" class="mark-complete"><i class="fa fa-eye
                                        text-info">&nbsp;</i>Mark As Complete</a>
                                            </li>
                                        </ul>
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>

                                </div>

                            </td>
                            <td><?php echo e($order->m_name); ?></td>
                            <td><?php echo e($order->qty); ?></td>
                            <td><?php echo e($order->price); ?></td>
                            <td><?php echo e($order->total); ?></td>
                            <td><?php echo e(date_format(date_create($order->order_date), "d-M-Y h:i A")); ?></td>
                            <td><?php if($order->is_ready == 1): ?> <p class="bg-success">Completed</p>
                                <?php else: ?>
                                    <p class="bg-danger">Pending</p>
                                <?php endif; ?></td>

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
            $('#myModal .modal-title').html('Confirm Inactivation');
            $('#myModal .modal-body').html('<h5>Are you sure want to Inactivate this Menu Item<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('Menu')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });
        $('.mark-complete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Completion');
            $('#myModal .modal-body').html('<h5>Are you sure want to Mark this as complete<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('order')); ?>/' + id +
                '/complete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Menu');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('Menu/create')); ?>",
                success: function (data) {
                    $('.modal-body').html(data);
//            $('#modelBtn').visible(disabled);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });

        });
        $(".edit-user_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Menu');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/Menu/" + id + "/edit";
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