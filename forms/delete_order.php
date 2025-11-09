<?php
require_once '../class/Order.php';
$order = new Order();

$id = $_GET['id'] ?? null;
if ($id) {
    $order->deleteOrder($id);
}

header("Location: ../index.php?page=orders");
exit;
?>
