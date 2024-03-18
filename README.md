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

- Melengkapi halaman view() dengan menyertakan kode berikut :
```
<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class Pages extends BaseController
{
    // ...

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}
```
Jika halaman yang diminta tidak ada, kesalahan “Halaman 404 tidak ditemukan” akan ditampilkan.

Baris pertama dalam metode ini memeriksa apakah halaman tersebut benar-benar ada. Fungsi asli PHP is_file()digunakan untuk memeriksa apakah file berada di tempat yang diharapkan. Ini PageNotFoundExceptionadalah pengecualian CodeIgniter yang menyebabkan halaman kesalahan default ditampilkan.

Di templat header, $titlevariabel digunakan untuk menyesuaikan judul halaman. Nilai title didefinisikan dalam metode ini, namun memberikan nilai ke variabel, nilai tersebut diberikan ke elemen title dalam array $data.

Hal terakhir yang harus dilakukan adalah memuat tampilan sesuai urutan tampilannya. Fungsi view()bawaan CodeIgniter akan digunakan untuk melakukan hal ini. Parameter kedua dalam view() fungsi digunakan untuk meneruskan nilai ke tampilan. Setiap nilai dalam $dataarray ditugaskan ke variabel dengan nama kuncinya. Jadi nilai $data['title']di controller setara dengan $titledi view.

#### Catatan!! 

File dan nama direktori apa pun yang dimasukkan ke dalam view()fungsi HARUS cocok dengan huruf besar dan kecil dari direktori sebenarnya dan nama file itu sendiri atau sistem akan memunculkan kesalahan pada platform yang peka huruf besar/kecil.

- Menjalankan Aplikasi

Masukkan perintah "php spark serve" pada cmd terminal. Kemudian akan muncul alamat localhost. Untuk memulai server web, dapat diakses pada port 8080. Jika Anda mengatur field lokasi di browser Anda ke localhost:8080, Anda akan melihat halaman selamat datang CodeIgniter.

<img width="544" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/177ebefc-d158-47c0-ac7d-efabfc789e69">

Berikut tampilan jika mengarah ke "http://localhost:8080/home"

<img width="215" alt="image" src="https://github.com/AisyahNK274/Tugas1_PBF_Aisyah/assets/134478695/b3b84705-ad0e-48f8-8a1d-9e2ebc495e39">


2. Buat Item Berita

- Buat database untuk digunakan

Diperlukan database baru bernama ci4tutorial. Kemudian buat tabel bernama News. Isikan tabel tersebut sesuai dengan struktur. Lakukan konfigurasi CodeIgniter.
```
CREATE TABLE news (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    slug VARCHAR(128) NOT NULL,
    body TEXT NOT NULL,
    PRIMARY KEY (id),
    UNIQUE slug (slug)
);
```

- Hubungkan ke Basis Data

File konfigurasi lokal, .env , yang telah  di buat saat menginstal CodeIgniter, harus memiliki pengaturan properti database yang tidak diberi komentar dan disetel dengan tepat untuk database yang ingin digunakan.
```
database.default.hostname = localhost
database.default.database = ci4
database.default.username = root
database.default.password = root
database.default.DBDriver = MySQLi
```

- Siapkan Model

Model bertugas mengelola database, komputasi program, request validasi controller, dan manipulasi data. Bagian ini menyimpan business/ domain logic. Logika bisnis yang dimaksud itu sendiri yaitu alur program untuk mengelola perputaran informasi. Fungsi lainnya yaitu membuat user interface dan database terhubung. 

- Buat model berita

Buka direktori app/Models dan buat file baru bernama NewsModel.php dan tambahkan kode berikut.
```
<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
}
```

Kode diatas akan menciptakan model baru dengan memperluas CodeIgniter\Modeldan memuat perpustakaan database. Ini akan membuat kelas database tersedia melalui $this->dbobjek.

- Tambahkan kode berikut ke NewsModel::getNews().
```
public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
```

Dengan kode ini, dapat melakukan dua kueri berbeda. Kita juga bisa mendapatkan semua catatan berita, atau mendapatkan item berita melalui siputnya.

Dua metode yang digunakan di sini, findAll()dan first(), disediakan oleh CodeIgniter\Modelkelas. Mereka sudah mengetahui tabel yang akan digunakan berdasarkan $table properti yang kita atur di NewsModelkelas tadi. Mereka adalah metode pembantu yang menggunakan Pembuat Kueri untuk menjalankan perintahnya pada tabel saat ini, dan mengembalikan serangkaian hasil dalam format pilihan Anda. Dalam contoh ini, findAll()mengembalikan array dari array.

- Tampilkan Berita

Setelah kueri ditulis, model harus dikaitkan dengan tampilan yang akan menampilkan item berita kepada pengguna. Ini bisa dilakukan di Pagespengontrol yang kami buat sebelumnya, tetapi demi kejelasan, Newspengontrol baru telah ditentukan.

