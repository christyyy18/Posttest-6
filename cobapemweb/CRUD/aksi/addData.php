<?php
  require "../koneksi.php";

  if (isset($_POST["tambah"])) {

    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $kelas = $_POST["kelas"];
    $angkatan = $_POST["angkatan"];

    $gambar = $_FILES["foto"]["name"];
    $gambarBaru = "$nama.png";
    $tmp = $_FILES["foto"]["tmp_name"];

    if (move_uploaded_file($tmp, '../databaseImages/' . $gambarBaru)){
      $sql = "INSERT INTO mahasiswa VALUES(
        NULL,
      '$nim',
      '$nama',
      '$kelas',
      '$angkatan',
      '$gambarBaru'
        )";

      $result = mysqli_query($koneksi, $sql);
      if ($result) {
        echo "
          <script>
            alert('Data berhasil ditambah');
            document.location.href = '../halaman/dashboard.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('Data gagal ditambah');
            document.location.href = '../halaman/dashboard.php';
          </script>
        ";
      }
    }
  }
?>