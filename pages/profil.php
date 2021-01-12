<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';
require_once '../classes/score.php';

session_start();

$titre = 'profil';


$bd = new Database("localhost","memory2", "root","");


$user = new user;


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
    
      $user->update($login, $password, $user->getLogin());
      $success = "Votre compte a bien été modifié.  <a href='level.php'>Commencer une partie</a>";
    }

  }

}

?>

<?php include '../includes/header.php'; ?>

<main class="valign-wrapper"> 





<?php
$score = new score();

$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau

if (isset($_POST['submit'])) { //niveau sélectionné
    $level = $_POST['submit'];
    $moves = $score->scoreByMoves($level); //récup scores persos par coups
    $times = $score->scoreByTime($level);//récup scores persos par temps
    $twoTables = ['coups' => $moves, 'temps' => $times];
}

?>

<!--TABLEAUX TOP PERSO-->

    <article class="container">

<h1 class="white-text center">Progression Personelle</h1>

<?php if (isset($level)) : ?> <!--Affichage scores du niveau sélectionné-->
    <h3 class='white-text center'>Niveau : <?php echo $level; ?> </h3>

    <?php
    foreach ($twoTables as $name => $oneTable) { /*Génération tableaux*/

        echo "<table class='centered' id='tableFame'>";
        echo "<h5>Progression par " . $name . "</h5>";
        $i = 1;

        foreach ($oneTable as $row) {
            if ($i == 1) {
                echo "<thead>";
                foreach ($row as $key => $element) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</thead>";
                $i = 0;
            }
            echo "<tbody>";
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . $cell . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }
    ?>




<!--DIFFERENTS NIVEAUX-->

<?php else : ?> <!--Affichage boutons sélection niveau-->
    <h5 class="white-text"><em>Veuillez sélectionner un nombre de paires</em></h5>
    <form action="profil.php" method="post" class="row">
        <?php for ($i = $pairsmin; $i <= $pairsmax; $i++) : ?>
                <div class='col'>
                <button class='black white-text btn-large buttonlevel' type='submit' name='submit' value='<?php echo $i ?>'> <?php echo $i ?> </button>
                </div>
        <?php endfor; ?>
    </form>
<?php endif; ?>

</article>


<!--FORMULAIRE UPDATE-->

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

