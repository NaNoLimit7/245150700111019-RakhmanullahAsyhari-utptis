<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white" alt="Postman">
</p>

# 🛒 Backend API Manajemen Produk (E-commerce)

Project ini merupakan tugas UTP berteraskan *Case-based* untuk membangun backend API sederhana menggunakan framework **Laravel**. API ini menangani fitur Manajemen Produk (E-commerce) dengan menerapkan konsep **Non-Database (Mock Data)**, di mana data disimpan sementara di dalam *array* pada Controller.

## 👤 Identitas Mahasiswa
- **NIM:** 245150700111019
- **Nama:** Rakhmanullah Asyhari
- **Kelas:** TIS-E

---

## ✨ Fitur & Endpoint API

API ini mendukung operasi CRUD secara penuh dengan base URL `http://127.0.0.1:8000/api` dan dilengkapi dengan *validation* serta *error handling* (misalnya respons `404 Not Found` jika item tidak ada).

| Method | Endpoint | Deskripsi | Status Code |
| :--- | :--- | :--- | :--- |
| **GET** | `/products` | Mengambil semua daftar produk di katalog | `200 OK` |
| **GET** | `/products/{id}` | Mengambil detail produk berdasarkan ID | `200 OK` / `404` |
| **POST** | `/products` | Menambahkan produk baru ke *array dummy* | `201 Created` / `400` |
| **PUT** | `/products/{id}` | Mengubah seluruh informasi produk | `200 OK` / `404` |
| **PATCH** | `/products/{id}` | Mengubah sebagian data produk (contoh: stok) | `200 OK` / `404` |
| **DELETE** | `/products/{id}` | Menghapus produk dari *array* katalog | `200 OK` / `404` |

---

## 🚀 Panduan Instalasi & Menjalankan Project

Ikuti langkah-langkah berikut untuk menjalankan *project* ini secara lokal:

1. **Clone Repository**
   ```bash
   git clone [https://github.com/](https://github.com/)[USERNAME-GITHUB-KAMU]/[NAMA-REPO-KAMU].git
   cd [NAMA-REPO-KAMU]

2. **Instal Dependensi**
   ```bash
   composer install

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate

4. **Install API**
   ```bash
   php artisan install:api

5. **Jalankan Server**
   ```bash
   php artisan serve