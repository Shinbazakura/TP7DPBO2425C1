<?php
require_once 'class/Order.php';
$order = new Order();
?>

<h3>Order List</h3>
<a href="forms/add_order.php" class="btn btn-success btn-success:hover">Add Order</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Employee</th>
        <th>Order Date</th>
        <th>Total Amount</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($order->getAllOrders() as $o): ?>
    <tr>
        <td><?= htmlspecialchars($o['order_id']) ?></td>
        <td><?= htmlspecialchars($o['customer_name']) ?></td>
        <td><?= htmlspecialchars($o['employee_name']) ?></td>
        <td><?= htmlspecialchars($o['order_date']) ?></td>
        <td><?= number_format($o['total_amount'], 2) ?></td>
        <td>
            <a href="forms/edit_order.php?id=<?= $o['order_id'] ?>" class="btn btn:hover">Edit</a> |
            <a href="forms/delete_order.php?id=<?= $o['order_id'] ?>" class="btn btn-danger btn-danger:hover" onclick="return confirm('Delete this order?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
