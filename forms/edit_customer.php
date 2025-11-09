<?php
require_once '../class/Customer.php';
$customer = new Customer();

$id = $_GET['id'] ?? null;
if (!$id) die("Missing customer ID");

$data = $customer->getCustomerById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer->updateCustomer($id, $_POST['customer_name']);
    header("Location: ../index.php?page=customers");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Edit Customer</h2>
<form method="POST">
    <label>Customer Name:</label><br>
    <input type="text" name="customer_name" value="<?= htmlspecialchars($data['customer_name']) ?>" required><br><br>
    <button type="submit" class="btn btn-edit">Save Changes</button>
    <a href="../index.php?page=customers" class="btn btn-view">Cancel</a>
</form>
</body>
</html>
