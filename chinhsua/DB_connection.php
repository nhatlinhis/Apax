<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks;", "root", "");

function getPhongToiDa($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'SoPhongToiDa'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soPhong = intval($row['GiaTri']);
  }

  return $soPhong;
}

function getKhachToiDa($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'SoKhachToiDa'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = intval($row['GiaTri']);
  }

  return $soKhach;
}

function getPhuThuKhachToiDa($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'PhuThuKhachToiDa'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = floatval($row['GiaTri']);
  }

  return $soKhach;
}

function getPhuThuKhachNN($connect) {
  $query = "SELECT SUM(GiaTri) AS GiaTri from thamso WHERE TenThamSo = 'PhuThuKhachNN'";

  $statement = $connect->prepare($query);

  $statement->execute();
  
  $result = $statement->fetchAll();

  foreach($result as $row) {
    $soKhach = floatval($row['GiaTri']);
  }

  return $soKhach;
}
