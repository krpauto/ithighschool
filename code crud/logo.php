<?php
 include 'config.php';
 $sql = "SELECT * FROM profil_sekolah";
 $result = $connect->query($sql);
 while($row = $result->fetch_assoc()) {
  $nama_sekolah = $row['nama_sekolah'];
  $logo_sekolah = $row['logo_sekolah'];
}

?>