<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<?php if($errors->any()): ?>
    <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>
<?php echo Form::open(['url' => 'Item', 'class' => 'form-horizontal', 'id'=>'items']); ?>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-6">

            <div class="form-group">
                <?php echo Form::label('role', 'Category *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::select('ddlcat', $Icate, null,['class' => 'form-control requiredDD']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Menu Name']); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo Form::label('role', 'Unit *', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::select('ddlunit', $unt, null,['class' => 'form-control requiredDD']); ?>

                </div>
            </div>


        </div>
        <div class="col-sm-6">
            <div class='form-group'>
                <?php echo Form::label('name', 'Item Code', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('itemcode', null, ['class' => 'form-control input-sm  ', 'placeholder'=>'Item Code']); ?>

                </div>
            </div>

            <div class='form-group'>
                <?php echo Form::label('at', 'Description', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('description', null, ['class' => 'form-control input-sm', 'placeholder'=>'Description']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('sp', 'R.O.L', ['class' => 'col-sm-4 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('rol', null, ['class' => 'form-control input-sm ', 'placeholder'=>'Reorder Level']); ?>

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

