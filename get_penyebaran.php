<?php
    include 'koneksi.php';
    error_reporting(1);
    $provinsiqs = $_GET['provinsi'];
    $provinsi = "SELECT * FROM penyebaran_covid WHERE provinsi = '".$provinsiqs."'";
    $result = mysqli_query($link, $provinsi) or die (mysqli_error($link)); 
    $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
    print json_encode($rows);
?>

