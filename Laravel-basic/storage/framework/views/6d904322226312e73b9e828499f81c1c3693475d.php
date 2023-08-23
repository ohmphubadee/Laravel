<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OrderList</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1>List of orders</h1>
        <table border="1">
            <thead>
                <tr bgcolor="yellow">
                    <th>OrderID</th>
                    <th>EmployeeID</th>
                    <th>Ordername</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->orderID); ?></td>
                    <td><?php echo e($order->EmployeeID); ?></td>
                    <td><?php echo e($order->OrderName); ?></td>
                    <td><?php echo e($order->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <form action="<?php echo e(route('addorder')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div>
            <h1>Add order</h1>
            <label for="">Employee ID</label>
            <input type="text" name="EmployeeID">
            <br>
            <label for="">Order Name</label>
            <input type="text" name="OrderName">
            <br>
            <input type="submit" name="submit" value="save post">
            <?php if(session("success")): ?>
                <b><?php echo e(session("success")); ?></b>
            <?php endif; ?>
        </div>
        </form>      
        <form action="<?php echo e(route('deleteorder')); ?>" method='post'>
        <?php echo csrf_field(); ?>
            <div>
                <h3>Delete order</h3>
                <label for="">Order ID</label>
                <input type="number" name="OrderID">
                <br>
                <input type="submit" name="submit" value="delete post">
                <?php if(session("success_delete")): ?>
                <b><?php echo e(session("success_delete")); ?></b>
                <?php endif; ?>
            </div>
        </form>
    </body>
</html><?php /**PATH C:\xampp\htdocs\Laravel-basic\resources\views/order.blade.php ENDPATH**/ ?>