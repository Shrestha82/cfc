<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<?php echo Form::open(['url'=>'_gflwup/'.$lead->id, 'id'=>'frmFollowup']); ?>


<?php echo $__env->make('includes.communication_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="form-group">
        <?php echo Form::label('visited_date', 'NextFollowup Date', ['class' => 'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <input id="next_followup_date" name="next_followup_date" class="form-control dtp2 input-sm required"
                   type="text" placeholder="Select Date"/>
            
            
            
            
        </div>
    </div>
    <p class="clearfix"></p>
    <div class="form-group">
        <?php echo Form::label('reponse', 'Response', ['class' => 'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::text('response', 'Neutral', ['class' => 'form-control textWithSpace', 'placeholder'=>'Response','id'=>'txtResponse']); ?>

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo Form::submit('Send Response', ['class' => 'btn btn-sm btn-primary']); ?>

        </div>
    </div>
</div>
<?php echo Form::close(); ?>


<script>
    $(function () {
        $('.dtp2').datepicker({
            format: "dd-M-yyyy",
//            maxViewMode: 5,
            todayBtn: "linked",
            daysOfWeekHighlighted: "0",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

