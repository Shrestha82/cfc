<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MN Finance : Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
    
    <link rel="stylesheet" href="/assets/css/login_style.css" type="text/css"/>
</head>
<style>
    body {
        position: relative;
        /*background-image: url("assets/img/bg.jpg");*/
        background-repeat: no-repeat;
        background-size: 100% 100vh;
    }

    @charset  "utf-8";
    /* CSS Document */

    * {
        margin: 0;
        padding: 0;
    }

    #login-form {
        margin: 0% auto;
        max-width: 500px;
    }

    /* home page */
    #wrapper {
        padding-top: 50px;
    }

</style>
<body class="img-responsive" style="height: auto">

<div id="login-form">
    <div class="imgcontainer" style="margin-top:30px">
        <img src="assets/img/logo.png" alt="Avatar" height="150px"
             style="margin-top: -1%; border-radius: 12%" class="center-block"/>
    </div>

    <div class="container"
         style="width: 470px; margin-top: 0px; padding: 25px; box-shadow: 5px 5px 5px #000000; background-color: rgba(10,10,10,0.1)">
        <br>
        <div class="form-group">
            <h2 class=""><span class="glyphicon glyphicon-log-in"></span> Sign In </h2>
        </div>
        <div class="form-group">
            <hr/>
        </div>
        <?php echo Form::open(['url' => 'home', 'class' => 'form-horizontal', 'id'=>'frmLogin']); ?>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="username" class="form-control required" name="email"
                       placeholder="Username"
                       maxlength="15"/>
                <span id="check-e"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control required" name="password" maxlength="15"
                       placeholder="Password"/>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" name="btn-login"><span
                        class="glyphicon glyphicon-log-in"></span> Sign In
            </button>
        </div>
        <?php echo Form::close(); ?>


        <div class="form-group">
            <hr/>
        </div>
        <?php if($errors->any()): ?>
            <div role="alert" id="alert" class="alert alert-danger"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>
    </div>
</div>

<script src="<?php echo e(url('assets/js/jquery.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/validation.js')); ?>"></script>
<script>
    $(document).ready(function () {
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 3000);
    });
</script>
</body>
</html>