<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    @font-face {
        font-family: xyz;
        src: url(<?php echo e(url('assets/fonts/IDAutomationC39XS.ttf')); ?>);
    }

    .barc {
        font-family: xyz;
    }
</style>
<body>
<div class="header clearfix">
    <?php if(isset($reg)): ?>
        <div class="text-center barc" style="font-size: x-large">
            <p><?php echo e($reg); ?></p>
        </div>
    <?php else: ?>
        <h3>Barcode Printing not allowed After Scanning</h3>
    <?php endif; ?>
</div>
</body>
</html>













