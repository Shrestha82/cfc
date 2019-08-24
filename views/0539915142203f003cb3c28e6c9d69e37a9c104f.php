<?php $__env->startSection('title','List of Item Category'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <a href="#" class="btn btn-sm bg-danger btnSet btn-primary add-user pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Item Category</a>
    <h3 class="heading">List of Category</h3>
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
                </tr>
                </thead>
                <tbody>
                <?php if(count($ItemCategory)>0): ?>
                    <?php $__currentLoopData = $ItemCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ItemCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($ItemCategory->ICatId); ?></td>
                            <td id="<?php echo e($ItemCategory->ICatId); ?>">
                                <a href="#" id="<?php echo e($ItemCategory->ICatId); ?>" class="btn btn-sm btn-default edit-unit_"
                                   title="Edit unit">
                                    <span class="fa fa-pencil"></span></a>
                                

                                <button type="button" id="<?php echo e($ItemCategory->ICatId); ?>"
                                        class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                                
                            </td>
                            <td><?php echo e($ItemCategory->Cat_Name); ?></td>

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
            $('#myModal .modal-title').html('Confirm Detletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to Delete this Unit<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('ItemCat')); ?>/' + id +
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
            $('.modal-title').html('Add New Unit');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('ItemCat/create')); ?>",
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
        $(".edit-unit_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Unit');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/ItemCat/" + id + "/edit";
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