<?php
require_once '../class/Customer.php';
$customer = new Customer();

$id = $_GET['id'] ?? null;
if ($id) {
    $customer->deleteCustomer($id);
}

header("Location: ../index.php?page=customers");
exit;
?>
