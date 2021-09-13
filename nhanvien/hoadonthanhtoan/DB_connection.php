<?php

$connect = new PDO("mysql:host=localhost; dbname=qlks;", "root", "");

function fill_ma_hd($connect)
{
  $query = "SELECT COUNT(MaHD) AS SoHDDaCo from hoadon";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $soKhach = intval($row['SoHDDaCo']) + 1;
  }

  return $soKhach;
}
