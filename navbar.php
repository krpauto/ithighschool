<?php
include 'code crud/logo.php';
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #fff;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo/<?php echo $logo_sekolah; ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"> <?php echo $nama_sekolah; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="input-siswa">Input Data Berkas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="input-petugas">Input Petugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-siswa" tabindex="-1" aria-disabled="true">Data Berkas</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm rounded-pill mt-1" href="logout" tabindex="-1" aria-disabled="true"> Logout </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>