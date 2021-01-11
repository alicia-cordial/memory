<?php



require_once '../classes/user.php';
require_once '../classes/validator.php';
require_once '../classes/database.php';
require_once '../classes/score.php';

$titre = 'profil';

session_start();

$pdo = new database("localhost","memory", "root","");
$user = new user;

$score_user= new score;



if(isset($_SESSION['user'])){

  $user = $_SESSION['user'];

  if(isset($_POST['formprofil'])){

    $validator = new validator;
  
  $login = htmlspecialchars($_POST['login']);
  $password =  $_POST['password'];
  $password2 = $_POST['password2'];
 
  if($validator->userExists($login) == 1){

    if($validator->sameLogin($login, $user->getLogin()) == 0){

    $errors[] = "Ce login est déjà pris.";
    } 
}

  if($validator->passwordConfirm($password, $password2) == 0){

  $errors[] = "Les mots ne correspondent pas";
  }

  if (empty($errors)) {
  $user->update($login, $password);
  $success = "Votre compte a bien été modifié.  <a href='level.php'>Commencer une partie</a>";
}

}

}



?>


<?php include '../includes/header.php'; ?>

<main class="valign-wrapper"> 
    
<div class="row">

<?php if (!empty($errors)): ?>
            <div>
                <?php foreach ($errors as $error) {
                    echo '<p class="red-text">' . $error . '</p>';
                } ?>
            </div>
        <?php elseif (isset($success)): ?>
            <div>
                <?php {
                    echo '<p class="green-text">' . $success . '</p>';
                } ?>
            </div>
        <?php endif; ?>


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