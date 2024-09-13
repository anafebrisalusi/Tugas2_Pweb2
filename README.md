# Tentang Saya
## Ana Febri Salusi
## TI-2B
## 230202027



### Tugas 2 Praktikum Pemrograman Web 2
1. Create an OOP-based View, by retrieving data from the MySQL database 
2. Use the _construct as a link to the database 
3. Apply encapsulation according to the logic of the case study 
4. Create a derived class using the concept of inheritance 
5. Apply polymorphism for at least 2 roles according to the case study

#### koneksi.php
```
<?php

// Kelas Courses bertanggung jawab untuk melakukan koneksi ke database dan menampilkan data dari tabel 'courses'
class Courses {
    private $host = "localhost";  // Nama host database
	private $username = "root";    // Username untuk login ke database
	private $password = "";        // Password untuk login ke database
	private $database = "tugas2_pweb2"; // Nama database yang digunakan
	protected $koneksi = "";       // Properti yang menyimpan koneksi database

	// Konstruktor kelas, yang secara otomatis memanggil fungsi koneksi saat kelas diinisialisasi
	function __construct() {
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		
		// Cek apakah koneksi berhasil atau gagal
		if (mysqli_connect_errno()) {
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	// Fungsi untuk menampilkan data dari tabel 'courses'
	function tampil_data() {
		// Query ke database untuk mengambil semua data dari tabel 'courses'
		$data = mysqli_query($this->koneksi, "select * from courses");

		// Memasukkan setiap baris hasil query ke dalam array $hasil
		while ($row = mysqli_fetch_array($data)) {
			$hasil[] = $row;  // Setiap baris hasil query dimasukkan ke array $hasil
		}
		// Mengembalikan array hasil dari query
		return $hasil;
	}
}

// Kelas turunan courses_classes yang mewarisi properti dan metode dari kelas Courses
class courses_classes extends Courses {

    // Overriding fungsi tampil_data untuk mengambil data dari tabel 'courses_classes'
    function tampil_data() {
		// Query untuk mengambil data dari tabel 'courses_classes'
		$data = mysqli_query($this->koneksi, "select * from courses_classes");

		// Memasukkan setiap baris hasil query ke dalam array $hasil
		while ($row = mysqli_fetch_array($data)) {
			$hasil[] = $row;  // Setiap baris hasil query dimasukkan ke array $hasil
		}
		// Mengembalikan array hasil dari query
		return $hasil;
	}
}
?>
```
Berikut penjelasan konsep **Encapsulation**, **Constructor**, **Inheritance**, dan **Polymorphism** dalam kode:

### 1. **Encapsulation (Enkapsulasi)**
   - **Pengertian:** Enkapsulasi adalah konsep di mana data dan fungsi (metode) di dalam kelas dilindungi agar tidak bisa diakses langsung dari luar kelas, kecuali melalui metode yang diizinkan.
   - **Contoh di Kode:**
     - Properti `private` seperti `$host`, `$username`, `$password`, dan `$database` disembunyikan dari akses luar, sehingga hanya bisa digunakan dalam kelas `Courses` sendiri.
     - Properti `protected $koneksi` bisa diakses oleh kelas turunan (`courses_classes`), tapi tidak bisa diakses langsung dari luar.

### 2. **Constructor (Konstruktor)**
   - **Pengertian:** Konstruktor adalah fungsi khusus yang dijalankan otomatis saat sebuah objek dari kelas dibuat.
   - **Contoh di Kode:**
     - Metode `__construct()` dalam kelas `Courses` otomatis dijalankan saat objek `Courses` atau `courses_classes` dibuat. Fungsi ini digunakan untuk menghubungkan ke database dan menyimpan koneksi dalam variabel `$koneksi`.

### 3. **Inheritance (Pewarisan)**
   - **Pengertian:** Pewarisan adalah konsep di mana sebuah kelas turunan mewarisi sifat (properti dan metode) dari kelas induk.
   - **Contoh di Kode:**
     - Kelas `courses_classes` mewarisi semua properti dan metode dari kelas `Courses`. Dengan begitu, `courses_classes` bisa menggunakan koneksi database tanpa harus membuat ulang fungsi koneksinya.
   
### 4. **Polymorphism (Polimorfisme)**
   - **Pengertian:** Polimorfisme memungkinkan satu metode yang sama di kelas induk bisa diubah (override) di kelas turunan untuk berfungsi dengan cara yang berbeda.
   - **Contoh di Kode:**
     - Metode `tampil_data()` di kelas `courses_classes` menimpa metode yang sama dari kelas `Courses`. Meskipun namanya sama, di kelas `courses_classes` metode ini digunakan untuk mengambil data dari tabel `courses_classes`, sementara di kelas `Courses` digunakan untuk mengambil data dari tabel `courses`.

