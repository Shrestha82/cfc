<?php $__env->startSection('title','Request Item'); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(url('request_item')); ?>" class="btn btn-sm bg-danger btnSet btn-primary pull-right">
        <span class="fa fa-eye"></span>Request Item List</a>
    <h3 class="heading">Create Request</h3>
    <hr/>
    <?php if($errors->any()): ?>
        <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
    <?php endif; ?>
    <?php if(Session::has('success-msg')): ?>
        <p class="alert alert-success"><?php echo e(Session::get('success-msg')); ?></p>
    <?php endif; ?>
    <?php echo Form::open(['url' => 'request_item', 'class' => 'form-horizontal', 'id'=>'issue']); ?>

    <div class="light bordered">

    
    
    
    
    
    
    
    
    
    
    


    <!-- Begin page content -->
        <div class="container-fluid">
            
            
            
            
            
                
                    
                    
                           
                           
                           
                           
                    
                
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            
            
            
            
                
                    
                    
                
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Description *:</label>

                    <textarea name="material_description" class="form-control" rows="3" placeholder="Description"></textarea>

                </div>
            </div>
            
            
            
            

            
            
        </div>
    </div>
    <div id="msg" class="alert-danger"></div>
    <h3>Item List</h3>
    <p class="msg bg-primary"></p>

    
    <div class="container-fluid">
        <table id="itemTable" class="table table-bordered table-responsive">
            <thead>
            <tr class="bg danger">
                <th width="2%"><input id="check_all" type="checkbox"/></th>
                <th class="hidden">Product Id</th>
                <th>PARTICULARS</th>
                <th>UNIT</th>
                <th>QTY</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input class="case" type="checkbox"/></td>
                <td class="hidden">
                    <input type="text" class="form-control input-sm" id="itemId_1" name="itemId[]">
                </td>
                <td>
                    <input type="text" tabindex="1" class="form-control input-sm auto-text required"
                           placeholder="Search Items by Name"
                           id="itemName_1" name="itemName[]">
                    
                    
                    
                    
                    
                    
                    
                    
                </td>
                <td>
                    <input type="text" class="form-control input-sm required" placeholder="Unit"
                           id="unit_1" readonly="readonly" tabindex="-1" name="unit[]">
                </td>
                <td>
                    <input type="text" class="form-control input-sm changesNo value-change pqty required amount"
                           placeholder="Quantity"
                           id="quantity_1" tabindex="2" name="quantity[]">
                </td>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                
                
                
            </tr>
            </tbody>
        </table>
        <p class="clearfix"></p>
        <button class="btn btn-sm btn-success addmore" tabindex="3" type="button"><span
                    class="fa fa-plus"></span>&nbsp;
        </button>
        <button class="btn btn-sm btn-danger delete" tabindex="4" type="button"><span
                    class="fa fa-minus"></span>&nbsp;
        </button>
        
        
        
        
        
        

    </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="col-md-12">
        <div class="text-center">
            <div id="divMsg" style="display:none;">
                
                <div id="progress">Please wait...</div>
            </div>
            <br>
            
            
            
            <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); ?>

            <a class="btn btn-default" onclick="javascript:history.back();"><span
                        class=""></span>&nbsp;Back
            </a>
        </div>
        <br/>
    </div>
    <?php echo Form::close(); ?>

    <p class="clearfix"></p>
    
    <script>
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

    <script src="<?php echo e(url('assets/js/auto_issue_info.js')); ?>"></script>
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
                    $('#unit_' + id[1]).val(ui.item.UnitName);
//                    $('#itemYRate_' + id[1]).val(ui.item.item_rate);
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
            enter_rate = $('#itemYRate_' + id[1]).val();
            if (parseFloat(enter_rate) < parseFloat(rate)) {
                $('#itemYRate_' + id[1]).val(parseFloat(rate));
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
            rate = $('#itemYRate_' + id[1]).val();
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
//            rate = $('#itemYRate_' + id[1]).val();
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