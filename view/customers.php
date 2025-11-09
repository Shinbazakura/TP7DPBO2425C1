<?php
require_once 'class/Customer.php';
$customer = new Customer();
?>

<h3>Customer List</h3>
<a href="forms/add_customer.php" class="btn btn-success btn-success:hover">Add Customer</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($customer->getAllCustomers() as $c): ?>
    <tr>
        <td><?= htmlspecialchars($c['customer_id']) ?></td>
        <td><?= htmlspecialchars($c['customer_name']) ?></td>
        <td>
            <a href="forms/edit_customer.php?id=<?= $c['customer_id'] ?>" class="btn btn:hover">Edit</a> |
            <a href="forms/delete_customer.php?id=<?= $c['customer_id'] ?>" class="btn btn-danger btn-danger:hover" onclick="return confirm('Delete this customer?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
