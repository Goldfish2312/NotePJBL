<?php
// Menyertakan file koneksi database
include 'db.php';

// Mendapatkan data dari form
$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['note']);

// Menyimpan catatan ke database
$query = "INSERT INTO notes (title, content) VALUES ('$title', '$content')";
if (mysqli_query($conn, $query)) {
    echo "Catatan berhasil disimpan!";
    header("Location: index.php"); // Setelah simpan, kembali ke halaman utama
    exit();
} else {
    echo "Gagal menyimpan catatan: " . mysqli_error($conn);
}
?>
