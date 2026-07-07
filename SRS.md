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
- `RANCANGAN.txt`: Dokumen rancangan latar belakang dan fitur utama proyek.
- `documentation.txt`: Panduan penggunaan dan dokumentasi arsitektur file Aether.
- Standar penulisan SRS berbasis IEEE Std 830-1998.

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

Sistem ini dipecah berdasarkan fitur fungsional utamanya.

### 3.1 Asesmen dan Skrining Keadaan Emosional (AI/NLP)
**Deskripsi dan Prioritas:** Fitur inti (*High Priority*). Menganalisis teks yang diinputkan pengguna untuk mendeteksi tingkat krisis emosional.
- **REQ-F-01:** Sistem (FastAPI) harus mampu menerima teks, menormalisasi bahasa gaul (*slang*), dan menganalisis sentimen menggunakan algoritma pemrosesan bahasa alami.
- **REQ-F-02:** Sistem harus mampu mengembalikan status risiko (Hijau/Aman, Kuning/Distress, Merah/Krisis) dan skor dari skala 0 hingga 100.
- **REQ-F-03:** Sistem tidak boleh menghitung skor untuk topik yang berada di luar ranah kesehatan mental/akademik.

### 3.2 Chatbot Pendampingan Awal (CBT & Mindfulness)
**Deskripsi dan Prioritas:** Fitur interaksi utama (*High Priority*). Menyediakan respons empatik terhadap curhatan mahasiswa.
- **REQ-F-04:** AI Engine harus mampu membangkitkan teks balasan yang bersifat suportif, tidak menghakimi, dan berbasis pendekatan psikologis (CBT).
- **REQ-F-05:** Laravel harus menyimpan *history* (konteks percakapan) dalam 1 sesi agar chatbot mengingat obrolan yang sedang berlangsung.

### 3.3 Dashboard Mood Tracking Dinamis
**Deskripsi dan Prioritas:** Visualisasi analitik pengguna (*Medium Priority*).
- **REQ-F-06:** Sistem harus menampilkan total sesi, rata-rata skor kestabilan (0-10), dan hari berturut-turut (*streak*) berdasarkan data sesi chat di database.
- **REQ-F-07:** Sistem harus menampilkan visualisasi grafik (*Bar Chart*) tren emosi 7 hari terakhir.
- **REQ-F-08 (Quick Log):** Pengguna dapat mencatat *mood* manual tanpa chat panjang melalui tombol emoji di dashboard, dan otomatis tersimpan ke riwayat sesi.

### 3.4 Pusat Sumber Daya (Resource Center) Terpersonalisasi
**Deskripsi dan Prioritas:** Modul pendukung (*High Priority*).
- **REQ-F-09:** Chatbot harus menyisipkan tautan rekomendasi video/artikel secara otomatis ke dalam balasannya sesuai dengan tingkat krisis pengguna (Misal: Video relaksasi ringan untuk "Hijau", Kontak konseling darurat untuk "Merah").
- **REQ-F-10:** Pengguna dapat menelusuri secara manual direktori *Resource Center* melalui *sidebar*.

### 3.5 Autentikasi dan Manajemen Sesi
**Deskripsi dan Prioritas:** Modul keamanan privasi (*High Priority*).
- **REQ-F-11:** Sistem harus melindungi halaman Chat, Mood, dan Resource menggunakan *Middleware* yang mencegah akses tamu tanpa login.
- **REQ-F-12:** Pengguna dapat mengganti nama (Rename) sesi obrolan mereka di *sidebar*.
- **REQ-F-13:** Pengguna dapat menghapus (Delete) riwayat sesi obrolan mereka secara permanen dari database.

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
