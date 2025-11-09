<?php
require_once '../class/Employee.php';
$employee = new Employee();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee->addEmployee($_POST['employee_name'], $_POST['role'], $_POST['hire_date']);
    header("Location: ../index.php?page=employees");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Add Employee</h2>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="employee_name" required><br>
    <label>Role:</label><br>
    <input type="text" name="role" required><br>
    <label>Hire Date:</label><br>
    <input type="date" name="hire_date"><br><br>
    <button type="submit" class="btn btn-add">Add Employee</button>
    <a href="../index.php?page=employees" class="btn btn-view">Back</a>
</form>
</body>
</html>
