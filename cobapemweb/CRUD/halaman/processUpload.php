if (isset($_POST['upload'])) {
  $file = $_FILES['file'];

  $fileOriginalName = $file['name'];
  $fileTmpName = $file['tmp_name'];

  $fileExtension = pathinfo($fileOriginalName, PATHINFO_EXTENSION); // Dapatkan ekstensi file

  // Generate nama file baru sesuai format "yyyy-mm-dd nama-file.ekstensi"
  $newFileName = date("Y-m-d ") . str_replace(" ", "-", $fileOriginalName);
  $fileDestination = "../uploads/" . $newFileName;

  // Validasi file (tipe file yang diizinkan, ukuran maksimum, dll.)
  $allowedExtensions = array("jpg", "jpeg", "png", "pdf"); // Contoh jenis file yang diizinkan

  if (in_array($fileExtension, $allowedExtensions)) {
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
      // Simpan informasi file ke database
      $query = "INSERT INTO files (filename) VALUES ('$newFileName')";
      mysqli_query($koneksi, $query);

      header("Location: dashboard.php?uploadsuccess");
    } else {
      echo "Terjadi kesalahan saat mengunggah file.";
    }
  } else {
    echo "Tipe file tidak diizinkan.";
  }
}
