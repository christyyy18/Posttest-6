<?php
  require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>
  <link rel="stylesheet" href="../add-edit.css">
</head>

<body>
  <div class="bg">
    <div class="container">
      <form action="../aksi/addData.php" method="POST" enctype="multipart/form-data">
        <h3>Tambah Mahasiswa</h3>
        <div class="inputBox">
          <label for="">Nama</label>
          <input type="text" name="nama" placeholder="John Doe" required>
        </div>
        <div class="inputBox">
          <label for="">NIM</label>
          <input type="number" name="nim" placeholder="123" required>
        </div>
        <div class="inputBox">
          <label for="">Kelas</label>
          <input type="text" name="kelas" placeholder="IF C" required>
        </div>
        <div class="inputBox">
          <label for="">Angkatan</label>
          <input type="number" name="angkatan" placeholder="2022" required>
        </div>
        <div class="inputBox">
          <label for="">Foto</label>
          <input type="file" name="foto" required>
        </div>

        <form action="processUpload.php" method="post" enctype="multipart/form-data">
        <div class="inputBox">
          <label for="">Upload File</label>
          <input type="file" name="file" id="file" required>
          <button type="submit" name="upload">Unggah File</button>
        </div>
        <input type="submit" value="Tambah Mahasiswa" name="tambah">
        <a href="../halaman/dashboard.php">Kembali</a>
      </form>
    </div>
  </div>
</body>

</html>