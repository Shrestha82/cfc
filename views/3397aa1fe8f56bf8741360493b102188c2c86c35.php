<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bil Generate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="shortcut icon" type="images/png" href="images/dashbaord_fevicon.png"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/materialdesignicons.min.css"/>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        .body_color {
            background-color: #e9e9e9;
            margin: 0px;
            padding: 0px;
            font-family: Verdana;
            font-size: 10px;
        }

        .kot_table {
            background: #fff;
            position: relative;
            margin: 0px;
            padding: 0px;
        }

        .kot_table tbody tr td {
            padding: 0px;
        }

        .kot_table tbody tr td {
            border: none;
        }

        .kot_table tbody tr td hr {
            margin: 5px 0px;
            border: dashed thin #ccc;
        }

        .letter_txt {
            letter-spacing: -.5px;
            font-size: 10px;
        }

        .center_headtxt {
            display: inline-block;
            width: 100%;
            font-size: 12px;
        }

        .small_head {
            display: inline-block;
            width: 100%;
            font-size: 10px;
        }

        .right_txt {
            text-align: right;
        }
    </style>
    <script>
        function myFunction() {
            window.print();
        }
    </script>
</head>
<body class="body_color" onload="myFunction();">
<div class="container">
    <table class="kot_table table">
        <tbody>
        <tr>
            <td colspan="4" style="text-align: center;">
                <span class="center_headtxt">  CFC </span>
                <span class="small_head">THE ALA CARTE RESTAURANT</span>
                <span class="small_head">NARMADATOWER BANDARIYA TIRAHA RAMPUR 482001</span>
                
                <span class="small_head">PH NO. : 0761-4088887</span>
                <span class="small_head">GSTIN : 23IDWPS7303M1ZO</span>
                <span class="small_head">Bill</span>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">Bill No : <?php echo e($bill->bill_no); ?></td>
            <td class="right_txt" colspan="2">Table # <?php echo e($bill->table_no); ?></td>
        </tr>
        <tr>
            <td colspan="4">Date : <?php echo e(date_format(date_create($bill->bill_date), "d-M-Y h:i A")); ?></td>
        </tr>
        <tr>
            <td colspan="2">Stevard : <?php echo e($bill->stevard); ?></td>
            <td class="right_txt" colspan="2">Covers:<?php echo e($bill->covers); ?></td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td>Item</td>
            <td class="right_txt">Qty</td>
            <td class="right_txt">Rate</td>
            <td class="right_txt">Amount</td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="letter_txt"><?php echo str_limit($item->m_name,20); ?></td>
                <td class="right_txt letter_txt"><?php echo e($item->qty); ?></td>
                <td class="right_txt letter_txt"><?php echo e(number_format($item->price ,2)); ?></td>
                <td class="right_txt letter_txt"><?php echo e(number_format($item->total ,2)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $counter = 1; $gst = 0; $vat = 0; $net_amount = 0; ?>
        <?php $__currentLoopData = $bill_desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $menu = \App\MenuItemModel::find($item->MID); ?>
            <?php $net_amount += $item->total;
            if ($menu->tax->type == 'VAT') {
                $vat += $item->price * $item->qty * $menu->tax->percent / 100;
            } else {
                $gst += $item->price * $item->qty * $menu->tax->percent / 100;
            }
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="letter_txt">BILL AMOUNT</td>
            <td colspan="2" class="right_txt letter_txt"><?php echo e(number_format($net_amount,2)); ?></td>
        </tr>
      <tr>
        <td colspan="2" class="letter_txt">SGST (2.5%)</td>
        <td colspan="2" class="right_txt letter_txt"><?php echo e(number_format($gst/2,2)); ?></td>
        </tr>

		 <tr>
        <td colspan="2" class="letter_txt">CGST (2.5%)</td>
        <td colspan="2" class="right_txt letter_txt"><?php echo e(number_format($gst/2,2)); ?></td>
        </tr>
       
		 
        
        
        
        
        
        
        
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="letter_txt">DISCOUNT AMOUNT</td>
            <td colspan="2"
                class="right_txt letter_txt"><?php echo e(number_format($bill->discount_amt,2) != null ? number_format($bill->discount_amt,2 ): 0.00); ?></td>
        </tr>
        <tr>
            <td colspan="2" class="letter_txt">NET AMOUNT</td>
            <td colspan="2" class="right_txt letter_txt"><?php echo e($bill->discount_amt != null ? number_format(round($net_amount + $gst -  $bill->discount_amt ,2)) : number_format(round($net_amount + $gst),2)); ?></td>
        </tr>


        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>

        <tr>
            <td colspan="4"><br><br></td>
        </tr>
        <tr colspan="4">
            <td colspan="1" class="letter_txt">CASHIER</td>
            <td colspan="3" class="right_txt letter_txt">GUEST SIGNATURE</td>
        </tr>
        <tr>
            <td colspan="4"> <?php echo e($bill->user->name); ?></td>
        </tr>
        <tr>
            <td colspan="4"><br><br></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center;">
                <span class="center_headtxt">  THANK YOU FOR COMING PLEASE VISIT AGAIN !!! </span>
            </td>
        </tr>
        <tr>
            <td colspan="4"><br></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>