<?php
  include('db_connection.php');

  if (isset($_POST['txtMaPhong'])) {
    $query = "SELECT DonGiaTieuChuan from danhmucphong dmp join loaiphong lp on dmp.MaLoaiPhong = lp.MaLoaiPhong where dmp.MaPhong = :MaPhong;";

    $data = array(
      ':MaPhong' => $_POST['txtMaPhong']
    );

    $statement = $connect->prepare($query);

    $statement->execute($data);
    
    $result = $statement->fetchAll();

    foreach($result as $row) {
      $str = $row['DonGiaTieuChuan'];
    }

    $query = "SELECT MaLoaiPhong from danhmucphong WHERE MaPhong = :MaPhong;";

    $data = array(
      ':MaPhong' => $_POST['txtMaPhong']
    );

    $statement = $connect->prepare($query);

    $statement->execute($data);
    
    $result = $statement->fetchAll();

    foreach($result as $row) {
      $str1 = $row['MaLoaiPhong'];
    }

    $output = array(
      'LoaiPhong' => $str1,
      'DonGiaTieuChuan' => $str
    );

    echo json_encode($output);
  }

  if (isset($_POST['txtMaPhieuThue'])) {
    $query = "SELECT COUNT(MaPhieuThue) AS SoPhieuDaCo from phieuthue";

    $statement = $connect->prepare($query);

    $statement->execute();
    
    $result = $statement->fetchAll();

    foreach($result as $row) {
      $soPhieu = intval($row['SoPhieuDaCo']) + 1;
    }
  
    echo $soPhieu;
  }
