<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bil Generate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="shortcut icon" type="images/png" href="images/dashbaord_fevicon.png"/>
    <link href="<?php echo e(url('assets/css/bootstrap1.min.css')); ?>" rel="stylesheet">
    <style type="text/css">
        .body_color {
            background-color: #e9e9e9;
        }

        .kot_table {
            background: #fff;
            min-height: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            margin-bottom: 20px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            -ms-border-radius: 2px;
            border-radius: 2px;
            margin-top: 20px;
        }

        .center_headtxt {
            display: inline-block;
            width: 100%;
            font-size: 10px;
        }

        .small_head {
            display: inline-block;
            width: 100%;
        }

        .right_txt {
            text-align: right;
            font-size: 10px;
        }

        .left_txt {
            font-size: 10px;
            text-align: left;
        }

        .kot_border {
            border: solid thin #CCCCCC;
            width: 100%;
            table-layout: fixed;
        }

        .kot_border tr {
            width: 100%;
        }

        .kot_border tr td {

        }
    </style>
</head>
<body class="body_color">
<div class="container">
    <table class="kot_table table kot_border">
        <tbody>
        <tr>
            <td colspan="6" style="text-align: center;">
                
                
                
                
                
                
                <span class="small_head">Dummy Bill</span>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="left_txt">Bill No : -</td>
            <td class="right_txt pull-right" colspan="6">Table # <?php echo e($table_order->TblNo); ?></td>
        </tr>
        <tr>
            <td colspan="6" class="left_txt">Date
                : <?php echo e(date_format(date_create($table_order->OrderDate), "d-M-Y")); ?></td>
            <td colspan="6" class="left_txt">Time : <?php echo e(date_format(date_create($table_order->OrderDate), "h:i A")); ?></td>
            <td colspan="2" class="right_txt">Stevard : <?php echo e($table_order->stevard); ?></td>
        </tr>
        <tr>
            <td colspan="6" class="left_txt">Print Date
                : <?php echo e(date_format(date_create($table_order->OrderDate), "d-M-Y h:i A")); ?></td>
        </tr>
        <tr>
            <td colspan="6"><br></td>
        </tr>
        <tr>
            <td colspan="6" class="left_txt">Item</td>
            <td colspan="6" class="left_txt">Tax %</td>
            <td colspan="6" class="right_txt">Qty</td>
            <td colspan="6" class="right_txt">Rate</td>
            <td colspan="6" class="right_txt">Tax Amt</td>
            <td colspan="6" class="right_txt">Amount</td>
        </tr>
        <tr>
            <td>Fruit Punch</td>
            <td class="right_txt">2</td>
            <td class="right_txt">200</td>
            <td class="right_txt">400</td>
        </tr>
        <?php $net_amount = 0;  $vat =0; ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $menu = \App\MenuItemModel::find($item->mid); ?>
            <tr class="text-center">
                <td colspan="6" class="left_txt"><?php echo e($item->m_name); ?></td>
                <td colspan="6" class="left_txt"><?php echo e($menu->tax->type." ".$menu->tax->percent); ?></td>
                <td colspan="6" class="right_txt"><?php echo e($item->qty); ?></td>
                <td colspan="6" class="right_txt"><?php echo e($item->price); ?></td>
                <td colspan="6" class="right_txt"><?php echo e($item->price*$item->qty*$menu->tax->percent/100); ?></td>
                <td colspan="6"
                    class="right_txt"><?php echo e($item->total+$item->price*$item->qty*$menu->tax->percent/100); ?></td>
            </tr>
            <?php $net_amount += $item->total + $item->price * $item->qty * $menu->tax->percent / 100;
			if($menu->tax->type=='VAT')
			{
			$vat+=$item->price * $item->qty * $menu->tax->percent / 100;
			}
			
			 ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="6"><br></td>
        </tr>
        <tr>
            <td colspan="6" class="left_txt">Net Amount</td>
            <td colspan="6" class="right_txt"><?php echo e($net_amount); ?></td>
        </tr>
		<td colspan="2" class="left_txt">VAT (5%)</td>
            <td colspan="2" class="right_txt"><?php echo e($vat); ?></td>
		
		</tr>
        
            
            
        
        
            
            
        
        
            
            
        
        
            
        
        
            
            
        

        
            
        
        <tr class="pull-right">
            <td class="left_txt">CASHIER : <?php echo e($table_order->user->name); ?></td>
            <td colspan="6" class="right_txt pull-right">Guest Signature</td>
        </tr>
        <tr>
            <td colspan="6"><br><br><br></td>
        </tr>
        <tr>
            <td colspan="6">
                <span class="center_headtxt">  THANK YOU FOR COMING PLEASE VISIT AGAIN !!! </span>
            </td>
        </tr>
        <tr>
            <td colspan="6"><br><br></td>
        </tr>
        </tbody>
    </table>

</div>
</body>
</html>

