<?php $__env->startSection('title','Stock Report'); ?>

<?php $__env->startSection('content'); ?>
    
    
    <h3 class="heading">Sale Report</h3>
    <hr/>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <div class="container-fluid">
        <?php echo Form::open(['url' => 'all_report', 'class' => 'form-horizontal', 'id'=>'user_master']); ?>

        <div class="col-sm-6">
            <div class='form-group'>
                <?php echo Form::label('contact', 'Start Date *', ['class' => 'col-sm-3 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('start_date', null, ['class' => 'form-control start input-sm dtp required', 'placeholder'=>'Start Date']); ?>

                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class='form-group'>
                <?php echo Form::label('contact', 'End Date *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('end_date', null, ['class' => 'form-control end input-sm dtp required', 'placeholder'=>'End Date']); ?>

                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-4 col-sm-8'>
                    <?php echo Form::button('Search', ['class' => 'btn btn-sm btn-primary btnnew']); ?>

                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <div class="row fa-border">
        <div class="container-fluid" id="sale">

        </div>
    </div>
    <br/>
    <script>
        $(".btn-primary").click(function () {
            var start = $('.start').val();
            var end = $('.end').val();
            if (start.trim() == '') {
                alert('Please select start date');
                return false;
            } else if (end.trim() == '') {
                alert('Please select start date');
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    url: '<?php echo e(url('/')); ?>' + "/search_sale",
                    data: '{"start":"' + start + '", "end":"' + end + '"}',
                    success: function (data) {
                        console.log(data);
                        $("#sale").html(data);
                    },
                    error: function (xhr, status, error) {
                        //alert('Error occurred');
                        $("#sale").html(xhr.responseText);
                    }
                });
            }

        });


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>