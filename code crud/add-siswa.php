<?php
include 'config.php';
if (isset($_POST['input'])) {
    $nama_file = $_FILES['foto_siswa']['name'];
    $tmp_file = $_FILES['foto_siswa']['tmp_name'];
    $path = "foto-siswa/" . $nama_file; // Alamat Penyimapan foto siswa

    if (move_uploaded_file($tmp_file, $path)) {
        $conn = mysqli_query($connect, "INSERT INTO data_siswa 
            (nama_siswa, nis, jenis_kelamin, tugas1, tugas2, tugas3, uts, uas, kelas, jurusan, nama_ayah, pekerjaan_ayah, pendidikan_ayah, alamat_ayah, nama_ibu, pekerjaan_ibu, pendidikan_ibu, alamat_ibu, foto_siswa) 
            VALUES ('$_POST[nama_siswa]',
                    '$_POST[nis]',
                    '$_POST[jenis_kelamin]',
                    '$_POST[tugas1]',
                    '$_POST[tugas2]',
                    '$_POST[tugas3]',
                    '$_POST[uts]',
                    '$_POST[uas]',
                    '$_POST[kelas]',
                    '$_POST[jurusan]',
                    '$_POST[nama_ayah]',
                    '$_POST[pekerjaan_ayah]',
                    '$_POST[pendidikan_ayah]',
                    '$_POST[alamat_ayah]',
                    '$_POST[nama_ibu]',
                    '$_POST[pekerjaan_ibu]',
                    '$_POST[pendidikan_ibu]',
                    '$_POST[alamat_ibu]',
                    '" . $nama_file . "'
                     )");
        if ($conn) {
?>
            <script>
                swal({
                    title: "Input Siswa Berhasil",
                    text: "",
                    type: "success"
                }).then(okay => {
                    if (okay) {
                        window.location.href = "input-siswa";
                    }
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                swal({
                    title: "Input Siswa Gagal",
                    text: "",
                    type: "error"
                }).then(okay => {
                    if (okay) {
                        window.location.href = "input-siswa";
                    }
                });
            </script>
<?php }
    }
} ?>