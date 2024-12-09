<?php
// Menyertakan file koneksi database
include 'db.php';

// Mendapatkan ID dan catatan baru dari form
$id = $_POST['id'];
$noteContent = mysqli_real_escape_string($conn, $_POST['note']);

// Update catatan di database
$query = "UPDATE notes SET content = '$noteContent' WHERE id = $id";
if (mysqli_query($conn, $query)) {
    // Redirect ke halaman utama jika berhasil
    header("Location: index.php");
    exit();
} else {
    echo "Gagal mengupdate catatan: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
