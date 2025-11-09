<?php
require_once 'class/Menu_item.php';
$menu = new Menu_item();
?>

<h3>Menu Item List</h3>
<a href="forms/add_menu_item.php" class="btn btn-success btn-success:hover">Add Menu Item</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($menu->getAllMenu() as $m): ?>
    <tr>
        <td><?= htmlspecialchars($m['item_id']) ?></td>
        <td><?= htmlspecialchars($m['item_name']) ?></td>
        <td><?= htmlspecialchars($m['category']) ?></td>
        <td><?= number_format($m['price'], 2) ?></td>
        <td>
            <a href="forms/edit_menu_item.php?id=<?= $m['item_id'] ?>" class="btn btn:hover">Edit</a> |
            <a href="forms/delete_menu_item.php?id=<?= $m['item_id'] ?>" class="btn btn-danger btn-danger:hover" onclick="return confirm('Delete this item?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
