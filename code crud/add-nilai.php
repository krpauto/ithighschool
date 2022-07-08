<?php
include 'config.php';
if (isset($_POST['input'])) {
    $nama_file = $_FILES['foto_siswa']['name'];
    $tmp_file = $_FILES['foto_siswa']['tmp_name'];
    $path = "foto-siswa/" . $nama_file; // Alamat Penyimapan foto siswa

    if (move_uploaded_file($tmp_file, $path)) {
        $conn = mysqli_query($connect, "INSERT INTO nilai_siswa 
            (komputer, pemrograman, teknologi, jaringan, simulasi, desain, sistem, layanan, produk, pengetahuan, foto_siswa) 
            VALUES ('$_POST[komputer]',
                    '$_POST[pemrograman]',
                    '$_POST[teknologi]',
                    '$_POST[jaringan]',
                    '$_POST[simulasi]',
                    '$_POST[desain]',
                    '$_POST[sistem]',
                    '$_POST[layanan]',
                    '$_POST[produk]',
                    '$_POST[pengetahuan]',
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
                        window.location.href = "input-nilai";
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
                        window.location.href = "input-nilai";
                    }
                });
            </script>
<?php }
    }
} ?>