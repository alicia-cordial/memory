<?php


$titre = 'wall of fame';

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=memory', 'root', '');


if(isset($_SESSION['id'])){
  


$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();   
  }


?>

<?php //include '../includes/header.php'; ?>


<main id="main_fame">


<?php

$requser = $bdd->prepare("SELECT login, score.id as 'partie n°', niveau, nb_coup as 'nombre de coups' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau  ORDER BY score.nb_coup ASC LIMIT 10 ");
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
    if ($key == "nombre_coup"){
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

 ?>

<?php
if (isset($erreur))
{
  echo $erreur;
}
?>



<form>

<?php

$requser = $bdd->prepare("SELECT login, score.id as 'partie n°', niveau, time as 'chrono'  FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau ORDER BY score.time ASC LIMIT 10");
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
    if ($key == "nombre_coup"){
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

 ?>

<?php
if (isset($erreur))
{
  echo $erreur;
}
?>
</form>

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