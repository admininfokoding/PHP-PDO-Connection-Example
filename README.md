# 🐘 PHP PDO Connection Example

[![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

A simple, secure, and beginner-friendly example showing how to connect **PHP** to **MySQL** using **PDO (PHP Data Objects)**.

This repository is intended for developers learning secure database access with PHP and serves as a practical companion to the complete tutorial published on **InfoKoding**.

---

# 📖 Complete Tutorial

Learn PHP PDO step by step in Indonesian:

## 👉 https://infokoding.com/tutorial/backend/koneksi-database-mysql-dengan-pdo

The tutorial explains:

- Installing PHP
- Installing MySQL
- Creating Database
- Creating Tables
- Connecting PHP to MySQL using PDO
- Prepared Statements
- SQL Injection Prevention
- CRUD Operations
- Error Handling
- Best Practices

---

# ✨ Features

- PHP 8+
- MySQL Support
- PDO Extension
- Secure Database Connection
- Prepared Statements
- Exception Handling
- UTF-8 Encoding
- Clean Source Code
- Easy Configuration
- Beginner Friendly
- Open Source

---

# 📂 Project Structure

```text
PHP-PDO-Connection-Example/

├── config/
├── database.php
├── index.php
├── .env.example
└── README.md
```

---

# 🚀 Quick Start

Clone repository

```bash
git clone https://github.com/admininfokoding/PHP-PDO-Connection-Example.git
```

Move into project

```bash
cd PHP-PDO-Connection-Example
```

Configure your database

```php
$host = "localhost";
$dbname = "example";
$username = "root";
$password = "";
```

Run with your preferred PHP server.

---

# Example Connection

```php
<?php

try {

    $pdo = new PDO(
        "mysql:host=localhost;dbname=example;charset=utf8mb4",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

    echo "Database Connected Successfully";

} catch (PDOException $e) {

    die($e->getMessage());

}
```

---

# Why Use PDO?

PDO is the recommended way to access databases in modern PHP applications because it provides:

- Prepared Statements
- SQL Injection Protection
- Better Error Handling
- Multiple Database Drivers
- Object-Oriented Interface
- Consistent API

---

# 📚 Learn More

If you're learning backend development, don't stop at the example code.

Read the complete guide on InfoKoding:

## https://infokoding.com/tutorial/backend/koneksi-database-mysql-dengan-pdo

You'll learn not only how to connect to MySQL, but also how to build secure CRUD applications using PHP PDO.

---

# 🌍 About InfoKoding

**InfoKoding** is an Indonesian learning platform focused on programming, networking, Linux, web development, and free online developer tools.

Useful resources:

- 🌐 https://infokoding.com
- 📚 https://infokoding.com/tutorial
- 🐘 https://infokoding.com/tutorial/backend/koneksi-database-mysql-dengan-pdo
- 🛠️ https://infokoding.com/tools
- 🔐 https://infokoding.com/tools/password-generator

---

# 🤝 Contributing

Contributions are welcome.

Feel free to fork this repository, improve the project, and submit a Pull Request.

---

# 📄 License

MIT License

---

⭐ If this repository helps you, please consider giving it a **Star**.

Made with ❤️ by **InfoKoding**

https://infokoding.com
