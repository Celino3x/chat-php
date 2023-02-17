<?php
    //$con = mysqli_connect("mysql367.umbler.com", "celino3x", "JC123456", "quicktalk");
    $con = mysqli_connect("localhost", "celino3x", "123456", "quicktalk");
    mysqli_query($con, "SET time_zone-'+00:00'");

    date_default_timezone_set("UTC");

    if(mysqli_connect_errno()){
        echo "Falha ao conectar com o banco de dados: ".mysqli_connect_error();
        exit();
    }

?>