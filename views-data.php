<?php
error_reporting(0);
session_start();
include 'code crud/logo.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.min.js"></script>
    <title>Input Siswa</title>
    <link rel="shortcut icon" href="logo/<?php echo $logo_sekolah; ?>" type="image/x-icon">
</head>

<body>
    <div id="none">
        <?php include 'navbar.php'; ?>
        <div class="container mt-5">
            <div class="card mt-5">
                <div class="card-body">
                    <?php include 'code crud/views-siswa.php'; ?>
                    <img src="foto-siswa/<?php echo $foto_siswa; ?>" class="foto-siswa" alt="" srcset="">
                    <div class="row">
                        <div class="col">
                            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <h5><span style="color: red;">*</span> Data Siswa</h5>
                                <div class="form-group">
                                    <input type="text" name="nama_siswa" class="form-control rounded-lg" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nis" class="form-control rounded-lg" placeholder="Nis" value="<?php echo $nis; ?>" required>
                                </div>
                                <div class="form-group">
                                    <select type="text" name="jenis_kelamin" class="form-control rounded-lg" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" required>
                                        <option value="<?php echo $jenis_kelamin; ?>"><?php echo $jenis_kelamin; ?></option>
                                        <option value="--Jenis Kelamin--">--Jenis Kelamin--</option>
                                        <option value="Laki-Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tugas1" class="form-control rounded-lg" placeholder="Tugas 1" value="<?php echo $tugas1; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tugas2" class="form-control rounded-lg" placeholder="Tugas 2" value="<?php echo $tugas2; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tugas3" id="tugas3" class="form-control rounded-lg" placeholder="Tugas 3" value="<?php echo $tugas3; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="uts" class="form-control rounded-lg" placeholder="UTS" value="<?php echo $uts; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="uas" class="form-control rounded-lg" placeholder="UAS" value="<?php echo $uas; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="kelas" class="form-control rounded-lg" placeholder="Kelas" value="<?php echo $kelas; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="jurusan" class="form-control rounded-lg" placeholder="Jurusan" value="<?php echo $jurusan; ?>" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_siswa" id="foto_siswa">
                                        <label class="custom-file-label" for="foto_siswa"><input type="text" class="form-control rounded-lg" id="foto_siswa1" style="color: black; position: absolute; margin-left : -12px ;margin-top : -7px;" for="foto_siswa" value="<?php echo $foto_siswa; ?>" placeholder="Foto Siswa"></label>
                                    </div>
                                </div>
                        </div>
                                <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Update</button>
                                </form>
                                <a href="print-siswa?id=<?php echo $no_id; ?>" class="btn btn-info" target="_blank"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</a>
                                <button class="btn btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script defer src="fontawesome/js/all.js"></script>
    <?php if ($_SESSION['stat_login'] != true) {
        $pesan = "Maaf Anda Belom Login";
        $status = "error";
        $link_back = "index";
    ?>
        <script>
            /* Sweet Alert Belom Login */
            var x = document.getElementById("none");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            swal({
                title: "Maaf anda belom login !",
                text: "Silahkan login terlebih dahulu !",
                type: "warning"
            }).then(okay => {
                if (okay) {
                    window.location.href = "index";
                }
            });
        </script>
    <?php unset($_SESSION['stat_login']);
    } ?>
</body>

</html>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('#foto_siswa').change(function(e) {
            var foto_siswa = e.target.files[0].name;
            $('#foto_siswa1').val(foto_siswa);

        });

        $(function() {
            $("#tgl_lahir").datepicker({
                format: 'dd/m/yyyy',
                autoclose: true,
                todayHighlight: true,
            });
        });
        $(function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        });
        $("#delete").click(function() {
            Swal.fire({
                title: 'Anda Yakin ?',
                text: "Jika anda yakin , Maka data siswa akan di hapus !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<a href="delete-siswa?id=<?php echo $no_id; ?>" style="color:white; text-decoration: none;">Yes, Delete</a>'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Hapus !',
                        'Siswa berhasil di hapus.',
                        'success'
                    )
                }
            })
        });
    });
</script>