### Kesimpulan:
- **Encapsulation:** Data sensitif seperti informasi database dilindungi dengan properti `private` dan `protected`.
- **Constructor:** Konstruktor dijalankan otomatis saat objek dibuat, fungsinya untuk koneksi ke database.
- **Inheritance:** Kelas `courses_classes` mewarisi metode dan properti dari kelas `Courses`.
- **Polymorphism:** Metode `tampil_data()` digunakan dengan cara yang berbeda di kelas induk dan kelas turunan, tergantung data yang diambil.

  #### indeks_course.php
 ```
  <?php  
// Mengimpor file koneksi untuk menghubungkan ke database
include('koneksi.php');

// Membuat objek dari kelas 'courses' yang diambil dari koneksi.php
$db = new courses();

// Mengambil data dari tabel 'courses' menggunakan metode tampil_data() dari kelas 'courses'
$database = $db->tampil_data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
         .navbar-nav .nav-link {
        color: white !important;
        }
        /* Custom Navbar Color */
        .navbar-custom {
            background-color: #343a40; /* Warna abu-abu gelap untuk navbar */
        }
        .navbar-custom .navbar-brand {
            color: #fff; /* Warna putih untuk nama brand pada navbar */
            font-weight: bold; /* Membuat teks brand tebal */
        }
        .navbar-custom .navbar-brand:hover {
            color: #e9ecef; /* Warna abu-abu muda saat hover */
        }
        .navbar-custom .nav-link {
            color: #fff; /* Warna putih untuk tautan navigasi */
            font-weight: 500; /* Membuat teks tautan sedikit tebal */
        }
        .navbar-custom .nav-link:hover {
            color: #e9ecef; /* Warna abu-abu muda saat tautan di-hover */
            background-color: #495057; /* Latar belakang abu-abu lebih gelap saat di-hover */
            border-radius: 0.25rem; /* Sudut melengkung untuk efek hover */
        }

        /* Custom Table Color */
        .table-custom thead {
            background-color: #6c757d; /* Warna abu-abu sedang untuk header tabel */
            color: #fff; /* Warna putih untuk teks pada header */
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Warna abu-abu terang untuk baris genap */
        }
        .table-custom tbody tr:nth-child(odd) {
            background-color: #e9ecef; /* Warna abu-abu sedikit lebih gelap untuk baris ganjil */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand" href="#">Course Management</a> <!-- Nama aplikasi pada navbar -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- Tombol untuk membuka menu saat tampilan kecil -->
        </button>
        <div class="collapse navbar-collapse" id="navbarNav"> <!-- Daftar tautan navigasi -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="indeks_course.php">Courses <span class="sr-only">(current)</span></a> <!-- Tautan ke halaman daftar course -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indeks_courses_classes.php">Courses Classes</a> <!-- Tautan ke halaman daftar kelas course -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a> <!-- Tautan ke halaman "About" -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a> <!-- Tautan ke halaman "Contact" -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4"> <!-- Memulai konten utama, termasuk tabel course -->
        <table class="table table-bordered table-custom"> <!-- Tabel dengan gaya kustom -->
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom nomor urut -->
                    <th>ID</th> <!-- Kolom ID course -->
                    <th>Code</th> <!-- Kolom kode course -->
                    <th>Name</th> <!-- Kolom nama course -->
                    <th>SKS</th> <!-- Kolom jumlah SKS course -->
                    <th>Hours</th> <!-- Kolom jumlah jam course -->
                    <th>Meeting</th> <!-- Kolom jumlah pertemuan course -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; // Inisialisasi variabel $no untuk nomor urut
                // Loop melalui data dari tabel 'courses'
                foreach($database as $row) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['id']; ?></td> <!-- Menampilkan ID course -->
                        <td><?php echo $row['code']; ?></td> <!-- Menampilkan kode course -->
                        <td><?php echo $row['name']; ?></td> <!-- Menampilkan nama course -->
                        <td><?php echo $row['sks']; ?></td> <!-- Menampilkan jumlah SKS course -->
                        <td><?php echo $row['hours']; ?></td> <!-- Menampilkan jumlah jam course -->
                        <td><?php echo $row['meeting']; ?></td> <!-- Menampilkan jumlah pertemuan course -->
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS dan dependensi -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- jQuery untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> <!-- Popper.js untuk Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
</body>
</html>
```
Berikut penjelasan untuk kode PHP dan HTML di atas:

a. PHP Code:
- Impor Koneksi: include('koneksi.php'); – Memasukkan file koneksi database.
- Objek Kelas: $db = new courses(); – Membuat objek dari kelas courses.
- Ambil Data: $database = $db->tampil_data(); – Mengambil data dari tabel courses menggunakan metode tampil_data().

b. HTML Code:
- Navbar: Navbar dengan tautan ke berbagai halaman seperti "Courses," "Courses Classes," "About," dan "Contact." Menggunakan Bootstrap untuk styling.
- Tabel: Menampilkan data dari tabel courses dalam tabel HTML dengan kolom-kolom seperti ID, kode, nama, SKS, jam, dan pertemuan. Data diambil dari variabel $database yang diisi oleh PHP.

c. Bootstrap dan Styling:
- CSS Kustom: Untuk navbar dan tabel dengan warna dan gaya khusus.
- JS dan CSS: Menggunakan Bootstrap untuk fungsionalitas dan styling.

  #### indeks_courses.classes.php
