<?php
require_once __DIR__ . '/../config/db.php';

class Order {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // ✅ Get all orders with customer and employee info
    public function getAllOrders() {
        $stmt = $this->db->query("
            SELECT 
                orders.*,
                customers.customer_name,
                employees.employee_name
            FROM orders
            JOIN customers ON orders.customer_id = customers.customer_id
            JOIN employees ON orders.employee_id = employees.employee_id
            ORDER BY orders.order_id DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Get single order by ID (with join)
    public function getOrderById($id) {
        $stmt = $this->db->prepare("
            SELECT 
                orders.*,
                customers.customer_name,
                employees.employee_name
            FROM orders
            JOIN customers ON orders.customer_id = customers.customer_id
            JOIN employees ON orders.employee_id = employees.employee_id
            WHERE orders.order_id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Create new order
    public function createOrder($customer_id, $employee_id, $total_amount) {
        $stmt = $this->db->prepare("
            INSERT INTO orders (customer_id, employee_id, order_date, total_amount)
            VALUES (?, ?, NOW(), ?)
        ");
        return $stmt->execute([$customer_id, $employee_id, $total_amount]);
    }

    // ✅ Update order info
    public function updateOrder($id, $customer_id, $employee_id, $total_amount) {
        $stmt = $this->db->prepare("
            UPDATE orders
            SET customer_id = ?, employee_id = ?, total_amount = ?
            WHERE order_id = ?
        ");
        return $stmt->execute([$customer_id, $employee_id, $total_amount, $id]);
    }

    // ✅ Delete order
    public function deleteOrder($id) {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE order_id = ?");
        return $stmt->execute([$id]);
    }

    // ✅ Get total sales (sum of all orders)
    public function getTotalSales() {
        $stmt = $this->db->query("SELECT SUM(total_amount) AS total_sales FROM orders");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_sales'];
    }

    // ✅ Get all orders by a specific customer
    public function getOrdersByCustomer($customer_id) {
        $stmt = $this->db->prepare("
            SELECT 
                orders.*,
                employees.employee_name
            FROM orders
            JOIN employees ON orders.employee_id = employees.employee_id
            WHERE orders.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Get all orders handled by a specific employee
    public function getOrdersByEmployee($employee_id) {
        $stmt = $this->db->prepare("
            SELECT 
                orders.*,
                customers.customer_name
            FROM orders
            JOIN customers ON orders.customer_id = customers.customer_id
            WHERE orders.employee_id = ?
        ");
        $stmt->execute([$employee_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
