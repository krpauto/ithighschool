<?php
    include 'config.php';
    
         // Tampil'kan data dari get URL dan ambil ke dalam string / variable
         $sql = mysqli_query($connect, "SELECT * FROM profil_sekolah WHERE no_id = '1' ");
         $data = mysqli_fetch_array($sql);
        if($data) {
         $nama_sekolah = $data['nama_sekolah'];
         $alamat_sekolah = $data['alamat_sekolah'];
         $no_tlp = $data['no_tlp'];
         $kepsek = $data['kepsek'];
         $nis_kepsek = $data['nis_kepsek'];
         $wakil_kepsek = $data['wakil_kepsek'];
         $nis_wakil = $data['nis_wakil'];
         $logo_sekolah = $data['logo_sekolah'];
         $logo_awal = $data['logo_sekolah'];
     }


    if(isset($_POST['save-profil']))  {
    if(empty($_POST['nama_sekolah'])){
    ?>
    <script>
    swal({ title: "Anda Belom Melakukan Perubahan...",
        text: "",
    type: "warning"}).then(okay => {
   if (okay) {
    window.location.href = "profil";
    }
    });
    </script>
    <?php
    }else{
    $nama_file = $_FILES['logo_sekolah']['name'];
    $tmp_file = $_FILES['logo_sekolah']['tmp_name'];    
    $path = "logo/".$nama_file; 
    if($nama_file == '') {
    // Jika Gambar tidak di ganti 
    // Tetap lakukan perubahan tanpa ada gambar...
    $upedit = mysqli_query($connect, "UPDATE profil_sekolah SET 
                                nama_sekolah = '$_POST[nama_sekolah]',
                                alamat_sekolah = '$_POST[alamat_sekolah]',
                                no_tlp = '$_POST[no_tlp]',
                                kepsek = '$_POST[kepsek]',
                                nis_kepsek = '$_POST[nis_kepsek]',
                                wakil_kepsek = '$_POST[wakil_kepsek]',
                                nis_wakil = '$_POST[nis_wakil]'
                                WHERE no_id = '1' "); 
    if($upedit) {
    ?>
    <script>
    swal({ title: "Berhasil Di Rubah",
        text: "",
    type: "success"}).then(okay => {
   if (okay) {
    window.location.href = "profil";
    }
    });
    </script>
    <?php
    }else{
        //Merubah Profil Gagal
     }
    }else{ // Jika Gambar dan lainya di rubah Maka Lakukan Perubahan untuk semua
    if(move_uploaded_file($tmp_file, $path)){
    $uppdate = mysqli_query($connect, "UPDATE profil_sekolah SET 
                                nama_sekolah = '$_POST[nama_sekolah]',
                                alamat_sekolah = '$_POST[alamat_sekolah]',
                                no_tlp = '$_POST[no_tlp]',
                                kepsek = '$_POST[kepsek]',
                                nis_kepsek = '$_POST[nis_kepsek]',
                                wakil_kepsek = '$_POST[wakil_kepsek]',
                                nis_wakil = '$_POST[nis_wakil]',
                                logo_sekolah = '".$nama_file."' 
                                WHERE no_id = '1' "); }
    unlink("logo/".$logo_awal); }
    if($uppdate) {
        echo "<script>alert('Profil Sekolah Berhasil Di Rubah');document.location='profil';</script>";
    }else{
        //Merubah Profil Gagagl
     } } }

    ?>