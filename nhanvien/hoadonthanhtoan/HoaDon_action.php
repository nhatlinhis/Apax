<?php
$conn = new PDO("mysql:host=localhost; dbname=qlks", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if (isset($_POST["MaPhieuThueCanXuat"])) {
  $query = 'SELECT * from `phieuthue` WHERE MaPhieuThue = :MaPhieuThueCanXuat';
  $data = array(
    ':MaPhieuThueCanXuat' => strval($_POST["MaPhieuThueCanXuat"])
  );
  $statement = $conn->prepare($query);
  $statement->execute($data);
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $thanhtien = strval(intval($row['DonGiaDuocTinh']) * intval($_POST['SoNgayThue']));
    echo <<<EOF
      <tr id=$row[MaPhieuThue]><td class="maPhieuThue">$row[MaPhieuThue] </td> 
      <td class="NgayBdThue">$row[NgayBdThue]</td>
      <td>$row[DonGiaTieuChuan]</td>
      <td class="donGiaDuocTinh">$row[DonGiaDuocTinh]</td>
      <td>$row[SoLuongKh]</td>
      <td class="maPhong">$row[MaPhong]</td> 
      <td class="thanhTien">$thanhtien</td><td>
      <button onclick=xoaphieu($row[MaPhieuThue])>-</button></td></tr>
    EOF;
  }
}
