<?php
  require "../koneksi.php";

  $id = $_GET["id"];
  $sql = "SELECT * FROM mahasiswa WHERE id=$id";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link rel="stylesheet" href="../add-edit.css">
</head>

<body>
  <div class="bg">
    <div class="container">
      <form action="../aksi/editData.php?id=<?php echo $row["id"] ?>" method="POST" enctype="multipart/form-data">
        <h3>Edit Mahasiswa</h3>
        <div class="inputBox">
          <label for="">Nama</label>
          <input type="text" name="nama" value="<?php echo $row["nama"] ?>" required>
        </div>
        <div class="inputBox">
          <label for="">NIM</label>
          <input type="number" name="nim" value="<?php echo $row["nim"] ?>" required>
        </div>
        <div class="inputBox">
          <label for="">Kelas</label>
          <input type="text" name="kelas" value="<?php echo $row["kelas"] ?>" required>
        </div>
        <div class="inputBox">
          <label for="">Angkatan</label>
          <input type="number" name="angkatan" value="<?php echo $row["angkatan"] ?>" required>
        </div>
        <div class="inputBox">
          <label for="">Foto</label>
          <input type="file" name="foto" value="<?php echo $row["foto"] ?>"required>
        </div>
        <input type="submit" value="Ubah Mahasiswa" name="ubah">
        <a href="../halaman/dashboard.php">Kembali</a>
      </form>
    </div>
  </div>
</body>

</html>