<?php
  require "../koneksi.php";

  if (isset($_POST["ubah"])) {

    $id = $_GET["id"];
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $kelas = $_POST["kelas"];
    $angkatan = $_POST["angkatan"];

    $gambar = $_FILES["foto"]["name"];
    $gambarBaru = "$nama.png";
    $tmp = $_FILES["foto"]["tmp_name"];

    if (move_uploaded_file($tmp, '../databaseImages/' . $gambarBaru)){
      $sql = "UPDATE mahasiswa SET
        nama = '$nama',
        nim = '$nim',
        kelas = '$kelas',
        angkatan = '$angkatan',
        foto = '$gambarBaru'
        WHERE id = '$id'
      ";

      $result = mysqli_query($koneksi, $sql);
      if ($result) {
        echo "
            <script>
              alert('Data berhasil diubah');
              document.location.href = '../halaman/dashboard.php';
            </script>
          ";
      } else {
        echo "
          <script>
            alert('Data gagal diubah');
            document.location.href = '../halaman/dashboard.php';
          </script>
          ";
      }
    }
  }
?>