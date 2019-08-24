<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<?php if($errors->any()): ?>
    <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>
<?php echo Form::open(['url' => 'subcategory', 'class' => 'form-horizontal', 'id'=>'Mcategory']); ?>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="form-group">
                <?php echo Form::label('role', 'Category*', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::select('ddlcat', $cate, null,['class' => 'form-control requiredDD']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('name', 'SubCategory *', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'SubCategory']); ?>

                </div>
            </div>
            <div class='form-group'>
                <?php echo Form::label('name', 'Discription', ['class' => 'col-sm-2 control-label']); ?>

                <div class='col-sm-8'>
                    <?php echo Form::text('Discription', null, ['class' => 'form-control input-sm', 'placeholder'=>'Discription']); ?>

                </div>
            </div>

            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-8'>
                    <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

                </div>
            </div>
        </div>

    </div>
</div>
<?php echo Form::close(); ?>

