<?php
session_start();

include "koneksi.php";

$email = $_POST["email"];
$p = $_POST["password"];

$sql = "select * from akun where email='$email' and password='$p'";
$hasil = mysqli_query ($link,$sql);
$jumlah = mysqli_num_rows($hasil);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["nama"]=$row["nama"];
		$_SESSION["email"]=$row["email"];
		$_SESSION["tipe_akun"]=$row["tipe_akun"];
		header("Location:home.php?$_SESSION[nama]");
	}else {
		echo "<script>alert('Email atau Password Salah!');window.location='index.php'</script>";
	}
?>