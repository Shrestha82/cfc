<?php ini_set('memory_limit', '512M');?>
<html lang="en">
<head>
    <title>Import - Export Laravel 5</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Import - Export in Excel and CSV Laravel 5</a>
        </div>
    </div>
</nav>
<div class="container">
    <a href="<?php echo e(URL::to('downloadExcel/xls')); ?>">
        <button class="btn btn-success">Download Excel xls</button>
    </a>
    <a href="<?php echo e(URL::to('downloadExcel/xlsx')); ?>">
        <button class="btn btn-success">Download Excel xlsx</button>
    </a>
    <a href="<?php echo e(URL::to('downloadExcel/csv')); ?>">
        <button class="btn btn-success">Download CSV</button>
    </a>
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="<?php echo e(url('importExcel')); ?>"
          class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        
        <input type="file" name="import_file"/>
        <button class="btn btn-primary">Import File</button>
    </form>
</div>
</body>
</html>