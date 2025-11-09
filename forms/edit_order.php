<?php
require_once '../class/Order.php';
require_once '../class/Customer.php';
require_once '../class/Employee.php';

$order = new Order();
$customer = new Customer();
$employee = new Employee();

$id = $_GET['id'] ?? null;
if (!$id) die("Missing order ID");

$data = $order->getOrderById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order->updateOrder($id, $_POST['customer_id'], $_POST['employee_id'], $_POST['total_amount']);
    header("Location: ../index.php?page=orders");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Edit Order</h2>
<form method="POST">
    <label>Customer:</label><br>
    <select name="customer_id" required>
        <?php foreach ($customer->getAllCustomers() as $c): ?>
            <option value="<?= $c['customer_id'] ?>" <?= $c['customer_id']==$data['customer_id']?'selected':'' ?>>
                <?= $c['customer_name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Employee:</label><br>
    <select name="employee_id" required>
        <?php foreach ($employee->getAllEmployees() as $e): ?>
            <option value="<?= $e['employee_id'] ?>" <?= $e['employee_id']==$data['employee_id']?'selected':'' ?>>
                <?= $e['employee_name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Total Amount:</label><br>
    <input type="number" step="0.01" name="total_amount" value="<?= $data['total_amount'] ?>" required><br><br>

    <button type="submit" class="btn btn-edit">Save Changes</button>
    <a href="../index.php?page=orders" class="btn btn-view">Cancel</a>
</form>
</body>
</html>
