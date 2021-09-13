<?php


$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "");

$column = array("MaHD", "TenKh", "DiaChi", "NgayLap", "TriGia");

$query = "SELECT * FROM hoadon ";

if (isset($_POST["search"]["value"])) {
    $query .= '
        WHERE TenKh LIKE "%' . $_POST["search"]["value"] . '%" 
        OR MaHD LIKE "%' . $_POST["search"]["value"] . '%" 
        OR NgayLap LIKE "%' . $_POST["search"]["value"] . '%" 
        OR TriGia LIKE "%' . $_POST["search"]["value"] . '%"
        OR DiaChi LIKE "%' . $_POST["search"]["value"] . '%" 
        ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY MaHD DESC ';
}
$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['MaHD'];
    $sub_array[] = $row['TenKh'];
    $sub_array[] = $row['DiaChi'];
    $sub_array[] = $row['NgayLap'];
    $sub_array[] = $row['TriGia'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM hoadon";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw'   => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data'   => $data
);

echo json_encode($output);

?>
