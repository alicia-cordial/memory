<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  
  <link rel= "stylesheet" href= "index.css">
  <title>Blue Moon</title>
</head>
<body>

  <div class="navbar-fixed">
    <nav class="nav-wrapper black">
      <div class="container">
        <a href="#" class="brand-logo">Blue Moon
        <i class="material-icons text-white">brightness_4</i>
        </a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="../memory/pages/connexion.php">Discuter</a></li>
          <li><a href="../memory/pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
          <li><a href="../memory/pages/connexion.php" class="btn white indigo-text">Login</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="#">Home
    <i class="material-icons">home </i>
    </a></li>
    <li><a href="#">About
    <i class="material-icons">brightness_6 </i>
    </a></li>
    <li><a href="#">Contact
    <i class="material-icons">mail_outline </i>
    </a></li>
    <li><a href="../memory/pages/connexion.php">Discuter
    <i class="material-icons">insert_comment </i>
    </a></li>
    <li><a href="../memory/pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
    <li><a href="../memory/pages/connexion.php" class="btn white indigo-text">Login</a></li>
  </ul>
  



  <footer class="page-footer black center">
      <div class="container">
          <div class="col l12 s6">
            <h5 class="white-text">Links</h5>
              <ul>
                <li><a href="facebook.com">
                  <img src="../discussion/images/facebook.png" alt="facebook"/>
                </a></li>
                <li><a href="instagram.com">
                <img src="../discussion/images/instagram.png" alt="instagram"/>
                </a></li>
                <li><a href="twitter.com">
                <img src="../discussion/images/twitter.png" alt="twitter"/>
                </a></li>
              </ul>
          </div>
      </div>
          
    <div class="footer-copyright center">
      <div class="container">
        © 2020 Witch Copyright
      </div>
    </div>

    </footer>
            
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
  </script>
</body>
</html>