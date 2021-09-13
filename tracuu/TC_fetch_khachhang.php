<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "");

$column = array("MaKhachHang", "TenKh", "CMND", "DiaChi", "MaLoaiKh");

$query = "SELECT * FROM khachhang ";

if (isset($_POST["search"]["value"])) {
    $query .= '
        WHERE TenKh LIKE "%' . $_POST["search"]["value"] . '%" 
        OR MaKhachHang LIKE "%' . $_POST["search"]["value"] . '%" 
        OR DiaChi LIKE "%' . $_POST["search"]["value"] . '%" 
        OR CMND LIKE "%' . $_POST["search"]["value"] . '%" 
        OR MaLoaiKh LIKE "%' . $_POST["search"]["value"] . '%" 
        ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY MaKhachHang DESC ';
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
    $sub_array[] = $row['MaKhachHang'];
    $sub_array[] = $row['TenKh'];
    $sub_array[] = $row['CMND'];
    $sub_array[] = $row['DiaChi'];
    if ($row['MaLoaiKh'] == "ND") 
    {
        $sub_array[] = "Noi Dia";
    } else $sub_array[] = "Nuoc Ngoai";
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM khachhang";
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