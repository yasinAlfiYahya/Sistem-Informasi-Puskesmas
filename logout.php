<?php
session_start();

$_SESSION['nama']='';
$_SESSION['email']='';

unset($_SESSION['nama']);
unset($_SESSION['email']);

session_unset();
session_destroy();
header('Location:index.php');

?>