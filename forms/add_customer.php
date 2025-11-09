<?php
require_once '../class/Customer.php';
$customer = new Customer();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer->addCustomer($_POST['customer_name']);
    header("Location: ../index.php?page=customers");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Add Customer</h2>
<form method="POST">
    <label>Customer Name:</label><br>
    <input type="text" name="customer_name" required><br><br>
    <button type="submit" class="btn btn-add">Add Customer</button>
    <a href="../index.php?page=customers" class="btn btn-view">Back</a>
</form>
</body>
</html>
