<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <link rel="stylesheet" href="css/style.css">
    <title>Accueil - Le fil d'or</title>
</head>

<body>
<header>
    <nav>
        <div class="nav-wrapper black">
            <a href="#" class="brand-logo">
                Le fil d'or
                <i class="material-icons right">flare</i>
            </a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li class="navlink"><a href="#">Home</a></li>
                <li class="navlink"><a href="#">About</a></li>
                <li class="navlink"><a href="#">Contact</a></li>
                <li class="navlink"><a href="pages/memory.php">Faire une partie</a></li>
                <li><a href="pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
                <li><a href="pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
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
        <li><a href="pages/memory.php">Faire une partie
                <i class="material-icons">brightness_5</i>
            </a></li>
        <li><a href="pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
        <li><a href="pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
    </ul>
</header>

<main>

</main>

<footer class="page-footer black center">
    <div class="container">
        <div class="row valign-wrapper">
            <div class="col l12 s6">
                <h5 class="purple-text text-lighten-1">Liens développeuses</h5>
            </div>
            <div class="col l12 s6">
                <ul class="valign-wrapper">
                    <li><a href="#" class="valign-wrapper">
                            <span>Alicia</span><img width="30" src="src/twitter.png" alt="twitter">
                        </a></li>
                    <li><a href="#" class="valign-wrapper">
                            <span>May</span><img width="30" src="src/twitter.png" alt="twitter">
                        </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright center">
        <div class="container">
            © 2021 Sororité Copyright
        </div>
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