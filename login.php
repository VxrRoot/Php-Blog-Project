<?php
session_start();
require('connect.php');

if (isset($_POST['buttonlog'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!empty($password) && !empty($login)) {

        $login = mysqli_real_escape_string($connection, $login);
        $password = mysqli_real_escape_string($connection, $password); // zabezpieczenie mysql injection

        $login = htmlentities($login);
        $password = htmlentities($password);

        $password = md5($password);

        $_SESSION['user'] = $login;


        $query = "SELECT login,haslo FROM users WHERE login='$login' and haslo='$password'";

        $result = mysqli_query($connection, $query);

        if ($result) {
            $numRows = mysqli_num_rows($result);

            if ($numRows == 1) {
                $_SESSION['logged'] = 1;
                $_SESSION['LoginStatus'] = "Zalogowano poprawnie";
            } else {
                $_SESSION['logged'] = 0;
                $_SESSION['LoginStatus'] = "Niepoprawne dane logowania!";
            }
        } else {
            echo "blad logowanie";
        }
    }
    header('Location:index.php');
}
