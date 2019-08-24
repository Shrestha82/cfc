<?php $__env->startSection('title','Generate Bill'); ?>

<?php $__env->startSection('content'); ?>
    <script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
    
    <a href="<?php echo e(url('bill_list')); ?>" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">
        <span class="fa fa-eye"></span>&nbsp;Go To Bill List</a>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <?php if(Session::has('success-msg')): ?>
        <p class="alert alert-success"><?php echo e(Session::get('success-msg')); ?></p>
    <?php endif; ?>
    
    
    <h3 class="heading bg-success">Generate Bill</h3>
    <?php echo Form::open(['url' => 'stock', 'class' => 'form-horizontal', 'id'=>'billing']); ?>

    <div class="light bordered">

        
        
        <p class="clearfix"></p>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>


    <!-- Begin page content -->
        <div class="container-fluid">
            
            <div class="grid simple">

                <div>
                    <p class="clearfix"></p>
                    <div class="">
                        <div class="form-group col-md-12 row">
                            <div class="form-group col-md-3" style="float: left">
                                <label for="">Booked Table List<b class="star">*</b></label>
                                <?php echo Form::select('table_id', $booked_tables, null,['class' => 'form-control  table_id input-sm requiredDD']); ?>

                            </div>
                            <div class="form-group col-md-3" style="float: right">
                                <label for="">Contact</label>
                                <div class='' onkeyup="checkContact(this);">
                                    <?php echo Form::text('contact', null, ['class' => 'form-control input-sm contact required','id'=>'contact', 'placeholder'=>'Contact']); ?>

                                </div>
                                <span id="contact-error" style=" display: none;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <p class="clearfix"></p>
        <div id="msg" class="alert-danger"></div>
        <h3>Item List</h3>
        <p class="msg bg-primary"></p>
        
        <div id="table_list" class="container-fluid">

        </div>

        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="col-md-12">
            <div class="text-center">
                <div id="divMsg" style="display:none;">
                    
                    <div id="progress">Please wait...</div>
                </div>
                <br>
                
                
                
                
                <button style="display:none;" type="button" onclick="submitChange();" class="btn btn-primary"
                        id="btnConfirm">Print Bill
                </button>
                
                
                
                <p id="err"></p>
            </div>
            <br/>
        </div>
        <?php echo Form::close(); ?>

        <p class="clearfix"></p>
        
    </div>
    <script type="text/javascript">
            function checkContact(key) {
            debugger
            var Contact_No = $('#contact').val();
            $.get('<?php echo e(url('billContactCheck')); ?>',
                {Contact_No:Contact_No},
                function (response) {
                    if (response.status== true){
                        $('#contact-error').html("<span style='color: red'>Old member</span>");
                        $('#contact-error').css('display','block');
                    }
                    else if(response.status == false){
                        $('#contact-error').html("<span style='color: green'>New member</span>");
                        $('#contact-error').css('display','block');
                    }
                    else{
                        console.log(response);
                    }
                }
            )
        }

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
            var send_to_url = '<?php echo e(url('/')); ?>' + "/finalbill/" + tableId + "/filter";
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

