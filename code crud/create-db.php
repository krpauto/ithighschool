<?php
 include 'config-database.php';
 $conn = new mysqli($servername, $username, $password);
// Cek Koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Buat database
$sql = "CREATE DATABASE crud_siswa";
if ($conn->query($sql) === TRUE) {
  //Database Berhasil Di buat
  echo '<script>window.location="code crud/create-table.php"</script>';
} else {
  //Database Sudah Di buat
}
$conn->close(); // Close Koneksi
?>
