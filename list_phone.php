<?php
function searchPhone($searchTerm) {
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

    // Mengeksekusi perintah SQL untuk mencari telepon
    $sql = "SELECT * FROM tbl_phone WHERE id_phone LIKE '%$searchTerm%' OR price LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Memeriksa hasil pencarian
    if ($result->num_rows > 0) {
        // Menampilkan hasil pencarian
        while ($row = $result->fetch_assoc()) {
            echo "Id : " . $row["id_phone"] . "<br>";
            echo "Tipe Handphone : " . $row["phone_name"] . "<br>";
            echo "Harga : " . $row["price"] . "<br><br>";
            echo "<a href=\"delete_phone.php?id=" . $row["id_phone"] . "\" class=\"delete-button\">Hapus</a><br><br>";
        }
    } else {
        echo "Tidak ada hasil pencarian yang ditemukan.";
    }

    // Menutup koneksi
    $conn->close();
}
?>
