<?php

include('DB_connection.php');

print_r($_POST);

$query = "
    INSERT INTO hoadon (MaHD, TriGia, TenKh, DiaChi, NgayLap)
    VALUES (:MaHD, :TriGia, :TenKh, :DiaChi, :NgayLap)
   ";

$data = array(
  ':MaHD' => $_POST['txtMaHD'],
  ':TriGia' => $_POST['txtTriGia'],
  ':TenKh' => $_POST['txtCoQuan'],
  ':DiaChi' => $_POST['txtDiaChi'],
  ':NgayLap' => $_POST['txtNgayLapHD']
);

$statement = $connect->prepare($query);

$statement->execute($data);

for ($count = 0; $count < count($_POST["maPhieuThue"]); $count++) {
  $data = array(
    ':MaHD' => $_POST['txtMaHD'],
    ':soNgayThue' => $_POST['soNgayThue'][$count],
    ':maPhieuThue'   => $_POST["maPhieuThue"][$count],
    ':thanhTien'   => $_POST["thanhTien"][$count],
    ':donGiaDuocTinh'   => $_POST["donGiaDuocTinh"][$count]
  );

  $query = "
    INSERT INTO ct_hoadon 
    (MaPhieuThue, SoNgayThue, ThanhTien, DonGiaDuocTinh, MaHD)
    VALUES (:maPhieuThue, :soNgayThue ,:thanhTien, :donGiaDuocTinh, :MaHD)
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);

  $data = array(
    ':maPhong'   => $_POST["maPhong"][$count]
  );

  $query = "
    UPDATE danhmucphong SET TinhTrangPhong = 0 Where MaPhong = :maPhong 
   ";

  $statement = $connect->prepare($query);

  $statement->execute($data);
}

echo "ok";
