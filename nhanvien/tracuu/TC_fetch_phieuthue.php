<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "");

$column = array("MaPhieuThue", "NgayBdThue", "DonGiaTieuChuan", "DonGiaDuocTinh", "SoLuongKh", "MaPhong");

$query = "SELECT * FROM phieuthue ";

if (isset($_POST["search"]["value"])) {
    $query .= '
        WHERE NgayBdThue LIKE "%' . $_POST["search"]["value"] . '%" 
        OR MaPhieuThue LIKE "%' . $_POST["search"]["value"] . '%" 
        OR DonGiaTieuChuan LIKE "%' . $_POST["search"]["value"] . '%" 
        OR DonGiaDuocTinh LIKE "%' . $_POST["search"]["value"] . '%" 
        OR SoLuongKh LIKE "%' . $_POST["search"]["value"] . '%" 
        OR MaPhong LIKE "%' . $_POST["search"]["value"] . '%" 
        ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY MaPhieuThue DESC ';
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
    $sub_array[] = $row['MaPhieuThue'];
    $sub_array[] = $row['NgayBdThue'];
    $sub_array[] = $row['DonGiaTieuChuan'];
    $sub_array[] = $row['DonGiaDuocTinh'];
    $sub_array[] = $row['SoLuongKh'];
    $sub_array[] = $row['MaPhong'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM phieuthue";
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
