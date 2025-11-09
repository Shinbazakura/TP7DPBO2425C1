<?php
require_once __DIR__ . '/../config/db.php';

class Customer {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // ✅ Create (Insert new customer)
    public function addCustomer($customer_name) {
        $stmt = $this->db->prepare("
            INSERT INTO customers (customer_name)
            VALUES (?)
        ");
        return $stmt->execute([$customer_name]);
    }

    // ✅ Read all customers
    public function getAllCustomers() {
        $stmt = $this->db->query("SELECT * FROM customers ORDER BY customer_id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Read single customer by ID
    public function getCustomerById($id) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE customer_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Update customer name
    public function updateCustomer($id, $name) {
        $stmt = $this->db->prepare("
            UPDATE customers 
            SET customer_name = ? 
            WHERE customer_id = ?
        ");
        return $stmt->execute([$name, $id]);
    }

    // ✅ Delete customer
    public function deleteCustomer($id) {
        $stmt = $this->db->prepare("DELETE FROM customers WHERE customer_id = ?");
        return $stmt->execute([$id]);
    }
}
?>
