<?php
require_once '../class/Order.php';
require_once '../class/Customer.php';
require_once '../class/Employee.php';
require_once '../class/Menu_item.php';

$order = new Order();
$customer = new Customer();
$employee = new Employee();
$menu = new Menu_item();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order->createOrder($_POST['customer_id'], $_POST['employee_id'], $_POST['total_amount']);
    header("Location: ../index.php?page=orders");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Add Order</h2>
<form method="POST">
    <label>Customer:</label><br>
    <select name="customer_id" required>
        <?php foreach ($customer->getAllCustomers() as $c): ?>
            <option value="<?= $c['customer_id'] ?>"><?= $c['customer_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Employee:</label><br>
    <select name="employee_id" required>
        <?php foreach ($employee->getAllEmployees() as $e): ?>
            <option value="<?= $e['employee_id'] ?>"><?= $e['employee_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Total Amount:</label><br>
    <input type="number" step="0.01" name="total_amount" required><br><br>

    <button type="submit" class="btn btn-add">Create Order</button>
    <a href="../index.php?page=orders" class="btn btn-view">Back</a>
</form>
</body>
</html>
