<?php
include 'code crud/config.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Siswa.xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Siswa</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ACACAC;
    }

    table tr td {
        border: 1px solid black;
    }
</style>

<body style="border: 0.1pt solid #ccc">
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Siswa</td>
                <td>Nis</td>
                <td>Jenis_Kelamin</td>
                <td>Tugas 1</td>
                <td>Tugas 2</td>
                <td>Tugas 3</td>
                <td>UTS</td>
                <td>UAS</td>
                <td>Kelas</td>
                <td>Jurusan</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $conn = mysqli_query($connect, "SELECT * FROM data_siswa ORDER BY nama_siswa ASC");
            while ($row = mysqli_fetch_array($conn)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama_siswa']; ?></td>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['tugas1']; ?></td>
                    <td><?php echo $row['tugas2']; ?></td>
                    <td><?php echo $row['tugas3']; ?></td>
                    <td><?php echo $row['uts']; ?></td>
                    <td><?php echo $row['uas']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>