<?php

include('db_connection.php');

$SoLuongKh = count($_POST["txtMaKhachHang"]);
$query = "
    INSERT INTO phieuthue (MaPhieuThue, NgayBdThue, DonGiaTieuChuan,DonGiaDuocTinh, SoLuongKh, MaPhong)
        VALUES (:txtMaPhieuThue, :txtNgayBdThue, :txtDonGiaTieuChuan, :txtDonGiaDuocTinh, :SoLuongKh, :txtMaPhong)
   ";

$data = array(
   ':txtMaPhieuThue' => $_POST['txtMaPhieuThue'],
   ':txtNgayBdThue' => $_POST['txtNgayBdThue'],
   ':txtDonGiaTieuChuan' => $_POST['txtDonGiaTieuChuan'],
   ':txtDonGiaDuocTinh' => $_POST['txtDonGiaDuocTinh'],
   ':SoLuongKh' => $SoLuongKh,
   ':txtMaPhong' => $_POST['txtMaPhong']
);

$statement = $connect->prepare($query);

$statement->execute($data);

$query = "
     UPDATE danhmucphong SET TinhTrangPhong = 1 WHERE MaPhong = :txtMaPhong;
    ";

$data = array(
   ':txtMaPhong' => $_POST['txtMaPhong']
);

$statement = $connect->prepare($query);

$statement->execute($data);


for ($count = 0; $count < count($_POST["txtMaKhachHang"]); $count++) {
   $data = array(
      ':MaKhachHang'   => $_POST["txtMaKhachHang"][$count],
      ':TenKh'   => $_POST["txtTenKh"][$count],
      ':CMND'   => $_POST["txtCMND"][$count],
      ':DiaChi'  => $_POST["txtDiaChi"][$count],
      ':MaLoaiKh' => $_POST["txtMaLoaiKh"][$count]
   );

   $query = "
   INSERT INTO khachhang 
       (MaKhachHang, TenKh, CMND, DiaChi, MaLoaiKh) 
       VALUES (:MaKhachHang, :TenKh, :CMND, :DiaChi, :MaLoaiKh)
  ";


   $statement = $connect->prepare($query);

   $statement->execute($data);

   $query1 = "
   INSERT INTO ct_phieuthue 
       (MaCT_PTP, MaPhieuThue, MaKhachHang) 
       VALUES (:MaCT_PTP, :MaPhieuThue, :MaKhachHang)
  ";

   $data1 = array(
      ':MaCT_PTP' => 'P' . strval($_POST['txtMaPhieuThue']) . 'K' . strval($_POST["txtMaKhachHang"][$count]),
      ':MaPhieuThue' => $_POST['txtMaPhieuThue'],
      ':MaKhachHang'   => $_POST["txtMaKhachHang"][$count]
   );

   $statement = $connect->prepare($query1);

   $statement->execute($data1);
}

echo "ok";
