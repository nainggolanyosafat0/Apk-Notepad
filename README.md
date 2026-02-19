# 📝 Notepad Saya

**Notepad Saya** adalah aplikasi manajemen catatan berbasis web yang dirancang untuk membantu pengguna mengorganisir ide dan informasi dengan mudah. Aplikasi ini menawarkan antarmuka yang bersih, modern, dan responsif, memungkinkan pengguna untuk membuat folder, menyimpan catatan, serta mengedit dan menghapusnya sesuai kebutuhan.

Dikembangkan menggunakan framework **Laravel 12**, aplikasi ini menonjolkan performa yang cepat dengan kombinasi *Server-Side Rendering* (Blade) dan interaktivitas modern menggunakan JavaScript murni.


---

## ✨ Fitur Utama

### 1. 📂 Manajemen Folder
- **Buat Folder Baru**: Organisasikan catatan Anda ke dalam kategori yang berbeda.
- **Rename Folder**: Klik kanan pada folder untuk mengubah namanya.
- **Hapus Folder**: Hapus folder yang tidak lagi dibutuhkan (beserta seluruh catatan di dalamnya).
- **Context Menu**: Akses cepat fitur folder dengan klik kanan.

### 2. 📝 Manajemen Catatan
- **Buat Catatan**: Tambahkan catatan baru dengan judul dan isi yang dapat disesuaikan.
- **Edit Catatan**: Ubah konten catatan kapan saja melalui tombol edit (✎).
- **Hapus Catatan**: Hapus catatan yang sudah tidak relevan.
- **Empty State**: Tampilan informatif saat folder masih kosong.

### 3. 🎨 Antarmuka Modern
- **Desain Responsif**: Tampilan yang menyesuaikan dengan ukuran layar.
- **Interaksi Halus**: Menggunakan modal untuk form input dan animasi transisi yang lembut.
- **Tanpa Reload**: Pengalaman pengguna yang terasa seperti Single Page Application (SPA) untuk interaksi tertentu.

---

## 🛠️ Tech Stack

Aplikasi ini dibangun menggunakan teknologi terkini untuk memastikan performa, keamanan, dan kemudahan pengembangan:

| Kategori | Teknologi | Deskripsi |
| :--- | :--- | :--- |
| **Backend** | ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white) **Laravel 12** | Framework PHP modern untuk logika bisnis & API. |
| **Database** | ![MySQL](https://img.shields.io/badge/MySQL-000000?style=flat&logo=mysql&logoColor=white) **MySQL** | Sistem manajemen basis data relasional. |
| **Frontend** | ![Blade](https://img.shields.io/badge/Blade-FF2D20?style=flat&logo=laravel&logoColor=white) **Blade** | Templating engine bawaan Laravel. |
| **Styling** | ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white) **Vanilla CSS** | Styling kustom tanpa framework CSS berat (seperti Bootstrap/Tailwind). |
| **Scripting** | ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black) **Vanilla JS** | Interaktivitas DOM dan AJAX handling. |

---

## 🏗️ Arsitektur Sistem

Berikut adalah rancangan alur sistem aplikasi **Notepad Saya** menggunakan diagram UML.

### 1. Use Case Diagram

Diagram ini menggambarkan interaksi antara pengguna (User) dengan fitur-fitur yang tersedia di dalam sistem.

```mermaid
flowchart TD
    Start([Mulai]) --> OpenApp[Buka Aplikasi]
    OpenApp --> SelectFolder[Pilih Folder di Sidebar]
    SelectFolder --> ClickAdd[Klik Tombol '+ Buat Catatan']
    ClickAdd --> ShowModal[Tampilkan Modal Form]
    ShowModal --> InputData[Input Judul & Isi Catatan]
    InputData --> SaveCheck{Klik Simpan?}
    
    SaveCheck -- Ya --> Validate[Validasi Data]
    Validate -- Valid --> SaveDB[(Simpan ke Database)]
    SaveDB --> UpdateUI[Tampilkan Catatan Baru]
    UpdateUI --> End([Selesai])
    
    Validate -- Invalid --> ShowError[Tampilkan Error]
    ShowError --> InputData
    
    SaveCheck -- Batal --> CloseModal[Tutup Modal]
    CloseModal --> End
```

### 2. Activity Diagram

Diagram berikut menjelaskan alur aktivitas pengguna dalam melakukan dua tugas utama: **Membuat Catatan Baru** dan **Mengelola Folder (Rename/Delete)**.

#### A. Alur Membuat Catatan Baru

```mermaid
flowchart TD
    Start([Mulai]) --> OpenApp[Buka Aplikasi]
    OpenApp --> SelectFolder[Pilih Folder di Sidebar]
    SelectFolder --> ClickAdd[Klik Tombol '+ Buat Catatan']
    ClickAdd --> ShowModal[Tampilkan Modal Form]
    ShowModal --> InputData[Input Judul & Isi Catatan]
    InputData --> SaveCheck{Klik Simpan?}
    
    SaveCheck -- Ya --> Validate[Validasi Data]
    Validate -- Valid --> SaveDB[(Simpan ke Database)]
    SaveDB --> UpdateUI[Tampilkan Catatan Baru]
    UpdateUI --> End([Selesai])
    
    Validate -- Invalid --> ShowError[Tampilkan Error]
    ShowError --> InputData
    
    SaveCheck -- Batal --> CloseModal[Tutup Modal]
    CloseModal --> End
```

#### B. Alur Rename Folder (Context Menu)

```mermaid
flowchart TD
    Start([Mulai]) --> HoverFolder[Arahkan Kursor ke Folder]
    HoverFolder --> RightClick[Klik Kanan Folder]
    RightClick --> ShowMenu[Tampilkan Context Menu]
    ShowMenu --> SelectAction{Pilih Aksi}
    
    SelectAction -- Rename --> ShowRenameModal[Tampilkan Modal Rename]
    ShowRenameModal --> InputName[Input Nama Baru]
    InputName --> SaveRename[Simpan Perubahan]
    SaveRename --> UpdateDB[(Update Database)]
    UpdateDB --> CheckDB{Berhasil?}
    CheckDB -- Ya --> UpdateSidebar[Perbarui Nama di Sidebar]
    CheckDB -- Tidak --> ShowErr[Tampilkan Error]
    
    SelectAction -- Hapus --> ConfirmDelete{Konfirmasi Hapus?}
    ConfirmDelete -- Ya --> DeleteDB[(Hapus dari Database)]
    DeleteDB --> RefreshUI[Refresh Sidebar & Reset View]
    
    ConfirmDelete -- Tidak --> End([Batal])
    UpdateSidebar --> End
    ShowErr --> End
    RefreshUI --> End
```

---
