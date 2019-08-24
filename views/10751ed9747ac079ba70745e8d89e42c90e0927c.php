<?php $__env->startSection('title','List of Vehicle'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <a href="#" class="btn btn-sm bg-danger btnSet btn-primary add-vehicle btnSet pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Vehicle</a>
    <h3 class="heading bg-success">List of Vehicle</h3>
    <hr/>
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
                    <th>Vehicle Name</th>
                    <th>Seat</th>
                    <th>Rate/KM</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php if(count($vehicles)>0): ?>
                    <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($vehicle->id); ?></td>
                            <td id="<?php echo e($vehicle->id); ?>">
                                <a href="#" id="<?php echo e($vehicle->id); ?>" class="btn btn-sm btn-default edit-vehicle_"
                                   title="Edit User">
                                    <span class="fa fa-pencil"></span></a>
                                <button type="button" id="<?php echo e($vehicle->id); ?>"
                                        class="btn btn-sm btn-danger btnDelete" title="Delete"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </td>
                            <td><?php echo e($vehicle->vehicle_name); ?></td>
                            <td><?php echo e($vehicle->seat); ?></td>
                            <td><?php echo e($vehicle->rate); ?></td>
                            
                            
                            
                            
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <script>
        $('.btnBook').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Booking');
            $('#myModal .modal-body').html('<h5>Are you sure want to book this vehicle<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('vehicle')); ?>/' + id +
                '/booked"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnAvailable').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Make It Available');
            $('#myModal .modal-body').html('<h5>Are you sure want to make this available<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="<?php echo e(url('vehicle')); ?>/' + id +
                '/available"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Deletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this vehicle<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('vehicle')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });
        $(".add-vehicle").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Vehicle');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('vehicle/create')); ?>",
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
        $(".edit-vehicle_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Vehicle');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/vehicle/" + id + "/edit";
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