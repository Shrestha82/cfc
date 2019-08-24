<?php $__env->startSection('title','List of Registrations'); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(url('registration')); ?>"
       class="btn btn-sm bg-danger btnSet btn-primary  pull-right">
        <span class="fa fa-plus"></span>&nbsp;Go Back</a>
    <h3 class="heading">Edit Registrations</h3>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <?php echo Form::open(['url' => 'registration/'.$reg->Regid, 'class' => 'form-horizontal', 'id'=>'registration', 'method'=>'put', 'files'=>true]); ?>

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">
                <h3 class="bg-success text-center">Basic Info</h3>

                <div class='form-group'>
                    <?php echo Form::label('user_no', 'REG No#', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <p></p>
                        <label for="" class="badge"><?php echo e($reg->reg_full); ?></label>
                        
                        
                        
                    </div>
                </div>

                <div class='form-group'>
                    <?php echo Form::label('name', 'Name *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('name', $reg->Name, ['class' => 'form-control input-sm required', 'placeholder'=>'Name']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('gender', 'Gender', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php if($reg->Gender == "Male"): ?>
                            <?php echo e(Form::radio('gender', 'Male', true)); ?>Male &nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo e(Form::radio('gender', 'Female')); ?>Female
                        <?php else: ?>
                            <?php echo e(Form::radio('gender', 'Male')); ?>Male &nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo e(Form::radio('gender', 'Female', true)); ?>Female
                        <?php endif; ?>
                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('contact', 'Contact *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('contact', $reg->Contact_No, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('email', 'Email *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('email', $reg->EmailId, ['class' => 'form-control input-sm', 'placeholder'=>'Enter Email']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('address', 'Address *', ['class' => 'col-sm-4 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::textarea('address', $reg->Addr, ['class' => 'form-control input-sm', 'placeholder'=>'Address', 'row'=>'5']); ?>

                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <h3 class="bg-success text-center">Fee Info</h3>
                <p class="clearfix"></p>
                <div class='form-group'>
                    <?php echo Form::label('payment_amount', 'Amount', ['class' => 'col-sm-3 control-label']); ?>

                    <div class='col-sm-8'><p class="clearfix"></p>
                        <lable>
                            
                            
                            2000
                        </lable>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('payment_date', 'Payment Date', ['class' => 'col-sm-3 control-label']); ?>

                    <div class='col-sm-8'>
                        <p class="clearfix"></p>
                        <?php echo Form::text('payment_date', null, ['class' => 'form-control input-sm dtp required', 'placeholder'=>'Payment Date', 'onkeypress'=>'return false','id'=>'payment_date']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('is_cheque', 'Payment Mode *', ['class' => 'col-sm-3 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::radio('mode_of_payment', 'Cash',true, ['required' => 'required','class'=>'is_cheque']); ?>

                        Cash
                        &nbsp;&nbsp;&nbsp;
                        <?php echo Form::radio('mode_of_payment', 'Cheque',false, ['required' => 'required','class'=>'is_cheque']); ?>

                        Cheque
                        <input type="hidden" id="cheque_check">
                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('bank_name', 'Bank Name', ['class' => 'col-sm-3 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('bank_name', null, ['class' => 'form-control input-sm textWithSpace', 'placeholder'=>'Bank Name','maxlength'=>'100','id'=>'bank']); ?>

                    </div>
                </div>
                <div class='form-group'>
                    <?php echo Form::label('cheque_no', 'Cheque No', ['class' => 'col-sm-3 control-label']); ?>

                    <div class='col-sm-8'>
                        <?php echo Form::text('cheque_no', null, ['class' => 'form-control input-sm numberOnly', 'placeholder'=>'Cheque No','maxlength'=>'10','id'=>'chequeno']); ?>

                    </div>
                </div>

                <div class='form-group'>
                    <div class='col-sm-offset-3 col-sm-8'>
                        <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

                    </div>
                </div>
            </div>
        </div>
        
        


        
        
        
        
        
        
        
    </div>
    <?php echo Form::close(); ?>

    <script>

        $(document).ready(function () {
            $(document).ready(function () {
                if ($('#cheque_check').val() == 0) {
                    $('#cash').prop('checked', 'checked');
                    $('#bank').attr('class', 'form-control input-sm numberOnly');
                    $('#chequeno').attr('class', 'form-control input-sm textWithSpace');
                }
                else {
                    $('#cheque').prop('checked', 'checked');
                    $('#chequeno').attr('class', 'form-control input-sm textWithSpace required');
                    $('#bank').attr('class', 'form-control input-sm numberOnly required');
                }
            });
        });
        $('.is_cheque').on('change', function () {
            if ($(this).val() == 'Cheque') {
                $('#chequeno').attr('class', 'form-control input-sm textWithSpace required');
                $('#bank').attr('class', 'form-control input-sm numberOnly required');
            } else {
                $('#bank').attr('class', 'form-control input-sm numberOnly');
                $('#chequeno').attr('class', 'form-control input-sm textWithSpace');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>