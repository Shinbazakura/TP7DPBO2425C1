<?php
require_once __DIR__ . '/../config/db.php';

class Menu_item {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // ✅ Create (Insert new menu item)
    public function addMenuItem($item_name, $category, $price) {
        $stmt = $this->db->prepare("
            INSERT INTO menu_items (item_name, category, price)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$item_name, $category, $price]);
    }

    // ✅ Read all menu items
    public function getAllMenu() {
        $stmt = $this->db->query("SELECT * FROM menu_items ORDER BY item_id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Read single menu item by ID
    public function getMenuById($id) {
        $stmt = $this->db->prepare("SELECT * FROM menu_items WHERE item_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Update menu item
    public function updateMenuItem($id, $item_name, $category, $price) {
        $stmt = $this->db->prepare("
            UPDATE menu_items 
            SET item_name = ?, category = ?, price = ? 
            WHERE item_id = ?
        ");
        return $stmt->execute([$item_name, $category, $price, $id]);
    }

    // ✅ Delete menu item
    public function deleteMenuItem($id) {
        $stmt = $this->db->prepare("DELETE FROM menu_items WHERE item_id = ?");
        return $stmt->execute([$id]);
    }
}
?>
