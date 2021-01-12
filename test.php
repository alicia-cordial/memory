<?php



session_start();

$bdd = new PDO('mysql:host=localhost;dbname=memory', 'root', '');


if(isset($_SESSION['id'])){
  
$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();   
  }


?>

<form>

<?php

$requser = $bdd->prepare("SELECT login, niveau, nb_coup, DATE_FORMAT(time, '%i:%s') AS time FROM score inner join utilisateurs  on score.id_utilisateur =  utilisateurs.id WHERE niveau ORDER BY score.nb_coup ASC LIMIT 10");
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
    if ($key == "niveau"){
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

<form>

<?php

$requser = $bdd->prepare("SELECT login, niveau, nb_coup, DATE_FORMAT(time, '%i:%s') AS time FROM score inner join utilisateurs  on score.id_utilisateur =  utilisateurs.id WHERE niveau ORDER BY score.nb_coup ASC LIMIT 10");
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
    if ($key == "posté"){
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