# WebGIS Wisata Klaten

WebGIS Wisata Klaten adalah aplikasi berbasis web yang dirancang untuk membantu pengguna mengeksplorasi berbagai lokasi wisata di Kabupaten Klaten. Proyek ini memanfaatkan teknologi web modern untuk menyajikan data geografis interaktif, kategori wisata yang menarik, serta fitur ulasan pengguna.

---

## 🎯 **Fitur Utama**

1. **Pemetaan Lokasi Wisata**
   - Peta interaktif menampilkan berbagai kategori lokasi wisata: **alam**, **budaya**, dan **kuliner**.
   - Integrasi data geografis menggunakan format **GeoJSON** untuk akurasi lokasi.

2. **Informasi Wisata Terperinci**
   - Setiap kategori wisata memiliki halaman khusus yang memberikan informasi lengkap dan menarik.

3. **Ulasan Pengguna**
   - Pengguna dapat menambahkan ulasan mengenai lokasi wisata melalui formulir interaktif.
   - Fitur ini memungkinkan partisipasi aktif dari pengguna untuk berbagi pengalaman.

4. **Desain Responsif**
   - Aplikasi memiliki tampilan yang optimal di berbagai perangkat, seperti desktop, tablet, dan smartphone.

5. **Pengelolaan Data Geografis**
   - Data lokasi wisata dapat diperbarui dengan mudah melalui file **GeoJSON**.

---

## 📂 **Struktur Direktori**

Struktur direktori proyek ini adalah sebagai berikut:

```plaintext
WebGIS-Wisata-Klaten/
├── index.html              # Halaman utama
├── contact.html            # Halaman kontak
├── wisata-alam.html        # Halaman wisata alam
├── wisata-budaya.html      # Halaman wisata budaya
├── wisata-kuliner.html     # Halaman wisata kuliner
├── style.css               # Gaya tampilan (CSS)
├── script.js               # Skrip interaktif (JavaScript)
├── tambah_ulasan.php       # Backend untuk menambah ulasan
├── ulasan.php              # Backend untuk melihat ulasan
├── data/
│   └── admin.geojson       # Data geografis dalam format GeoJSON
└── README.md               # Dokumentasi proyek ini
