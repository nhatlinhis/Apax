<?php

//connect db
$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "");
//edit
if ($_POST['action'] == 'edit') {
  $data = array(
    ':MaPhong' => $_POST['txtMaPhongSX'],
    ':TenPhong' => $_POST['txtTenPhongSX'],
    ':TinhTrangPhong' => $_POST['cbTinhTrangPhongSX'],
    ':Ghichu' => $_POST['txtGhiChuSX'],
  );

  $sql = "
    SELECT TinhTrangPhong FROM danhmucphong 
    WHERE MaPhong = '" . $_POST["txtMaPhongSX"] . "'";
  $res;
  foreach ($connect->query($sql) as $row) {
    $res = $row['TinhTrangPhong'];
  }
  if ($res != '1') {
    $query = "
    UPDATE danhmucphong 
    SET TenPhong = :TenPhong, 
    TinhTrangPhong = :TinhTrangPhong, 
    Ghichu = :Ghichu ,
    WHERE MaPhong = :MaPhong";
  }
  $statement = $connect->prepare($query);
  $statement->execute($data);
  echo json_encode($_POST);
}

//delete
if ($_POST['action'] == 'delete') {
  $sql = "
  SELECT TinhTrangPhong FROM danhmucphong 
  WHERE MaPhong = '" . $_POST["txtMaPhongSX"] . "' 
";
  $res;
  foreach ($connect->query($sql) as $row) {
    $res = $row['TinhTrangPhong'];
  }

  if ($res != '1') {
    $query = "
      DELETE FROM danhmucphong 
      WHERE MaPhong = '" . $_POST["txtMaPhongSX"] . "'
      ";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query = " UPDATE loaiphong SET SoLuong = SoLuong - 1 WHERE MaLoaiPhong = SUBSTRING('" . $_POST["txtMaPhongSX"] . "',1,1)";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
  }
}
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
