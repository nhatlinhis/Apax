<?php

//fetch.php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "");

$column = array("MaLoaiPhong", "TenLoaiPhong", "SoLuong", "DonGiaTieuChuan");

$query = "SELECT * FROM loaiphong ";

if(isset($_POST["search"]["value"]))
{
    $query .= '
        WHERE TenLoaiPhong LIKE "%'.$_POST["search"]["value"].'%" 
        OR MaLoaiPhong LIKE "%'.$_POST["search"]["value"].'%" 
        OR DonGiaTieuChuan LIKE "%'.$_POST["search"]["value"].'%" 
        OR SoLuong LIKE "%'.$_POST["search"]["value"].'%" 
        ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY MaLoaiPhong DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row['MaLoaiPhong'];
    $sub_array[] = $row['TenLoaiPhong'];
    $sub_array[] = $row['DonGiaTieuChuan'];
    $sub_array[] = $row['SoLuong'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM danhmucphong";
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
