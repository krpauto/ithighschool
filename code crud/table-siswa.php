<?php
include 'config.php';
$columns = array('nama_siswa', 'nis', 'jenis_kelamin', 'tugas1', 'tugas2', 'tugas3', 'uts', 'uas', 'kelas', 'jurusan');

$query = "SELECT * FROM data_siswa WHERE ";

if (isset($_POST["search"]["value"])) {
  $query .= '
  (nama_siswa LIKE "%' . $_POST["search"]["value"] . '%"
  OR nis LIKE "%' . $_POST["search"]["value"] . '%"  
  OR jenis_kelamin LIKE "%' . $_POST["search"]["value"] . '%"
  OR tugas1 LIKE "%' . $_POST["search"]["value"] . '%"
  OR tugas2 LIKE "%' . $_POST["search"]["value"] . '%"
  OR tugas3 LIKE "%' . $_POST["search"]["value"] . '%")';
}

if (isset($_POST["order"])) {
  $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
  $query .= 'ORDER BY nama_siswa ASC ';
}

$query1 = '';
$no = 1;
if ($_POST["length"] != -1) {
  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $sub_array = array();
  $sub_array[] = $no++;
  $sub_array[] = $row["nama_siswa"];
  $sub_array[] = $row["nis"];
  $sub_array[] = $row["jenis_kelamin"];
  $sub_array[] = $row["tugas1"];
  $sub_array[] = $row["tugas2"];
  $sub_array[] = $row["tugas3"];
  $sub_array[] = $row["uts"];
  $sub_array[] = $row["uas"];
  $sub_array[] = $row["kelas"];
  $sub_array[] = '<center><a href="views-data?id=' . $row['no_id'] . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></center>';
  $data[] = $sub_array;
}

function get_all_data($connect)
{
  $query = "SELECT * FROM data_siswa";
  $result = mysqli_query($connect, $query);
  return mysqli_num_rows($result);
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsTotal"  =>  get_all_data($connect),
  "recordsFiltered" => $number_filter_row,
  "data"    => $data
);

echo json_encode($output);
