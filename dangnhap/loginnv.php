<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập nhân viên</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Đăng nhập nhân viên</h1>
      <form method="post" style="height:260px">
        <div class="txt_field">
          <input type="text" name="user" required>
          <span></span>
          <label>Tên tài khoản</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pass" required>
          <span></span>
          <label>Mật khẩu</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          <a href="login.php">Đăng nhập cho quản lý</a>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
  include "function.php";
  include "database.php";
  session_start();
      if(isset($_SESSION["thongtindangnhapnv"]['username']))
      {
        header("location:./nhanvien/indexnv.php");
        exit;
      }
  $db = new db();
  $u = postIndex("user");
  $p = postIndex("pass");

  if ($u !=="" && $p !="")
  {
    $sql="select * from taikhoannv where taikhoan= :U 
      and matkhau = :P ";
    $arr = array(":U"=> $u, ":P"=> $p);
    $rows = $db->selectQuery($sql, $arr);
    if ($db->n >0) //Co user
    {
      $_SESSION["thongtindangnhapnv"]= $rows[0];
      header("location:../nhanvien/indexnv.php");
      exit;
    }	
    else {
      ?>
        <script type="text/javascript" language="javascript">
          alert ("Tên đăng nhập hoặc mật khẩu sai !!!");
          window.history.go(-1);
        </script>
      <?php
      }
  }
?>
