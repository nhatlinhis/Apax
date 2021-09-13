<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
  $query = "UPDATE thamso
    SET GiaTri = :SoKhachToiDa 
    WHERE TenThamSo = 'SoKhachToiDa'";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':SoKhachToiDa' => $_POST['SoKhachToiDa']
  ));
  echo "Cập nhật Số lượng khách tối đa trong phòng thành công. Vui lòng nhấn F5 hoặc Refresh để tải lại trang.";
} catch (PDOException $e) {
  echo $e->getMessage();
}