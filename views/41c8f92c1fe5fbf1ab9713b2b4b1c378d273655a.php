<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>

<?php if(!is_null($user_master)): ?>
    <?php echo Form::open(['url' => 'user_master/'.$user_master->id, 'class' => 'form-horizontal', 'id'=>'user_master', 'method'=>'put', 'files'=>true]); ?>

    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                <?php echo Form::label('user_no', 'User No#', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <p></p>
                    <label for="" class="badge">BJINQ-<?php echo e($user_master->user_no); ?></label>
                </div>
            </div>

            <div class="form-group">
                <?php echo Form::label('role', 'Role *', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::select('role_master_id', $role_masters, $user_master->role_master_id,['class' => 'form-control requiredDD']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('name', 'Name *', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('name', $user_master->name, ['class' => 'form-control input-sm required','placeholder'=>'Name']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('contact', 'Contact *', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('contact', $user_master->contact, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']); ?>

                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-8'>
                    <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

                </div>
            </div>

        </div>
    </div>
    <?php echo Form::close(); ?>

<?php else: ?>
    <h4>UserMaster not found !</h4>
<?php endif; ?>
<script>
    $(function () {
        $('.dtp').datepicker({
            format: "dd-M-yyyy",
            maxViewMode: 2,
            todayBtn: "linked",
            daysOfWeekHighlighted: "0",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>