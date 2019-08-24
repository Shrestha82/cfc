<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>

<?php echo Form::open(['url' => 'category/'.$category->id, 'class' => 'form-horizontal', 'id'=>'category', 'method'=>'put', 'files'=>true]); ?>

<div class="container-fluid">
    <div class='form-group'>
        <?php echo Form::label('name', 'Category Name *', ['class' => 'col-sm-2 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::text('category_name', $category->category_name, ['class' => 'form-control input-sm required', 'placeholder'=>'Enquiry Category Name']); ?>

        </div>
    </div>
    <div class='form-group'>
        <?php echo Form::label('percent', 'Percent *', ['class' => 'col-sm-2 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::text('percent', $category->percent, ['class' => 'form-control input-sm amount required', 'placeholder'=>'Percent']); ?>

        </div>
    </div>
    <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-9'>
            <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

        </div>
    </div>

</div>
<?php echo Form::close(); ?>

