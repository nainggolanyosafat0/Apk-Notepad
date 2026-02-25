# 📱 Notepad Saya - Mobile App

**Notepad Saya Mobile** adalah aplikasi Android native yang merupakan bagian dari ekosistem Notepad Saya. Aplikasi ini memungkinkan Anda untuk mengakses dan mengelola catatan Anda langsung dari perangkat Android dengan antarmuka yang bersih dan responsif.

### 🖼️ Tampilan Aplikasi

Berikut adalah pratinjau antarmuka aplikasi mobile:

![Daftar Folder](assets/mockups/mobile_main.png)
*Tampilan utama yang menampilkan semua folder Anda.*

![Tambah Folder](assets/mockups/mobile_add_folder.png)
*Modal untuk membuat folder baru.*

![Tambah Catatan](assets/mockups/mobile_add_note.png)
*Tampilan untuk membuat catatan baru di dalam folder.*

> [!TIP]
> Simpan screenshot Anda di folder `mobile/assets/mockups/` dengan nama file di atas agar muncul di halaman ini.

---

## ✨ Fitur Utama

- **Daftar Folder**: Melihat semua kategori catatan dengan informasi jumlah isi.
- **Lihat Catatan**: Membaca catatan di setiap folder dengan layout kartu yang modern.
- **Sinkronisasi API**: Terhubung langsung dengan backend Laravel melalui REST API.
- **UI Responsif**: Desain yang dioptimalkan untuk berbagai ukuran layar smartphone.

---

## 🛠️ Tech Stack

| Komponen | Teknologi |
| :--- | :--- |
| **Bahasa** | ![Kotlin](https://img.shields.io/badge/Kotlin-7F52FF?style=flat&logo=kotlin&logoColor=white) **Kotlin** |
| **Networking** | ![Retrofit](https://img.shields.io/badge/Retrofit-000000?style=flat) **Retrofit 2** |
| **Architecture** | **ViewBinding & RecyclerView** |
| **Design** | **Material Design Components** |

---

## 🚀 Cara Menjalankan

### Prasyarat
- Android Studio (versi terbaru disarankan)
- Emulator atau Perangkat Android fisik
- Backend (Web) sedang berjalan di `http://127.0.0.1:8000`

### Langkah-langkah
1. **Buka Project**: Buka folder `mobile/` di Android Studio.
2. **Konfigurasi IP**: Pastikan IP server di `RetrofitClient.kt` mengarah ke IP komputer Anda (gunakan IP LAN, bukan `localhost` jika menggunakan device fisik).
3. **Build & Run**: Klik tombol 'Run' di Android Studio.

---
Dibuat dengan ❤️ oleh [Yosapat Nainggolan].
