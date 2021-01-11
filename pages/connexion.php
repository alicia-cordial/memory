<?php
$titre = "connexion";
require_once '../classes/user.php';
require_once '../classes/validator.php';

session_start();

$pdo = new database("localhost","memory", "root","");
$user = new user;



if (isset($_POST['formconnexion'])){

  $validator = new validator;

  $login= htmlspecialchars($_POST['login']);
  $password = $_POST['password']; 
  

    if($validator->passwordConnect($login, $password) == 0){
      $errors[] = "Ce login ou mot de passe n'existe pas.";
    }

    if (empty($errors)) {
      $user->connect($login, $password);  
      $_SESSION['user'] = $user ;

      header("Location: profil.php");
    
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


    <form class="col s12" action="connexion.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login" class="validate" required/>
          <label for="login">Login</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password" required/>
          <label for="password">Password</label>
        </div>
      </div>
 
     
  <button class="btn waves-effect waves-light black " type="submit" name="formconnexion">Submit
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