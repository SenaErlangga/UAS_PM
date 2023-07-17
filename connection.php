<?php
$servername = "127.0.0.1";  // Ganti dengan nama server database Anda
$username = "root";  // Ganti dengan nama pengguna database Anda
$password = "";  // Ganti dengan kata sandi database Anda
$dbname = "db_phone";  // Ganti dengan nama database yang ingin Anda akses

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengeksekusi perintah SQL
$sql = "SELECT * FROM tbl_phone";  // Ganti dengan nama tabel yang ingin Anda akses
$result = $conn->query($sql);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    // Melakukan sesuatu dengan data yang diperoleh dari database
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Tidak ada data yang ditemukan.";
}

// Menutup koneksi
$conn->close();
?>