- Menambahkan Aturan Perutean

Ubah file app/Config/Routes.php dengan kode berikut :
```
<?php

// ...

use App\Controllers\News; // Add this line
use App\Controllers\Pages;

$routes->get('news', [News::class, 'index']);           // Add this line
$routes->get('news/(:segment)', [News::class, 'show']); // Add this line

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```

Hal ini memastikan permintaan mencapai Newspengontrol alih-alih langsung ke Pagespengontrol. Baris kedua $routes->get()merutekan URI dengan slug ke show()metode di Newspengontrol.

- Buat pengontrol berita

Buat pengontrol baru di app/Controllers/News.php dengan kode berikut :
```
<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews();
    }

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);
    }
}
```
BaseController memperluas kelas inti CodeIgniter, Controlleryang menyediakan beberapa metode pembantu, dan memastikan bahwa Anda memiliki akses ke objek saat ini Requestdan Response, serta Loggerkelas tersebut, untuk menyimpan informasi ke disk.

Berikutnya, ada dua metode, satu untuk melihat semua item berita, dan satu lagi untuk item berita tertentu.

Selanjutnya, model()fungsi tersebut digunakan untuk membuat NewsModelinstance. Ini adalah fungsi pembantu. Anda dapat membaca lebih lanjut tentangnya di Fungsi dan Konstanta Global . Anda juga bisa menulis , jika Anda tidak menggunakannya.$model = new NewsModel();


- Berita lengkap::index() Metode

Ubah index()metodenya menjadi seperti ini:
```
<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    // ...
}
```
Kode di atas mengambil semua catatan berita dari model dan menugaskannya ke variabel. Nilai judul juga ditetapkan ke $data['title'] elemen dan semua data diteruskan ke tampilan. Anda sekarang perlu membuat tampilan untuk merender item berita.


- Buat file tampilan berita/indeks

Buat app/Views/news/index.php dan tambahkan potongan kode berikut.
```
<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>
```

- Berita lengkap::show() Metode

Model yang dibuat sebelumnya dibuat sedemikian rupa sehingga dapat dengan mudah digunakan untuk fungsi ini. Anda hanya perlu menambahkan beberapa kode ke controller dan membuat tampilan baru. Kembali ke Newspengontrol dan perbarui show()metode dengan yang berikut:
```
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    // ...

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}
```
- Buat berita/file

Satu-satunya hal yang perlu dilakukan adalah membuat tampilan terkait di app/Views/news/view.php . Letakkan kode berikut di file ini.

```
<h2><?= esc($news['title']) ?></h2>
<p><?= esc($news['body']) ?></p>
```

Arahkan browser Anda ke halaman “berita”, yaitu localhost:8080/news.


### 4. CodeIgniter Overview

#### Bekerja dengan permintaan HTTP

HTTP adalah istilah yang digunakan untuk menggambarkan konvensi pertukaran itu. Itu singkatan dari HyperText Transfer Protocol. Tujuan Anda saat mengembangkan aplikasi web adalah untuk selalu memahami apa yang diminta browser, dan mampu merespons dengan tepat.

- Permintaan

Setiap kali klien (browser web, aplikasi ponsel cerdas, dll) membuat permintaan, ia mengirimkan pesan teks kecil ke server dan menunggu tanggapan.

Permintaannya akan terlihat seperti ini:
```
GET / HTTP/1.1
Host codeigniter.com
Accept: text/html
User-Agent: Chrome/46.0.2490.80
```
Pesan ini menampilkan semua informasi yang diperlukan untuk mengetahui apa yang diminta klien. Ini memberitahukan metode permintaan (GET, POST, DELETE, dll), dan versi HTTP yang didukungnya.

- Responnya

Setelah server menerima permintaan, aplikasi Anda akan mengambil informasi tersebut dan menghasilkan beberapa output. Server akan menggabungkan keluaran Anda sebagai bagian dari responsnya terhadap klien. Ini juga direpresentasikan sebagai pesan teks sederhana yang terlihat seperti ini:
```
HTTP/1.1 200 OK
Server: nginx/1.8.0
Date: Thu, 05 Nov 2015 05:33:22 GMT
Content-Type: text/html; charset=UTF-8

<html>
    . . .
</html>
```

Responsnya memberi tahu klien versi spesifikasi HTTP apa yang digunakannya dan, mungkin yang paling penting, kode status (200). Kode status adalah salah satu dari sejumlah kode yang telah distandarisasi agar memiliki arti yang sangat spesifik bagi klien. Ini dapat memberi tahu mereka bahwa halaman tersebut berhasil (200), atau bahwa halaman tersebut tidak ditemukan (404). 
