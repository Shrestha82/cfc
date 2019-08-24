<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>

<?php if(!is_null($Item)): ?>
    <?php echo Form::open(['url' => 'Item/'.$Item->ItemID, 'class' => 'form-horizontal', 'id'=>'itemedit', 'method'=>'put', 'files'=>true]); ?>

    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo Form::label('role', 'Category *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::select('ddlcat', $Icate, $Item->IcatID,['class' => 'form-control requiredDD']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('name', $Item->ItemName, ['class' => 'form-control input-sm required','placeholder'=>'Name']); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo Form::label('role', 'Unit *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::select('ddlunit', $unt, $Item->UnitID,['class' => 'form-control requiredDD']); ?>

                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class='form-group'>
                    <?php echo Form::label('contact', 'ItemCode *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('itemcode', $Item->ItemCode, ['class' => 'form-control input-sm', 'placeholder'=>'Item Code']); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo Form::label('ap', 'Description *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('description', $Item->Descriptions, ['class' => 'form-control input-sm ', 'placeholder'=>'Description']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('sp', 'R.O.L.', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('rol', $Item->Rol, ['class' => 'form-control input-sm', 'placeholder'=>'ROL']); ?>

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