<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employees_List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="app.css" rel="stylesheet">

        
    </head>
    <body>
        <h1>List of employees</h1>
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
                    <td><?php echo e($employee->EmployeeID); ?></td>
                    <td><?php echo e($employee->Name); ?></td>
                    <td><?php echo e($employee->Department); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <form action="<?php echo e(route('addemployee')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div>
            <h1>Add employee</h1>
            <label for="">Employee</label>
            <input type="text" name="employee_name">
            <br>
            <label for="">Department</label>
            <input type="text" name="department">
            <br>
            <input type="submit" name="submit" value="save post">
            <?php if(session("success")): ?>
                <b><?php echo e(session("success")); ?></b>
            <?php endif; ?>
        </div>
        </form>      
        <form action="<?php echo e(route('deleteemployee')); ?>" method='post'>
        <?php echo csrf_field(); ?>
            <div>
                <h3>Delete employee</h3>
                <label for="">Employee ID</label>
                <input type="text" name="employee_id">
                <br>
                <input type="submit" name="submit" value="delete post">
                <?php if(session("success_delete")): ?>
                <b><?php echo e(session("success_delete")); ?></b>
                <?php endif; ?>
            </div>
        </form>      
    </body>
</html> <?php /**PATH C:\xampp\htdocs\Laravel-basic\resources\views/employees.blade.php ENDPATH**/ ?>