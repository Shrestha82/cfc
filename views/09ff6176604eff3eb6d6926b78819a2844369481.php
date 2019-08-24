<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<?php echo Form::open(['url'=>'lead/'.$lead->id.'/addComments', 'id'=>'frmLead']); ?>

<div class="container-fluid nopadding seperate">
    
    <div class="col-md-12 nopadding commentbox">
        <div class="col-md-6">
            <h4><strong>Communication History</strong></h4>

            <div class="container-fluid nopadding">
                <div class="col-md-6 scrollbox">
                    <?php echo $lead->communication; ?>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 ">
                <div class="col-md-12">
                    <label><h4><strong>Add Communication</strong></h4></label>
                    <?php echo Form::textarea('communication', null, ['class' => 'form-control required', 'placeholder'=>'Communication', 'rows'=>'5']); ?>

                    
                </div>
                <div class="col-md-12 seperate">
                    <?php echo e(Form::submit('Submit',['class' => 'btn btn-primary'])); ?>

                </div>
            </div>
        </div>
        
    </div>
</div>

<?php echo Form::close(); ?>

<script>
    $(".view-comment").click(this, function () {
        $('#myModal').modal('show');
        $('.modal-title').html('Communication Process');
        $('.modal-body').html($(this).parent().find('.comments').html());

    });
</script>