````markdown name=api-layer/README.md
# API Layer (CodeIgniter 4) - MVP

Folder ini berisi contoh minimum untuk endpoint API sederhana menggunakan CodeIgniter 4.

Isi yang ditambahkan:
- app/Controllers/Api/Data.php : controller contoh yang mengembalikan data mock
- routes.api.php : snippet rute yang bisa Anda gabungkan ke `app/Config/Routes.php`
- .env.example : contoh konfigurasi environment lokal

Langkah cepat untuk menjalankan (jika belum ada project CI4):
1. Buat project CI4 di folder ini:
   composer create-project codeigniter4/appstarter api-layer
2. Salin file controller contoh ke `api-layer/app/Controllers/Api/Data.php` (overwrite jika perlu)
3. Gabungkan snippet `routes.api.php` ke file `api-layer/app/Config/Routes.php` (atau tambahkan group `api` sesuai contoh)
4. Salin `.env.example` menjadi `.env` dan sesuaikan nilai (app.baseURL dan database)
5. Pastikan folder writable:
   chmod -R 0777 api-layer/writable
6. Jalankan server dev:
   cd api-layer
   php spark serve --host=0.0.0.0 --port=8080

Contoh endpoint (setelah berjalan):
- GET /api/data -> mengembalikan JSON: { "data": "Data dari API - MOCK" }

CORS
Untuk memanggil API dari frontend (lokal berbeda origin), aktifkan CORS.
- Anda bisa menambahkan filter CORS di `app/Config/Filters.php` atau menggunakan paket CORS.

Catatan
- `routes.api.php` disediakan sebagai file snippet agar tidak menimpa konfigurasi `app/Config/Routes.php` yang mungkin sudah ada.
- Jika Anda memilih men-deploy API bersama frontend, sesuaikan `BASE_API` di `frontend/index.html`.
````