<?php $__env->startSection('title','List of Request Items'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <?php if($_SESSION['user_master']->role_master_id == 4 || $_SESSION['user_master']->role_master_id == 5): ?>
        <a href="<?php echo e(url('request_item/create')); ?>" class="btn btn-sm bg-danger btnSet btn-primary add- pull-right">
            <span class="fa fa-plus"></span>&nbsp;Create Request</a>
    <?php endif; ?>
    <h3 class="heading">List of Request</h3>
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
                    <th>Request Date</th>
                    <th>Request Dept</th>
                    <th>Request By</th>
                    <th>Accept/Reject By</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>View Reason</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($requests)>0): ?>
                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($request->id); ?></td>
                            <td id="<?php echo e($request->id); ?>">
                                
                                
                                
                                

                                
                                
                                

                                
                                <div class="btn-group action">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Options
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul id="<?php echo e($request->id); ?>" class="dropdown-menu">
                                        <li><a href="#" id="<?php echo e($request->id); ?>" class="view-list"><i class="fa fa-eye
                                        text-info">&nbsp;</i>View RequestList</a>
                                        </li>
                                        <?php if($request->status_id == 1 && $_SESSION['user_master']->role_master_id == 3): ?>
                                            <li><a href="#" id="<?php echo e($request->id); ?>" class="accept"><i class="fa fa-check
                                        text-info">&nbsp;</i>Approve Request</a>
                                            </li>
                                            <li><a href="#" id="<?php echo e($request->id); ?>" class="reject"><i class="fa fa-crosshairs
                                        text-info">&nbsp;</i>Reject Request</a>
                                            </li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            <td><?php echo e(date_format(date_create($request->request_date),'d-M-Y h:i A')); ?></td>
                            <td><?php echo e($request->dept->name); ?></td>
                            <td><?php echo e($request->user->name); ?></td>
                            <td><?php if($request->accept_by != null): ?>
                                    <?php echo e($request->userAccept->name); ?>

                                <?php elseif($request->reject_by != null): ?>
                                    <?php echo e($request->user->name); ?>

                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($request->description); ?></td>
                            <td><?php if($request->status_id == 1): ?>
                                    <p class="bg-warning"><?php echo e($request->status->status); ?></p>
                                <?php elseif($request->status_id == 2): ?>
                                    <p class="bg-success"><?php echo e($request->status->status); ?></p>
                                <?php else: ?>
                                    <p class="bg-danger"><?php echo e($request->status->status); ?></p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="#" title="Click to view Reason" class="text-success view-comment"><strong>View
                                    </strong></a>
                                <div id="comment" class="comments hidden"><?php echo $request->reason; ?></div>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <script>
        $(".view-list").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Menu Request List');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/request_item/" + id;
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


        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Inactivation');
            $('#myModal .modal-body').html('<h5>Are you sure want to Inactivate this user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('request_item')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Menu Ingrediect');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('request_item/create')); ?>",
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
        $(".accept").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Approve Request');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/request/" + id + "/accept";
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
        $(".reject").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Reject Request');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/request/" + id + "/reject";
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

        $(".view-comment").click(this, function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Communication Process');
            $('.modal-body').html($(this).parent().find('.comments').html());

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>