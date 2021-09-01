<?php
session_start();

require('connect.php');

if (isset($_POST['buttonrej'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $repeatPass = $_POST['repeatPass'];

    if (!empty($password) && !empty($login)) {

        $loginCheck = "SELECT login from users WHERE login='$login'";

        $resultLoginCheck = mysqli_query($connection, $loginCheck);

        if (mysqli_num_rows($resultLoginCheck) == 0) {
            if ($password == $repeatPass) {

                $login = mysqli_real_escape_string($connection, $login);
                $password = mysqli_real_escape_string($connection, $password); // zabezpieczenie mysql injection

                $login = htmlentities($login);
                $password = htmlentities($password);

                $password = md5($password);

                $query = "INSERT INTO users VALUES ('','$login','$password',0)";

                $result = mysqli_query($connection, $query);

                if ($result) {
                    $_SESSION['dodano'] = "Pomyślnie dodano";
                } else {
                    $_SESSION['dodano'] = "Nie dodano";
                }
            }
            header("Location: index.php");
        } else {
            echo "  <div>
                <p id=\"blad\">Użytkownik o podanym loginie już istnieje</p><br>
                <a href=\"index.php\" type=\"button\" class=\"btn btn-warning\">Wróć na stronę główną</a>
                </div>";
        }
    } else {
        echo "  <div>
    <p id=\"blad\">Musisz podać login i hasło aby się zarejestrować !</p><br>
    <a href=\"index.php\" type=\"button\" class=\"btn btn-warning\">Wróć na stronę główną</a>
    </div>";
    }
}

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-image: url(images/1.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        p {
            text-align: center;
            font-size: 20px;
            font-family: 'Roboto Condensed', sans-serif;
        }

        div {
            width: 300px;
            margin: auto;
            text-align: center;
        }
    </style>
</head>

<body>

</body>