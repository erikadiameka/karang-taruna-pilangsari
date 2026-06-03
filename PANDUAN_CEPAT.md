# ⚡ PANDUAN CEPAT - Import Berita & Kegiatan

## 🎯 Singkat & Jelas - 5 Langkah

### **LANGKAH 1: Buka Halaman Import**
- Berita: Dashboard → Berita → 📥 **Import CSV**
- Kegiatan: Dashboard → Kegiatan → 📥 **Import CSV**

### **LANGKAH 2: Download Template CSV**
- Klik card **"📥 Download Template CSV"**
- File akan otomatis download: `template-berita.csv` atau `template-kegiatan.csv`

### **LANGKAH 3: Isi Data di Excel**
- Buka file template dengan Excel
- Jangan ubah baris header (baris pertama)
- Mulai isi dari baris ke-2
- Tambah baris baru sesuai kebutuhan

### **LANGKAH 4: Simpan sebagai CSV**
- Klik File → **Save As**
- Pilih format **CSV (Comma delimited)**
- Klik **Save**
- ⚠️ **Jangan simpan sebagai Excel!**

### **LANGKAH 5: Upload File**
- Buka halaman import → **Pilih File**
- Pilih file CSV yang sudah disimpan
- Klik **"⬆️ Import Berita/Kegiatan Sekarang"**
- Tunggu sebentar hingga selesai! ✅

---

## 📋 Format Data

### **BERITA**
```
Judul | Kategori ID | Ringkasan | Konten | Status
"Berita 1" | 1 | "Ringkasan" | "Konten..." | published
"Berita 2" | 2 | "Ringkasan" | "Konten..." | draft
```

Status: `draft` | `published` | `archived`

### **KEGIATAN**
```
Nama | Kategori | Deskripsi | Lokasi | Tanggal Mulai | Tanggal Selesai | Status | Peserta
"Acara 1" | Sosial | "Desc..." | "Lokasi" | "2026-06-05 09:00" | "2026-06-05 17:00" | akan_datang | 50
```

Kategori: `Sosial` | `Pendidikan` | `Olahraga` | `Seni Budaya` | `Ekonomi` | `Lainnya`  
Status: `akan_datang` | `berlangsung` | `selesai`  
Tanggal: Format `YYYY-MM-DD HH:MM` (contoh: `2026-06-05 09:00`)

---

## ✅ Checklist Sebelum Upload

- [ ] File sudah dalam format CSV (tidak Excel)
- [ ] Semua kolom sudah diisi (minimal kolom wajib)
- [ ] Tidak ada baris kosong di tengah data
- [ ] Kategori ID / Kategori sesuai dengan yang tersedia
- [ ] Status sesuai pilihan yang valid
- [ ] Tanggal menggunakan format yang benar
- [ ] Ukuran file di bawah 5 MB

---

## ⚠️ Error Umum & Solusi

| Error | Solusi |
|-------|--------|
| "File harus CSV" | Pastikan save as CSV, bukan Excel |
| "Kategori tidak ditemukan" | Gunakan Kategori ID/Kategori yang benar |
| "Format tanggal salah" | Gunakan `YYYY-MM-DD HH:MM` |
| "Field wajib kosong" | Isi semua field yang required |

---

## 💡 Tips Penting

✅ Selalu download template dulu → Jangan buat file sendiri  
✅ Gunakan tanda kutip untuk teks yang panjang atau ada koma  
✅ Cek preview template untuk lihat contoh data  
✅ Upload max 100-200 item per file untuk hasil terbaik  
✅ Jika ada error, perbaiki data dan upload ulang  

---

## 🎓 Contoh Lengkap

### **File CSV Berita (`berita_bulan_juni.csv`):**
```csv
judul,kategori_berita_id,ringkasan,konten,status
"Pengumuman Penting",1,"Pengumuman penting untuk semua member","Lorem ipsum dolor sit amet, consectetur adipiscing elit.",published
"Update Sistem",2,"Sistem telah diupdate ke versi terbaru","Sistem kami telah diupdate dengan fitur-fitur baru yang lebih baik.",draft
"Acara Bulanan Juni",1,"Acara bulanan member Karang Taruna","Kami dengan senang hati mengumumkan acara bulanan untuk bulan Juni ini.",published
```

### **File CSV Kegiatan (`kegiatan_juni.csv`):**
```csv
nama,kategori,deskripsi,lokasi,tanggal_mulai,tanggal_selesai,status,peserta
"Olahraga Pagi",Olahraga,"Olahraga pagi bersama member","Lapangan Desa",2026-06-05 06:00,2026-06-05 07:30,akan_datang,30
"Rapat Bulanan",Pendidikan,"Rapat evaluasi bulanan","Aula Kantor",2026-06-10 19:00,2026-06-10 21:00,berlangsung,50
"Baksos Desa",Sosial,"Bakti sosial membersihkan desa","Desa Pilangsari",2026-06-15 07:00,2026-06-15 12:00,akan_datang,80
```

---

## 📞 Butuh Bantuan Lebih Lanjut?

👉 Baca file **PANDUAN_IMPORT.md** untuk penjelasan lebih detail

---

**Semoga bermanfaat! Happy importing! 🚀**
