<?php
require "../koneksi.php";

if (isset($_GET['file_id'])) {
    $fileId = $_GET['file_id'];

    // Query untuk mendapatkan nama file yang akan dihapus
    $query = mysqli_query($koneksi, "SELECT filename FROM files WHERE id = $fileId");
    $row = mysqli_fetch_assoc($query);
    $fileName = $row['filename'];

    // Hapus file dari direktori
    $filePath = "../uploads/" . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Hapus informasi file dari database
    $deleteQuery = "DELETE FROM files WHERE id = $fileId";
    mysqli_query($koneksi, $deleteQuery);

    header("Location: dashboard.php?deletesuccess");
}
?>
