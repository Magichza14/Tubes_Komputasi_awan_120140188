# API Layer (CodeIgniter 4)

Folder untuk backend API menggunakan CodeIgniter 4 (CI4).

Struktur yang disarankan (CI4)
- app/
  - Controllers/ : endpoint API (mis. Api/Hello.php)
  - Models/ : model untuk akses data
  - Filters/ : middleware (mis. CORS, auth)
  - Config/ : Routes.php, App.php, Database.php
  - Validation/ : rules untuk input
- public/ : entrypoint web server (index.php)
- writable/ : cache, logs, uploads (pastikan writable oleh webserver)
- composer.json
- .env (lokal, jangan commit)
- tests/ : unit/integration tests
- Dockerfile, docker-compose.yml (opsional)

Persyaratan
- PHP 7.4+ (sesuai kebutuhan CI4 versi yang dipakai)
- Composer
- Database (MySQL/Postgres/SQLite) sesuai konfigurasi

Quickstart lokal (clone existing repo)
1. cd api-layer
2. composer install
3. cp env .env            # atau salin file .env.example jika tersedia
4. Edit .env: sesuaikan database, app.baseURL (mis. app.baseURL = 'http://localhost:8080')
5. Pastikan folder writable dapat ditulis:
   chmod -R 0777 writable
6. Jalankan development server:
   php spark serve --host=0.0.0.0 --port=8080
7. Akses health check / sample endpoint: http://localhost:8080/api/hello

Inisialisasi project (jika belum ada)
- Buat skeleton CI4:
  composer create-project codeigniter4/appstarter api-layer
- Masuk ke folder:
  cd api-layer
- Atur .env, baseURL, database, lalu jalankan php spark serve

Contoh endpoint sederhana
- app/Controllers/Api/Hello.php
  - method index() mengembalikan JSON { "message": "Hello from CI4 API" }
- Routes: tambahkan pada app/Config/Routes.php
  $routes->group('api', function($routes){
    $routes->get('hello', 'Api\Hello::index');
  });

CORS / Keamanan
- Untuk dipanggil oleh frontend, tambahkan filter CORS (atau gunakan paket/community CORS)
- Atur CSRF hanya pada rute yang perlu (untuk API token/Stateless, biasanya CSRF dimatikan dan digantikan auth JWT)
- Validasi input dengan Validation library dan sanitize output

Autentikasi & otorisasi (opsional)
- Gunakan JWT / OAuth untuk API stateless
- Simpan secret di .env (JWT_SECRET)
- Buat middleware (Filter) untuk memeriksa token pada route group /api yang protected

Database / Migrations
- Gunakan Migration dan Seeder:
  php spark migrate
  php spark db:seed NamaSeeder
- Simpan skema di app/Database/Migrations dan Seeder di app/Database/Seeds

Testing & CI
- Tambahkan unit/integration tests di folder tests/
- Setup GitHub Actions untuk:
  - composer install
  - menjalankan php -v checks
  - menjalankan phpunit
  - menjalankan static analysis (optional) seperti phpstan

Docker (opsional)
- Buat Dockerfile berbasis php:fpm + composer dan docker-compose.yml dengan service db, php, nginx
- Pastikan public/ dipetakan ke Nginx root

Health check & monitoring
- Tambahkan route /health yang mengembalikan status aplikasi dan koneksi DB
- Siapkan logging (writable/logs) dan monitoring endpoint jika perlu

Contoh checklist awal
- [ ] Inisialisasi CodeIgniter 4 project (composer create-project)
- [ ] Tambahkan route /api/hello dan controller contoh
- [ ] Konfigurasi .env dan database
- [ ] Buat migration & seed awal untuk tabel yang diperlukan
- [ ] Tambahkan filter CORS dan middleware auth JWT (jika perlu)
- [ ] Tambahkan Dockerfile dan docker-compose (opsional)
- [ ] Tambahkan CI pipeline (GitHub Actions) untuk build/test

Contoh minimal controller (referensi)
```php
<?php namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Hello extends ResourceController
{
    public function index()
    {
        return $this->respond(['message' => 'Hello from CI4 API']);
    }
}
