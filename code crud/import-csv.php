<?php
if(!empty($_FILES['file']['name']))
{
 $conn = new PDO("mysql:host=localhost;dbname=crud_siswa;", "root", "", array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
    ));

 $total_row = count(file($_FILES['file']['tmp_name']));

 $file_location = str_replace("\\", "/", $_FILES['file']['tmp_name']);

 $query = '
 LOAD DATA LOCAL INFILE "'.$file_location.'" IGNORE 
 INTO TABLE data_siswa 
 FIELDS TERMINATED BY "," 
 LINES TERMINATED BY "\r\n" 
 IGNORE 1 LINES 
 (@column1,@column2,@column3,@column4,@column5,@column6,@column7,@column8,@column9,@column10,@column11,@column12,@column13,@column14,@column15,@column16,@column17,@column18) 
 SET nama_siswa = @column1,  nis = @column2,  jenis_kelamin = @column3,  tugas1 = @column4,  tugas2 = @column5,  tugas3 = @column6,  uts = @column7,  uas = @column8,  kelas = @column9,  jurusan = @column10,  nama_ayah = @column11,  pekerjaan_ayah = @column12,  pendidikan_ayah = @column13,  alamat_ayah = @column14,  nama_ibu = @column15,  pekerjaan_ibu = @column16,  pendidikan_ibu = @column17,  alamat_ibu = @column18
 ';

 $statement = $conn->prepare($query);

 $statement->execute();

 $output = array(
  'success' => 'Total <b>'.$total_row.'</b> Data imported Success..'
 );

 echo json_encode($output);
}
