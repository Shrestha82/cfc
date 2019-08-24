<div class="row">
    <div class="col-md-12">
        <div class="thumbnail">
            <div class="caption">
                <h3 class="bg-info text-center">Vehicle Description</h3>
                <p class="clearfix"></p>
                <h5><b>Description:</b>
                    <?php if($tour->vehicle_master_id != null): ?>
                        <?php echo e($tour->vehicle_master->vehicle_name); ?> For <i class="fa fa-inr"></i><?php echo e($tour->vehicle_master->rate); ?>

                        & Total Transportaion Charge(<?php echo e($tour->total_days); ?> Days): <i class="fa fa-inr"></i><?php echo e($tour->vehicle_master->rate*$tour->total_days); ?>,
                        <?php echo e($tour->vehicle_comment); ?>

                    <?php endif; ?>
                </h5>
                <hr>
            </div>
        </div>
    </div>
</div>
