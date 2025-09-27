# 🗳️ Platform Pemilihan Ketua OSIS  

![Laravel](https://img.shields.io/badge/Laravel-10.x-red?logo=laravel)  
![Next.js](https://img.shields.io/badge/Next.js-14-black?logo=next.js)  
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?logo=tailwindcss)  
![MySQL](https://img.shields.io/badge/MySQL-8-blue?logo=mysql)  
![License](https://img.shields.io/badge/License-MIT-green)  
![Status](https://img.shields.io/badge/Status-Development-yellow)  

Aplikasi **Platform Pemilihan Ketua OSIS** adalah sistem e-voting berbasis web yang dirancang untuk mempermudah proses pemilihan ketua OSIS secara **aman, transparan, dan efisien**.  
Dibangun menggunakan **Laravel** sebagai backend (API) dan **Next.js** sebagai frontend (UI).  

---

## 🚀 Fitur Utama
✅ Login untuk admin, panitia, dan pemilih  
✅ Manajemen kandidat (CRUD)  
✅ Proses voting sekali pilih  
✅ Hasil voting real-time  
✅ Dashboard admin interaktif  
✅ Tampilan modern & responsif  

---

## 🛠️ Tech Stack
- **Backend** : [Laravel](https://laravel.com/)  
- **Frontend** : [Next.js](https://nextjs.org/) + [TailwindCSS](https://tailwindcss.com/)  
- **Database** : MySQL / PostgreSQL  
- **Authentication** : Laravel Sanctum / JWT  
- **Deployment** : Vercel / VPS / Docker  

---

## 📂 Struktur Proyek
```bash
project-root/
├── backend/ # Laravel API
│ ├── app/
│ ├── routes/
│ └── ...
├── frontend/ # Next.js frontend
│ ├── components/
│ ├── pages/
│ └── ...
└── README.md
```

## ⚙️ Instalasi & Menjalankan Proyek

### 1. Clone Repository
```bash
git clone https://github.com/username/pemilihan-osis.git
cd pemilihan-osis
```
### 2. Setup Backend (Laravel)
```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
Laravel akan berjalan di http://localhost:8000.

### 3. Setup Frontend (Next.js)
```bash
cd frontend
cp .env.example .env.local
npm install
npm run dev
```
Next.js akan berjalan di http://localhost:3000
---
## 🔑 Akun Default
Jika menggunakan seeder:

Admin

Email: admin@osis.com

Password: password

Pemilih (Siswa)

Email: siswa@osis.com

Password: password
---
## 📸 Demo Screenshot
(No Demo at the moment)
---
## 🤝 Kontribusi
-Fork repositori ini
-Buat branch baru (git checkout -b fitur-baru)
-Commit perubahan (git commit -m 'Tambah fitur X')
-Push ke branch (git push origin fitur-baru)
-Buat Pull Request
---
## 📜 Lisensi
Proyek ini dilisensikan di bawah MIT License.
Silakan gunakan, ubah, dan kembangkan sesuai kebutuhan.
---
## 👨‍💻 Author
Dikembangkan oleh Rizkymocin
📧 Email: rizky.mohi30@gmail.com
