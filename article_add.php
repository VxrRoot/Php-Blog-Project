<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css.">
    <script src="https://kit.fontawesome.com/6fbe9eed38.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <title>Article Add</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url(images/1.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Roboto Condensed', sans-serif;
        }

        .wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
            padding: 10px;
            width: 70%;
            font-family: 'Roboto Condensed', sans-serif;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .napis {
            text-align: center;
            margin-top: 30px;
            font-size: 36px;
        }
    </style>
</head>

<body>
    <div class="napis">Dodaj ciekawy lub pomocny artykuł</div>
    <div class="wrapper">
        <form action="" method="post">
            Tytuł: <input class="form-control" type="text" name="tytul"><br>
            Treść: <textarea class="form-control" name="tresc"> </textarea><br>
            <input class="btn btn-primary" type="submit" value="Dodaj" name="button1">
        </form>
    </div>

    <?php
    if (isset($_POST['button1'])) {

        require('connect.php');

        $tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];
        $who = $_SESSION['user'];

        $tytul = mysqli_real_escape_string($connection, $tytul);
        $tresc = mysqli_real_escape_string($connection, $tresc);


        $query2 = "SELECT id_user from users where login='$who'";

        $result2 = mysqli_query($connection, $query2);

        if ($result2) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $user = $row['id_user'];
            }
            $query = "INSERT INTO articles VALUES ('', $user ,now(), now(), '$tytul', '$tresc')";

            $result = mysqli_query($connection, $query);

            if ($result) {
                $_SESSION['info'] = "Artykul dodany";
            } else {
                $_SESSION['info'] = "Artylul niedodany!";
            }
        }

        header("Location: index.php");
    }

    ?>

</body>

</html>