<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
  $query = "INSERT INTO loaikhach 
    VALUES (:MaLoaiKh, :TenLoaiKh, :HeSoPhuThu)";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':MaLoaiKh' => $_POST['MaLoaiKh'],
    ':TenLoaiKh' => $_POST['TenLoaiKh'],
    ':HeSoPhuThu' => $_POST['HeSoPhuThu']
  ));
  echo "Thêm mới Loại khách thành công. Vui lòng F5 hoặc Refresh để tải lại trang";
} catch (PDOException $e) {
  echo $e->getMessage();
}