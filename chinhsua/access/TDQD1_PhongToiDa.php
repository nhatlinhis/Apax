<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
  $query = "UPDATE thamso
    SET GiaTri = :SoPhongToiDa 
    WHERE TenThamSo = 'SoPhongToiDa'";
  $statement = $connect->prepare($query);
  $statement->execute(array(
    ':SoPhongToiDa' => $_POST['SoPhongToiDa']
  ));
  echo "Cập nhật Số lượng phòng tối đa của khách sạn thành công. Vui lòng nhấn F5 hoặc Refresh để tải lại trang.";
} catch (PDOException $e) {
  echo $e->getMessage();
}