//        $(function checkform() {
//            $('form#billing').submit(function () {
//                var c = confirm("Are you sure to continue?");
//                return c;
//            });
//        });
            function submitChange() {
                // debugger
//        var cpassword = $('#cpswd').val();
                var table_id = $('.table_id').val();
                var distype = $('#discount').val();
                // var flat = $('#discountType').val();
                var grand_total = $('#Amt').text();
                var discount = $('#BeforePayableAmt').val();
//            var dis_reason = $('#dis_reason').val().trim();
//            var paymentmode = $('#paymentmode').val();
//            var bank = $('#bank').val().trim();
//            var chequeno = $('#chequeno').val().trim();
                var PayableAmt = $('#PayableAmt').html();
                var covers = $('#covers').val().trim();
                var formData = '_token=' + '<?php echo e(csrf_token()); ?>';
//            alert(table_id);
//            alert(paymentmode);
//            if (discount > 0) {
//                if (dis_reason == '') {
//                    alert('Please Enter Reason');
//                }
//            }
//            else
//                 return false;
                if (covers == '') {
                    alert('Please Enter Covers');
                } else if (table_id == '0') {
//                alert('Please enter your rc.');
//            $('.rcode').focus();
                    $('#btnConfirm').hide();
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        contentType: "application/json; charset=utf-8",
                        url: "<?php echo e(url('finalprint_bill')); ?>",
                        data: '{"formData":"' + formData + '", "table_id":"' + table_id + '", "PayableAmt":"' + PayableAmt + '", "covers":"' + covers + '","discount_type":"'+ distype +'","discount_amt":"'+ discount +'","grand_total":"'+ grand_total +'"}',
                        beforeSend: function () {
                        $('#btnConfirm').attr("disabled", "disabled");
                    },
                    success: function (data) {
                        //console.log(data);
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
                        $("#btnConfirm").removeAttr("disabled");
                        setTimeout(function () {
                            window.location.href = "<?php echo e(url('dashboard')); ?>"
                        }, 4000);
                    },
                    error: function (xhr, status, error) {
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

    <script src="<?php echo e(url('assets/js/auto_stock_info.js')); ?>"></script>
    <script>

        $(document).on('focus', '.auto-text', function () {
            $(this).autocomplete({
                source: '<?php echo e(url('gpdetail')); ?>/1',
                minLength: 1,
                autoFocus: true,
                select: function (e, ui) {
//                    alert();
                    console.log(ui);
                    id_arr = $(this).attr('id');
                    id = id_arr.split("_");
                    $('#itemId_' + id[1]).val(ui.item.id);
                    $('#itemName_' + id[1]).val(ui.item.item_name);
                    $('#itemUnit_' + id[1]).val(ui.item.UnitName);
//                    $('#itemGst_' + id[1]).val(ui.item.gst_per);
//                    $('#itemRate_' + id[1]).val(ui.item.item_rate);
//                    $('#itemR_' + id[1]).val(ui.item.item_rate);
//                    $('#quantity_' + id[1]).val(1);
//                    $('#itemUnit_' + id[1]).val(ui.item.size_unit);
                }
            });
        });

        //deletes the selected table rows
        $(".delete").on('click', function () {
            alert($('.case:checkbox:checked').parents("tr").prop('id'));
//            calculateQuotationTotal();
            calculateGrandTotal();
//            calculateVatPercent();
        });


        ///itemAmt += $('#itemAmt_' + id[1]).val((parseFloat(rate) * parseFloat(quantity)).toFixed(2));
        //        itemGstAmt += $('#itemGstAmt_' + id[1]).val((parseFloat(rate) * parseFloat(quantity) * parseFloat(gst) / 100).toFixed(2));
        //        itemAmount += $('#itemAmount_' + id[1]).val((parseFloat(rate) * parseFloat(quantity) * parseFloat(gst)) / 100 + ((parseFloat(rate) * parseFloat(quantity)).toFixed(2)));


        $(document).on('change', '.rate', function () {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            itemAmt = 0;
            itemGstAmt = 0;
            itemAmount = 0;
            rate = $('#itemR_' + id[1]).val();
            enter_rate = $('#itemRate_' + id[1]).val();
            if (parseFloat(enter_rate) < parseFloat(rate)) {
                $('#itemRate_' + id[1]).val(parseFloat(rate));
//                $('.msg').text('Enter Qty is more than available Quantity');
            } else {
                $('.msg').text('');
            }
        });
        //rate change
        $(document).on('change keyup blur', '.changesNo', function () {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            itemAmt = 0;
            itemGstAmt = 0;
            itemAmount = 0;
            quantity = $('#quantity_' + id[1]).val();
            rate = $('#itemRate_' + id[1]).val();
            gst = $('#itemGst_' + id[1]).val();
            if (quantity != '' && rate != '') {
                itemAmt += (parseFloat(rate) * parseFloat(quantity)).toFixed(2);
                itemGstAmt += (parseFloat(itemAmt) * parseFloat(gst) / 100).toFixed(2);
                itemAmount += (parseFloat(itemGstAmt) + parseFloat(itemAmt)).toFixed(2);
                $('#itemAmt_' + id[1]).val(parseFloat(itemAmt));
                $('#itemGstAmt_' + id[1]).val(parseFloat(itemGstAmt));
                $('#itemAmount_' + id[1]).val(parseFloat(itemAmount));
            }
            calculateQuotationTotal();
//            calculateGrandTotal();
            //calculateVatPercent();

//            id_arr = $(this).attr('id');
//            id = id_arr.split("_");
//            quantity = $('#quantity_' + id[1]).val();
//            rate = $('#itemRate_' + id[1]).val();
//            if (quantity != '' && rate != '') {
//                $('#itemAmount_' + id[1]).val((parseFloat(rate) * parseFloat(quantity)).toFixed(2));
//            }
//            calculateQuotationTotal();
//            calculateGrandTotal();
//            calculateVatPercent();
        });
        //
        //        // Transportation Total calculation
        function calculateQuotationTotal() {
            quotAmt = 0;
            $('.row-total').each(function () {
                if ($(this).val() != '') quotAmt += parseFloat($(this).val());
            });
            $('#quotAmt').val(quotAmt.toFixed(2));
        }



        // VAT Amount and Grand Total calculation
        //        $(document).on('change keyup blur', '.vat_percent', function () {
        //            calculateVatPercent();
        //        });
        //
        //        function calculateVatPercent() {
        //            vat_amount = 0;
        //            grand_total = 0;
        //            vat_percent = parseFloat($('.vat_percent').val());
        //            quotAmt = $('.quotAmt').val();
        //            $('.vat_percent').each(function () {
        //                vat_amount += (quotAmt * ( parseFloat(vat_percent) / 100 ));
        //            });
        //            $('#vat_amount').val(vat_amount.toFixed(2));
        //            grand_total = parseFloat(quotAmt) + parseFloat(vat_amount);
        //            $('#grand_total').val(grand_total.toFixed(2));
        //
        //        }
        //
        //        //Grand Total calculation
        //        function calculateGrandTotal() {
        //            grand_total = 0;
        //            $('.row-total').each(function () {
        //                if ($(this).val() != '')grand_total += parseFloat($(this).val());
        //            });
        //            $('#grand_total').val(grand_total.toFixed(2));
        //        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>