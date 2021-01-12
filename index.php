<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil - Le fil d'or</title>
</head>

<body>
<header>
    <nav>
        <div class="nav-wrapper black">
            <a href="#" class="brand-logo">
                Le fil d'or<i class="material-icons right">flare</i>
            </a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li class="activepage"><a href="#">Home</a></li>
                <li class="navlink"><a href="#">About</a></li>
                <li class="navlink"><a href="#">Contact</a></li>
                <li><a href="pages/walloffame.php" class="navlink">Wall of Fame</a></li>
                <!-- Utilisateur déconnecté -->
                <li class="navlink <?php if (!isset($_SESSION['user'])) {
                    echo 'disabled';
                } ?>"><a href="pages/level.php">Commencer une partie</a></li>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <li><a href="pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
                    <li><a href="pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
                    <!-- Utilisateur connecté-->
                <?php else : ?>
                    <li><a href="pages/profil.php" class="btn white indigo-text">Profil</a></li>
                    <li><a href="pages/deconnexion.php" class="btn white indigo-text">Déconnexion</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-links">
        <li><a href="#">Home
                <i class="material-icons">brightness_3</i>
            </a></li>
        <li><a href="#">About
                <i class="material-icons">brightness_2</i>
            </a></li>
        <li><a href="#">Contact
                <i class="material-icons">brightness_1</i>
            </a></li>
        <li><a href="pages/walloffame.php">Wall of Fame
                <i class="material-icons">brightness_4</i>
            </a></li>
        <!-- Utilisateur déconnecté -->
        <li class="navlink <?php if (!isset($_SESSION['user'])) {
            echo 'disabled';
        } ?>"><a href="pages/level.php">Commencer une partie<i class="material-icons">brightness_5</i></a></li>
        <?php if (!isset($_SESSION['user'])) : ?>
            <li><a href="pages/inscription.php" class="btn white indigo-text waves-effect">Inscription</a></li>
            <li><a href="pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
            <!-- Utilisateur connecté-->
        <?php else : ?>
            <li><a href="pages/profil.php" class="btn white indigo-text">Profil</a></li>
            <li><a href="pages/deconnexion.php" class="btn white indigo-text">Déconnexion</a></li>
        <?php endif; ?>
    </ul>
</header>

<main id="mainIndex">

    <section id="sectionIndex">
        <article>
            <div class="containertarotCard">
                <div class="flipper">
                    <div class="front">
                        <img class="tarotback" src="src/tarot1back.png" alt="tarotCard">
                    </div>
                    <div class="back">
                        <img src="src/tarot1.png" alt="tarotCard">
                    </div>
                </div>
            </div>
        </article>
        <article>
            <div class="containertarotCard">
                <div class="flipper">
                    <div class="front">
                        <img class="tarotback" src="src/tarot2back.png" alt="tarotCard">
                    </div>
                    <div class="back">
                        <img src="src/tarot2.png" alt="tarotCard">
                    </div>
                </div>
            </div>
        </article>
        <article>
            <div class="containertarotCard">
                <div class="flipper">
                    <div class="front">
                        <img class="tarotback" src="src/tarot3back.png" alt="tarotCard">
                    </div>
                    <div class="back">
                        <img src="src/tarot3.png" alt="tarotCard">
                    </div>
                </div>
            </div>
        </article>
    </section>

    <section id="sectionIndex2" class="center">
        <h5 class="white-text"><em>Les lames disent votre présent, votre passé, votre futur</em></h5>
        <a href="pages/level.php" class="btn white indigo-text">Tirer les cartes</a>
    </section>

</main>

<footer class="page-footer black center">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="grey-text text-lighten-2">Le destin se trouve entre vos mains</h5>
                <p class="grey-text text-lighten-4">Ne tirez jamais au hasard.</p>
                <img src="src/footerpic.png" alt="illustration">
            </div>
            <div class="col l4 offset-l2 s12">
                <p class="grey-text text-lighten-2">Liens développeuses</p>
                <ul>
                    <li><a href="#" class="valign-wrapper">Alicia<img width="30" src="src/twitter.png" alt="twitter"></a></li>
                    <li><a href="#" class="valign-wrapper">May<img width="30" src="src/twitter.png" alt="twitter"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright center">
        <div class="container">© 2021 Sororité Copyright</div>
    </div>
</footer>

<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>
</body>
</html>