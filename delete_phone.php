<?php
// Memasukkan kode untuk koneksi ke database
include 'connection.php';

// Memeriksa apakah parameter id_phone ada dalam URL
if (isset($_GET['id'])) {
    $id_phone = $_GET['id'];

    // Menyiapkan dan menjalankan query untuk menghapus data telepon
    $sql = "DELETE FROM tbl_phone WHERE id_phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_phone);

    if ($stmt->execute()) {
        // Mengatur session sukses
        session_start();
        $_SESSION['success_message'] = "Data telepon berhasil dihapus";
    } else {
        // Mengatur session error
        session_start();
        $_SESSION['error_message'] = "Gagal menghapus data telepon: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
} else {
    // Mengatur session error jika parameter id tidak ditemukan
    session_start();
    $_SESSION['error_message'] = "ID Telepon tidak ditemukan";
}

// Menutup koneksi database
$conn->close();

// Mengarahkan kembali ke halaman sebelumnya
header("Location: index.php");
exit;
?>
