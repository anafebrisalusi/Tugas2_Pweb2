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
