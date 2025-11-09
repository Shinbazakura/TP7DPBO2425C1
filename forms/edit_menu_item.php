<?php
require_once '../class/Menu_item.php';
$menu = new Menu_item();

$id = $_GET['id'] ?? null;
if (!$id) die("Missing item ID");

$data = $menu->getMenuById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menu->updateMenuItem($id, $_POST['item_name'], $_POST['category'], $_POST['price']);
    header("Location: ../index.php?page=menu_items");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Edit Menu Item</h2>
<form method="POST">
    <label>Item Name:</label><br>
    <input type="text" name="item_name" value="<?= htmlspecialchars($data['item_name']) ?>" required><br>
    <label>Category:</label><br>
    <select name="category" required>
        <option value="Food" <?= $data['category']=='Food'?'selected':'' ?>>Food</option>
        <option value="Drink" <?= $data['category']=='Drink'?'selected':'' ?>>Drink</option>
        <option value="Dessert" <?= $data['category']=='Dessert'?'selected':'' ?>>Dessert</option>
    </select><br>
    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required><br><br>
    <button type="submit" class="btn btn-edit">Save Changes</button>
    <a href="../index.php?page=menu_items" class="btn btn-view">Cancel</a>
</form>
</body>
</html>
