<?php $__env->startSection('title','List of Users'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <a href="#" class="btn btn-sm bg-danger btnSet btn-primary add-user pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New User</a>
    <h3 class="heading">List of Users</h3>
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
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Username</th>
                    <th>Role Master</th>
                    <th>Status</th>
                    <th>Last Login</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($user_masters)>0): ?>
                    <?php $__currentLoopData = $user_masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($user_master->id); ?></td>
                            <td id="<?php echo e($user_master->id); ?>">
                                <a href="#" id="<?php echo e($user_master->id); ?>" class="btn btn-sm btn-default edit-user_"
                                   title="Edit User">
                                    <span class="fa fa-pencil"></span></a>
                                
                                <?php if($user_master->is_active == 1): ?>
                                    <button type="button" id="<?php echo e($user_master->id); ?>"
                                            class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span
                                                class="fa fa-trash-o" aria-hidden="true"></span></button>
                                <?php else: ?>
                                    <button type="button" id="<?php echo e($user_master->id); ?>"
                                            class="btn btn-sm btn-success btnActive" title="Activate"><span
                                                class="fa fa-align-center" aria-hidden="true"></span></button>
                                <?php endif; ?>
                                <a href="#" id="<?php echo e($user_master->id); ?>" class="btn btn-sm btn-info reset-pass"
                                   title="Reset Password">
                                    <span class="fa fa-repeat"></span></a>
                                
                            </td>
                            <td><?php echo e($user_master->name); ?></td>
                            <td><?php echo e($user_master->contact); ?></td>
                            <td><?php echo e($user_master->username); ?></td>
                            <td><?php echo e($user_master->role_master->role); ?></td>
                            <td><?php if($user_master->is_active == 1): ?> <p class="bg-success">Active</p>
                                <?php else: ?>
                                    <p class="bg-danger">Inactive</p>
                                <?php endif; ?>
                            </td>
                            <td> <?php echo e(date_format(date_create($user_master->last_login), "d-M-Y h:i A")); ?></td>
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
            $('#myModal .modal-body').html('<h5>Are you sure want to Inactivate this user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('user_master')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnActive').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Activation');
            $('#myModal .modal-body').html('<h5>Are you sure want to activate this user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="<?php echo e(url('user_master')); ?>/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New User');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('user_master/create')); ?>",
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
            $('.modal-title').html('Edit User');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/user_master/" + id + "/edit";
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

        $(".reset-pass").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Reset Password');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/user_master/" + id + "/resetPassword";
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
//            var i = 0;
//            $('#dataTable thead th').each(function () {
//                var style = 'input-sm';
//                if (i < 2)
//                    style += " hidden";
//                else
//                    style += " datatable-col";
//                var title = $(this).text();
//                $('#table_filter').append('<input id="' + i + '" type="text" class="' + style + '" placeholder="' + title + '" />');
//                i++;
//            });

// DataTable
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