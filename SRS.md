# Software Requirements Specification (SRS)
**for Aether - Platform Konsultasi Mental Mahasiswa Berbasis AI**

**Version:** 1.0  
**Prepared by:** Antigravity (AI Assistant)  

---

## Table of Contents
1. [Introduction](#1-introduction)
2. [Overall Description](#2-overall-description)
3. [System Features](#3-system-features)
4. [External Interface Requirements](#4-external-interface-requirements)
5. [Other Nonfunctional Requirements](#5-other-nonfunctional-requirements)
6. [Appendix A: Glossary](#appendix-a-glossary)

---

## 1. Introduction

### 1.1 Purpose
Dokumen *Software Requirements Specification* (SRS) ini bertujuan untuk mendefinisikan spesifikasi kebutuhan perangkat lunak dari sistem **Aether**, yaitu sebuah *Website Chatbot AI* untuk deteksi dan klasifikasi emosi mahasiswa berbasis *Natural Language Processing* (NLP) dengan metode *Rule-Based Scoring*. Dokumen ini mencakup seluruh fitur, antarmuka, dan persyaratan non-fungsional dari sistem.

### 1.2 Document Conventions
Dokumen ini disusun menggunakan format Markdown. Kebutuhan fungsional (*Functional Requirements*) akan diidentifikasi dengan kode unik seperti `REQ-F-XX` dan kebutuhan non-fungsional dengan `REQ-NF-XX` untuk memudahkan pelacakan. Tingkat prioritas (High, Medium, Low) dicantumkan pada deskripsi fitur.

### 1.3 Intended Audience and Reading Suggestions
Dokumen ini ditujukan untuk:
- **Developer/Programmer:** Sebagai acuan utama dalam membangun dan mengembangkan fitur aplikasi.
- **Dosen Pembimbing & Penguji:** Sebagai dokumen evaluasi untuk mengukur sejauh mana sistem yang dibangun telah memenuhi rancangan awal.
Disarankan untuk membaca mulai dari Bagian 2 (*Overall Description*) untuk memahami konteks sistem, kemudian dilanjutkan ke Bagian 3 (*System Features*) untuk melihat detail fungsionalitasnya.

### 1.4 Product Scope
**Aether** adalah platform berbasis web yang menyediakan layanan pendampingan kesehatan mental dan dukungan emosional awal (Psychological First Aid) bagi mahasiswa. Sistem menggunakan teknologi NLP untuk menganalisis konteks bahasa dan sentimen pengguna secara mendalam, serta mengklasifikasikan kondisi emosi mahasiswa ke dalam 3 zona risiko (Hijau, Kuning, Merah). Aether beroperasi 24/7 dan menawarkan ruang aman tanpa penghakiman. Platform ini **tidak dirancang** untuk menggantikan psikiater medis profesional, melainkan sebagai alat intervensi awal.

### 1.5 References
Dokumen spesifikasi kebutuhan perangkat lunak ini disusun dengan merujuk pada berbagai dokumentasi resmi serta literatur rekayasa perangkat lunak. Untuk memastikan pembaca dapat mengakses kembali setiap dokumen sumber secara akurat, berikut adalah daftar referensi lengkap yang memuat informasi penulis, judul, nomor versi, tanggal publikasi, serta lokasi pemuatan materi:

[1] Laravel Team, "Laravel Framework Documentation," Versi 13.x, 2026. [Online]. Available: <https://laravel.com/docs>.  
[2] Tailwind CSS Team, "Tailwind CSS Framework Documentation," Versi v4.x, 2026. [Online]. Available: <https://tailwindcss.com/docs>.  
[3] FastAPI, "FastAPI Framework Reference Documentation," Versi 0.x, 2026. [Online]. Available: <https://fastapi.tiangolo.com/>.  
[4] Google Developers, "Gemini API Reference Documentation," Versi Model Gemini AI, 2026. [Online]. Available: <https://ai.google.dev/docs>.  
[5] devannoap31, "Repositori Kode Sumber Utama Aplikasi Aether.AI," Versi 1.0 (Main Branch), 2026. [Online]. Available: <https://github.com/devannoap31/student-emotional-consultation-web-with-AI>.  
[6] K. E. Wiegers, *Software Requirements*, Edisi Kedua (2nd Edition), Redmond, WA: Microsoft Press, 2003.

---

## 2. Overall Description

### 2.1 Product Perspective
Aether adalah sistem mandiri (*self-contained product*) yang beroperasi dengan arsitektur *microservices* sederhana. Sistem ini terdiri dari dua komponen utama:
1. **Frontend & Backend Management (Laravel/PHP):** Menangani antarmuka pengguna, autentikasi, database, riwayat chat, dan modul *mood tracking*.
2. **AI Engine (FastAPI/Python):** Berfungsi sebagai mesin pemroses NLP yang menerima pesan dari Laravel, melakukan analisis sentimen, mendeteksi niat (*intent*), dan merumuskan respons psikologis terarah (menggunakan Google Gemini API).

### 2.2 Product Functions
Secara garis besar, Aether memungkinkan pengguna untuk:
- Melakukan registrasi, login, dan autentikasi.
- Berinteraksi dengan Chatbot AI layaknya konselor.
- Mendapatkan skor indikator krisis emosional secara *real-time*.
- Melacak riwayat emosi harian (*Mood Tracking*) melalui *dashboard* interaktif.
- Menerima rekomendasi artikel/video/kontak darurat (Resource Center) yang disesuaikan secara otomatis dengan tingkat emosi mereka.
- Mengelola riwayat obrolan (Ubah nama sesi, hapus sesi).

### 2.3 User Classes and Characteristics
- **Mahasiswa (End-User):** Pengguna utama dengan berbagai tingkat literasi teknologi. Mereka berinteraksi dengan sistem untuk mendapatkan dukungan emosional. Membutuhkan antarmuka yang sangat mudah dipahami (intuitif) dan nyaman (menenangkan) secara visual.

### 2.4 Operating Environment
- **Platform Pengguna:** *Web browser* modern (Google Chrome, Mozilla Firefox, Safari, Microsoft Edge) pada perangkat *Desktop* maupun *Mobile*.
- **Platform Server:** Server berbasis Linux/Windows.
  - Subsistem 1: PHP 8.4, Laravel 13, Node.js (untuk Vite), MySQL.
  - Subsistem 2: Python 3.10+, FastAPI, Uvicorn (menggunakan algoritma Q-Learning).

### 2.5 Design and Implementation Constraints
- **Waktu Respons:** Komunikasi antara Laravel dan FastAPI (serta API pihak ketiga) tidak boleh memakan waktu terlalu lama agar pengalaman *chat* terasa instan.
- **Batasan Konteks:** AI dirancang untuk membatasi obrolan hanya pada seputar kesehatan mental dan akademik. Pembicaraan di luar konteks tidak akan diperhitungkan skornya.

### 2.6 Assumptions and Dependencies
- **Ketergantungan Eksternal:** Sistem sangat bergantung pada ketersediaan layanan Google Gemini API untuk melakukan pembangkitan teks (NLP).
- **Asumsi:** Pengguna memiliki koneksi internet yang memadai saat berinteraksi dengan sistem.

---

## 3. System Features

Sistem ini dipecah berdasarkan fitur fungsional utamanya. Setiap fitur dijabarkan secara rinci mencakup deskripsi, urutan aksi-reaksi (*stimulus/response*), dan daftar kebutuhan fungsional (*Functional Requirements*).

### 3.1 Autentikasi dan Manajemen Pengguna
#### 3.1.1 Description and Priority
Fitur keamanan inti (*High Priority*) yang menangani pendaftaran pengguna baru, proses masuk (*login*), dan perlindungan hak akses halaman agar privasi data mahasiswa tetap terjaga.

#### 3.1.2 Stimulus/Response Sequences
- **Stimulus:** Pengguna memasukkan kredensial (email dan kata sandi) ke dalam formulir *login*.
- **Response:** Sistem memvalidasi kredensial terhadap *database*. Jika valid, sistem membuat sesi pengguna (*user session*) dan mengarahkan pengguna ke halaman Dasbor. Jika tidak valid, sistem menampilkan pesan *error*.

#### 3.1.3 Functional Requirements
| ID | Requirement |
| :--- | :--- |
| FR-01 | Sistem HARUS menyediakan proses registrasi yang meminta nama, email, dan kata sandi. |
| FR-02 | Sistem HARUS mengenkripsi kata sandi pengguna di dalam database menggunakan *hashing* Bcrypt. |
| FR-03 | Sistem HARUS menyediakan mekanisme *login* yang aman menggunakan email dan kata sandi. |
| FR-04 | Sistem HARUS melindungi rute `/chat`, `/mood`, dan `/resources` menggunakan *middleware* autentikasi. |
| FR-05 | Sistem HARUS memungkinkan pengguna untuk *logout* secara aman dan menghancurkan sesi aktif. |

### 3.2 Asesmen dan Skrining Keadaan Emosional (AI/NLP Engine)
#### 3.2.1 Description and Priority
Fitur komputasi inti (*High Priority*). Modul berbasis Python FastAPI ini bertugas menganalisis teks curhatan pengguna secara matematis untuk mendeteksi tingkat krisis emosional.

#### 3.2.2 Stimulus/Response Sequences
- **Stimulus:** Aplikasi Laravel mengirimkan teks (JSON) dari inputan pengguna ke titik akhir (`endpoint`) FastAPI melalui HTTP POST.
- **Response:** FastAPI memproses teks, menghitung skor, dan mengklasifikasikan emosi, lalu mengembalikan respons berformat JSON ke Laravel.

#### 3.2.3 Functional Requirements
| ID | Requirement |
| :--- | :--- |
| FR-06 | Sistem HARUS menerima masukan teks dan secara otomatis menormalisasi kata-kata gaul (*slang*) Indonesia. |
| FR-07 | Sistem HARUS menghitung skor *distress* emosional dari 0 hingga 100 berdasarkan pencocokan kata kunci (*Rule-Based*). |
| FR-08 | Sistem HARUS mengklasifikasikan keadaan emosi ke dalam 3 zona risiko: Stabil (0-35), Distress (36-70), Krisis (>70). |
| FR-09 | Sistem HARUS memanfaatkan model *Reinforcement Learning* (Q-Learning / `q_table.json`) untuk memilih strategi respons psikologis yang paling optimal (misal: CBT, Validasi). |
| FR-10 | Sistem HARUS mengabaikan dan memberikan skor 0 untuk masukan teks yang sepenuhnya berada di luar konteks kesehatan mental atau kehidupan akademik. |

### 3.3 Chatbot Pendampingan Awal (Interaksi AI & Gemini)
#### 3.3.1 Description and Priority
Fitur interaksi utama (*High Priority*). Menjadi ruang aman bagi mahasiswa untuk bercerita dan mendapatkan balasan empatik dari agen AI.

#### 3.3.2 Stimulus/Response Sequences
- **Stimulus:** Pengguna mengetik dan mengirim pesan di ruang obrolan.
- **Response:** UI menampilkan gelembung *chat* pengguna. Sistem memanggil AI Engine untuk membangkitkan teks balasan, kemudian menampilkan teks tersebut seolah-olah sedang mengetik (*typewriter effect*), dan menyimpan riwayat percakapan.

#### 3.3.3 Functional Requirements
| ID | Requirement |
| :--- | :--- |
| FR-11 | Sistem HARUS membangkitkan balasan teks yang berempati dan tidak menghakimi menggunakan Google Gemini API berdasarkan strategi Q-Learning yang terpilih. |
| FR-12 | Sistem HARUS menyimpan riwayat obrolan (konteks) di dalam satu sesi tunggal agar *chatbot* dapat mengingat percakapan yang sedang berlangsung. |
| FR-13 | Sistem HARUS memungkinkan pengguna untuk membuat sesi obrolan baru yang kosong kapan saja. |
| FR-14 | Sistem HARUS memungkinkan pengguna untuk mengganti judul (*rename*) sesi obrolan aktif mereka di *sidebar*. |
| FR-15 | Sistem HARUS memungkinkan pengguna untuk menghapus riwayat sesi obrolan mereka secara permanen dari database. |

### 3.4 Dashboard Mood Tracking Dinamis
#### 3.4.1 Description and Priority
Visualisasi analitik (*Medium Priority*). Menyajikan metrik kesehatan mental berdasarkan riwayat percakapan pengguna.

#### 3.4.2 Stimulus/Response Sequences
- **Stimulus:** Pengguna mengakses halaman "Mood Tracker".
- **Response:** Sistem melakukan *query* ke tabel riwayat obrolan pengguna, menghitung rata-rata skor kestabilan, dan me-render grafik *Bar Chart* di layar.

#### 3.4.3 Functional Requirements
| ID | Requirement |
| :--- | :--- |
| FR-16 | Sistem HARUS menampilkan jumlah total sesi, rata-rata skor kestabilan (0-10), dan hari berturut-turut melakukan pencatatan (*streak*). |
| FR-17 | Sistem HARUS menyediakan visualisasi *Bar Chart* untuk tren emosional selama 7 hari terakhir. |
| FR-18 | Sistem HARUS menyediakan fitur *Quick Log* yang memungkinkan pengguna mencatat *mood* secara manual menggunakan tombol emoji tanpa harus mengetik teks panjang. |

### 3.5 Pusat Sumber Daya (Resource Center) Terpersonalisasi
#### 3.5.1 Description and Priority
Modul dukungan mandiri (*High Priority*). Menyediakan materi psikoedukasi dan kontak darurat.

#### 3.5.2 Stimulus/Response Sequences
- **Stimulus:** Sistem (AI Engine) mendeteksi level emosi "Krisis" (>70) dari chat pengguna.
- **Response:** Sistem otomatis menyisipkan komponen UI yang berisi kontak *hotline* darurat di bawah teks balasan AI.

#### 3.5.3 Functional Requirements
| ID | Requirement |
| :--- | :--- |
| FR-19 | Sistem HARUS secara otomatis menyematkan tautan sumber daya yang relevan pada balasan *chatbot* berdasarkan tingkat krisis yang terdeteksi. |
| FR-20 | Sistem HARUS segera memberikan nomor kontak *hotline* konseling darurat ketika tingkat emosi 'Krisis' terdeteksi. |
| FR-21 | Sistem HARUS menyediakan halaman direktori manual (Pusat Sumber Daya) tempat pengguna dapat menelusuri artikel dan video relaksasi yang dikategorikan berdasarkan topik. |

---

## 4. External Interface Requirements

### 4.1 User Interfaces
- Antarmuka harus mengadopsi estetika *Healthline Editorial* (bersih, luas, dengan banyak ruang putih/negatif) untuk menciptakan suasana menenangkan.
- Skema warna menggunakan warna penenang seperti *Teal/Cyan* (`#02838D`), putih, abu-abu muda, dan indikator warna *traffic light* (Merah, Kuning, Hijau) untuk status krisis.
- Tersedia navigasi *Sidebar* di sebelah kiri untuk berpindah modul, yang bersifat *collapsible* (dapat disembunyikan) pada mode *Mobile*.

### 4.2 Hardware Interfaces
- Sistem tidak membutuhkan integrasi perangkat keras keras khusus.

### 4.3 Software Interfaces
- **Database:** Sistem harus berkomunikasi dengan sistem manajemen basis data relasional (MySQL) yang menyimpan tabel `users`, `chat_sessions`, dan `resources`.
- **FastAPI Endpoint:** Laravel (`web-konseling`) berkomunikasi dengan Python FastAPI (`ai-konseling`) melalui titik akhir HTTP `POST /analyze`.
- **Eksternal API & AI Model:** FastAPI Python berkomunikasi dengan *Google Generative AI SDK* (Gemini-1.5-flash) menggunakan REST API, serta menggunakan model *Reinforcement Learning* (Q-Learning) yang tersimpan di `q_table.json` untuk optimasi pengambilan keputusan metode psikologi.

### 4.4 Communications Interfaces
- Komunikasi antara klien (*browser*) dan server (Laravel) dilakukan melalui protokol standar HTTP/HTTPS.
- Komunikasi antara *microservices* (Laravel ke FastAPI) dilakukan dengan bertukar paket muatan (*payload*) berformat JSON.

---

## 5. Other Nonfunctional Requirements

### 5.1 Performance Requirements
- **REQ-NF-01:** Proses analisis NLP dan pembangkitan balasan AI harus selesai dan tampil di layar pengguna dalam waktu optimal (target di bawah 4 detik).

### 5.2 Safety Requirements
- **REQ-NF-02:** Sistem harus dapat mendeteksi kondisi krisis absolut (seperti keinginan bunuh diri). Jika terdeteksi, sistem akan secara proaktif memunculkan kontak layanan bantuan darurat di luar teks balasan AI reguler.

### 5.3 Security Requirements
- **REQ-NF-03:** Semua halaman fungsional harus dilindungi oleh Middleware *Auth* standar Laravel.
- **REQ-NF-04:** Sistem diwajibkan mengimplementasikan perlindungan terhadap pemalsuan permintaan silang (*Cross-Site Request Forgery / CSRF*) pada setiap formulir.
- **REQ-NF-05:** Kata sandi pengguna harus diamankan menggunakan algoritma *hashing* kriptografi standar industri (Bcrypt).

### 5.4 Software Quality Attributes
- **Usability:** Antarmuka harus mudah dioperasikan bahkan oleh orang yang sedang dalam kondisi kalut secara emosional (navigasi minimum, teks tebal, kontras baik).
- **Maintainability:** Penggunaan arsitektur MVC (Model-View-Controller) pada Laravel untuk memudahkan modifikasi kode dan antarmuka di masa mendatang tanpa memecah logika inti aplikasi.

### 5.5 Business Rules
- Jika input pengguna adalah sapaan santai ("Halo", "Hai"), skor krisis ditetapkan pada angka dasar (0) tanpa perlu divalidasi ke skala yang lebih rumit.
- Sistem hanya melayani obrolan yang diklasifikasikan sebagai masalah kehidupan mahasiswa (Tugas, Skripsi, Asmara, Keluarga, Pertemanan, Finansial). Pertanyaan teknis atau *coding* akan ditolak oleh AI secara halus.

---

## Appendix A: Glossary
- **Aether:** Nama sandi dari platform konseling ini.
- **NLP (Natural Language Processing):** Cabang kecerdasan buatan yang membantu komputer memahami, menafsirkan, dan memanipulasi bahasa manusia.
- **CBT (Cognitive Behavioral Therapy):** Bentuk perawatan psikologis yang efektif untuk berbagai masalah termasuk depresi dan gangguan kecemasan.
- **Middleware:** Komponen *software* Laravel yang bertindak sebagai jembatan antara permintaan dan tanggapan; digunakan di sini untuk menyeleksi pengguna yang memiliki akses (login).
- **FastAPI:** Kerangka kerja web modern berbasis Python yang digunakan untuk membangun subsistem API pemroses kecerdasan buatan.
