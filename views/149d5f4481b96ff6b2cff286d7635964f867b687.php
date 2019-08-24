




<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>












<?php echo Form::open(['url'=>'lead', 'id'=>'frmLead']); ?>

<div class="container-fluid">
    <div class="form-group">
        <?php echo Form::label('role', 'Select Executive *', ['class' => 'col-sm-3 control-label']); ?>

        <div class='col-sm-9'>
            <?php echo Form::select('user_master_id', $users, null,['class' => 'form-control requiredDD']); ?>

        </div>
    </div>
    <div class="form-group">
        <?php echo Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-9">
            <?php echo Form::text('enqId', $enq->id, ['class' => 'form-control hidden', 'placeholder'=>'Hidden_ID']); ?>

            <?php echo Form::text('name', $enq->name, ['class' => 'form-control textWithSpace required', 'placeholder'=>'Name']); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('name', 'Contact', ['class'=>'col-sm-3 form-label']); ?>

        <div class="col-sm-9">
            <?php echo e(Form::text('contact', $enq->contact, ['class' => 'form-control numberOnly required', 'placeholder'=>'Contact'])); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('name', 'Email', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-9">
            <?php echo Form::text('email', $enq->email, ['class' => 'form-control', 'placeholder'=>'Email']); ?>

        </div>
    </div>

    
    
    
    
    
    
    <p class="clearfix"></p>
    <div class="form-group">
        <?php echo Form::label('bank', 'Amount', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-9">
            <?php echo Form::text('amount', null, ['class' => 'form-control input-sm', 'placeholder'=>'Amount']); ?>

        </div>
    </div>
    <p class="clearfix"></p>
    <div class="form-group">
        <?php echo Form::label('bank', 'Status', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-9">
            <select name="loanstatus" id="" class="form-control input-sm">
                <option value="FOLLOW UP">FOLLOW UP</option>
                <option value="NOT LOGIN">NOT LOGIN</option>
                <option value="UNDERWRITING">UNDERWRITING</option>
                <option value="APPROVE">APPROVE</option>
                <option value="DISBURSE">DISBURSE</option>
                <option value="REJECT">REJECT</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('name', 'Communication', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-9">
            <?php echo Form::text('communication', null, ['class' => 'form-control', 'placeholder'=>'Communication']); ?>

        </div>
    </div>

    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    

    

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            
            
            
            <?php echo e(Form::submit('Submit',['class' => 'btn btn-primary'])); ?>

        </div>
    </div>
</div>

<?php echo Form::close(); ?>

