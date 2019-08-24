<?php $__env->startSection('title','Lead Lists'); ?>

<?php $__env->startSection('head'); ?>
    <style>
        .notifyLinks {
            margin-top: 0 !important;
        }

        .headMargin {
            margin-bottom: 10px !important;
        }

        .notifyRed {
            background-color: #d9534f !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="bg-success text-center">Lead List</h3><p class="clearfix"></p>
    <div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="panel panel-body panel-danger">
                    <div class="h5 pull-left"><strong>Filter Table Records:</strong></div>
                    
                    
                    
                    
                    
                    
                    

                    <div class="form-group">
                        <?php echo Form::label('role', 'Select Executive *', ['class' => 'col-sm-1 control-label']); ?>

                        <div class='col-sm-4'>
                            <?php echo Form::select('user_master_id', $userlist, null,['class' => 'form-control executive-dd requiredDD']); ?>

                        </div>
                    </div>
                    
                    
                        
                            
                            
                        
                        
                            
                            
                        
                        
                        
                        
                        
                        
                            
                            
                        
                        
                            
                            
                        

                        
                            
                            
                        

                        
                            
                            
                        
                        
                            
                            
                        


                    
                    

                </div>
            </div>

            <div class="col-md-2">
                <div>


                    
                    
                    

                    
                    
                </div>
            </div>
        </div>

    </div>
    <p class="clearfix"></p>
    <p class="clearfix"></p>
    <div>
        <div id="leadTable">

        </div>
    </div>

    <script>

        // setting filter
        $('input[type="radio"]').change(function () {
            $('#leadTable').html('<img height="50px" class="center-block" src="<?php echo e(url('assets/img/loading.gif')); ?>"/>');
            var btnId = this.id;
//            alert(btnId);
            var executive_id = $(".executive-dd").val();
            var send_to_url = '<?php echo e(url('/')); ?>' + "/lead/" + btnId + "/filterByUser";
//            alert(send_to_url);
            $.ajax({
                type: "POST",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,
                data: '{"executive_id":"' + executive_id + '"}',
                success: function (data) {
                    $("#leadTable").html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#leadTable").html(xhr.responseText);
                }
            });
        });


        $(".add-lead_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add Lead');
            $('.modal-body').html('<img height="50px" class="center-block" src="<?php echo e(URL::asset('img/loading.gif')); ?>"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "<?php echo e(url('lead/create')); ?>",
                success: function (data) {
                    $('.modal-body').html(data);
//            $('#modelBtn').visible(disabled);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                }
            });

        });

        function abc() {
            if ($('input[type="radio"]').attr('id') == "1") {
                //var send_to_url = "/complaint/all/filter";
                var executive_id = $(".executive-dd").val();
//                alert(executive_id);
                $.ajax({
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    url: '<?php echo e(url('/')); ?>' + "/lead/1/filterByUser",
                    data: '{"executive_id":"' + executive_id + '"}',
                    success: function (data) {
                        $("#leadTable").html(data);
                    },
                    error: function (xhr, status, error) {
                        //alert('Error occurred');
                        $("#leadTable").html(xhr.responseText);
                    }
                });
            }
        }
        $(function () {
            if ($('input[type="radio"]').attr('id') == "1") {
                //var send_to_url = "/complaint/all/filter";
                var executive_id = $(".executive-dd").val();
//                alert(executive_id);
                $.ajax({
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    url: '<?php echo e(url('/')); ?>' + "/lead/1/filter",
                    data: '{"executive_id":"' + executive_id + '"}',
                    success: function (data) {
                        $("#leadTable").html(data);
                    },
                    error: function (xhr, status, error) {
                        //alert('Error occurred');
                        $("#leadTable").html(xhr.responseText);
                    }
                });
            }
        })
        $(".executive-dd").change(function () {
            var executive_id = $(".executive-dd").val();
            var send_to_url = '<?php echo e(url('/')); ?>' + "/lead/" + 1 + "/filterByUser";
//            alert(executive_id);
            $.ajax({
                type: "POST",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,
                data: '{"executive_id":"' + executive_id + '"}',
                success: function (data) {
                    $("#leadTable").html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#leadTable").html(xhr.responseText);
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>