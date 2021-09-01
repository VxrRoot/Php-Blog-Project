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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css.">
    <script src="https://kit.fontawesome.com/6fbe9eed38.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Projekt</title>
</head>

<body>
    <div class="parallax first">
        <nav>
            <div class="logo"><i class="fas fa-mountain"></i></div>
            <div class="navElements">
                <?php if (!isset($_SESSION['logged'])) echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLogowanie">Zaloguj</button>'; ?>
                <?php if (!isset($_SESSION['logged'])) echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRejestracja">Zarejestruj</button>'; ?>
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) echo '<button type="button" class="btn btn-primary" onclick="window.location=\'logout.php\'">Wyloguj</button>'; ?>

            </div>
        </nav>
        <div class="witaj">
            <div class="background">
                <h1><i>Witaj na stronie fanów górskich wspinaczek</i> </h1><br>
                <?php if (!isset($_SESSION['logged'])) echo '<h2>Zaloguj się lub zarejestruj <br> aby dołączyć do społeczności</h2>'; ?>
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
                    $user = $_SESSION['user'];
                    echo '<h2 style="text-transform: none;">Witaj! ' . $user . ' na naszej stronie znajdziesz wiele ciekawych <br> informacji o naszej wspólnej pasji</h2>';
                } ?>
            </div>
        </div>

        <!-- MODAL LOGOWANIE POCZATEK-->
        <div class="modal" id="ModalLogowanie">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Zaloguj się</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="login.php" method="post">
                            LOGIN: <input type="text" name="login" id=""><br><br>
                            HASŁO: <input type="password" name="password"> <br><br>
                            <input class="btn btn-danger" type="submit" value="Zaloguj" name="buttonlog">
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- MODAL LOGOWANIE KONIEC -->

        <!-- MODAL REJESTRACJA POCZATEK -->
        <div class="modal" id="ModalRejestracja">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Zarejestruj się</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="register.php" method="post">
                            LOGIN: <input type="text" name="login" id=""><br><br>
                            HASŁO: <input type="password" name="password"><br><br>
                            POWTÓRZ HASŁO: <input type="password" name="repeatPass"><br><br>
                            <input class="btn btn-danger" type="submit" value="Zarejestruj" name="buttonrej">
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- MODAL REJESTRACJA KONIEC -->

    </div>
    <div class="hello">
        <p>""W warunkach normalnych najbardziej pomaga technika. <br> W sytuacjach wyjątkowych najważniejszy jest hart ducha" <span style="font-weight: 700;">Walter Bonatti</span>
        </p>
    </div>
    <div class="parallax second"></div>

    <div class="wrapper">
        <main>
            <h1 style="text-transform: uppercase;">Artykuły użytkowników</h1>
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
                echo '<button type="button" class="btn btn-primary" onclick="window.location=\'article_add.php\'">Dodaj artykuł</button>';

                // if (isset($_SESSION['LoginStatus'])) {
                //     echo $_SESSION['LoginStatus'];
                //     unset($_SESSION['info']);
                // }

                require('connect.php');

                $query = "SELECT login, tresc, tytul, data_utworzenia, id_artykul from articles join users on articles.id_user=users.id_user";

                $result = mysqli_query($connection, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tytul = $row['tytul'];
                        $tresc = $row['tresc'];
                        $login = $row['login'];
                        $data = $row['data_utworzenia'];
                        $idArticle = $row['id_artykul'];
                        $who = $_SESSION['user'];

                        $_SESSION['idArticle'] = $idArticle;


                        echo "<div id=\"$idArticle\" class=\"card\">
                              <div class=\"card-header\">Artykul $idArticle</div>
                                <div class=\"card-body\">
                                <h5 class=\"card-title\">$tytul</h5>
                                <div class=\"card-text\">$tresc</div>
                              ";

                        echo "<p style=\"color: gray; font-size: 12px;\">dodany przez $login, $data</p>";
                        if ($who == $login || $who == 'admin') {

                            // USUWANIE
                            echo '<form method="post" action="article_delete.php">';
                            echo '<input type="hidden" name="todelete" value="' . $idArticle . '"  >';
                            echo '<input type="submit" style="background-color: red; border-color: brown;" class="btn btn-primary" type="button" value="Usun" name="btnDelete">';
                            echo '</form>';
                            //EDYCJA
                            echo '<form  method="post" action="article_edit.php">';
                            echo '<input type="hidden" name="toedit" value="' . $idArticle . '"  >';
                            echo '<input type="hidden" name="tytul" value="' . $tytul . '"  >';
                            // echo '<input type="hidden" name="tresc" value=\"' . $tresc . '\"  >';
                            echo '<input type="submit" style="margin-top: 5px; " class="btn btn-primary" type="button" value="Edytuj" name="btnEdit">';
                            echo '</form>';
                        }
                        echo "</div>
                                </div>";
                    }
                }
            } else {
                echo '<div class="nieZalogowany"><p>Zaloguj się aby zobaczyć zawartość</p></div>';
            }

            ?>
        </main>
    </div>
    <footer>
        <div class="napis">Autor: Dawid Słowik</div>

        <div class="social">
            <div class="fb"><a href="https:\\www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></div>
            <div class="ig"><a href="https:\\www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></div>
            <div class="yt"><a href="https:\\www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $('.logo').on('click', function() {
            $('body, html').animate({
                scrollTop: $('.first').offset().top
            }, 500)
        })
    </script>
</body>

</html>