# Frontend

Folder untuk kode front-end aplikasi (UI).

Struktur yang disarankan
- src/ : kode sumber (komponen, halaman, state management)
- public/ : aset statis (index.html, favicon, dll.)
- package.json : dependensi dan script build/start
- .env : variabel lingkungan (mis. FRONTEND_API_URL)

Quickstart (contoh generic frontend)
1. cd frontend
2. npm install
3. cp .env.example .env (set FRONTEND_API_URL=http://localhost:8080)
4. npm start

Cara menghubungkan ke backend (CodeIgniter 4)
- Pastikan CI4 berjalan di http://localhost:8080 atau sesuaikan FRONTEND_API_URL
- Gunakan variabel lingkungan FRONTEND_API_URL untuk base API. Contoh: fetch(`${process.env.FRONTEND_API_URL}/api/hello`)

Scripts umum
- npm run build : build produksi
- npm test : jalankan tes
- npm run lint : cek linting
- npm run format : format kode

Konfigurasi
- Gunakan variabel lingkungan untuk base API (mis. FRONTEND_API_URL)
- Tambahkan konfigurasi ESLint/Prettier sesuai kebutuhan
- Tambahkan proxy dev server jika perlu (mis. Vite/CRA proxy)
