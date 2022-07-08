<?php
    error_reporting(0);
    include 'code crud/config.php';
    if(isset($_GET['id'])){
        $sql = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id = '$_GET[id]' ");
        $data = mysqli_fetch_array($sql);
        if($data) {
        $foto_siswa = $data['foto_siswa'];
    } }

	if(isset($_GET['id'])){
		$delete = mysqli_query($connect, "DELETE FROM data_siswa 
            WHERE no_id = '".$_GET['id']."' ");
            unlink("foto-siswa/".$foto_siswa);
	if($delete) {
        echo "<script>window.location='data-siswa';</script>";
    }else{
        //echo "<script>alert('Hapus Siswa Gagal');document.location='data-siswa';</script>";
    }
	} 
?>