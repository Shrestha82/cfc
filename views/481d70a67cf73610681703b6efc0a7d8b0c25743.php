<div class="row">
    <div class="col-md-12">
        <div class="thumbnail">
            <div class="caption">
                <h3 class="bg-info text-center">Inclusions Description</h3>
                <hr>
                <table id="dataTable" class="display table">
                    <thead>
                    <tr class="bg-info">
                        <th>Inclusion</th>
                        <th>Rate</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $inclusions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td><?php echo e($inclusion->inclusion_master->name); ?></td>
                            <td><i class="fa fa-inr"></i> <?php echo e($inclusion->inclusion_master->rate); ?></td>
                        </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>