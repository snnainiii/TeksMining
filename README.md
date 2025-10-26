# 🔍 Pengembangan Search Engine Multi-Kategori untuk Berita Kompas dan Liputan6  

![Python](https://img.shields.io/badge/Python-3776AB?style=for-the-badge&logo=python&logoColor=white)
![Flask](https://img.shields.io/badge/Flask-000000?style=for-the-badge&logo=flask&logoColor=white)
![NLP](https://img.shields.io/badge/NLP-Text--Mining-brightgreen?style=for-the-badge)
![TFIDF](https://img.shields.io/badge/TF--IDF-Model-orange?style=for-the-badge)
![Cosine Similarity](https://img.shields.io/badge/Cosine--Similarity-Implemented-blue?style=for-the-badge)
![Kompas](https://img.shields.io/badge/Kompas-News-red?style=for-the-badge)
![Liputan6](https://img.shields.io/badge/Liputan6-News-orange?style=for-the-badge)

> **Proyek Akhir – Mata Kuliah Penambangan Teks (Text Mining)**  
> **Universitas Trunojoyo Madura – Teknik Informatika, 2024**  

---

## 🧩 Deskripsi  
**Search Engine Multi-Kategori** adalah proyek berbasis **Natural Language Processing (NLP)** yang mengimplementasikan sistem pencarian berita otomatis dari portal **Kompas** dan **Liputan6**.  
Sistem ini mampu mengelompokkan berita ke dalam 7 kategori seperti Politik, Ekonomi, Pendidikan, Teknologi, Olahraga, Kesehatan, dan Hiburan menggunakan pendekatan **TF-IDF** dan **Cosine Similarity**.  

Tujuan proyek ini adalah untuk menghasilkan sistem pencarian berita yang **relevan, efisien, dan informatif** bagi pengguna.

---

## 🚀 Fitur Utama  

- 📰 **Multi-Source Crawling** – Mengambil berita otomatis dari Kompas & Liputan6  
- 🧠 **Klasifikasi Otomatis** – Mengelompokkan berita ke dalam 7 kategori  
- 🔍 **Search Engine** – Pencarian berdasarkan kata kunci, kategori, atau kombinasi keduanya  
- 📊 **Analisis Pola Kata** – Menggunakan TF-IDF, bigram, dan trigram  
- ☁️ **Word Cloud Visualization** – Menampilkan kata populer di setiap kategori  
- 🧮 **TF-IDF + Cosine Similarity** – Mengukur relevansi antar berita dan hasil pencarian  

---

## ⚙️ Teknologi yang Digunakan  

| Komponen | Teknologi |
|-----------|------------|
| Bahasa Pemrograman | Python |
| Framework | Flask |
| Library Utama | NLTK, Scikit-Learn, Pandas, Matplotlib, Seaborn, WordCloud |
| Database | CSV Dataset Crawling (Kompas & Liputan6) |
| Model Analisis | TF-IDF, Cosine Similarity |
| Visualisasi | Word Cloud, Histogram, Frequency Plot |

---

## 🧠 Metodologi  

### 1️⃣ Data Collection & Preprocessing  
- Crawling berita dari **Kompas** dan **Liputan6**  
- Membersihkan data (duplikasi, stopword, missing values)  
- Tokenisasi, stemming, dan normalisasi teks  

### 2️⃣ Exploratory Data Analysis (EDA)  
- Analisis distribusi kata, bigram, dan trigram  
- Word Cloud per kategori  
- Analisis frekuensi kata penting  

### 3️⃣ Model Development  
- Implementasi **TF-IDF Vectorizer**  
- Menghitung kemiripan antar dokumen menggunakan **cosine similarity**  
- Membangun antarmuka pencarian berbasis **Flask**  

### 4️⃣ Deployment & Testing  
- Pengujian dengan kata kunci seperti *"Indonesia"*, *"sepak bola"*, *"motor"*, dan *"makanan"*  
- Evaluasi akurasi hasil pencarian berdasarkan relevansi teks  

---

## 📈 Hasil dan Pembahasan  
Sistem berhasil menampilkan hasil pencarian berita berdasarkan:
- **Kata kunci** – Menampilkan berita yang mengandung kata tertentu  
- **Kategori** – Menampilkan berita berdasarkan kategori yang dipilih  
- **Gabungan** – Menyaring hasil pencarian agar lebih relevan  

Penerapan **TF-IDF dan cosine similarity** terbukti meningkatkan relevansi hasil pencarian dan efisiensi klasifikasi berita.

---

## 💡 Kesimpulan  
- Sistem berhasil mengelompokkan berita multi-kategori secara otomatis.  
- Penerapan **TF-IDF + Cosine Similarity** memberikan hasil pencarian yang akurat.  
- Word cloud dan analisis frekuensi membantu memahami topik dominan.  
- Dapat dikembangkan lebih lanjut menggunakan **BERT** atau **Word Embedding** untuk analisis semantik mendalam.  

---

## 🛠️ Saran Pengembangan  
- Implementasi model **Transformer (BERT)** untuk konteks kalimat  
- Fitur pencarian multimedia (gambar & video)  
- Optimasi kecepatan crawling dan query  
- Peningkatan tampilan UI/UX agar lebih interaktif  

