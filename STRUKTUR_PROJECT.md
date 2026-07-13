# 📚 Dokumentasi Struktur Project Karang Taruna

> Panduan lengkap untuk memahami struktur folder, file, dan cara kerja web Karang Taruna Desa Pilangsari

---

## **1. FILE `app.blade.php` - Template Publik**

**Lokasi:** `resources/views/layouts/app.blade.php`

Ini adalah **template induk** yang membungkus semua halaman publik. Berikut struktur dan penjelasannya:

```blade
<!DOCTYPE html>
<html lang="id">
<head>
    {{-- METADATA & SEO --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="..."> ← Deskripsi di Google
    <meta name="keywords" content="...">     ← Kata kunci SEO
    <meta property="og:image" content="..."> ← Gambar saat share ke FB/WA

    {{-- CSS & VITE (Build Tool) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- NAVBAR (hanya di halaman beranda) --}}
    @if(request()->routeIs('beranda'))
        @include('partials.navbar')
    @endif

    {{-- MAIN CONTENT (tempat konten berubah-ubah) --}}
    <main class="page-enter">
        @yield('content')  ← KONTEN BERBEDA SETIAP HALAMAN MASUK KE SINI
    </main>

    {{-- FOOTER (tampil di semua halaman) --}}
    @include('partials.footer')

    {{-- FLOATING WHATSAPP WIDGET --}}
    ...
</body>
</html>
```

### **Yang Bisa Diubah di `app.blade.php`:**

| Item          | Lokasi                        | Untuk Apa                      |
| ------------- | ----------------------------- | ------------------------------ |
| Title Website | `<title>` tag                 | Judul di tab browser           |
| Favicon       | `<link rel="icon">`           | Ikon kecil di tab browser      |
| Deskripsi     | `<meta name="description">`   | Teks di hasil pencarian Google |
| Warna Brand   | `<meta theme-color>`          | Warna URL bar di mobile        |
| Navbar        | `@include('partials.navbar')` | Menu atas (logo, link menu)    |
| Footer        | `@include('partials.footer')` | Menu bawah, info kontak        |
| CSS Global    | `resources/css/app.css`       | Warna, font, style umum        |
| JS Global     | `resources/js/app.js`         | Script umum (Alpine.js, dll)   |

---

## **2. FOLDER `resources/` - Penjelasan Lengkap**

```
resources/
├── views/              ← TAMPILAN (HTML yang user lihat)
│   ├── landing/        ← Halaman depan publik
│   ├── berita/         ← Halaman daftar & detail berita
│   ├── kegiatan/       ← Halaman daftar & detail kegiatan
│   ├── galeri/         ← Halaman galeri foto
│   ├── anggota/        ← Halaman struktur organisasi
│   ├── layouts/        ← Template dasar
│   │   ├── app.blade.php      (template publik)
│   │   └── admin.blade.php    (template admin)
│   ├── partials/       ← Komponen yang dipakai ulang
│   │   ├── navbar.blade.php   (menu atas)
│   │   └── footer.blade.php   (menu bawah)
│   ├── admin/          ← Halaman admin/dashboard
│   ├── auth/           ← Login & register
│   └── profile/        ← Profil user
│
├── css/                ← STYLING (penampilan)
│   ├── app.css         ← CSS utama (Tailwind, warna brand, dll)
│   └── ...
│
├── js/                 ← JAVASCRIPT (interaktif)
│   ├── app.js          ← JS utama (Alpine.js, fungsi umum)
│   ├── components/     ← Komponen JS
│   └── ...
│
└── images/ (sebenarnya di public/)
    ├── program.jpeg
    ├── ikkapii-logo.png
    ├── About.png
    └── ...
```

---

## **3. PENJELASAN MASING-MASING FILE RESOURCES**

### **📋 `resources/views/` - TAMPILAN**

#### **Halaman Landing (Publik):**

```
landing/
├── beranda.blade.php          → Halaman HOME (hero, tentang, program kerja, etc)
├── tentang.blade.php          → Halaman "Tentang Kami" (misi, visi, sejarah)
├── sejarah.blade.php          → Halaman "Sejarah" Karang Taruna
├── pengumuman.blade.php       → Halaman "Pengumuman" terbaru
├── dasar-hukum.blade.php      → Halaman "Landasan Hukum"
├── dokumentasi.blade.php      → Halaman "Dokumentasi" (struktur, dll)
├── klub.blade.php             → Halaman "Klub & Komunitas"
├── umkm.blade.php             → Halaman "UMKM" produk pemuda
├── daftar.blade.php           → Halaman "Pendaftaran Anggota Baru"
├── aspirasi.blade.php         → Halaman "Kotak Aspirasi"
└── unduhan.blade.php          → Halaman "Download dokumen & logo"
```

