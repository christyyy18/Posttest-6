<?php
require "../koneksi.php";

if (isset($_POST['edit'])) {
    $fileId = $_POST['file_id'];
    $newFileName = $_POST['new_file_name'];

    // Query untuk mengedit nama file di database
    $query = "UPDATE files SET filename = '$newFileName' WHERE id = $fileId";
    mysqli_query($koneksi, $query);

    header("Location: dashboard.php?editsuccess");
} else {
    $fileId = $_GET['file_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM files WHERE id = $fileId");
    $row = mysqli_fetch_assoc($query);
}
?>

<!-- Form untuk mengedit file -->
<form action="editFile.php" method="post">
    <input type="hidden" name="file_id" value="<?php echo $fileId; ?>">
    <label for="new_file_name">Nama Baru:</label>
    <input type="text" name="new_file_name" value="<?php echo $row['filename']; ?>" required>
    <button type="submit" name="edit">Edit File</button>
</form>
