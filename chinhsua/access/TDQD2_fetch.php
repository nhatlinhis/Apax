<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$query = "SELECT * FROM loaikhach";

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['MaLoaiKh'];
    $sub_array[] = $row['TenLoaiKh'];
    $sub_array[] = $row['HeSoPhuThu'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM loaikhach";
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