# Update Struktur Organisasi Karang Taruna

## Perubahan yang Dilakukan

### 1. Database Schema

- Migration file: `database/migrations/2026_05_25_233000_update_struktur_organisasi.php`
    - Mengubah enum `divisi` dari 6 opsi (Humas, Sosial, Ekonomi, Seni Budaya, Olahraga, Pendidikan) menjadi 4 opsi baru:
        - Humas dan Keamanan
        - Seni Kreatif dan Medafor
        - Keagamaan
        - Kepemudaan dan Olahraga
    - Menambahkan kolom `posisi_inti` untuk menyimpan posisi kepemimpinan
    - Menambahkan kolom `urutan_struktur` untuk urutan dalam struktur organisasi

### 2. Model Update

- `app/Models/Anggota.php`
    - Menambahkan `posisi_inti` dan `urutan_struktur` ke dalam $fillable

### 3. Views Update

#### Admin Anggota Management

- `resources/views/admin/anggota/create.blade.php`
    - Update field "Divisi" menjadi "Bidang" dengan pilihan baru
    - Menambahkan field "Posisi Inti" dengan 6 pilihan: Ketua, Wakil Ketua, Sekretaris 1, Sekretaris 2, Bendahara 1, Bendahara 2
- `resources/views/admin/anggota/edit.blade.php`
    - Update field "Divisi" menjadi "Bidang" dengan pilihan baru
    - Menambahkan field "Posisi Inti" dengan 6 pilihan yang sama

- `resources/views/admin/anggota/index.blade.php`
    - Mengubah header kolom dari "Divisi" menjadi "Bidang"
    - Menambahkan kolom "Posisi" untuk menampilkan posisi_inti

#### Landing Page

- `resources/views/landing/tentang.blade.php`
    - Menampilkan 6 posisi inti (Ketua, Wakil Ketua, Sekretaris 1, Sekretaris 2, Bendahara 1, Bendahara 2)
    - Menampilkan 4 bidang organisasi baru dengan deskripsi
    - Update statistik dari "6 Divisi" menjadi "4 Bidang"

### 4. Seeder

- `database/seeders/StrukturOrganisasiSeeder.php`
    - Seeder untuk insert 48 anggota sesuai struktur yang Anda berikan:
        - 7 anggota di Humas dan Keamanan (dengan Tio sebagai Koordinator)
        - 13 anggota di Seni Kreatif dan Medafor (dengan Tansah sebagai Koordinator)
        - 9 anggota di Keagamaan (dengan Erik sebagai Koordinator)
        - 11 anggota di Kepemudaan dan Olahraga (dengan Tamsil sebagai Koordinator)

## Cara Menjalankan Update

### Opsi 1: Menggunakan Batch File (Windows)

```batch
run_migration_struktur.bat
```

### Opsi 2: Manual Commands

```bash
# Jalankan migration
php artisan migrate --force

# Jalankan seeder
php artisan db:seed --class=StrukturOrganisasiSeeder --force
```

### Opsi 3: Tinker

```php
php artisan tinker
>>> Artisan::call('migrate', ['--force' => true])
>>> Artisan::call('db:seed', ['--class' => 'StrukturOrganisasiSeeder', '--force' => true])
```

## Rollback (Jika Diperlukan)

Untuk membatalkan semua perubahan:

```bash
php artisan migrate:rollback --step=1
```

## Fitur yang Ditambahkan

✅ 6 Posisi Inti (Ketua, Wakil Ketua, Sekretaris 1&2, Bendahara 1&2)
✅ 4 Bidang Organisasi yang jelas
✅ Koordinator untuk setiap bidang
✅ Admin interface yang user-friendly
✅ Landing page yang menampilkan struktur lengkap

## Data Struktur Organisasi

### Humas dan Keamanan (7 anggota)

- Tio (Koordinator)
- Dian, Randi, Arif, Agung, Ogi, Saeful

### Seni Kreatif dan Medafor (13 anggota)

- Tansah (Koordinator)
- Ponda, Candra, Aung, Wulan, Amel, Bastian, Igun, Riski, Saadah, Destian, Yayas, Dika

### Keagamaan (9 anggota)

- Erik (Koordinator)
- Yoga, Aena, Ketrin, Mukti, Ima, Enzy, Pudin, Adil

### Kepemudaan dan Olahraga (11 anggota)

- Tamsil (Koordinator)
- Rio, Kalista, Aldi, Guntur, Riska, Yayan, Iis, Maya, Levi, Lesa

Total: 48 anggota
