<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try {
    $query = "UPDATE thamso
      SET GiaTri = :HeSoPhuThu 
      WHERE TenThamSo = 'PhuThuKhachNN'";
    $statement = $connect->prepare($query);
    $statement->execute(array(
      ':HeSoPhuThu' => $_POST['PhuThuKhachNN']
    ));

    $query = "UPDATE loaikhach
    SET HeSoPhuThu = :HeSoPhuThu
    WHERE MaLoaiKh = 'NN'";
    $statement = $connect->prepare($query);
    $statement->execute(array(
      ':HeSoPhuThu' => $_POST['PhuThuKhachNN']
    ));
    echo "Cập nhật Tỉ lệ phụ thu khách nước ngoài thành công. Vui lòng F5 hoặc Refresh để tải lại trang.";
} catch (PDOException $e) {
    echo $e->getMessage();
}