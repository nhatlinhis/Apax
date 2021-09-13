<?php
$conn = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$sql = "SELECT MaPhong, TenPhong, GhiChu FROM danhmucphong WHERE TinhTrangPhong = 0";

$statement = $conn->prepare($sql);

$statement->execute();

$result = $statement->fetchAll();

foreach ($result as $row) {
  echo '<tr><td>' . $row["MaPhong"] . "</td>" .
    "<td>" . $row["TenPhong"] . "</td>" .
    "<td>" . $row["GhiChu"] . "</td>" .
    "<td>" . "Còn trống" . "</td>" .
    '</td></tr>';
}
