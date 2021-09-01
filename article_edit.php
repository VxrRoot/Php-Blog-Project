<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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

<body>
    <?php
    if (isset($_POST['btnEdit'])) {
        require("connect.php");
        $tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];
        $idEdit = $_POST['toedit'];

        $_SESSION['idEdit'] = $idEdit;
    }

    if (isset($_POST['buttonEdit'])) {
        echo "tak";
        require("connect.php");

        $tytulEdit = $_POST['tytulEdit'];
        $trescEdit = $_POST['trescEdit'];
        $id = $_SESSION['idEdit'];

        $tytulEdit = mysqli_real_escape_string($connection, $tytulEdit);
        $trescEdit = mysqli_real_escape_string($connection, $trescEdit);

        $query = "UPDATE articles SET data_edycji=NOW(),tresc='$trescEdit', tytul='$tytulEdit'  WHERE id_artykul=$id";

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: index.php");
            $error =  "Poprawnie edytowano";
        } else {
            $error = "Blad";
        }
    }

    // $tresc = mysqli_real_escape_string($connection, $tresc);

    ?>
    <div class="napis">Edytuj Artykuł</div>
    <div class="wrapper">
        <form action="" method="post">
            Tytuł: <input class="form-control" type="text" name="tytulEdit" value="<?php echo $tytul; ?>"><br>
            Treść: <textarea class="form-control" name="trescEdit" value=""> <?php echo $tresc; ?></textarea><br>
            <input class="btn btn-primary" type="submit" value="Zapisz" name="buttonEdit">
        </form>
    </div>

    <?php



    ?>
</body>