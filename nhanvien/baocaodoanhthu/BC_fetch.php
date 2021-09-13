<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks;", "root", "");

function fill_MaBaoCao($connect)
{
  $query = "SELECT COUNT(MaBaoCaoDT) AS SoBCDaCo from baocaodt";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $soKhach = intval($row['SoBCDaCo']) + 1;
  }

  return $soKhach;
}

$maBaoCao = fill_MaBaoCao($connect);

function fill_MaCT_BaoCao($connect)
{
  $query = "SELECT COUNT(MaCT_BaoCaoDT) AS SoCTBCDaCo from ct_baocaodt";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $soKhach = intval($row['SoCTBCDaCo']) + 1;
  }

  return $soKhach;
}

$maCtBaoCao = fill_MACT_BaoCao($connect);

$maBaoCao = $_POST['thang'] . $_POST['nam'];

$query = "SELECT sum(TriGia) as DoanhThu, TenLoaiPhong, dmp.MaLoaiPhong 
  from hoadon hd join ct_hoadon cthd on cthd.MaHD = hd.MaHD
    join phieuthue pt on pt.MaPhieuThue = cthd.MaPhieuThue
    join danhmucphong dmp on dmp.MaPhong = pt.MaPhong
    join loaiphong lp on lp.MaLoaiPhong = dmp.MaLoaiPhong
  where month(hd.NgayLap) = :thang and year(hd.NgayLap) = :nam
  group by dmp.MaLoaiPhong, TenLoaiPhong";

$statement = $connect->prepare($query);

$data  = array(
  ':thang' => $_POST['thang'],
  ':nam' => $_POST['nam']
);

$statement->execute($data);

$result = $statement->fetchAll();

$sum = 0;

foreach ($result as $row) {
  $sum += intval($row['DoanhThu']);
}

$i = 0;
$tiLe = 0;

$query = "REPLACE INTO baocaodt values (:MaBaoCaoDT, :Ngay, :Thang)";

$statement = $connect->prepare($query);

$date = date('Y-m-d');

$data  = array(
  ':MaBaoCaoDT' => $maBaoCao,
  ':Ngay' => $date,
  ':Thang' => $_POST['thang']
);

$statement->execute($data);

foreach ($result as $row) {
  $i++;
  $tiLe = round(intval($row['DoanhThu']) / $sum * 100, 2);

  $query = "REPLACE INTO ct_baocaodt values (:MaCT_BaoCaoDT, :DoanhThu, :TiLe, :MaBaoCaoDT, :MaLoaiPhong)";

  $statement = $connect->prepare($query);

  $maCtBaoCao = $maBaoCao . $row['MaLoaiPhong'];

  $data  = array(
    ':MaCT_BaoCaoDT' => $maCtBaoCao,
    ':DoanhThu' => $row['DoanhThu'],
    ':TiLe' => $tiLe,
    ':MaBaoCaoDT' => $maBaoCao,
    ':MaLoaiPhong' => $row['MaLoaiPhong']
  );

  $statement->execute($data);

  $doanhThu = number_format($row['DoanhThu']) . 'đ';

  echo <<<EOF
  <tr>
    <td>$i</td>
    <td>$row[TenLoaiPhong]</td>
    <td>$doanhThu</td>
    <td>$tiLe</td>
  <tr>
  EOF;
}
