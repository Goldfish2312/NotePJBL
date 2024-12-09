<?php
// Menyertakan file koneksi database
include 'db.php';

// Mendapatkan catatan yang disimpan
$query = "SELECT * FROM notes ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Cek jika ada catatan
$notes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $notes[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notepad App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="tks">catetin</h1>

        <!-- Form untuk menulis catatan -->
        <form action="save_note.php" method="POST">
    <input style="border-radius: 7px; margin-bottom: 20px;" type="text" name="title" id="noteTitle" placeholder="Tulis judul catatan..." required>
    <textarea rows="12" cols="29" style="resize: none;" name="note" id="noteText" placeholder="Tulis catatan kamu di sini..." required></textarea>
    <button type="submit" class="save-btn">Simpan Catetan</button>
</form>



        <h2 class="tks mt-3">Catetan yang di simpen</h2>
        
        <!-- Menampilkan catatan yang disimpan dalam card -->
        <div id="savedNotes" class="card-container">
        <?php if (count($notes) > 0): ?>
            <?php foreach ($notes as $note): ?>
    <div class="card">
        <div class="card-body">
            <!-- Judul -->
            <h5 class="card-title">
                <?php echo htmlspecialchars($note['title']); ?>
            </h5>

            <!-- Isi Catatan -->
            
            
            <!-- Tampilkan Waktu Dibuat -->
            <small class="text-muted">
                Dibuat pada: <?php echo date('d M Y, H:i', strtotime($note['created_at'])); ?>
            </small>

            <!-- Tombol Edit dan Hapus -->
            <div class="actions">
                <a href="edit.php?id=<?php echo $note['id']; ?>" class="edit-btn">Edit</a>
                <a href="delete.php?id=<?php echo $note['id']; ?>" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?');">
                    Hapus
                </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php else: ?>
    <p>ga ada catatan yang disimpen.</p>
<?php endif; ?>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>
