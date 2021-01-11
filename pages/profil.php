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
$validator = new validator;



if(isset($_SESSION['user'])){

  $user = $_SESSION['user'];


  if(isset($_POST['formprofil'])){
  

   $_POST['login'] = htmlspecialchars($login);
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
 

  if($validator->sameLogin($login)){

    $validator->passwordConfirm($login, $password);
  }


  $user->update($login, $password);
  var_dump($user);
}

}

?>


<?php include '../includes/header.php'; ?>

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