# Janji
Saya Muhammad Attala Rafikasya dengan NIM 2403310 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Restaurant Management System

Sistem ini dibuat untuk **mengelola data restoran** termasuk **Customers**, **Employees**, **Menu Items**, dan **Orders**. Sistem ini menggunakan **PHP** (PDO), **MySQL**, dan CSS sederhana untuk tampilan.

---

## Struktur Folder

```
project/
│
├─ config/
│  └─ db.php            # Koneksi database
│
├─ class/
│  ├─ Customer.php      # CRUD customer
│  ├─ Employee.php      # CRUD employee
│  ├─ Menu_item.php     # CRUD menu item
│  └─ Order.php         # CRUD order
│
├─ view/                # Halaman daftar/tabel
│  ├─ header.php
│  ├─ footer.php
│  ├─ customers.php
│  ├─ employees.php
│  ├─ menu_items.php
│  └─ orders.php
│
├─ forms/               # Halaman tambah, edit, dan delete
│  ├─ add_customer.php
│  ├─ edit_customer.php
│  ├─ delete_customer.php
│  ├─ add_employee.php
│  ├─ edit_employee.php
│  ├─ delete_employee.php
│  ├─ add_menu_item.php
│  ├─ edit_menu_item.php
│  ├─ delete_menu_item.php
│  ├─ add_order.php
│  ├─ edit_order.php
│  └─ delete_order.php
│
├─ style.css            # CSS untuk tombol dan tabel
└─ index.php            # Halaman utama / router
```

---

## Fitur

1. **Customers**

   * Tambah, edit, hapus customer.
   * Lihat daftar semua customer.

2. **Employees**

   * Tambah, edit, hapus employee.
   * Lihat daftar semua employee.

3. **Menu Items**

   * Tambah, edit, hapus menu item.
   * Lihat daftar semua menu item.
   * Kategori: Food, Drink, Dessert.

4. **Orders**

   * Tambah, edit, hapus order.
   * Lihat daftar semua order beserta nama customer & employee.
   * Total amount dapat diinput manual.

---

## Cara Menggunakan

1. **Import Database**

   * Buat database MySQL.
   * Import tabel:

     * `customers`
     * `employees`
     * `menu_items`
     * `orders`

2. **Konfigurasi Database**

   * Edit file `config/db.php` untuk menyesuaikan:

     ```php
     private $host = "localhost";
     private $db_name = "nama_database";
     private $username = "root";
     private $password = "";
     ```

3. **Jalankan di Browser**

   * Akses `index.php`.
   * Navigasi menggunakan menu:

     * Customers | Employees | Menu Items | Orders
   * Gunakan tombol **Add**, **Edit**, dan **Delete** untuk mengelola data.

4. **CRUD**

   * Semua operasi dilakukan menggunakan **prepared statement** (PDO).
   * Delete langsung menghapus data tanpa konfirmasi tambahan.

---

## Struktur Kelas

* `Customer.php` → CRUD untuk tabel `customers`.
* `Employee.php` → CRUD untuk tabel `employees`.
* `Menu_item.php` → CRUD untuk tabel `menu_items`.
* `Order.php` → CRUD untuk tabel `orders`.

Setiap kelas memiliki metode:

* `getAll...()` → mengambil semua data.
* `get...ById($id)` → mengambil data berdasarkan ID.
* `add...()` → menambahkan data baru.
* `update...()` → mengedit data.
* `delete...()` → menghapus data.

---

## Tampilan

* Tabel menggunakan CSS sederhana (`style.css`).

---

## Catatan

* Sistem ini dibuat untuk **keperluan belajar dan latihan CRUD**.
* Untuk penggunaan production, disarankan menambahkan:

  * Validasi input lebih ketat
  * Proteksi CSRF
  * Autentikasi user

---

## Dokumentasi
https://github.com/user-attachments/assets/4f403304-11d0-411a-b624-a53b599eb7f6