#### **Halaman Konten:**

```
berita/
├── index.blade.php            → Daftar BERITA terbaru
└── show.blade.php             → Detail satu berita

kegiatan/
├── index.blade.php            → Daftar KEGIATAN
└── show.blade.php             → Detail satu kegiatan

galeri/
└── index.blade.php            → Galeri FOTO kegiatan

anggota/
└── index.blade.php            → STRUKTUR ORGANISASI & daftar anggota
```

#### **Halaman Admin (Dashboard):**

```
admin/
├── dashboard/
│   └── index.blade.php        → Dashboard utama (statistik, chart)
├── berita/
│   ├── index.blade.php        → Kelola daftar berita
│   ├── create.blade.php       → Tambah berita baru
│   ├── edit.blade.php         → Edit berita
│   └── show.blade.php         → Lihat detail berita
├── kegiatan/                  → Sama seperti berita
├── users/                     → Kelola user/admin
├── galeri/                    → Kelola foto
├── anggota/                   → Kelola data anggota
├── pengumuman/                → Kelola pengumuman
└── kontak/                    → Lihat pesan kontak masuk
```

#### **Halaman Autentikasi:**

```
auth/
├── login.blade.php            → Halaman login admin
└── register.blade.php         → Halaman registrasi (jika ada)
```

#### **Template & Komponen:**

```
layouts/
├── app.blade.php              → Template untuk halaman publik
└── admin.blade.php            → Template untuk dashboard admin

partials/
├── navbar.blade.php           → Menu atas (logo, link)
└── footer.blade.php           → Menu bawah, kontak
```

---

### **🎨 `resources/css/` - STYLING**

```
css/
├── app.css                    → File CSS utama
    ├── Tailwind CSS framework (utility classes)
    ├── Warna brand (gold #D4AF37, navy #07112B)
    ├── Font Poppins
    ├── Animasi AOS (fade-up, fade-left, dll)
    └── Custom CSS khusus project
```

**Yang bisa diubah di sini:**

- ✏️ Warna brand (primary, secondary)
- ✏️ Font (Poppins, dll)
- ✏️ Ukuran padding, margin
- ✏️ Animasi custom
- ✏️ Responsive breakpoint

---

### **⚙️ `resources/js/` - JAVASCRIPT**

```
js/
├── app.js                     → File JS utama
    ├── Alpine.js (reactive UI)
    ├── AOS (scroll animation)
    ├── Fungsi custom (toggle menu, dll)
    └── Event listeners
├── bootstrap.js               → Bootstrap config
└── components/
    └── ...custom JS components
```

**Yang ada di sini:**

- Interaksi menu (hamburger di mobile)
- Animasi saat scroll
- Form handling
- Dark mode toggle (jika ada)
- Alpine.js directives (@click, x-if, dll)

---

## **4. ALUR LENGKAP CARA KERJA WEB**

```
User buka browser → http://localhost:8000/kegiatan

1. Laravel route (routes/web.php)
   → tentukan controller mana yang handle request

2. Controller (app/Http/Controllers/)
   → ambil data dari database, proses logic

3. Controller return view
   → panggil file view tertentu dengan data

4. View (resources/views/kegiatan/index.blade.php)
   ├── Extend template → @extends('layouts.app')
   ├── Isi content → @section('content') ... @endsection
   ├── Load navbar dari → @include('partials.navbar')
   ├── Load footer dari → @include('partials.footer')
   └── Pakai CSS dari → resources/css/app.css

5. Browser render HTML + CSS + JS
   → User lihat halaman kegiatan di layar
```

---

## **5. FILE KONFIGURASI PENTING**

```
config/
├── app.php                    → Nama app, timezone, locale (Indonesia)
├── database.php               → Koneksi database
├── mail.php                   → Konfigurasi email (SMTP, dll)
└── ...
```

---

## **6. YANG SERING DIUBAH**

| Kebutuhan            | File                                        | Perubahan                        |
| -------------------- | ------------------------------------------- | -------------------------------- |
| Ubah warna brand     | `resources/css/app.css`                     | Ganti hex color                  |
| Ubah menu navbar     | `resources/views/partials/navbar.blade.php` | Tambah/hapus link menu           |
| Ubah footer kontak   | `resources/views/partials/footer.blade.php` | Ubah nomor WA, email, dll        |
| Ubah halaman beranda | `resources/views/landing/beranda.blade.php` | Ubah teks, gambar, layout        |
| Ubah template admin  | `resources/views/layouts/admin.blade.php`   | Ubah sidebar, styling            |
| Ubah title website   | `resources/views/layouts/app.blade.php`     | Edit `<title>` tag               |
| Ubah deskripsi SEO   | `resources/views/layouts/app.blade.php`     | Edit `<meta name="description">` |

