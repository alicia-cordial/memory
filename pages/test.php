<?php

<?php//*/ include '../includes/header.php'; */?><!--

<main class="valign-wrapper">




<!--DIFFERENTS NIVEAUX-->

<div class="div_tableau1">
<?php
/*/*$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau
/*
if (isset($_POST['submit'])) {
   $_SESSION['level'] = $_POST['submit']; //sauvegarde le choix du niveau dans la session

}
*/
if(isset($_POST['valider'])){
  $nb_paires = intval($_POST['nb_paires']);
  $_SESSION['nb_paires'] = $nb_paires ;
  $_SESSION['level'] = $_POST['nb_paires'] . " " .'paires';
  //header('Location:memory.php?start');
}
*/*/?>




<!--TABLEAUX TOP PERSO-->



<form action="profil.php" method="post">
  <select name="nb_paires">

  <?php /*/*for($i=3; $i<=12; ++$i):*/*/?>
      <option value=<?/*/*= $i */*/?> ><?/*/*= $i */*/?> paires</option>
  <?php /*/*endfor */*/?>

  </select>

  <button type="submit" name="valider">Valider</button>

  </form>
<?php
/*/*
$bdd = new PDO('mysql:host=localhost;dbname=memory', 'root', '');



$requser = $bdd->prepare("SELECT login, score.id as 'n°', niveau, time as 'chrono', nb_coup as 'coups' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau ORDER BY score.nb_coup ASC LIMIT 10");
$requser->execute();

$i=0;

echo "<table>" ;

while ($result = $requser->fetch(PDO::FETCH_ASSOC))
{
    if ($i == 0)
  {

    foreach ($result as $key => $value)
    {
      echo "<th>$key</th>";
    }
    $i++;

  }

  echo "<tr>";
  foreach ($result as $key => $value) {
    if ($key == "login"){
      date_default_timezone_set('Europe/Paris');
      $value =  date("d-m-Y", strtotime($value));  ;
    echo "<td>$value</td>";
    }
    else
      echo "<td>" .nl2br($value). "</td>";
  }
  echo "</tr>";
}

echo "</table>";

 */*/?>

<?php
/*/*if (isset($erreur))
{
  echo $erreur;
}
*/*/?>


</div>



<div class="row">

<?php /*/*if (!empty($errors)): */*/?>
    <div>
        <?php /*/*foreach ($errors as $error) {
            echo '<p class="red-text">' . $error . '</p>';
        } */*/?>
    </div>
<?php /*/*elseif (isset($success)): */*/?>
    <div>
        <?php /*/*{
            echo '<p class="green-text">' . $success . '</p>';
        } */*/?>
    </div>
  <?php /*/*endif; */*/?>









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
/*/*if (isset($erreur))
{
  echo $erreur;
}
*/*/?>

    </form>
</div>



</main>
-->