```
<?php  
// Mengimpor file koneksi untuk menghubungkan ke database
include('koneksi.php');

// Membuat objek dari kelas 'courses_classes' yang diambil dari koneksi.php
$db = new courses_classes();

// Mengambil data dari tabel 'courses_classes' menggunakan metode tampil_data() dari kelas 'courses_classes'
$database = $db->tampil_data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS untuk menyesuaikan tampilan Navbar dan Tabel -->
    <style>
        .navbar-nav .nav-link {
        color: white !important;
        }

        /* Warna kustom untuk Navbar */
        .navbar-custom {
            background-color: #343a40; /* Warna abu-abu gelap untuk latar belakang navbar */
        }
        .navbar-custom .navbar-brand {
            color: #fff; /* Warna putih untuk teks brand */
            font-weight: bold; /* Membuat teks brand lebih tebal */
        }
        .navbar-custom .navbar-brand:hover {
            color: #e9ecef; /* Warna abu-abu muda saat di-hover */
        }
        .navbar-custom .nav-link {
            color: #fff; /* Warna putih untuk tautan navigasi */
            font-weight: 500; /* Teks navigasi sedikit tebal */
        }
        .navbar-custom .nav-link:hover {
            color: #e9ecef; /* Warna abu-abu muda saat tautan di-hover */
            background-color: #495057; /* Latar belakang abu-abu lebih gelap saat di-hover */
            border-radius: 0.25rem; /* Sudut melengkung untuk efek hover */
        }

        /* Warna kustom untuk Tabel */
        .table-custom thead {
            background-color: #6c757d; /* Warna abu-abu sedang untuk header tabel */
            color: #fff; /* Teks putih untuk header tabel */
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Warna abu-abu terang untuk baris genap */
        }
        .table-custom tbody tr:nth-child(odd) {
            background-color: #e9ecef; /* Warna abu-abu sedikit lebih gelap untuk baris ganjil */
        }
    </style>
</head>
<body>
        
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <!-- Brand pada Navbar -->
        <a class="navbar-brand" href="#">Course Management</a> <!-- Nama aplikasi pada navbar -->
        <!-- Tombol Navbar untuk tampilan kecil -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Daftar tautan navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <!-- Tautan ke halaman indeks_course.php -->
                    <a class="nav-link" href="indeks_course.php">Courses <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <!-- Tautan ke halaman indeks_courses_classes.php -->
                    <a class="nav-link" href="indeks_courses_classes.php">Courses Classes</a>
                </li>
                <li class="nav-item">
                    <!-- Placeholder tautan untuk halaman "About" -->
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <!-- Placeholder tautan untuk halaman "Contact" -->
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4"> <!-- Memulai konten utama, menampilkan tabel dengan data kelas kursus -->
        <table class="table table-bordered table-custom">
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom nomor urut -->
                    <th>ID</th> <!-- Kolom ID kelas course -->
                    <th>Student Class ID</th> <!-- Kolom ID kelas siswa -->
                    <th>Course ID</th> <!-- Kolom ID course -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; // Inisialisasi variabel $no untuk nomor urut
                // Loop untuk menampilkan setiap baris data kelas course
                foreach($database as $row){
                    ?>
                    <tr>
                        <!-- Menampilkan nomor urut -->
                        <td><?php echo $no++; ?></td>
                        <!-- Menampilkan ID dari tabel courses_classes -->
                        <td><?php echo $row['id']; ?></td>
                        <!-- Menampilkan student_class_id dari tabel courses_classes -->
                        <td><?php echo $row['student_class_id']; ?></td>
                        <!-- Menampilkan course_id dari tabel courses_classes -->
                        <td><?php echo $row['course_id']; ?></td>
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS dan dependensi -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- jQuery untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> <!-- Popper.js untuk Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
</body>
</html>
```
Berikut adalah penjelasan singkat dan jelas dari kode PHP dan HTML tersebut:

1. **PHP Code:**
   - **Impor Koneksi:** `include('koneksi.php');` – Memasukkan file koneksi database.
   - **Objek Kelas:** `$db = new courses_classes();` – Membuat objek dari kelas `courses_classes`.
   - **Ambil Data:** `$database = $db->tampil_data();` – Mengambil data dari tabel `courses_classes` menggunakan metode `tampil_data()`.

2. **HTML Code:**
   - **Navbar:** Menampilkan navigasi dengan tautan ke halaman "Courses," "Courses Classes," "About," dan "Contact" menggunakan Bootstrap.
   - **Tabel:** Menampilkan data dari tabel `courses_classes` dengan kolom ID, `student_class_id`, dan `course_id`. Data diambil dari variabel `$database` yang diisi oleh PHP.

3. **Bootstrap dan Styling:**
   - **CSS Kustom:** Mengatur warna dan gaya navbar serta tabel dengan Bootstrap dan CSS kustom.

Secara keseluruhan, kode ini menghubungkan ke database, mengambil data dari tabel `courses_classes`, dan menampilkannya dalam tabel di halaman web dengan tampilan yang disesuaikan.
