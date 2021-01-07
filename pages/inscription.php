<?php

require_once '../classes/user.php';

require_once '../classes/validator.php';

session_start();
$pdo = new database("localhost","memory", "root","");
$user = new user; 


if (isset($_POST['forminscription'])){

    $validator = new validator($_POST);

    $validator->userExists('login', $pdo, 'Ce pseudo est déjà pris.');

    $validator->passwordConfirm('password', 'Les mots de passe ne sont pas identiques.');

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
   
    $user->register($login, $password);
    $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
    var_dump($user);
    var_dump($validator);
}
?>

<?php include '../includes/header.php'; ?>

<main class="valign-wrapper">

    
        <!--FORMULAIRE--> 
      

<div class="row">
  <form class="col s12" action="inscription.php" method="post">
    <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login" class="validate" value="<?php if(isset($login)) { echo $login; } ?>"  maxlength="20" required/>
          <label for="login">Login</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password"  maxlength="20" required/>
          <label for="password">Password</label>
        </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
          <input id="password2" type="password" class="validate" name="password2"  maxlength="20" required/>
          <label for="password2">Confirmation Password</label>
      </div>
    </div>

     
  <button class="btn waves-effect waves-light black" type="submit" name="forminscription">Submit
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


<?php include '../includes/footer.php'; ?>

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