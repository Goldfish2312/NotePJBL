<?php
// Menyertakan file koneksi database
include 'db.php';

// Ambil ID catatan dari URL
$id = $_GET['id'];

// Mengambil data catatan berdasarkan ID
$query = "SELECT * FROM notes WHERE id = $id";
$result = mysqli_query($conn, $query);
$note = mysqli_fetch_assoc($result);

if (!$note) {
    die("Catatan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <!-- Menyertakan file CSS eksternal -->
    <link rel="stylesheet" href="edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Catatan</h1>

        <!-- Form untuk mengedit catatan -->
        <form action="update_note.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
            <textarea name="note" id="noteText" placeholder="Tulis catatan kamu di sini..."><?php echo htmlspecialchars($note['content']); ?></textarea>
            <button type="submit" class="save-btn">Simpan & Kembali</button>
        </form>
    </div>
    
    <scr
