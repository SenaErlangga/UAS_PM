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
// Mengambil data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_phone"];
    $tipe = $_POST["phone_name"];
    $harga = $_POST["price"];

    // Melakukan validasi data yang diterima
    if (empty($id) || empty($tipe) || empty($harga)) {
        echo "ID Phone, Phone Name, dan Price harus diisi";
        exit;
    }
    // Menyiapkan dan menjalankan query untuk menambahkan data telepon ke dalam tabel
    $sql = "INSERT INTO tbl_phone (id_phone, phone_name, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id, $tipe, $harga);

    if ($stmt->execute()) {
        echo "Data telepon berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    // Menutup statement
    $stmt->close();

    // Menutup koneksi database
    $conn->close();

    // Mengarahkan kembali ke halaman sebelumnya
header("Location: index.php");
exit;
}
?>
