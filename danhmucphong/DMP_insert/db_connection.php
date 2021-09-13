<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks;", "root", "");

function fill_select_box($connect, $temp)
{
    if ($temp == 0) {
        $query = "SELECT * FROM loaiphong";

        $statement = $connect->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        $output = '';

        foreach ($result as $row) {
            $output .= '<option value="' . $row["MaLoaiPhong"] . '">' . $row["TenLoaiPhong"] . '</option>';
        }

        return $output;
    } else {
        $output = ' <option value=0>Còn trống</option><option value=2>Đang sửa</option>';
        return $output;
    }
}

function fill_MaPhong($connect)
{
  $query = "SELECT COUNT(MaPhong) AS SoPhongDaCo from danhmucphong";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $soPhong = intval($row['SoPhongDaCo']) + 1;
  }

  return $soPhong;
}

function getPhongToiDa($connect)
{
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'SoPhongToiDa'";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $soPhong = intval($row['GiaTri']);
  }

  return $soPhong;
}