<!DOCTYPE html>
<html>

<head>
    <title>Form Pengajuan</title>
    <style type="text/css" media="screen">
        table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
        }

        input {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div style="border:0; padding:10px; width:760px; height:auto;">
        <form action="action-input-data.php" method="POST" name="form-input-data">
            <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr height="46">
                    <td width="10%"> </td>
                    <td width="25%"> </td>
                    <td width="65%">
                        <font color="orange" size="2">Form Input Pengajuan</font>
                    </td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>No</td>
                    <td><input type="text" name="id_mahasiswa" size="35" maxlength="6" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Nama</td>
                    <td><input type="text" name="nama" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Jurusan</td>
                    <td><select name="jurusan">
                            <option value="-">- Pilih Jurusan -
                            <option value="Teknik Komputer">Teknik Komputer
                            <option value="Teknik Informatika">Teknik Informatika
                            <option value="Teknik Mesin">Teknik Mesin
                            <option value="Teknik Elektro">Teknik Elektro
                            <option value="Komputer Akuntansi">Komputer Akuntansi
                        </select></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" size="50" maxlength="30" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td>No. Telp</td>
                    <td><input type="text" name="telepon" size="20" maxlength="12" /></td>
                </tr>
                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td><input type="submit" name="Submit" value="Submit">
                        <input type="reset" name="reset" value="Cancel">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
?>