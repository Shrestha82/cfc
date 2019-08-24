<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<?php if($errors->any()): ?>
    <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>
<?php echo Form::open(['url' => 'user_master', 'class' => 'form-horizontal', 'id'=>'user_master']); ?>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-6">
            <h3 class="bg-danger text-center">Basic Info</h3>

            <div class='form-group'>
                <?php echo Form::label('user_no', 'User No#', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <p></p>
                    <label for="" class="badge">AURA-00<?php echo e($user_no); ?></label>
                    <input type="hidden" class="form-control" name="full_user_no" value="AURA-00<?php echo e($user_no); ?>"
                           id="user_no">
                    <input class="form-control" name="user_no" type="hidden" value="<?php echo e($user_no); ?>">
                </div>
            </div>

            <div class='form-group'>
                <?php echo Form::label('name', 'Name *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Name']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('contact', 'Contact *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('contact', null, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']); ?>

                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <h3 class="bg-danger text-center">Login Info</h3>
            <p class="clearfix"></p>
            <div class="form-group">
                <?php echo Form::label('role', 'Role *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::select('role_master_id', $role_masters, null,['class' => 'form-control requiredDD']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('username', 'Username *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('username', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Username']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('password', 'Password *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('password', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Password']); ?>

                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-4 col-sm-8'>
                    <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

