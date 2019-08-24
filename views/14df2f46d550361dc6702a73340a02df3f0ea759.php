<div class="container-fluid">
    <div class="col-sm-6">
        <h3 class="bg-info text-center">Basic Info</h3>
        <p class="clearfix"></p>
        <div class='form-group'>
            <?php echo Form::label('user_no', 'Enquiry No#', ['class' => 'col-sm-5 control-label']); ?>

            <div class='col-sm-7'>
                <label for="" class="badge"><?php echo e($enquiry->full_enquiry_no); ?></label>
            </div>
        </div>
        <p class="clearfix"></p>
        <p class="clearfix"></p>
        <div class='form-group'>
            <?php echo Form::label('user_no', 'Enquiry Category', ['class' => 'col-sm-5 control-label']); ?>

            <div class='col-sm-7'>
                <label for=""><?php if($enquiry->enquiry_category_id != null): ?><?php echo e($enquiry->enquiry_category->category_name); ?><?php else: ?>
                        - <?php endif; ?></label>
            </div>
        </div>
        <p class="clearfix"></p>
        <div class="form-group">
            <?php echo Form::label('name', 'Name', ['class' => 'col-sm-5 control-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e($enquiry->name); ?></label>
            </div>
        </div>
        <p class="clearfix"></p>

        <div class="form-group">
            <?php echo Form::label('name', 'Contact', ['class'=>'col-sm-5 form-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e($enquiry->contact); ?></label>

            </div>
        </div>
        <p class="clearfix"></p>

        <div class="form-group">
            <?php echo Form::label('name', 'Email', ['class' => 'col-sm-5 control-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e($enquiry->email); ?></label>

            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <h3 class="bg-info text-center">Other Info</h3>
        <p class="clearfix"></p>

        <div class="form-group">
            <?php echo Form::label('Enquiry_date', 'Enquiry date', ['class' => 'col-sm-5 control-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e(date_format(date_create( $enquiry->enquiry_date),'d-M-Y')); ?></label>

            </div>
        </div>
        

        
        
        
        
        

        
        
        <p class="clearfix"></p>

        <div class="form-group">
            <?php echo Form::label('BankName', 'BankName', ['class' => 'col-sm-5 control-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e($enquiry->bank); ?></label>
            </div>
        </div>
        <p class="clearfix"></p>
        <div class="form-group">
            <?php echo Form::label('current_location', 'Current Location', ['class' => 'col-sm-5 control-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e($enquiry->current_location); ?></label>
            </div>
        </div>
        <p class="clearfix"></p>
        <div class="form-group">
            <?php echo Form::label('any_requirement', 'Remark', ['class' => 'col-sm-5 control-label']); ?>

            <div class="col-sm-7">
                
                <label for=""><?php echo e($enquiry->any_requirement); ?></label>
            </div>
        </div>

    </div>
</div>