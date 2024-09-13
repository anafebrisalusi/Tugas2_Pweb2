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
