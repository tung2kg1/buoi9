<?php
    $serverName = "localhost";
    $userName = "root";
    $pwd = "";
    $nameDB = "dblabtop2";

    $conn = mysqli_connect($serverName, $userName, $pwd, $nameDB);

    if(!$conn){ echo "ket noi that bai"; }
?>

