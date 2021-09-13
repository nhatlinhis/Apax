<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
  $query = "INSERT INTO loaiphong
    VALUES (:MaLoaiPhong, :TenLoaiPhong, :DonGiaTieuChuan, 0)";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':MaLoaiPhong' => $_POST['MaLoaiPhong'],
    ':TenLoaiPhong' => $_POST['TenLoaiPhong'],
    ':DonGiaTieuChuan' => $_POST['DonGiaTieuChuan'],
  ));
  echo "Thêm mới Loại phòng thành công. Vui lòng F5 hoặc Refresh để tải lại trang";
} catch (PDOException $e) {
  echo $e->getMessage();
}