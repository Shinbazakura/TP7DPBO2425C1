<?php
require_once '../class/Menu_item.php';
$menu = new Menu_item();

$id = $_GET['id'] ?? null;
if ($id) {
    $menu->deleteMenuItem($id);
}

header("Location: ../index.php?page=menu_items");
exit;
?>
