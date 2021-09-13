<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if ($_POST['action'] == 'edit') {

  $data = array(
    ':MaLoaiKh'  => $_POST['MaLoaiKh'],
    ':TenLoaiKh'  => $_POST['TenLoaiKh'],
    ':HeSoPhuThu'  => $_POST['HeSoPhuThu']
  );

  $query = "
 UPDATE loaikhach
 SET TenLoaiKh = :TenLoaiKh, HeSoPhuThu = :HeSoPhuThu
 WHERE MaLoaiKh = :MaLoaiKh
 ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  echo json_encode($_POST);

  if ($_POST['MaLoaiKh'] == 'NN') {
    try {
      $query = "UPDATE thamso
      SET GiaTri = :HeSoPhuThu 
      WHERE TenThamSo = 'PhuThuKhachNN'";
      $statement = $connect->prepare($query);
      $statement->execute(array(
        ':HeSoPhuThu' => $_POST['HeSoPhuThu']
      ));
      echo "okay";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}

if ($_POST['action'] == 'delete') {
  $query = "
 DELETE FROM loaikhach
 WHERE MaLoaiKh = '" . $_POST["MaLoaiKh"] . "'
 ";
  $statement = $connect->prepare($query);
  $statement->execute();
  echo json_encode($_POST);
}
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
