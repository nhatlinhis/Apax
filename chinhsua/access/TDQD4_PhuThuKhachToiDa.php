<?php
include('../DB_connection.php');

$conn = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
  $query = "UPDATE thamso
    SET GiaTri = :HeSoPhuThu 
    WHERE TenThamSo = 'PhuThuKhachToiDa'";
  $statement = $conn->prepare($query);
  $statement->execute(array(
      ':HeSoPhuThu' => $_POST['PhuThuKhachToiDa']
    ));
    echo "Cập nhật Tỉ lệ Phụ thu khách ";
    echo getKhachToiDa($connect);
    echo " thành công. Vui lòng F5 hoặc Refresh để tải lại trang.";
} catch (PDOException $e) {
    echo $e->getMessage();
}