<?php
include 'config.php';
$columns = array('komputer', 'pemrograman', 'teknologi', 'jaringan', 'simulasi', 'desain', 'sistem', 'layanan', 'produk', 'pengetahuan');

$query = "SELECT * FROM nilai_siswa WHERE ";

if (isset($_POST["search"]["value"])) {
    $query .= '
  (komputer LIKE "%' . $_POST["search"]["value"] . '%"
  OR pemrograman LIKE "%' . $_POST["search"]["value"] . '%"  
  OR teknologi LIKE "%' . $_POST["search"]["value"] . '%"
  OR jaringan LIKE "%' . $_POST["search"]["value"] . '%"
  OR simulasi LIKE "%' . $_POST["search"]["value"] . '%"
  OR desain LIKE "%' . $_POST["search"]["value"] . '%")';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY komputer ASC ';
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
    $sub_array[] = $row["komputer"];
    $sub_array[] = $row["pemrograman"];
    $sub_array[] = $row["teknologi"];
    $sub_array[] = $row["jaringan"];
    $sub_array[] = $row["simulasi"];
    $sub_array[] = $row["desain"];
    $sub_array[] = $row["sistem"];
    $sub_array[] = $row["layanan"];
    $sub_array[] = $row["produk"];
    $sub_array[] = '<center><a href="views-data?id=' . $row['no_id'] . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></center>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM nilai_siswa";
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
