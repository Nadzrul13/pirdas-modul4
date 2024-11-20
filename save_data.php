<?php

// Konfigurasi database
$host = "localhost";
$dbname = "pirdas4";  // Nama database Anda
$username = "root";   // Username database Anda
$password = "";       // Password database Anda (jika ada)

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangkap data yang dikirim menggunakan metode GET
$angka_sumbu = $_GET['angka_sumbu'] ?? null;
$arah = $_GET['arah'] ?? null;

// Validasi data
if ($angka_sumbu === null || $arah === null) {
    die("Data tidak lengkap.");
}

// Validasi arah
$valid_arah = ['kanan', 'kiri', 'depan', 'belakang'];
if (!in_array($arah, $valid_arah)) {
    die("Arah tidak valid");
}

// Query untuk menyimpan data ke dalam database
$sql = "INSERT INTO sensor_data (angka_sumbu, arah) VALUES ('$angka_sumbu', '$arah')";

// Mengeksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
