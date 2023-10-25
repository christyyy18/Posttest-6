<?php
require "../koneksi.php";

if (isset($_POST['upload'])) {
  $file = $_FILES['file'];

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $allowedExtensions = array("jpg", "jpeg", "png", "pdf"); 

  $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

  if (in_array($fileExtension, $allowedExtensions)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) { 
        $uniqueFileName = uniqid('', true) . "." . $fileExtension;
        $fileDestination = "../uploads/" . $uniqueFileName; 

        move_uploaded_file($fileTmpName, $fileDestination);

        
        $query = "INSERT INTO files (filename) VALUES ('$uniqueFileName')";
        mysqli_query($koneksi, $query);

        header("Location: dashboard.php?uploadsuccess");
      } else {
        echo "Ukuran file terlalu besar.";
      }
    } else {
      echo "Terjadi kesalahan saat mengunggah file.";
    }
  } else {
    echo "Tipe file tidak diizinkan.";
  }
}