---

## **7. STRUKTUR FOLDER LENGKAP PROJECT**

```
kartar_pilangsari/
│
├── app/                       ← LOGIC (Backend)
│   ├── Http/
│   │   ├── Controllers/       ← Handler request (logic bisnis)
│   │   ├── Middleware/        ← Filter request (auth, role, dll)
│   │   └── Requests/          ← Validasi form
│   ├── Models/                ← Database models (Anggota, Berita, dll)
│   ├── Providers/             ← Service providers
│   └── Exports/               ← Export ke Excel/CSV
│
├── config/                    ← KONFIGURASI
│   ├── app.php                ← Nama, timezone, locale
│   ├── database.php           ← Koneksi DB
│   ├── mail.php               ← Email config
│   └── ...
│
├── database/                  ← DATABASE
│   ├── migrations/            ← Skema tabel
│   ├── seeders/               ← Data dummy untuk testing
│   └── factories/             ← Factory data
│
├── public/                    ← FILE PUBLIK (bisa diakses user)
│   ├── index.php              ← Entry point aplikasi
│   ├── images/                ← Gambar & asset
│   │   ├── program.jpeg
│   │   ├── ikkapii-logo.png
│   │   ├── About.png
│   │   └── ...
│   ├── build/                 ← File compiled CSS/JS (auto generated)
│   └── ...
│
├── resources/                 ← FILE DEVELOPMENT
│   ├── views/                 ← TAMPILAN (Blade template)
│   │   ├── landing/
│   │   ├── berita/
│   │   ├── kegiatan/
│   │   ├── galeri/
│   │   ├── anggota/
│   │   ├── admin/
│   │   ├── auth/
│   │   ├── layouts/
│   │   ├── partials/
│   │   └── ...
│   ├── css/                   ← STYLING
│   │   ├── app.css            ← CSS utama
│   │   └── ...
│   └── js/                    ← JAVASCRIPT
│       ├── app.js             ← JS utama
│       ├── bootstrap.js
│       └── components/
│
├── routes/                    ← ROUTING (URL mapping)
│   ├── web.php                ← Route halaman publik
│   ├── api.php                ← Route API (jika ada)
│   ├── auth.php               ← Route auth (login/register)
│   └── ...
│
├── storage/                   ← PENYIMPANAN
│   ├── app/                   ← File upload user
│   ├── framework/             ← Cache, session
│   └── logs/                  ← Log error aplikasi
│
├── tests/                     ← TESTING
│   ├── Feature/               ← Test fitur (integration)
│   └── Unit/                  ← Test unit (individual)
│
├── vendor/                    ← DEPENDENCY (auto generated)
│   ├── laravel/               ← Framework Laravel
│   ├── maatwebsite/           ← Excel export library
│   ├── barryvdh/              ← DOMPDF untuk PDF
│   └── ... (ratusan dependency)
│
├── docs/                      ← DOKUMENTASI
│   ├── UI-file-map.md         ← Map file UI
│   └── ...
│
├── .env                       ← KONFIGURASI ENVIRONMENT (SECRET)
│                              ← Database, API key, mail, dll
├── .env.example               ← Template .env (untuk reference)
│
├── artisan                    ← Command line tool Laravel
│
├── composer.json              ← Dependency manager (PHP)
│
├── package.json               ← Dependency manager (Node.js)
│
├── vite.config.js             ← Build tool config (CSS/JS)
│
├── tailwind.config.js         ← Tailwind CSS config
│
├── postcss.config.js          ← PostCSS config
│
├── phpunit.xml                ← PHPUnit test config
│
├── README.md                  ← Dokumentasi project
│
└── STRUKTUR_PROJECT.md        ← File ini (dokumentasi struktur)
```

---

## **8. PENJELASAN FILE & FOLDER PENTING**

### **🔧 Backend**

| File/Folder             | Fungsi                                                             |
| ----------------------- | ------------------------------------------------------------------ |
| `app/Http/Controllers/` | Berisi logic handling request (create, update, delete berita, dll) |
| `app/Models/`           | Database models (Berita, Kegiatan, User, Anggota, dll)             |
| `database/migrations/`  | Script untuk membuat struktur tabel database                       |
| `database/seeders/`     | Data dummy untuk testing                                           |
| `routes/web.php`        | Mapping URL ke controller (/:beranda → BerandaController)          |

### **🎨 Frontend**

| File/Folder             | Fungsi                               |
| ----------------------- | ------------------------------------ |
| `resources/views/`      | Tampilan HTML (Blade template)       |
| `resources/css/app.css` | Styling dengan Tailwind CSS          |
| `resources/js/app.js`   | Script untuk interaksi, animasi, dll |

