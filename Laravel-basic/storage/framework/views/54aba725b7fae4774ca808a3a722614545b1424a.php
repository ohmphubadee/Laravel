<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">

        
    </head>
    <body>
        <table border="1">
            <thead>
                <tr bgcolor="yellow">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($employee->id); ?></td>
                    <td><?php echo e($employee->Name); ?></td>
                    <td><?php echo e($employee->Department); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div>
            <label for="employee_id">Employee</label>
            <input type="text" name="employee_id">
            <br>
            <label for="employee_id">Department</label>
            <input type="text" name="department">
        </div>
            <input type="submit" name="submit" value="submit">
    </body>
</html> <?php /**PATH C:\xampp\htdocs\Laravel-basic\resources\views/home.blade.php ENDPATH**/ ?>