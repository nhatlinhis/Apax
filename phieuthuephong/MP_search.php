<?php
include('db_connection.php');

$_POST['query'] = 'A';

$query = "SELECT * FROM danhmucphong WHERE TinhTrangPhong = 0 AND MaLoaiPhong = :MaLoaiPhong AND MaPhong LIKE '%" . $_POST['query'] . "%'";

$statement = $connect->prepare($query);

$data = array(
  ':MaLoaiPhong' => strval($_POST['loai'])
);

$statement->execute($data);

$result = $statement->fetchAll();

$countryResult = [];

foreach ($result as $row) {
  $countryResult[] = $row['MaPhong'];
}

echo json_encode($countryResult);
?>