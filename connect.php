<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "projekt";

    $connection = @mysqli_connect($host,$user,$pass,$db);

    if(!$connection) {
        echo "Brak połączenia";
        exit();
    }
?>