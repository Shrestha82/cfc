<?php $__env->startSection('title','Table Settlement'); ?>

<?php $__env->startSection('content'); ?>
    <script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
    
    
    

    
    
    <h3 class="heading bg-success">List Of Booked Tables</h3>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <?php echo Form::open(['url' => 'table_settle', 'class' => 'form-horizontal', 'id'=>'user_master']); ?>

    <div class="light bordered">

    
    
    <!-- Begin page content -->
        <div class="container-fluid">
            
            <div class="grid simple">

                <div>
                    <p class="clearfix"></p>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Select Table List<b class="star">*</b></label>
                                <?php echo Form::select('table_id', $booked_table, null,['class' => 'form-control table_id input-sm requiredDD']); ?>

                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Settle in<b class="star">*</b></label>
                                <?php echo Form::select('settle_table_id', $booked_tables, null,['class' => 'form-control table_id input-sm requiredDD']); ?>

                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php echo Form::close(); ?>

    <script>

        $('.table_id').change(function () {
            $('#table_list').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            var tableId = $('.table_id').val();
//            alert(tableId);
            if (tableId == 0) {
                alert('Please Select Table');
                $('.table_id').focus();
                $('#btnConfirm').hide();
                return false;
            }
            $('#btnConfirm').show();
            var send_to_url = '<?php echo e(url('/')); ?>' + "/kot/" + tableId + "/filter";
//            alert(send_to_url);
            $.ajax({
                type: "POST",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,
                success: function (data) {
                    $("#table_list").html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#table_list").html(xhr.responseText);
                }
            });
        });

        function submitChange() {
//        var cpassword = $('#cpswd').val();
            var table_id = $('.table_id').val();
//            alert(table_id);
            var formData = '_token=' + $('.token').val();
            if (table_id == '0') {
//            alert('Please enter your rc.');
//            $('.rcode').focus();
                $('#btnConfirm').hide();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    url: "<?php echo e(url('print_bill')); ?>",
//                data: '{"data":"' + endid + '"}',
                    data: '{"formData":"' + formData + '", "table_id":"' + table_id + '"}',
                    success: function (data) {
//                        if (data == 'ok') {
                        console.log(data);
                        $('#table_id').val('0');
                        var yourDOCTYPE = "<!DOCTYPE html>"; // your doctype declaration
                        var printPreview = window.open('about:blank', 'print_preview', "resizable=yes,scrollbars=yes,status=yes");
                        var printDocument = printPreview.document;
                        printDocument.open();
                        printDocument.write(yourDOCTYPE +
                            "<html>" +
                            data +
                            "</html>");
                        printDocument.close();

//                        $('.statusMsg').html('<span style="color:green;">Password changed successfully</p>');
//                        } else if (data == 'Incorrect') {
//                            $('#txtChange_previousPsd').val('');
//                            $('.statusMsg').html('<span style="color:red;">Incorrect current password</span>');
//                        }
                    },
                    error: function (xhr, status, error) {
//                    alert('xhr.responseText');
                        $('#err').html(xhr.responseText);
                    }
                });
            }
        }

        $(document).ready(function () {
            $('#frmStock').submit(function () {
                $('#divMsg').show();
                $('#progress').show();
                $('.btn').disable();

            });
        });
        function placeOrder(form) {
            form.submit();
        }
    </script>
    <style>
        #progress {
            display: none;
            color: green;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>