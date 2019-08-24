<?php $__env->startSection('title','List of Registrations'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <a href="<?php echo e(url('registration/create')); ?>" class="btn btn-sm bg-danger btnSet btn-primary  pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New</a>
    <h3 class="heading">List of Registrations</h3>
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
                    
                    <th>REG#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Paid Amount</th>
                    
                    <th>Type</th>
                    <th>Registration Date</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($registrations)>0): ?>
                    <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($registration->Regid); ?></td>
                            
                                
                                   
                                    
                                
                                   
                                   
                                   
                                    
                              
                                
                                        
                                            
                             
                            
                            <td><?php echo e($registration->reg_full); ?></td>
                            <td><?php echo e($registration->Name); ?></td>
                            <td><?php echo e($registration->Contact_No); ?></td>
                            <td><?php echo e($registration->total_amount); ?></td>
                            
                            <td><?php if($registration->type == "Stag"): ?> <p class="bg-success">Stag</p>
                                <?php else: ?>
                                    <p class="bg-danger">Couple</p>
                                <?php endif; ?>
                            </td>
                            <td> <?php echo e(date_format(date_create($registration->InsertDate), "d-M-Y h:i A")); ?></td>
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
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this registration<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('registration')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnScan').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Scanning');
            $('#myModal .modal-body').html('<h5>Are you sure want to scan this register user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="<?php echo e(url('registration')); ?>/' + id +
                '/scan"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Create Registration');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('registration/create')); ?>",
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
            $('.modal-title').html('Edit Registration');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/registration/" + id + "/edit";
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
            var editurl = '<?php echo e(url('/')); ?>' + "/registration/" + id + "/resetPassword";
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
                ],
                "order": [[0, "desc"]]
            });

            $('.datatable-col').on('keyup change', function () {
                table.column($(this).attr('id')).search($(this).val()).draw();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>