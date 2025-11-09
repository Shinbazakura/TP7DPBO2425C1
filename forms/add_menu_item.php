<?php
require_once '../class/Menu_item.php';
$menu = new Menu_item();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menu->addMenuItem($_POST['item_name'], $_POST['category'], $_POST['price']);
    header("Location: ../index.php?page=menu_items");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Menu Item</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Add Menu Item</h2>
<form method="POST">
    <label>Item Name:</label><br>
    <input type="text" name="item_name" required><br>
    <label>Category:</label><br>
    <select name="category" required>
        <option value="Food">Food</option>
        <option value="Drink">Drink</option>
        <option value="Dessert">Dessert</option>
    </select><br>
    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>
    <button type="submit" class="btn btn-add">Add Item</button>
    <a href="../index.php?page=menu_items" class="btn btn-view">Back</a>
</form>
</body>
</html>
