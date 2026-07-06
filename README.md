# PHP PDO MySQL Connection Example

Repositori ini adalah contoh kode murni untuk modul tutorial **[Pengenalan Database MySQL](https://infokoding.com/tutorial/backend/pengenalan-database-mysql)** di situs pembelajaran Infokoding.

Program ini mendemonstrasikan bagaimana menyambungkan skrip sisi peladen PHP ke MySQL menggunakan antarmuka standar modern: **PDO (PHP Data Objects)**.

## Mengapa menggunakan PDO?
- **Keamanan Kuat**: Melindungi dari serangan SQL Injection melalui fitur *Prepared Statements*.
- **Multi-Database**: Jika kelak Anda pindah dari MySQL ke PostgreSQL, Anda tidak perlu mengubah fungsi-fungsi utama aplikasi, cukup menyesuaikan `DSN`.
- **Standar Industri**: Tidak bergantung pada fungsi lawas `mysqli_` yang rentan akan kebocoran memori.

## Fitur Contoh Kode
- Implementasi API REST Sederhana.
- Penanganan rute `GET` (Membaca data dari database).
- Penanganan rute `POST` (Menambahkan baris data menggunakan Parameter Binding).
- Blok pengecualian `try-catch` terpusat untuk *Error Handling*.

## Cara Menjalankan
1. Pastikan Anda memiliki PHP (misal: instalasi XAMPP) dan ekstensi `pdo_mysql` aktif di `php.ini`.
2. Buat database `belajar_backend_db` di phpMyAdmin.
3. Buat tabel `users` dengan query SQL berikut:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
```
4. Pindah ke direktori skrip ini menggunakan Terminal/Command Prompt:
```bash
cd PHP-PDO-Connection-Example
```
5. Jalankan *built-in server* PHP:
```bash
php -S localhost:8000
```
6. Tes antarmuka (API) menggunakan Postman atau ketik URL `http://localhost:8000/` di *browser*.
