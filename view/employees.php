<?php
require_once 'class/Employee.php';
$employee = new Employee();
?>

<h3>Employee List</h3>
<a href="forms/add_employee.php" class="btn btn-success btn-success:hover">Add Employee</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Hire Date</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employee->getAllEmployees() as $e): ?>
    <tr>
        <td><?= htmlspecialchars($e['employee_id']) ?></td>
        <td><?= htmlspecialchars($e['employee_name']) ?></td>
        <td><?= htmlspecialchars($e['role']) ?></td>
        <td><?= htmlspecialchars($e['hire_date']) ?></td>
        <td>
            <a href="forms/edit_employee.php?id=<?= $e['employee_id'] ?>" class="btn btn:hover">Edit</a> |
            <a href="forms/delete_employee.php?id=<?= $e['employee_id'] ?>" class="btn btn-danger btn-danger:hover" onclick="return confirm('Delete this employee?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
