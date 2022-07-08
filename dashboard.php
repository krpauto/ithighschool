 <?php include 'code crud/logo.php'; ?>
 <?php
    error_reporting(0);
    session_start();

    include 'code crud/config.php';
    if (mysqli_connect_errno()) {
        echo "Database connection failed.";
    }
    $Total_siswa = "SELECT * FROM data_siswa WHERE no_id ";
    $Total_Laki = "SELECT * FROM data_siswa WHERE jenis_kelamin = 'Laki-Laki' ";
    $Total_perempuan = "SELECT * FROM data_siswa WHERE jenis_kelamin = 'Perempuan' ";
    // Sum Siswa
    $result1 = mysqli_query($connect, $Total_siswa);
    if ($result1) {
        $row1 = mysqli_num_rows($result1);
        if ($row1) {
        }
        mysqli_free_result($result1);
    }
    // Jumlah Laki Laki
    $result2 = mysqli_query($connect, $Total_Laki);
    if ($result2) {
        $row2 = mysqli_num_rows($result2);
        if ($row2) {
        }
        mysqli_free_result($result2);
    }
    $result3 = mysqli_query($connect, $Total_perempuan);
    if ($result3) {
        $row3 = mysqli_num_rows($result3);
        if ($row3) {
        }
        mysqli_free_result($result3);
    }
    // Connection close 
    mysqli_close($connect);

    ?>
 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/sweetalert2.min.css">
     <title>Dashboard</title>
     <link rel="shortcut icon" href="logo/<?php echo $logo_sekolah; ?>" type="image/x-icon">
 </head>

 <body>
     <div id="none">
         <?php include 'navbar.php'; ?>
         <br><br>
         <div class="container">
             <div class="row mt-5">
                 <div class="col">
                     <div class="card total-siswa">
                         <div class="card-body">
                             <h5>Total Siswa</h5>
                             <h1><?php echo $row1; ?></h1>
                         </div>
                     </div>
                 </div>
                 <div class="col">
                     <div class="card total-laki">
                         <div class="card-body">
                             <h5>Total Laki - Laki</h5>
                             <h1><?php echo $row2; ?></h1>
                         </div>
                     </div>
                 </div>
                 <div class="col">
                     <div class="card total-perempuan">
                         <div class="card-body">
                             <h5>Total Perempuan</h5>
                             <h1><?php echo $row3; ?></h1>
                         </div>
                     </div>
                 </div>
             </div>
             <div id="carouselExampleSlidesOnly" class="carousel slide mt-5" data-ride="carousel">
                 <div class="carousel-inner">
                     <div class="carousel-item active">
                         <img src="images/dashboard.jpg" class="d-block w-100" alt="...">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     <script src="js/sweetalert2.min.js"></script>
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