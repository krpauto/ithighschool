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
  <link rel="stylesheet" href="css/style.css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script src="js/sweetalert2.min.js"></script>
  <title>Profil</title>
  <link rel="shortcut icon" href="logo/<?php echo $logo_sekolah; ?>" type="image/x-icon">
</head>

<body>
  <div id="none">
    <?php include 'navbar.php'; ?>
    <div class="container">
      <?php include 'code crud/profil-code.php'; ?>
      <div class="card mt-3" style="border-radius: 20px; border-color : white;">
        <div class="card-body">
          <div class="row img-login">
            <div class="col">
              <img src="images/sekolah.png" alt="" class="float-left">
              <div class="logo-sekolah"><img src="logo/<?php echo $logo_sekolah; ?>" alt="" srcset=""></div>
            </div>
            <div class="col">
              <div class="form-login" style="margin-top: 10px;">
                <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                  <div class="form-group">
                    <input type="text" name="nama_sekolah" class="form-control form-control-sm rounded-lg" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" required>
                  </div>
                  <div class="form-group">
                    <textarea type="text" name="alamat_sekolah" class="form-control form-control-sm rounded-lg" placeholder="Alamat Sekolah"><?php echo $alamat_sekolah; ?></textarea>
                  </div>
                  <div class="form-group">
                    <input type="text" name="no_tlp" class="form-control form-control-sm rounded-lg" placeholder="No Telepon" value="<?php echo $no_tlp; ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="kepsek" class="form-control form-control-sm rounded-lg" placeholder="Nama Kepala Sekolah" value="<?php echo $kepsek; ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="nis_kepsek" class="form-control form-control-sm rounded-lg" placeholder="Nis Kepala Sekolah" value="<?php echo $nis_kepsek; ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="wakil_kepsek" class="form-control form-control-sm rounded-lg" placeholder="Nama Kepala Sekolah" value="<?php echo $wakil_kepsek; ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="nis_wakil" class="form-control form-control-sm rounded-lg" placeholder="Nis Wakil Kepala Sekolah" value="<?php echo $nis_wakil; ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="file" name="logo_sekolah" class="form-control-file">
                  </div>
                  <div class="form-group">
                    <button type="submit" name="save-profil" id="btn-save" class="btn btn-info btn-block" style="width: 90%;"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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