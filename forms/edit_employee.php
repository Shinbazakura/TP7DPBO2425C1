<?php
require_once '../class/Employee.php';
$employee = new Employee();

$id = $_GET['id'] ?? null;
if (!$id) die("Missing employee ID");

$data = $employee->getEmployeeById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee->updateEmployee($id, $_POST['employee_name'], $_POST['role'], $_POST['hire_date']);
    header("Location: ../index.php?page=employees");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Edit Employee</h2>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="employee_name" value="<?= htmlspecialchars($data['employee_name']) ?>" required><br>
    <label>Role:</label><br>
    <input type="text" name="role" value="<?= htmlspecialchars($data['role']) ?>" required><br>
    <label>Hire Date:</label><br>
    <input type="date" name="hire_date" value="<?= $data['hire_date'] ?>"><br><br>
    <button type="submit" class="btn btn-edit">Save Changes</button>
    <a href="../index.php?page=employees" class="btn btn-view">Cancel</a>
</form>
</body>
</html>
