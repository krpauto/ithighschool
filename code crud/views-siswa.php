<?php
include 'config.php';
if (isset($_GET['id'])) {
    $sql = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id = '$_GET[id]' ");
    $data = mysqli_fetch_array($sql);
    if ($data) {
        // Data Siswa
        $no_id = $data['no_id'];
        $nama_siswa = $data['nama_siswa'];
        $nis = $data['nis'];
        $nisn = $data['jenis_kelamin'];
        $tugas1 = $data['tugas1'];
        $tugas2 = $data['tugas2'];
        $tugas3 = $data['tugas3'];
        $uts = $data['uts'];
        $uas = $data['uas'];
        $kelas = $data['kelas'];
        $jurusan = $data['jurusan'];
        $foto_siswa = $data['foto_siswa'];
        // Data Ayah
        $nama_ayah = $data['nama_ayah'];
        $pekerjaan_ayah = $data['pekerjaan_ayah'];
        $pendidikan_ayah = $data['pendidikan_ayah'];
        $alamat_ayah = $data['alamat_ayah'];
        // Data Ibu
        $nama_ibu = $data['nama_ibu'];
        $pekerjaan_ibu = $data['pekerjaan_ibu'];
        $pendidikan_ibu = $data['pendidikan_ibu'];
        $alamat_ibu = $data['alamat_ibu'];
    }
}
if (isset($_POST['update'])) {
    if (empty($_POST['nama_siswa'])) {
        echo "<script>alert('Anda Belom Melakukan Perubahan...');document.location='views-data';</script>";
    } else {
        $nama_file = $_FILES['foto_siswa']['name'];
        $tmp_file = $_FILES['foto_siswa']['tmp_name'];
        $path = "foto-siswa/" . $nama_file;
        if ($nama_file == '') {
            // Jika Gambar tidak di ganti 
            // Tetap lakukan perubahan tanpa ada gambar...
            $upedit = mysqli_query($connect, "UPDATE data_siswa SET 
                                nama_siswa = '$_POST[nama_siswa]',
                                nis = '$_POST[nis]',
                                jenis_kelamin = '$_POST[jenis_kelamin]',
                                tugas1 = '$_POST[tugas1]',
                                tugas2 = '$_POST[tugas2]',
                                tugas3 = '$_POST[tugas3]',
                                uts = '$_POST[uts]',
                                uas = '$_POST[uas]',
                                kelas = '$_POST[kelas]',
                                jurusan = '$_POST[jurusan]',
                                nama_ayah = '$_POST[nama_ayah]',
                                pekerjaan_ayah = '$_POST[pekerjaan_ayah]',
                                pendidikan_ayah = '$_POST[pendidikan_ayah]',
                                alamat_ayah = '$_POST[alamat_ayah]',
                                nama_ibu = '$_POST[nama_ibu]',
                                pekerjaan_ibu = '$_POST[pekerjaan_ibu]',
                                pendidikan_ibu = '$_POST[pendidikan_ibu]',
                                alamat_ibu = '$_POST[alamat_ibu]'
                                WHERE no_id = '$_GET[id]' ");
            if ($upedit) {
?>
                <script>
                    swal({
                        title: "Data Siswa Berhasil Dirubah",
                        text: "",
                        type: "success"
                    }).then(okay => {
                        if (okay) {
                            window.location.href = "data-siswa";
                        }
                    });
                </script>
            <?php
            } else {
                //Merubah Profil Gagal
            }
        } else { // Jika Gambar dan lainya di rubah Maka Lakukan Perubahan untuk semua
            if (move_uploaded_file($tmp_file, $path)) {
                $uppdate = mysqli_query($connect, "UPDATE data_siswa SET 
                              nama_siswa = '$_POST[nama_siswa]',
                              nis = '$_POST[nis]',
                              jenis_kelamin = '$_POST[jenis_kelamin]',
                              tugas1 = '$_POST[tugas1]',
                              tugas2 = '$_POST[tugas2]',
                              tugas3 = '$_POST[tugas3]',
                              uts = '$_POST[uts]',
                              uas = '$_POST[uas]',
                              kelas = '$_POST[kelas]',
                              jurusan = '$_POST[jurusan]',
                              nama_ayah = '$_POST[nama_ayah]',
                              pekerjaan_ayah = '$_POST[pekerjaan_ayah]',
                              pendidikan_ayah = '$_POST[pendidikan_ayah]',
                              alamat_ayah = '$_POST[alamat_ayah]',
                              nama_ibu = '$_POST[nama_ibu]',
                              pekerjaan_ibu = '$_POST[pekerjaan_ibu]',
                              pendidikan_ibu = '$_POST[pendidikan_ibu]',
                              alamat_ibu = '$_POST[alamat_ibu]',
                              foto_siswa ='" . $nama_file . "' 
                                WHERE no_id = '$_GET[id]' ");
            }
            unlink("foto-siswa/" . $foto_siswa);
        }
        if ($uppdate) {
            ?>
            <script>
                swal({
                    title: "Data Siswa Berhasil Dirubah",
                    text: "",
                    type: "success"
                }).then(okay => {
                    if (okay) {
                        window.location.href = "data-siswa";
                    }
                });
            </script>
<?php
        } else {
            //Merubah Profil Gagagl
        }
    }
}
?>