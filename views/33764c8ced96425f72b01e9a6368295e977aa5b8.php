<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>

<?php echo Form::open(['url' => 'place/'.$place->id, 'class' => 'form-horizontal', 'id'=>'place', 'method'=>'put', 'files'=>true]); ?>

<div class="container-fluid">
    <div class='form-group'>
        <?php echo Form::label('name', 'Place Name *', ['class' => 'col-sm-2 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::text('place_name', $place->place_name, ['class' => 'form-control input-sm required', 'placeholder'=>'Place Name']); ?>

        </div>
    </div>
    <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-9'>
            <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

        </div>
    </div>

</div>
<?php echo Form::close(); ?>

