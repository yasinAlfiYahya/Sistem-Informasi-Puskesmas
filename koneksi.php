<?php 

    $link = mysqli_connect("remotemysql.com", "Oi2Ts4enDd", "vNmEEsEzjW", "Oi2Ts4enDd");
                    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>