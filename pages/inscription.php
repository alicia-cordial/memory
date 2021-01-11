<?php
$titre = 'inscription';
require_once '../classes/user.php';

require_once '../classes/validator.php';

session_start();
$pdo = new database("localhost","memory", "root","");
$user = new user; 



if (isset($_POST['forminscription'])){

    $validator = new validator($_POST);

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $validator->userExists($login);

    $validator->passwordConfirm($password, $password2);


   
    $user->register($login, $password);
    $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
    
 
}
?>
<html lang="en">

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

</html>