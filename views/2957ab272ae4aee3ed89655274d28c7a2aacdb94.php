<?php $__env->startSection('title','List of Enquiries'); ?>

<?php $__env->startSection('content'); ?>
    <?php if($_SESSION['user_master']->role_master_id == 4): ?>
        <a href="#" type="button"
           class="btn btn-primary pull-right upload-execl bg-danger btnSet">
            <span class="glyphicon glyphicon-plus"></span>Upload Excel</a>
    <?php endif; ?>

    <a href="#" type="button"
       class="btn btn-primary pull-right add-enq bg-danger btnSet">
        <span class="glyphicon glyphicon-plus"></span>&nbsp;Create New Enquiry</a>
    <h3 class="heading bg-danger">List of Enquires</h3>
    <p class="clearfix"></p>

    <table id="dataTable" class="display compact" cellspacing="0" width="100%">
        <thead>
        <tr class="bg-info">
            <th>Enquiry No.</th>
            <th>Category</th>
            <th>Enquiry Date</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            
            <th>Proceed To Lead</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $enquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->full_enquiry_no); ?></td>
                <td><?php if($item->enquiry_category_id != null): ?><?php echo e($item->enquiry_category->category_name); ?><?php else: ?>
                        - <?php endif; ?></td>
                <td><?php echo e(date_format(date_create($item->enquiry_date), 'd-M-Y')); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td><?php echo e($item->contact); ?></td>
                <td><?php echo e($item->email); ?></td>
                
                
                <td><?php echo e(($item->is_proceed_to_lead === 1)? "Yes" : "No"); ?></td>
                <td id="<?php echo e($item->id); ?>">
                    
                    
                    <a href="#" class="btn btn-sm btn-success btn-xs edit-enquiry_" title="Edit Enquiry">
                        <span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="#" class="btn btn-sm btn-info btn-xs view-enquiry_" title="View Enquiry">
                        <span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="#" class="btn btn-sm btn-primary btn-xs edit-to_lead">
                        <span class="glyphicon glyphicon-share-alt" title="Convert To Lead"></span> Convert To
                        Lead</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    <script>

        $(".add-enq").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Create New Enquiry');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('enquiry/create')); ?>",
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

        $(".upload-execl").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Upload New Execl');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('getExcel')); ?>",
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

        $(".edit-enquiry_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Enquiry');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');

            var id = $(this).parent().attr('id');
            var editurl = '<?php echo e(url('/')); ?>' + "/enquiry/" + id + "/edit";
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