### **📂 Konfigurasi**

| File/Folder      | Fungsi                                        |
| ---------------- | --------------------------------------------- |
| `.env`           | Konfigurasi environment (DB, mail, API key)   |
| `config/app.php` | Nama app, timezone, locale                    |
| `composer.json`  | Dependency PHP (Laravel, packages)            |
| `package.json`   | Dependency Node.js (Tailwind, Alpine.js, dll) |

---

## **9. CONTOH WORKFLOW MENGUBAH HALAMAN**

### **Skenario: Ubah teks di halaman Beranda**

```
1. Edit file: resources/views/landing/beranda.blade.php
   ↓
2. Ubah teks "Bersama Membangun Desa" menjadi teks lain
   ↓
3. Save file
   ↓
4. Refresh browser (F5)
   ↓
5. Lihat perubahan di http://localhost:8000
```

### **Skenario: Ubah warna brand**

```
1. Edit file: resources/css/app.css
   ↓
2. Ubah nilai color variable (gold, navy, dll)
   ↓
3. Save file
   ↓
4. Laravel Vite build ulang CSS (biasanya auto)
   ↓
5. Refresh browser
   ↓
6. Lihat warna brand berubah di semua halaman
```

### **Skenario: Tambah menu navbar**

```
1. Edit file: resources/views/partials/navbar.blade.php
   ↓
2. Tambah link menu baru
   ↓
3. Save file
   ↓
4. Refresh browser
   ↓
5. Lihat menu baru di navbar
```

---

## **10. TOOLS & TEKNOLOGI YANG DIGUNAKAN**

| Tool             | Fungsi                                       |
| ---------------- | -------------------------------------------- |
| **Laravel**      | Framework PHP (backend, routing, database)   |
| **Blade**        | Template engine (syntax untuk HTML dinamis)  |
| **Tailwind CSS** | Framework CSS (utility-first styling)        |
| **Alpine.js**    | Mini framework JS (reactive UI tanpa jQuery) |
| **AOS.js**       | Library untuk scroll animation               |
| **Vite**         | Build tool modern (bundler CSS/JS)           |
| **Composer**     | Package manager PHP                          |
| **npm**          | Package manager Node.js                      |

---

## **11. QUICK REFERENCE - FILE YANG SERING DIUBAH**

```md
# Edit Halaman

- Beranda: resources/views/landing/beranda.blade.php
- Tentang: resources/views/landing/tentang.blade.php
- Berita: resources/views/berita/index.blade.php
- Kegiatan: resources/views/kegiatan/index.blade.php

# Edit Layout

- Navbar: resources/views/partials/navbar.blade.php
- Footer: resources/views/partials/footer.blade.php
- Template Publik: resources/views/layouts/app.blade.php
- Template Admin: resources/views/layouts/admin.blade.php

# Edit Styling

- CSS Utama: resources/css/app.css
- Tailwind Config: tailwind.config.js

# Edit JavaScript

- JS Utama: resources/js/app.js
- Vite Config: vite.config.js

# Konfigurasi

- Environment: .env
- App Config: config/app.php
```

---

## **12. TIPS UNTUK DEVELOPMENT**

✅ **Best Practices:**

- Selalu buat backup sebelum mengubah file penting
- Edit file di folder `resources/` untuk development
- Jangan edit file di `public/` secara manual (auto-generated)
- Refresh browser dan clear cache saat CSS/JS tidak berubah
- Gunakan browser DevTools (F12) untuk debug CSS/JS

❌ **Jangan Lakukan:**

- Edit `vendor/` folder (dependency eksternal)
- Edit `storage/` folder manual
- Commit `.env` ke git (rahasia!)
- Hapus file migration yang sudah run

---

## **Pertanyaan Umum**

### **Q: File mana yang buat halaman beranda?**

**A:** `resources/views/landing/beranda.blade.php`

### **Q: Mana file untuk ubah warna?**

**A:** `resources/css/app.css` atau `tailwind.config.js`

### **Q: Mana file untuk ubah navbar?**

**A:** `resources/views/partials/navbar.blade.php`

### **Q: Gimana caranya upload gambar?**

**A:** Upload ke `public/images/` lalu reference dengan `{{ asset('images/nama-file.jpg') }}`

### **Q: File mana untuk login?**

**A:** `resources/views/auth/login.blade.php`

---

**Dokumen ini dibuat: 2026-07-13**  
**Last Updated: 2026-07-13**

---

_Untuk pertanyaan lebih lanjut, silakan hubungi developer project Karang Taruna Desa Pilangsari._
