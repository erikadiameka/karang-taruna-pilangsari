# Panduan Menjalankan Anggota Seeder

Struktur organisasi Karang Taruna sudah siap ditampilkan! Ikuti langkah berikut untuk mengisi data anggota:

## Opsi 1: Melalui Artisan Command (Recommended)

```bash
cd c:\laragon\www\kartar_pilangsari
php artisan db:seed --class=AnggotaSeeder
```

## Opsi 2: Melalui Web URL (Paling Mudah)

1. Pastikan aplikasi sudah running (http://localhost:3000)
2. Buka URL di browser: `http://localhost:3000/seed-anggota`
3. Anda akan melihat response JSON sukses dengan jumlah anggota yang dibuat

## Opsi 3: Menggunakan PHP Script Langsung

```bash
cd c:\laragon\www\kartar_pilangsari
php execute_seeder.php
```

## Opsi 4: Menggunakan Batch File

Double-click file: `seed.bat`

---

## Data yang Akan Diisi

Seeder akan membuat 30 anggota dengan struktur:

### Kepemimpinan (6 orang)

- **Ketua**: Budi Santoso
- **Wakil Ketua**: Ahmad Wijaya
- **Sekretaris I**: Siti Nurhaliza
- **Sekretaris II**: Eka Putri
- **Bendahara I**: Rudi Hermawan
- **Bendahara II**: Dina Marlina

### Divisi Operasional (6 divisi, 24 orang)

Setiap divisi memiliki 1 Koordinator + 3-4 Anggota:

1. **Divisi Humas**: Yudi Pratama + 3 anggota
2. **Divisi Sosial**: Rina Susanti + 3 anggota
3. **Divisi Ekonomi**: Toni Suryanto + 3 anggota
4. **Divisi Seni Budaya**: Ari Gunawan + 3 anggota
5. **Divisi Olahraga**: Surya Wijanto + 3 anggota
6. **Divisi Pendidikan**: Nurul Hidayat + 3 anggota

---

## Setelah Seeding

Buka halaman: **http://localhost:3000/anggota**

Anda akan melihat:
✅ Struktur hierarki lengkap dengan Ketua di puncak
✅ Divisi Operasional dengan masing-masing koordinator dan anggota
✅ Tab "Bagan Struktur" menampilkan struktur organisasi
✅ Tab "Daftar Anggota" menampilkan daftar grid semua anggota

---

## Catatan

- Seeder hanya bisa dijalankan di environment `local`
- Untuk menjalankan seeder di production, edit `.env` dan ganti `APP_ENV=local`
- Jika ingin reset data, gunakan: `php artisan migrate:fresh --seed`
