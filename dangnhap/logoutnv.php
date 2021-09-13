<?php
	if (!isset($_SESSION)) session_start();
	unset($_SESSION["thongtindangnhapnv"]);
	header("location:loginnv.php");
	exit;
?>
