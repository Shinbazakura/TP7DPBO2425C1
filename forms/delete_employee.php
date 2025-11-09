<?php
require_once '../class/Employee.php';
$employee = new Employee();

$id = $_GET['id'] ?? null;
if ($id) {
    $employee->deleteEmployee($id);
}

header("Location: ../index.php?page=employees");
exit;
?>
