<?php
$conn = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$sql = "SELECT * FROM phieuthue pt 
WHERE MaPhieuThue NOT IN (SELECT MaPhieuThue FROM ct_hoadon)";

$statement = $conn->prepare($sql);

$statement->execute();

$result = $statement->fetchAll();

foreach ($result as $row) {
  echo '<tr id="' . $row["MaPhieuThue"] . '1' . '"><td>' . $row["MaPhieuThue"] . "</td>" .
    "<td>" . $row["NgayBdThue"] . "</td>" .
    "<td>" . $row["DonGiaTieuChuan"] . "</td>" .
    "<td>" . $row["DonGiaDuocTinh"] . "</td>" .
    "<td>" . $row["SoLuongKh"] . "</td>" .
    "<td>" . $row["MaPhong"] . "</td><td>" .
    '<button type="button" onclick="xuatphieu(' . "'" . $row["MaPhieuThue"] . '1' . "'" . ",'" . $row["NgayBdThue"] . "'" . ')">+</button></td></tr>';
}
