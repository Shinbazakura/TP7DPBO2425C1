<?php
require_once __DIR__ . '/../config/db.php';

class Employee {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // ✅ Create (Insert new employee)
    public function addEmployee($employee_name, $role, $hire_date) {
        $stmt = $this->db->prepare("
            INSERT INTO employees (employee_name, role, hire_date)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$employee_name, $role, $hire_date]);
    }

    // ✅ Read all employees
    public function getAllEmployees() {
        $stmt = $this->db->query("SELECT * FROM employees ORDER BY employee_id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Read single employee by ID
    public function getEmployeeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE employee_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Update employee info
    public function updateEmployee($id, $employee_name, $role, $hire_date) {
        $stmt = $this->db->prepare("
            UPDATE employees 
            SET employee_name = ?, role = ?, hire_date = ?
            WHERE employee_id = ?
        ");
        return $stmt->execute([$employee_name, $role, $hire_date, $id]);
    }

    // ✅ Update only name (simple version)
    public function updateName($id, $name) {
        $stmt = $this->db->prepare("
            UPDATE employees 
            SET employee_name = ? 
            WHERE employee_id = ?
        ");
        return $stmt->execute([$name, $id]);
    }

    // ✅ Delete employee
    public function deleteEmployee($id) {
        $stmt = $this->db->prepare("DELETE FROM employees WHERE employee_id = ?");
        return $stmt->execute([$id]);
    }
}
?>
