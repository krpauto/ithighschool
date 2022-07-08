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
  <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/buttons-1.6.5/css/buttons.bootstrap4.min.css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script defer src="fontawesome/js/all.js"></script>
  <title>Data Berkas</title>
  <link rel="shortcut icon" href="logo/<?php echo $logo_sekolah; ?>" type="image/x-icon">
</head>

<body>
  <div id="none">
    <?php include 'navbar.php'; ?>
    <br>
    <div class="card" style="margin-left:auto;margin-right:auto;border-color: #fff;">
      <div class="card-body">
        <div class="table-wrapper">
          <h3 class="card-title">Data Berkas</h3>
          <table>
            <tr>
              <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-file-import"></i> Import Data</button></td>
              <td><a href="export" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Data</a></td>
            </tr>
          </table>
          <!--Modal Import -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Import Data Siswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <span id="message"></span>
                  <form id="sample_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file" accept=".csv" required>
                        <input type="hidden" name="hidden_field" value="1" />
                        <label class="custom-file-label" for="file"><input type="text" class="form-control rounded-lg" id="file1" style="color: black; position: absolute; margin-left : -12px ;margin-top : -7px;" for="file" placeholder="Upload csv file"></label>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <a href="code crud/data_siswa.csv" class="btn btn-success" download="data-siswa.csv">Download Csv</a>
                  <input type="submit" name="import" id="import" class="btn btn-primary" value="Import" />
                  </form>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Import -->
          <div class="table-responsive mt-2">
            <table id="data_siswa" class="table table-bordered table-hover" style="border-radius: 5px; font-size : 14px; width: 100%;">
              <thead>
                <tr style="text-align: center; height : 25px;">
                  <th scope="col" style="text-align: center;">No</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Nis</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Tugas 1</th>
                  <th scope="col">Tugas 2</th>
                  <th scope="col">Tugas 3</th>
                  <th scope="col">UTS</th>
                  <th scope="col">UAS</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/jquery-1.12.4.js"></script>
  <script src="DataTables/DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="DataTables/DataTables-1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="DataTables/buttons-1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="DataTables/buttons-1.6.5/js/buttons.bootstrap4.min.js"></script>
  <script src="DataTables/jszip-2.5.0/jszip.min.js"></script>
  <script src="DataTables/jszip-2.5.0/jszip.min.js"></script>
  <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="DataTables/buttons-1.6.5/js/buttons.html5.min.js"></script>
  <script src="DataTables/buttons-1.6.5/js/buttons.print.min.js"></script>
  <script src="DataTables/buttons-1.6.5/js/buttons.colVis.min.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
      var dataTable = $('#data_siswa').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          url: "code crud/table-siswa.php",
          type: "POST",
        }
      });
      $('#sample_form').on('submit', function(event) {
        $('#message').html('');
        event.preventDefault();
        $.ajax({
          url: "code crud/import-csv.php",
          method: "POST",
          data: new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            swal({
              title: "Import Success",
              text: "",
              type: "success"
            }).then(okay => {
              if (okay) {
                window.location.href = "data-siswa";
              }
            });
            $('#sample_form')[0].reset();
          }
        })
      });
    });
  </script>
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
  <script>
    $(document).ready(function() {
      $('#file').change(function(e) {
        var file = e.target.files[0].name;
        $('#file1').val(file);

      });
    });
  </script>
</body>

</html>