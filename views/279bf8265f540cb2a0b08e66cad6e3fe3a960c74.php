<?php $__env->startSection('title', 'Change Password'); ?>

<?php $__env->startSection('content'); ?>
    <h4>Change Password</h4>
    <hr/>
    <?php if($errors->any()): ?>
        <div role="alert" id="alert" class="alert alert-danger"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <?php echo Form::open(['url' => 'change_password', 'class' => 'form-horizontal', 'id'=>'frm']); ?>

    <div class="form-group">
        <?php echo Form::label('current_password', 'Current Password', ['class' => 'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::password('current_password', ['class' => 'form-control input-sm required', 'placeholder'=>'Current Password']); ?>

        </div>
    </div>
    <div class="form-group">
        <?php echo Form::label('new_password', 'New Password', ['class' => 'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::password('new_password', ['class' => 'form-control input-sm required', 'placeholder'=>'New Password']); ?>

        </div>
    </div>
    <div class="form-group">
        <?php echo Form::label('confirm_password', 'Confirm Password', ['class' => 'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::password('confirm_password', ['class' => 'form-control input-sm required', 'placeholder'=>'Confirm Password']); ?>

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>