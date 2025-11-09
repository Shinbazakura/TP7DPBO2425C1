<?php
require_once 'class/Customer.php';
require_once 'class/Employee.php';
require_once 'class/Menu_item.php';
require_once 'class/Order.php';

$customer = new Customer();
$employee = new Employee();
$menu = new Menu_item();
$order = new Order();

// Handle order creation (optional example)
if (isset($_POST['place_order'])) {
    $order->createOrder($_POST['customer_id'], $_POST['employee_id'], $_POST['items'], $_POST['total_amount']);
}

// Handle delete actions (optional)
if (isset($_GET['delete_customer'])) {
    $customer->deleteCustomer($_GET['delete_customer']);
}
if (isset($_GET['delete_employee'])) {
    $employee->deleteEmployee($_GET['delete_employee']);
}
if (isset($_GET['delete_menu'])) {
    $menu->deleteMenuItem($_GET['delete_menu']);
}
if (isset($_GET['delete_order'])) {
    $order->deleteOrder($_GET['delete_order']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>

    <main>
        <h2>🍽️ Welcome to Restaurant Management System</h2>
        <nav>
            <a href="?page=customers">Customers</a> |
            <a href="?page=employees">Employees</a> |
            <a href="?page=menu_items">Menu Items</a> |
            <a href="?page=orders">Orders</a>
        </nav>
        <hr>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'customers') include 'view/customers.php';
            elseif ($page == 'employees') include 'view/employees.php';
            elseif ($page == 'menu_items') include 'view/menu_items.php';
            elseif ($page == 'orders') include 'view/orders.php';
        } else {
            echo "<p style='text-align:center;'>Select a section above to manage restaurant data.</p>";
        }
        ?>
    </main>

    <?php include 'view/footer.php'; ?>
</body>
</html>
