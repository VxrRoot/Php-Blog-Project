<?php
session_start();
require('connect.php');

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {


    $id = $_POST['todelete'];
    $query = "DELETE from articles WHERE id_artykul='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "usunięto";
    } else {
        echo "BLAD USUWANIA";
    }

    header('Location:index.php');
}
