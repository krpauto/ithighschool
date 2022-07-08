<?php
include 'config-database.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/* =============== Buat Table Data Siswa ================== */
$sql = "CREATE TABLE data_siswa (
  `no_id` int(11) AUTO_INCREMENT PRIMARY KEY,
    `nama_siswa` varchar(150) NOT NULL,
    `nis` varchar(100) NOT NULL,
    `jenis_kelamin` text NOT NULL,
    `tugas1` varchar(50) NOT NULL,
    `tugas2` varchar(50) NOT NULL,
    `tugas3` varchar (50) NOT NULL,
    `uts` varchar(50) NOT NULL,
    `uas` varchar (50) NOT NULL,
    `kelas` varchar(50) NOT NULL,
    `jurusan` varchar(50) NOT NULL,
  )";

if ($conn->query($sql) === TRUE) {
  // Jika Berhasil Lanjut
} else {
  // Table data siswa sudah ada ..
}
/* ================= Akhir Table Data Sisiwa ==================== */


/*============ Buat Table Profil Sekolah ======================== */
$sql1 = "CREATE TABLE profil_sekolah (
  `no_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nis_kepsek` varchar(100) NOT NULL,
  `wakil_kepsek` varchar(100) NOT NULL,
  `nis_wakil` varchar(100) NOT NULL,
  `logo_sekolah` varchar(100) NOT NULL
  )";

if ($conn->query($sql1) === TRUE) {
  // Buat profil berhasil lanjut ..

} else {
  // table profil sudah ada ..
}

/* Isi table profil sekolah agar tidak terjadi error pas pertama instal di pc baru */
$sql1 = "INSERT INTO `profil_sekolah` (`no_id`, `nama_sekolah`, `alamat_sekolah`, `no_tlp`, `kepsek`, `nis_kepsek`, `wakil_kepsek`, `nis_wakil`, `logo_sekolah`) VALUES
('', 'IT HIGH SCHOOL', 'JL. Balikpapan, 11C, Jakarta, 10160, RT.10/RW.6, South Petojo, Gambir, Central Jakarta City, Jakarta 10150', '0263-1235-21424', 'Aldo Saputra', '20203729', 'Rea Madjit', '20203730', 'dashboard.jpg')";

if ($conn->query($sql1) === TRUE) {
  // Insert username berhasil
} else {
  // Jangan lakukan insert kembali karna sudah ada
}
/*============ Akhir Table Profil Sekolah ======================== */

/* =============== Buat table user login ========================== */
$sql2 = "CREATE TABLE user_login (
  `no_id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
  )";

if ($conn->query($sql2) === TRUE) {
  // Table user berhasil di buat

} else {
  // Table user sudah ada ..
}

$pss = "admin"; // password default
$pss2 = md5($pss); // buat pasword jadi karakter sembunyi

$sql2 = "INSERT INTO user_login (no_id, username, password)
VALUES ('', 'admin', '$pss2')";
if ($conn->query($sql2) === TRUE) {
  // Insert username berhasil
  echo '<script>window.location="../index"</script>'; /* Jika Semua Berhasil Maka Arahkan Ke halaman Index */
} else {
  // Jangan lakukan insert kembali karna sudah ada
}
/* =============== Akhir table user login ========================== */

$conn->close(); /* Tutup query koneksi */
