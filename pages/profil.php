<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';



session_start();


$user = new user;


if(isset($_SESSION['user'])){

  $user = $_SESSION['user'];



if(isset($_POST['formprofil'])){
  $user->update($_POST['login'], $_POST['password'], $_POST['password2'], $user['id']);
}

}

?>


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
    <title>Profil</title>
</head>

<body>
<div class="navbar-fixed">
    <nav class="nav-wrapper black">
        <div class="container">
            <a href="#" class="brand-logo">Memory</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="pages/memory.php">Faire une partie</a></li>
                <li><a href="pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
                <li><a href="pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
            </ul>
        </div>
    </nav>
</div>

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

<main class="valign-wrapper"> 
    
<div class="row">
  <form class="col s12" action="profil.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login"  maxlength="20" class="validate"/>
          <label for="login">New Login</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password"  maxlength="20"/>
          <label for="password">Nouveau Password</label>
        </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
          <input id="password2" type="password" class="validate" name="password2"  maxlength="20"/>
          <label for="password2">Confirmation Password</label>
      </div>
    </div>

     
  <button class="btn waves-effect waves-light black" type="submit" name="formprofil">Submit
    <i class="material-icons right">send</i>
  </button>
        
<?php
if (isset($erreur))
{
  echo $erreur;
}
?>

    </form>
</div>



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
                            <span>Alicia</span>
                            <img src="src/twitter.png" alt="twitter">
                        </a></li>
                    <li><a href="#" class="valign-wrapper">
                            <span>May</span>
                            <img src="src/twitter.png" alt="twitter">
                        </a></li>
                </ul>
            </div>
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