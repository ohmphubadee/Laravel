
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Detail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">

    </head>
    <body>
        
        <table border="1">
            <thead>
                <tr bgcolor="yellow">
                    <th>OrderID</th>
                    <th>Employee</th>
                    <th>Order</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->OrderID); ?></td>
                    <td><?php echo e($order->Name); ?></td>
                    <td><?php echo e($order->Ordername); ?></td>
                    <td><?php echo e($order->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
</html><?php /**PATH C:\xampp\htdocs\Laravel-basic\resources\views/detail.blade.php ENDPATH**/ ?>