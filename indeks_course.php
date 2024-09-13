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
