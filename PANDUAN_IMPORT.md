# 📥 Panduan Import Berita & Kegiatan

Fitur import memungkinkan Anda menambahkan **banyak berita atau kegiatan sekaligus** tanpa perlu mengisi satu per satu di dashboard. Sangat efisien untuk menambah data dalam jumlah besar!

---

## 🚀 Cara Menggunakan

### **1. Buka Halaman Import**

#### Untuk Berita:
- Klik menu **Dashboard → Berita**
- Klik tombol hijau **📥 Import CSV**

#### Untuk Kegiatan:
- Klik menu **Dashboard → Kegiatan**
- Klik tombol hijau **📥 Import CSV**

---

### **2. Download Template Excel**

Di halaman import, klik **"Download Template"** untuk mendapatkan file template Excel yang sudah siap pakai.

**File yang didownload:**
- `template-berita.xlsx` - untuk berita
- `template-kegiatan.xlsx` - untuk kegiatan

---

### **3. Isi Data di Excel**

Buka file template yang sudah didownload, kemudian isi data Anda:

#### **Untuk Berita:**

| Kolom | Deskripsi | Contoh |
|-------|-----------|---------|
| **Judul** | Judul berita (wajib) | "Berita Penting 1" |
| **Kategori ID** | ID kategori berita (wajib) | 1 atau 2 |
| **Ringkasan** | Ringkasan singkat | "Ringkasan berita..." |
| **Konten** | Isi berita lengkap (wajib) | "Isi konten berita..." |
| **Status** | draft / published / archived | published |

**Kategori ID yang tersedia:**
```
1 = Umum
2 = [Kategori lainnya sesuai database Anda]
```

**Contoh data berita:**
```
Judul | Kategori ID | Ringkasan | Konten | Status
"Berita Penting 1" | 1 | "Ringkasan singkat" | "Isi konten lengkap berita 1" | published
"Berita Penting 2" | 2 | "Ringkasan singkat" | "Isi konten lengkap berita 2" | draft
```

---

#### **Untuk Kegiatan:**

| Kolom | Deskripsi | Contoh |
|-------|-----------|---------|
| **Nama Kegiatan** | Nama kegiatan (wajib) | "Acara Sosial 1" |
| **Kategori** | Kategori kegiatan (wajib) | Sosial, Pendidikan, Olahraga, dll |
| **Deskripsi** | Deskripsi kegiatan (wajib) | "Deskripsi kegiatan..." |
| **Lokasi** | Lokasi acara (wajib) | "Lokasi Acara" |
| **Tanggal Mulai** | Tanggal & jam mulai (wajib) | "2026-06-05 09:00" |
| **Tanggal Selesai** | Tanggal & jam selesai | "2026-06-05 17:00" |
| **Status** | akan_datang / berlangsung / selesai | akan_datang |
| **Jumlah Peserta** | Jumlah peserta | 50 |

**Kategori yang tersedia:**
```
Sosial
Pendidikan
Olahraga
Seni Budaya
Ekonomi
Lainnya
```

**Contoh data kegiatan:**
```
Nama | Kategori | Deskripsi | Lokasi | Tanggal Mulai | Tanggal Selesai | Status | Peserta
"Acara Sosial 1" | Sosial | "Deskripsi kegiatan" | "Lokasi Acara" | "2026-06-05 09:00" | "2026-06-05 17:00" | akan_datang | 50
"Kegiatan Olahraga" | Olahraga | "Deskripsi kegiatan" | "Lapangan Umum" | "2026-06-10 15:00" | "2026-06-10 18:00" | berlangsung | 30
```

---

### **4. Simpan File sebagai CSV**

Setelah mengisi data di Excel:

1. **Klik File → Save As**
2. **Pilih format:** CSV (Comma delimited) `*.csv`
3. **Nama file:** Sesuka Anda (contoh: `berita_baru.csv`)
4. **Klik Save**

> ⚠️ **Penting:** Pastikan menyimpan sebagai **CSV**, bukan Excel format (.xlsx)

---

### **5. Upload File CSV**

Kembali ke halaman import di dashboard:

