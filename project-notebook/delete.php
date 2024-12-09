<?php
// Menyertakan file koneksi database
include 'db.php';

// Mendapatkan ID catatan dari URL
$id = $_GET['id'];

// Menghapus catatan dari database
$query = "DELETE FROM notes WHERE id = $id";
if (mysqli_query($conn, $query)) {
    // Redirect kembali ke halaman utama setelah berhasil menghapus
    header("Location: index.php");
    exit();
} else {
    echo "Gagal menghapus catatan: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
