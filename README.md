### Tugas1_PBF_Aisyah

# CodeIgniter

### 1. Pengertian

  CodeIgniter adalah kerangka pengembangan aplikasi yang dikembangkan pada tahun 2006 oleh Rick Ellis. CodeIgniter digunakan untuk membangun situs web dengan menggunakan konsep Model-View-Controller (MVC). Model-View-Controller (MVC) adalah praktik standar industri yang memisahkan data, logika, dan presentasi dalam aplikasi web. Penggunaan CodeIgniter bertujuan untuk mempercepat dan menyederhanakan proses pengembangan proyek. 
#### Framework ini cocok untuk apa saja?
- Jika Anda menginginkan sebuah kerangka kerja dengan ukuran yang kecil.

- Menginginkan sebuah kerangka kerja yang hampir tidak memerlukan konfigurasi.

- Menginginkan sebuah kerangka kerja yang tidak perlu menggunakan baris perintah (command line).

- Memerlukan dokumentasi yang jelas dan menyeluruh.
#### Kelebihan CodeIgniter
- Memiliki footprint yang kecil, artinya penggunaan sumber daya komputer lebih efisien. Semakin kecil footprint, semakin cepat waktu respons aplikasi sehingga memberikan pengalaman pengguna yang lebih baik.

- Memiliki antarmuka yang mampu membantu mendeteksi dan menangani bug serta error dengan cepat.

- Memiliki fitur bawaan untuk melindungi aplikasi dari ancaman umum seperti XSS, CSRF, dan SQL injection sehingga dapat mengurangi risiko keamanan tanpa mengubah fundamental cara kerja aplikasi.

- CodeIgniter didesain dengan antarmuka yang sederhana dan intuitif, sehingga mudah digunakan bagi developer pemula sekalipun.

### 2. Cara Instalasi
  CodeIgniter memiliki dua metode instalasi yang didukung yaitu download manual dan menggunakan Composer.
  
#### A. Menggunakan Composer
  
  Untuk menginstall CodeIgniter dengan composer, masukkan perintah berikut.
  
  <img width="415" alt="image" src="https://github.com/AisyahNK274/AisyahNK274/assets/134478695/a619961d-74d9-4bfa-a388-8ad400af31b4">

  Tunggu sampai proses selesai.
  
  Ada beberapa perintah yang diberikan antara lain :
  - create-project adalah perintah untuk membuat proyek baru dengan composer.
  - codeigniter4/appstarter adalah file CI yang akan di-download.
  - CI4_AISYAH adalah nama folder yang akan kita buat.

  Setelah prosesnya selesai, akan mendapatkan folder baru dengan nama CI4_AISYAH.

  <img width="142" alt="image" src="https://github.com/AisyahNK274/AisyahNK274/assets/134478695/b034c988-f47f-4ee7-94c3-6365f9be835b">

#### B. Download Manual

  Langkah - langkah yang harus dilakukan :

  1. Download file zip dari CodeIgniter 4 melalui website resminya.
  
     <img width="549" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/8bd18db8-04bb-4b10-8e52-7f914828b70f">

  2. Setelah file CodeIgniter 4 berhasil terdownload, pindahkan file ke folder C:/xampp/htdocs. Kemudian, extract file zip tersebut dan ubah namanya sesuai dengan nama project yang Anda inginkan. 
  
  3. Project CodeIgniter ini sudah bisa langsung dijalankan di web browser Anda dengan mengakses localhost/ci4/public.

      <img width="546" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/4ea196d7-d731-4e72-9fab-6a9e9a4c01ed">

### 3. Membuat Aplikasi Berita Dasar

Pada bagian ini dibagi menjadi 3 yaitu :

- Halaman statis , yang akan mengajarkan Anda dasar-dasar pengontrol, tampilan, dan perutean.

- Bagian Berita , tempat Anda akan mulai menggunakan model dan melakukan beberapa operasi basis data dasar.

- Buat item berita , yang akan memperkenalkan operasi database lebih lanjut dan validasi formulir.

#### Penjelasan

1. Halaman Statis

- Menetapkan Aturan Perutean
  
Caranya buka file rute yang terletak di app/Config/Routes.php
  
<img width="284" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/dfe6aa8b-7911-4221-a4ca-684f6ad02df0">

Pada gambar diatas ada sebuah pemetaan rute dengan menggunakan metode get() dari objek $routes. Rute ini akan menangani permintaan yang datang ke URL root ('/') dan akan mengeksekusi method index dari controller Home. Ini adalah cara untuk menentukan bahwa ketika pengguna mengakses halaman utama situs web (URL root), method index dari controller Home akan dipanggil untuk menangani permintaan tersebut.
  
Tambahkan baris berikut, setelah arahan rute untuk '/'

<img width="345" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/c752e68c-7670-4c9c-bd86-b70cd68ea603">

>Pemetaan Rute Pertama : Pada baris pertama, terdapat pernyataan $routes->get('pages', [Pages::class, 'index']);. Ini adalah cara untuk menetapkan rute untuk permintaan ke URL yang memiliki path 'pages'. Ketika URL seperti itu diakses, itu akan mengarah ke method index dalam controller Pages. Ini berarti ketika pengguna mengakses URL /pages, controller Pages akan menangani permintaan tersebut dan menjalankan method index.

>Pemetaan Rute Kedua : Pada baris kedua, terdapat pernyataan $routes->get('(:segment)', [Pages::Class, 'view']);. Ini adalah contoh dari apa yang disebut sebagai "Wildcard Route" atau rute dengan parameter. Ini akan menangani permintaan untuk URL apapun yang hanya memiliki satu segment (bagian path). (:segment) adalah pola placeholder yang akan cocok dengan segmen apa pun dalam URL. Ini memungkinkan untuk menangani URL yang dinamis.

- Membuat Pengontrol Halaman
  
Buat file di app/Controllers/Pages.php dengan kode berikut.
```
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
    }
}
```

Kelas Pages memperluas BaseControllerkelas yang memperluas CodeIgniter\Controllerkelas. Ini berarti bahwa kelas Pages baru dapat mengakses metode dan properti yang ditentukan dalam CodeIgniter\Controllerkelas (system/Controller.php).

- Membuat tampilan
  
Buat header di app/Views/templates/header.php dan tambahkan kode berikut :
```
<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<body>

    <h1><?= esc($title) ?></h1>
```

Header berisi kode HTML dasar yang ingin Anda tampilkan sebelum memuat tampilan utama, bersama dengan judul. Ini juga akan menampilkan $titlevariabel, yang akan kita definisikan nanti di pengontrol. Sekarang, buat footer di app/Views/templates/footer.php yang menyertakan kode berikut :
```
<em>&copy; 2022</em>
</body>
</html>
```
- Menambahkan logika ke Controller

Badan halaman statis akan ditempatkan di direktori app/Views/pages. Di direktori itu, buatlah dua file bernama home.php dan about.php. Di dalam file tersebut, ketikkan beberapa teks - apa pun yang Anda suka - dan simpan.

<img width="99" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/b94bf39c-8b5e-49ba-b6b5-624890fa45f4">

