<?php $__env->startSection('title','List of Branches'); ?>

<?php $__env->startSection('content'); ?>
    <a href="#" type="button"
       class="btn btn-primary pull-right add-enq bg-danger btnSet">
        <span class="glyphicon glyphicon-plus"></span>&nbsp;Create New Branch</a>
    <h3 class="heading bg-danger">List of Branches</h3>
    <p class="clearfix"></p>

    <table id="dataTable" class="display compact" cellspacing="0" width="100%">
        <thead>
        <tr class="bg-info">
            <th>Sr.No</th>
            <th>Admin Name</th>
            <th>Branch Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter = 1; ?>
        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($counter); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td><a target="_blank" href="<?php echo e(url('Branch_dashboard').'/'.$item->id); ?>"><?php echo e($item->branch_master->branch_name); ?></a>
                </td>
                <td><?php echo e($item->branch_master->address); ?></td>
                <td><?php echo e($item->branch_master->city); ?></td>
                <td><?php echo e($item->branch_master->state); ?></td>
                <td id="<?php echo e($item->branch_id); ?>">
                    <a href="#" class="btn btn-sm btn-success btn-xs edit-branch_" title="Edit Branch">
                        <span class="glyphicon glyphicon-pencil"></span></a>
                    
                        
                </td>
            </tr>
            <?php $counter++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    <script>

        $(".add-enq").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Create New Branch');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('branches/create')); ?>",
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

        $('.glyphicon-trash').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            $('#myModal .modal-title').html('Confirm Deletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this enquiry<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="<?php echo e(url('enquiry')); ?>/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".edit-branch_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit branch');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).parent().attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/branches/" + id + "/edit";
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
        $(".view-enquiry_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('View Enquiry Details');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).parent().attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/enquiry/" + id;
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
        $(".edit-to_lead").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Covert To Lead');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            var id = $(this).parent().attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/_enqToLead/" + id;
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