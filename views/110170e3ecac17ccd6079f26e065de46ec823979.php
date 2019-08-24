<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<?php if($errors->any()): ?>
    <div role='alert' id='alert' class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>
<?php echo Form::open(['url' => 'home', 'class' => 'form-horizontal', 'id'=>'user_master']); ?>

<div class="logindiv">
    <?php echo Form::text('username', $user->username, ['class' => 'form-control hidden input-sm required', 'placeholder'=>'Username']); ?>

    
    <input name="password" type="password" class="form-control password_txt" placeholder="Password" id="txtpassword"
           autocomplete="off" data-validate="TT_btnpassword">
    <div class="password_icon mdi mdi-lock-outline mdi-16px"></div>
    <p class="clearfix"></p>
    <?php echo Form::submit('Submit', ['class' => 'btn btn-sm btn-primary ']); ?>

</div>
<?php echo Form::close(); ?>

