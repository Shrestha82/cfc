<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<?php if($errors->any()): ?>
    <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>
<?php echo Form::open(['url' => 'sentence', 'class' => 'form-horizontal', 'id'=>'sentence']); ?>

<div class="container-fluid">
    <div class="form-group">
        <?php echo Form::label('start_location_id', 'Start Location*', ['class' => 'col-sm-2 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::select('start_location_id', $places, null,['class' => 'form-control requiredDD']); ?>

        </div>
    </div>
    <div class="form-group">
        <?php echo Form::label('end_location_id', 'End Location*', ['class' => 'col-sm-2 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::select('end_location_id', $places, null,['class' => 'form-control requiredDD']); ?>

        </div>
    </div>
    <div class='form-group'>
        <?php echo Form::label('name', 'Sentence*', ['class' => 'col-sm-2 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::textarea('sentence', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Sentence','row'=>'5']); ?>

        </div>
    </div>
    <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-9'>
            <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

        </div>
    </div>
</div>
<?php echo Form::close(); ?>

