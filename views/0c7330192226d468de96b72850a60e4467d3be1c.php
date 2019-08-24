<?php $__env->startSection('title','List of Menu Ingredient'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <a href="<?php echo e(url('Ingredient/create')); ?>" class="btn btn-sm bg-danger btnSet btn-primary add- pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create Menu Ingredient</a>
    <h3 class="heading">List of Ingredient</h3>
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
                    <th>SubCategory</th>
                    <th>Descriptions</th>
                    <th>Act Price</th>
                    <th>Sale price</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($Ingredients)>0): ?>
                    <?php $__currentLoopData = $Ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden"><?php echo e($Ingredient->MID); ?></td>
                            <td id="<?php echo e($Ingredient->MID); ?>">
                                
                                
                                
                                

                                
                                
                                

                                
                                <div class="btn-group action">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Options
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul id="<?php echo e($Ingredient->MID); ?>" class="dropdown-menu">
                                        <li><a href="#" id="<?php echo e($Ingredient->MID); ?>" class="view-list"><i class="fa fa-eye
                                        text-info">&nbsp;</i>View Ingredients</a>
                                        </li>

                                    </ul>
                                </div>
                            <td><?php echo e($Ingredient->M_Name); ?></td>
                            <td><?php echo e($Ingredient->menucategory->CategoryName); ?></td>
                            <td><?php echo e($Ingredient->Descriptions); ?></td>
                            <td><?php echo e($Ingredient->Act_Price); ?></td>
                            <td><?php echo e($Ingredient->Sale_Price); ?></td>
                            <td><?php echo e($Ingredient->totalAmt); ?></td>

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
            $('.modal-title').html('Menu Ingredient List');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/Ingredient/" + id;
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
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('Ingredient')); ?>/' + id +
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
                url: "<?php echo e(url('Ingredient/create')); ?>",
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
            $('.modal-title').html('Edit Menu Ingredient');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/Ingredient/" + id + "/edit";
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