1. Klik **"Pilih File CSV / XLSX / TXT"**
2. Pilih file CSV yang sudah Anda simpan
3. Klik **"⬆️ Import Berita/Kegiatan Sekarang"**

---

### **6. Cek Hasil Import**

Setelah upload, sistem akan:
- ✅ Validasi data
- ✅ Menampilkan pesan sukses/error
- ✅ Otomatis redirect ke daftar berita/kegiatan

Jika ada error:
- Akan ditampilkan pesan error untuk baris mana yang bermasalah
- Perbaiki data dan upload lagi

---

## ⚙️ Format File yang Didukung

| Format | Keterangan |
|--------|-----------|
| **CSV** | Format yang paling stabil (rekomendasi) |
| **XLSX** | Format Excel modern |
| **XLS** | Format Excel lama |
| **TXT** | Format text dengan pemisah koma |

---

## 🎯 Tips & Trik

### **1. Cara Membuat File CSV dari Excel**
```
Langkah:
1. Buka Excel
2. Isi data sesuai template
3. File → Save As
4. Ubah format: CSV (Comma delimited)
5. Save
```

### **2. Gunakan Tanda Kutip**
Jika data mengandung **koma atau teks panjang**, gunakan tanda kutip:

```csv
"Berita Judul, dengan koma",1,"Ringkasan, dengan koma","Konten panjang, dengan koma",published
```

### **3. Validasi Data Sebelum Upload**
- ✓ Pastikan kolom sesuai urutan
- ✓ Tidak ada kolom kosong di baris header
- ✓ Tanggal format: `YYYY-MM-DD HH:MM`
- ✓ Status sesuai pilihan yang tersedia

### **4. Maksimal Upload**
- Ukuran file maksimal: **5 MB**
- Saran: Upload max 100-200 item per file untuk performa lebih baik

---

## ❌ Troubleshooting

### **Error: "File harus dalam format CSV"**
**Solusi:** Pastikan file disimpan sebagai CSV, bukan Excel

### **Error: "Kategori ID tidak ditemukan"**
**Solusi:** Gunakan Kategori ID yang benar sesuai list yang ditampilkan

### **Error: "Format tanggal salah"**
**Solusi:** Gunakan format `YYYY-MM-DD HH:MM` (contoh: `2026-06-05 09:00`)

### **Data tidak terupload**
**Solusi:** 
- Cek apakah ada error message
- Validasi semua field yang wajib diisi
- Pastikan tidak ada karakter khusus yang aneh

---

## 📝 Contoh File CSV

### **Berita:**
```csv
judul,kategori_berita_id,ringkasan,konten,status
"Berita Penting 1",1,"Ringkasan singkat","Isi konten lengkap berita 1",published
"Berita Penting 2",2,"Ringkasan singkat","Isi konten lengkap berita 2",draft
"Berita Penting 3",1,"Ringkasan singkat","Isi konten lengkap berita 3",published
```

### **Kegiatan:**
```csv
nama,kategori,deskripsi,lokasi,tanggal_mulai,tanggal_selesai,status,peserta
"Acara Sosial 1",Sosial,"Deskripsi kegiatan sosial","Lokasi Acara","2026-06-05 09:00","2026-06-05 17:00",akan_datang,50
"Kegiatan Olahraga",Olahraga,"Deskripsi kegiatan olahraga","Lapangan Umum","2026-06-10 15:00","2026-06-10 18:00",berlangsung,30
"Acara Selesai",Pendidikan,"Acara pendidikan yang sudah selesai","Aula Utama","2026-05-20 10:00","2026-05-20 14:00",selesai,100
```

---

## 🎓 Keuntungan Fitur Import

✅ **Cepat** - Tambah puluhan/ratusan item dalam 1 menit  
✅ **Mudah** - Tinggal upload file, sistem validasi otomatis  
✅ **Aman** - Data divalidasi sebelum tersimpan  
✅ **Fleksibel** - Support berbagai format file  
✅ **Feedback** - Tahu pasti data mana yang error  

---

## 📞 Butuh Bantuan?

Jika ada pertanyaan atau masalah saat menggunakan fitur import, hubungi administrator atau cek bagian Troubleshooting di atas.

**Selamat mencoba! 🎉**
