# Scholarship Project

## Deskripsi

Project Scholarship adalah aplikasi web yang dibangun menggunakan Laravel sebagai framework untuk back-end (BE) dan front-end (FE). Aplikasi ini dirancang untuk memfasilitasi proses pendaftaran, pengelolaan, dan distribusi beasiswa kepada para calon penerima.

## Fitur Utama

- **Pendaftaran Pengguna:** Pengguna dapat mendaftar dan membuat akun untuk mengakses fitur aplikasi.
- **Pengelolaan Beasiswa:** Admin dapat menambah, mengedit, dan menghapus informasi beasiswa.
- **Pendaftaran Beasiswa:** Calon penerima beasiswa dapat mendaftar untuk berbagai program beasiswa yang tersedia.
- **Sistem Notifikasi:** Pemberitahuan kepada pengguna tentang status pendaftaran dan informasi penting lainnya.

## Teknologi yang Digunakan

- **Back-End:** Laravel
- **Front-End:** Laravel Blade, CSS, JavaScript
- **Database:** MySQL

## Instalasi

1. Clone repository ini ke dalam direktori lokal Anda.
   ```bash
   git clone <URL-repository>
   ```

2. Masuk ke direktori project.
   ```bash
   cd scholarship-project
   ```

3. Instal dependensi menggunakan Composer.
   ```bash
   composer install
   ```

4. Buat file `.env` dan sesuaikan konfigurasi database.
   ```bash
   cp .env.example .env
   ```

5. Jalankan migrasi untuk membuat tabel di database.
   ```bash
   php artisan migrate
   ```

6. Jalankan server lokal.
   ```bash
   php artisan serve
   ```

## Kontribusi

Silakan buka issue atau ajukan pull request jika Anda ingin berkontribusi pada project ini.
