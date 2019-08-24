<?php $__env->startSection('title','List of Inclusions'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <a href="#" class="btn btn-sm bg-danger btnSet btn-primary add-inclusion btnSet pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Inclusion</a>
    <h3 class="heading bg-success">List of Inclusion</h3>
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
                    <th>Place</th>
                    <th>Name</th>
                    <th>Rate</th>
                    <th>Descripiton</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php if(count($inclusions)>0): ?>
                    <?php $__currentLoopData = $inclusions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($inclusion->id); ?></td>
                            <td id="<?php echo e($inclusion->id); ?>">
                                <a href="#" id="<?php echo e($inclusion->id); ?>" class="btn btn-sm btn-default edit-inclusion_"
                                   title="Edit User">
                                    <span class="fa fa-pencil"></span></a>
                                <button type="button" id="<?php echo e($inclusion->id); ?>"
                                        class="btn btn-sm btn-danger btnDelete" title="Delete"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </td>
                            <td><?php echo e($inclusion->place_master->place_name); ?></td>
                            <td><?php echo e($inclusion->name); ?></td>
                            <td><?php echo e($inclusion->rate); ?></td>
                            <td><?php echo e($inclusion->description); ?></td>
                            
                            
                            
                            
                            
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
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this inclusion<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('inclusion')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });
        $(".add-inclusion").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Inclusion');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('inclusion/create')); ?>",
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
        $(".edit-inclusion_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Inclusion');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/inclusion/" + id + "/edit";
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